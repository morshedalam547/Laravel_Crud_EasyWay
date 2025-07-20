<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReadController extends Controller
{
    public function addUsers(Request $request){


        // ডেটা validate করতে পারেন
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|',
            'title' => 'nullable|string|max:255', // Optional: Validate title length
        'body' => 'nullable', // এটা ensure করুন
            'phone_number' => 'required', // Optional: Validate phone number format
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/',
            ],
        ], [

            'password.min' => 'The password must be at least 8 characters.',
            'password.regex' => ' password must be Include A-Z, a-z, 0-9 & symbol.',

        ]);

//users Table Data Insert
        // // ডেটা সেভ
        //      user::insert([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        //     // 'password' => bcrypt($request->password), 

        // ]);

//users Table Data Insert
        // // ডেটা সেভ
        // DB::table('users')->insert([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        //     // 'password' => bcrypt($request->password), 

        // ]);


//users Table Data Insert
        // ডেটা সেভ
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Assuming you want to hash the password
            'created_at' => now(),
            'updated_at' => now(),


        ]);



//phone Table Data Insert
        $latestUserId = DB::table('users')->latest('id')->value('id');
        DB::Table('phone')->insert([
            'phone_number' => $request->phone_number,
            'user_id' => $latestUserId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


// posts Table Data Insert
        $latestUserId = DB::table('users')->latest('id')->value('id');
        DB::table('posts')->insert([
            'user_id' => $latestUserId,
            'title' => $request->title,
            'body' => $request->body,
            'created_at' => now(),
            'updated_at' => now(),
        ]);



        return redirect()->route('userList')->with('success', 'Data successfully Added');

    }


    

    public function userList(){

        $users = User::all();

    return view('userList', compact('users'));
    }

}
