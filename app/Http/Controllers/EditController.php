<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class EditController extends Controller
{
    

public function editUser($id)
    {
        // Logic to retrieve user data by ID for editing
        $user = User::findOrFail($id);
        return view('editUser', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
       

        $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        // ... অন্যান্য validation
    ]);

    $user = User::findOrFail($id);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->save();
        
        return redirect()->route('userList')->with('success', 'Data updated successfully');



    }

}
