<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ Teacher;

class TeacherController extends Controller
{
    protected $Teacher;

    public function __construct(Teacher $Teacher)
    {
        $this->Teacher = $Teacher;
    }




    public function create()
    {
        return view('Dashboard.teachers.create');
    }
    
}
