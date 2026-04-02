<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class extends Controller
{
    public function index(){
        Project::all();
        return view("admin",compact("project"));
    }
}
