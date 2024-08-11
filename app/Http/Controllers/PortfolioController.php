<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileTypeMimeValidationRequest;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Portfolio;
use App\Models\PortfolioFiles;
use App\Models\Service;
use App\Models\Team;

class PortfolioController extends Controller
{
    public function index()
    {
        $perPage = 6; // Define the number of items per page
        $portfolios = Portfolio::orderBy('id')->with('service')->paginate($perPage);
        // Fetch all team
        $team = Team::all();
        
        // Pass the paginated services to the view
        return view('dashboard.portfolio.index', compact('portfolios','team'));
    }

    public function getProjectsByService(Request $request, $service_id)
    {
        $service = Service::find($service_id);
        $query = PortfolioFiles::where('service_id', $service_id)->with('service');

        // Apply search filtering if provided
        if ($request->has('search') && !empty($request->search['value'])) {
            $search = $request->search['value'];
            $query->where(function($q) use ($search) {
                $q->where('client', 'LIKE', "%$search%")
                  ->orWhere('date', 'LIKE', "%$search%" )
                  ->orWhere('project_name', 'LIKE', "%$search%" );
            });
        }

        // Order by file_type
        $query->orderBy('date', 'desc');   

        // Paginate the results
        $projects = $query->paginate($request->length, ['*'], 'page', ($request->start / $request->length) + 1);

        return response()->json([
            'draw' => intval($request->draw),
            'recordsTotal' => $projects->total(),
            'recordsFiltered' => $projects->total(),
            'data' => $projects->items(),
            'service_name' => $service->name
        ]);
    }

    public function storeOrUpdate(Request $request)
    {
        
        \Log::info(''. $request->file_type);
        $request->validate([
            'project_name' => 'required|string|max:255',
            'sub_heading' => 'required|string|max:255',
            'desc' => 'required|string|max:255',
            'date' => 'required|string|max:255',
            'client' => 'required|string|max:255',
            'file_type' => 'nullable|string|max:255',
            'file_path' => 'nullable', 'string', [new FileTypeMimeValidationRequest($request->file_type)],
            'project_team_ids' => 'nullable|array',
        ]);

        $filePath = null;
        if ($request->file_type == 'Link') {
            if ($request->id !== null){
                $file = PortfolioFiles::find($request->id);
                // Handle file upload
                $oldFilePath = $file->file_path; 
                if ($oldFilePath && Storage::disk('public')->exists($oldFilePath)) {
                Storage::disk('public')->delete($oldFilePath);
                }
            }
            $filePath = $request->file_path;
            
        } 
        else if ($request->file_type == 'Audio'){
            if ($request->hasFile('file_path')) {

                if ($request->id !== null){
                    $file = PortfolioFiles::find($request->id);
                    // Handle file upload
                    $filePath = $file->file_path; 
                    if ($filePath && Storage::disk('public')->exists($filePath)) {
                    Storage::disk('public')->delete($filePath);
                    }
                }

                $randomName = Str::random(10); // Generate a 10-character random string
                $originalExtension = $request->file('file_path')->getClientOriginalExtension();
                $newFileName = $randomName . '.' . $originalExtension;

                try {
                    $filePath = $request->file('file_path')->storeAs('public/projects', $newFileName);
                } catch (\Exception $e) {
                    \Log::error('Error uploading file: ' . $e->getMessage());
                    // Handle the error, e.g., return an error response
                }
                $filePath = str_replace('public/', '', $filePath); // Remove 'public/' from the path
            }
        }
        else{
            if ($request->hasFile('file_path')) {
                if ($request->id !== null){
                    $file = PortfolioFiles::find($request->id);
                    // Handle file upload
                    $filePath = $file->file_path; 
                    if ($filePath && Storage::disk('public')->exists($filePath)) {
                    Storage::disk('public')->delete($filePath);
                    }
                }
                $filePath = $request->file('file_path')->store('public/projects');
                $filePath = str_replace('public/', '', $filePath); // Remove 'public/' from the path
            }
        }
        // Get the array from the request
        $rawProjectTeamIds = $request->input('project_team_ids', []);

        // Log or print the raw input data for debugging
        \Log::info('Raw project_team_ids input:', $rawProjectTeamIds);

        // Ensure the array contains integers
        // Flatten the array and convert all elements to integers
        $projectTeamIdsArray = [];
        foreach ($rawProjectTeamIds as $item) {
            // Decode JSON string if necessary
            $decodedItem = json_decode($item, true);
            if (is_array($decodedItem)) {
                // Merge arrays and filter out non-integer values
                $projectTeamIdsArray = array_merge($projectTeamIdsArray, array_map('intval', $decodedItem));
            } else {
                // If it's a simple value, convert to integer and add to the array
                $projectTeamIdsArray[] = intval($item);
            }
        }

        // Remove duplicates if needed
        $projectTeamIdsArray = array_unique($projectTeamIdsArray);

        // Log or print the processed array for debugging
        \Log::info('Processed project_team_ids array:', $projectTeamIdsArray);

        // Convert the array to a JSON string
        $projectTeamIdsJson = json_encode($projectTeamIdsArray);

        $projectData = [
            'service_id' => $request->service_id,
            'project_name' => $request->project_name,
            'sub_heading' => $request->sub_heading,
            'desc' => $request->desc,
            'date' => $request->date,
            'client' => $request->client,
            'file_type' => $request->file_type,
            'file_path' => $request->file_path,
            'project_team_ids' => $projectTeamIdsJson,
        ];
    
        // Update file_path only if it's provided
        if ($request->hasFile('file_path')) {
            $projectData['file_path'] = $filePath;
        }
    
        $project = PortfolioFiles::updateOrCreate(
            ['id' => $request->id],
            $projectData
        );

        if ($request->ajax()) {
            return response()->json(['success' => 'Project saved successfully.']);
        }

        return redirect()->route('portfolio')->with('success', 'Project saved successfully.');
    }


    public function deleteProject(Request $request)
    {
        $id = $request->input('id');
        $project = PortfolioFiles::find($id);

        // Capture the old profile picture path before updating the project's profile
        $filePath = $project->file_path;

        // Delete old profile picture if it exists
        if ($filePath) {
            // Check if the old filename exists in storage and delete it
            if (Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);

                // Log successful deletion
                // Log::info("Deleted old profile picture: {$filePath}");
            } else {
                // Log if file doesn't exist
                // Log::warning("Old profile picture not found in storage: {$filePath}");
            }
        }

        if ($project) {
            $project->delete();
            return response()->json(['success' => 'Project deleted successfully.']);
        }

    return response()->json(['error' => 'Project not found.'], 404);
    }

    public function showProject($id)
    {
        $projects = PortfolioFiles::findOrFail($id);

        $teamIds = json_decode($projects->project_team_ids, true);
        $members = [];
        if (is_array($teamIds)) {
            // Retrieve team members based on team IDs
            $members = Team::whereIn('id', $teamIds)->get();
            // Log the retrieved team members
            \Log::info('Retrieved team members:', ['members' => $members]);
        }

        // Add the retrieved members to the project response
        $projects->team_members = $members;

        return response()->json($projects);
    }   

}
