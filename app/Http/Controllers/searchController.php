<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;

 Paginator::useBootstrapFive();

use Illuminate\Http\Request;
use App\Models\User;

class SearchController extends Controller
{
    public function searchList(Request $request)
    {
        $search = $request->input('search');

        $users = User::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%")
                         ->orWhere('id', 'like', "%{$search}%");
        })->paginate(4);
        

            if ($search && $users->isEmpty()) {
        return view('userList', [
            'users' => $users,
            'search' => $search,
            'notFound' => 'No users found for "' . $search . '"'
        ]);
    }

        return view('userList', compact('users'));
            }



                // public function userList(){

    //     $users = User::all();

    // return view('userList',compact('users'));
    // }

//   public function showData() {
//     $users = User::paginate(4); // paginate instead of all()
//     return view('userList', compact('users'));
// }



}
