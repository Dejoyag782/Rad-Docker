<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Team;
use App\Models\Service;
use App\Models\Project;

class DashController extends Controller
{
    //
    public function index()
    {
        // Count the number of messages where the 'archive' column is 1
        $archivedMessagesCount = Message::where('archived', 0)->count();
        $teamCount = Team::count();
        $serviceCount = Service::count();

        // Pass the count to the view
        return view('dashboard.dash.index', compact('archivedMessagesCount','teamCount','serviceCount'));
    }
}
