<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Exception;
use App\Models\Service;
use App\Models\Role;
use App\Models\Portfolio;

class ServiceController extends Controller
{
    public function index()
    {
        $perPage = 6; // Define the number of items per page
        $services = Service::orderBy('id')->paginate($perPage);
        
        // Pass the paginated services to the view
        return view('dashboard.services.index', compact('services'));
    }

    public function storeOrUpdate(Request $request)
    {
    $request->validate([
        'id' => 'nullable|exists:services,id',
        'name' => 'required|string|max:255',
        'desc' => 'required|string|max:255',
        'icon' => 'required|string',
        'roles' => 'nullable|array',
        'roles.*' => 'string|max:255',
        'sub_header' => 'required|string',
        'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:50000',
    ]);

    $data = $request->only(['name', 'desc','icon']);

    // if ($request->filled('id')) {
    //     // Update existing timeline
    //     $service = Service::findOrFail($request->id);
    //     $service->update($data);
    // } else {
    //     // Create new timeline
    //     Service::create($data);
    // }

    // Handle file upload for the thumbnail
    $thumbnailPath = null;
    if ($request->hasFile('thumbnail')) {
        $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
    }

    if ($request->filled('id')) {
        // Update existing service
        $service = Service::findOrFail($request->id);
        $service->update($data);
    
        // Log roles
        Log::info('Updating roles for service ID: ' . $request->id);
    
        // Log the raw roles data
        Log::info('Raw roles data: ', ['roles' => $request->roles]);
    
        // Check if roles are a JSON string or an array
        $roles = $request->roles;
    
        if (is_string($roles)) {
            // Decode JSON string to PHP array
            $roles = json_decode($roles, true);
        }
    
        // Log decoded roles
        Log::info('Decoded roles: ', ['roles' => $roles]);
    
        if (is_array($roles)) {
             // Fetch existing roles for the service
            $existingRoles = $service->roles()->pluck('role_name')->toArray();

            // Log existing roles as a string
            Log::info('Existing roles: ', ['roles' => $existingRoles]);

    
            // Group existing roles into a JSON array
            $existingRolesJson = json_encode($existingRoles);
            Log::info('Existing roles as JSON: ', ['roles' => $existingRolesJson]);
    
            
            // Create roles that doesn't exist from the database but is present from data fetched from Form
            foreach ($roles as $roleNames) {
                $dataArray = json_decode($roleNames, true);
    
                foreach ($dataArray as $value) {      
                    if (!in_array($value, $existingRoles)) {                                      
                        Log::info('Adding: '. $value);
                        $service->roles()->create([
                            'role_name' => $value,
                            'service_id' => $service->id
                        ]);
                    }
                }
            }
    
            // Remove roles from database that doesn't exist in the fetched data from the form
            $dataArray = json_decode($roleNames, true);
            $rolesToRemove = $service->roles()->whereNotIn('role_name', $dataArray)->get();

            foreach ($rolesToRemove as $role) {
                Log::info('Deleting role:', ['role' => $role->toArray()]);
            }

            // Remove roles that no longer exist for the current service
            $service->roles()->whereIn('role_name', $rolesToRemove->pluck('role_name'))->delete();
    
    
        } else {
            Log::error('Roles data is not an array or string.');
        }

        // Update portfolio if it exists
        $portfolio = Portfolio::where('service_id', $service->id)->first();
        if ($portfolio) {
            $portfolio->sub_header = $request->sub_header;

            // Check if a new thumbnail is uploaded and delete the old one if it exists
            if ($thumbnailPath) {
                if ($portfolio->thumbnail) {
                    Storage::disk('public')->delete($portfolio->thumbnail);
                }
                $portfolio->thumbnail = $thumbnailPath;
            }

            $portfolio->save();
        } else {
            // Create a new portfolio entry if it doesn't exist
            $portfolio = new Portfolio();
            $portfolio->service_id = $service->id;
            $portfolio->sub_header = $request->sub_header;
            $portfolio->thumbnail = $thumbnailPath;
            $portfolio->save();
        }
        
    }  
     else {
        // Create new service
        $service = Service::create($data);
    
        // Log roles
        Log::info('Creating roles for new service');
    
        // Log the raw roles data
        Log::info('Raw roles data: ', ['roles' => $request->roles]);
    
        // Check if roles are a JSON string or an array
        $roles = $request->roles;
    
        if (is_string($roles)) {
            // Decode JSON string to PHP array
            $roles = json_decode($roles, true);
        }
    
        // Log decoded roles
        Log::info('Decoded roles: ', ['roles' => $roles]);
    
        // Save each role individually
        if (is_array($roles)) {
            foreach ($roles as $roleNames) {
                // Ensure $roleName is a string
                // Access the inner array
                $dataArray = json_decode($roleNames, true);


                foreach ($dataArray as $value) {                    
                    Log::info('Saving role: ' . $value);
                    $service->roles()->create([
                        'role_name' => $value,
                        'service_id' => $service->id
                    ]);
                }
            }
        } else {
            Log::error('Roles data is not an array or string.');
        }

        // Create the portfolio entry
        $portfolio = new Portfolio();
        $portfolio->service_id = $service->id;
        $portfolio->sub_header = $request->sub_header;
        $portfolio->thumbnail = $thumbnailPath;
        $portfolio->save();
    }

    return redirect('/services')->with('success', 'Service saved successfully!');
    }

    public function showService($id)
    {
        $service = Service::with('roles', 'portfolios')->findOrFail($id);

        return response()->json($service);
    }

    public function destroyService(Request $request, $serviceId)
    {
    $service = Service::findOrFail($serviceId);

    // Check if service exists (optional)
    if (!$service) {
        return response()->json(['error' => 'Service not found.'], 404);
    }

    try {
        // Delete the service record
        $service->delete();

        return response()->json(['success' => 'Service deleted successfully.'], 200);
    } catch (Exception $e) {
        // Handle potential deletion errors (e.g., database constraints)
        return response()->json(['error' => 'An error occurred during deletion.'], 500);
    }
    }
    
}
