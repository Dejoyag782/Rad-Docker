<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        return view('dashboard.users.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => $request->user_type,
        ]);

        if ($request->ajax()) {
            return response()->json(['success' => 'User added successfully.']);
        }

    }


    public function getUsers(Request $request)
    {
        // Page Length
        $pageNumber = ($request->start / $request->length) + 1;
        $pageLength = $request->length;
        $skip = ($pageNumber - 1) * $pageLength;

        // Page Order
        $orderColumnIndex = $request->order[0]['column'] ?? '0';
        $orderBy = $request->order[0]['dir'] ?? 'desc';

        // get data from users table
        $query = \DB::table('users')->select(['id', 'name', 'email', 'user_type', 'email_verified_at', 'password', 'profile_pic']);

        // Search
        $search = $request->search;
        $query = $query->where(function($query) use ($search) {
            $query->orWhere('name', 'like', "%".$search."%");
            $query->orWhere('email', 'like', "%".$search."%");
        });

        $orderByName = 'name';
        switch ($orderColumnIndex) {
            case '0':
                $orderByName = 'id';
                break;
            case '1':
                $orderByName = 'name';
                break;
            case '2':
                $orderByName = 'email';
                break;
        }
        $query = $query->orderBy($orderByName, $orderBy);
        $recordsFiltered = $recordsTotal = $query->count();
        $users = $query->skip($skip)->take($pageLength)->get();

        return response()->json(["draw" => $request->draw, "recordsTotal" => $recordsTotal, "recordsFiltered" => $recordsFiltered, 'data' => $users], 200);
    }


    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
    
        if (!$user) {
            return redirect()->route('users')->with('message', 'User update failed.');
        }
    
        $request->validate([
            'user_type' => 'string'
        ]);
    
        $user->user_type = $request->input('user_type');
        $user->save();
    
        if ($request->ajax()) {
            return response()->json(['success' => 'User Updated successfully.']);
        }
    }
    


    public function deleteUser(Request $request)
    {
        $id = $request->input('id');
        $user = User::find($id);

        // Capture the old profile picture path before updating the user's profile
        $ProfilePicPath = $user->profile_pic;

        // Delete old profile picture if it exists
        if ($ProfilePicPath) {
            // Check if the old filename exists in storage and delete it
            if (Storage::disk('public')->exists($ProfilePicPath)) {
                Storage::disk('public')->delete($ProfilePicPath);

                // Log successful deletion
                Log::info("Deleted old profile picture: {$ProfilePicPath}");
            } else {
                // Log if file doesn't exist
                Log::warning("Old profile picture not found in storage: {$ProfilePicPath}");
            }
        }

        if ($user) {
            $user->delete();
            return response()->json(['success' => 'User deleted successfully.']);
        }

    return response()->json(['error' => 'User not found.'], 404);
    }

    public function showUser($id)
    {
        $user = User::find($id);

        if ($user) {
            return response()->json($user);
        }

        return response()->json(['error' => 'User not found.'], 404);
    }


}