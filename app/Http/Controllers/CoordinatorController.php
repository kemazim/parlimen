<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoordinatorController extends Controller
{
    function index() {

        return view('dashboard.coordinator.dashboard');
    }

    function profile() {

        return view('dashboard.coordinator.profile');
    }
}
