<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index() {

        return view('dashboard.admin.dashboard');
    }

    function userList() {

        $user = User::where('status', 0)->get();
        return view('dashboard.admin.userList',['user'=>$user]);
    }

    function userApproval(Request $request) {
     
        $user = User::where('status', 0)->get();
        return view('dashboard.admin.userApproval',['user'=>$user]);
    }

}
