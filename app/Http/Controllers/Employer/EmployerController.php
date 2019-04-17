<?php

namespace App\Http\Controllers\Employer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployerController extends Controller
{
    public function index(){
        return view('employer.dashboard');
    }

    public function create(){
        return view('employer.profile.create');
    }


}
