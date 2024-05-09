<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Grades;
use App\Classe;

class ClassesController extends Controller
{
    protected $Grades;
    protected $Classe;


    public function __construct(Grades $Grades, Classe $Classe)
    {
        $this->Grades = $Grades;
        $this->Classe = $Classe;

    }

    public function index()

    {
        return view('Dashboard.classes.index',['Classe' => $this->Classe->list(),]);

            
                
    }


    public function create()
    {
        return view('Dashboard.classes.create',[
            'Grades' => $this->Grades->getsgrades()]);

        
    }

    public function trashed()
    {
        return view('Dashboard.classes.trashed',['trashed' => $this->Classe->trashed(),]);
            
       
    }


    public function store(Request $request)
    {
        $data =  $request->validate([
            'name_english' => 'required|unique:classes',
            'name_arabic' => 'required|unique:classes',
            'grades_id' => 'nullable|numeric',

        ]);

        $this->Classe->NewRecord($data);
        session()->flash('add');

        return redirect()->route('classes.index');


    }

    public function edit($id)
    {
        return view('Dashboard.classes.edit',[
            'Classe'=>$this->Classe->find($id),
            'Grades' => $this->Grades->getsgrades()
        ]);

    }

    public function update(Request $request, $id)
    {
        $data =  $request->validate([
            'name_english' => 'required|unique:classes,id,' . $id,
            'name_arabic' => 'required|unique:classes,id,' . $id,
            'grades_id' => 'nullable|numeric',

        ]);




        $this->Classe->updateRecord($id,$data);
        session()->flash('edit');

        return redirect()->route('classes.index');



    }


    public function destroy($id)
    {
        $this->Classe->deleteRecord($id);
        session()->flash('delete');

        return redirect()->route('classes.trashed');



    }


    public function restore($id)
    {
     $this->Classe->restore($id);
     session()->flash('add');

     return redirect()->route('classes.index');



    }



}
