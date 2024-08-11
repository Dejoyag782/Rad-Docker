<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\History;
use App\Models\Team;
use App\Models\TeamMemberRole;
use App\Models\Role;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\PortfolioFiles;

class WelcomeController extends Controller
{

    

    public function index()
    {

        $perFive = 5; // Define the number of items per page
        $perSix = 6;
        $histories = History::orderBy('id', 'asc')->paginate($perFive);
        $team = Team::orderBy('id','asc')->paginate($perSix);
        $service = Service::orderBy('id','asc')->paginate($perSix);
        $portfolios = Portfolio::orderBy('id')->with('service')->paginate($perSix);
        
        return view('welcome', compact('histories','team','service','portfolios'));
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'desc' => 'required|string',
        ]);

        $contact = Message::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'desc' => $validatedData['desc'],
            'archived' => 0, // Setting archived to default value
        ]);

        // Optionally, you can return a response or redirect
        return redirect()->back()->with('success', 'Message sent successfully!');
    }

    public function displayHistoryData(Request $request)
    {
        $perPage = 5; // Define the number of items per page
        $histories = History::orderBy('id','desc')->paginate($perPage);
        return response()->json($histories);
    }

    public function displayTeamData(Request $request)
    {
        $perTeam = 6; // Define the number of items per page
        $team = Team::orderBy('id','desc')->paginate($perTeam);
        return response()->json($team);
    }

    public function displayServiceData(Request $request)
    {
        $perService = 6; // Define the number of items per page
        $service = Team::orderBy('id','desc')->paginate($perService);
        return response()->json($service);
    }

    public function displayProjectsByService($serviceId)
    {
        $query = PortfolioFiles::where('service_id', $serviceId);

        // Handle search query
        if (request()->has('search') && request()->search != '') {
            $search = request()->search;
            $query->where(function($q) use ($search) {
                $q->where('project_name', 'LIKE', "%{$search}%")
                ->orWhere('client', 'LIKE', "%{$search}%")
                ->orWhere('date', 'LIKE', "%{$search}%");
            });
        }

        $projects = $query->paginate(9); // Adjust the number to however many items per page

        $serviceName = Service::find($serviceId)->name;

        return response()->json([
            'service_name' => $serviceName,
            'data' => $projects->items(),
            'pagination' => (string) $projects->links('pagination::bootstrap-4'), // Adjust as needed
        ]);
    }


}
