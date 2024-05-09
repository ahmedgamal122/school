<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\School;
use App\Grades;
class GradesController extends Controller
{
    protected $School;
    protected $Grades;


    public function __construct(School $School,Grades $Grades)
    {
        $this->School = $School;
        $this->Grades = $Grades;

    }

    public function index()

    {
        return view('Dashboard.grades.index',['Grades' => $this->Grades->list(),]);

            
                
    }


    public function create()
    {
        return view('Dashboard.grades.create',[
            'School' => $this->School->getschools()]);

        
    }

    public function trashed()
    {
        return view('Dashboard.grades.trashed',['trashed' => $this->Grades->trashed(),]);
            
       
    }


    public function store(Request $request)
    {
        $data =  $request->validate([
            'name_english' => 'required|unique:grades',
            'name_arabic' => 'required|unique:grades',
            'school_id' => 'nullable|numeric',

        ]);

        $this->Grades->NewRecord($data);
        session()->flash('add');

        return redirect()->route('grades.index');


    }

    public function edit($id)
    {
        return view('Dashboard.grades.edit',[
            'Grades'=>$this->Grades->find($id),
            'School' => $this->School->getschools()
        ]);

    }

    public function update(Request $request, $id)
    {
        $data =  $request->validate([
            'name_english' => 'required|unique:grades,id,' . $id,
            'name_arabic' => 'required|unique:grades,id,' . $id,
            'school_id' => 'nullable|numeric',

        ]);




        $this->Grades->updateRecord($id,$data);
        session()->flash('edit');

        return redirect()->route('grades.index');



    }


    public function destroy($id)
    {
        $this->Grades->deleteRecord($id);
        session()->flash('delete');

        return redirect()->route('grades.trashed');



    }

    public function restore($id)
    {
     $this->Grades->restore($id);
     session()->flash('add');

     return redirect()->route('grades.index');



    }

}







    


    

