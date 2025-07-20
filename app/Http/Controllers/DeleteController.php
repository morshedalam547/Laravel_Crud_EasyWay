<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function deleteId($id)
{
    $user = User::findOrFail($id); // id দিয়ে ইউজার খোঁজা
    $user->delete(); // ডিলিট করা
    

        return redirect()->route('userList')->with('delete', 'Data Delete successfully');
}
}
