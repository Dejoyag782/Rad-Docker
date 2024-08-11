<?php

namespace App\Http\Controllers;
use App\Models\Message;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    public function index()
    {
        return view('dashboard.messages.index');
    }


    public function getMessages(Request $request){
      
        // Page Length
        $pageNumber = ( $request->start / $request->length )+1;
        $pageLength = $request->length;
        $skip       = ($pageNumber-1) * $pageLength;

        // Page Order
        $orderColumnIndex = $request->order[0]['column'] ?? '0';
        $orderBy = $request->order[0]['dir'] ?? 'desc';

        // Get data from Messages table
        $query = \DB::table('messages')->select('*')->where('archived', 0);

        // Search
        $search = $request->search;
        $query = $query->where(function($query) use ($search){
            $query->orWhere('name', 'like', "%".$search."%");
            $query->orWhere('email', 'like', "%".$search."%");
            $query->orWhere('phone', 'like', "%".$search."%");
        });

        $orderByName = 'name';
        switch($orderColumnIndex){
            case '0':
                $orderByName = 'name';
                break;
            case '1':
                $orderByName = 'email';
                break;
            case '2':
                $orderByName = 'phone';
                break;
        
        }
        $query = $query->orderBy($orderByName, $orderBy);
        $recordsFiltered = $recordsTotal = $query->count();
        $users = $query->skip($skip)->take($pageLength)->get();

        return response()->json(["draw"=> $request->draw, "recordsTotal"=> $recordsTotal, "recordsFiltered" => $recordsFiltered, 'data' => $users], 200);
    }


    public function getArchivedMessages(Request $request){
      
        // Page Length
        $pageNumber = ( $request->start / $request->length )+1;
        $pageLength = $request->length;
        $skip       = ($pageNumber-1) * $pageLength;

        // Page Order
        $orderColumnIndex = $request->order[0]['column'] ?? '0';
        $orderBy = $request->order[0]['dir'] ?? 'desc';

        // Get data from Messages table
        $query = \DB::table('messages')->select('*')->where('archived', 1);

        // Search
        $search = $request->search;
        $query = $query->where(function($query) use ($search){
            $query->orWhere('name', 'like', "%".$search."%");
            $query->orWhere('email', 'like', "%".$search."%");
            $query->orWhere('phone', 'like', "%".$search."%");
        });

        $orderByName = 'name';
        switch($orderColumnIndex){
            case '0':
                $orderByName = 'name';
                break;
            case '1':
                $orderByName = 'email';
                break;
            case '2':
                $orderByName = 'phone';
                break;
        
        }
        $query = $query->orderBy($orderByName, $orderBy);
        $recordsFiltered = $recordsTotal = $query->count();
        $users = $query->skip($skip)->take($pageLength)->get();

        return response()->json(["draw"=> $request->draw, "recordsTotal"=> $recordsTotal, "recordsFiltered" => $recordsFiltered, 'data' => $users], 200);
    }

    public function archiveMessage(Request $request)
    {
        $id = $request->input('id');
        $message = Message::find($id);

        if ($message) {
            $message->archived = 1;
            $message->save();

            return response()->json(['success' => 'Message archived successfully.']);
        }

        return response()->json(['error' => 'Message not found.'], 404);
    }

    public function deleteMessage(Request $request)
    {
        $id = $request->input('id');
        $message = Message::find($id);

        if ($message) {
            $message->delete();
            return response()->json(['success' => 'Message deleted successfully.']);
        }

    return response()->json(['error' => 'Message not found.'], 404);
    }

    public function showMessage($id)
    {
        $message = Message::find($id);

        if ($message) {
            return response()->json($message);
        }

        return response()->json(['error' => 'Message not found.'], 404);
    }


}