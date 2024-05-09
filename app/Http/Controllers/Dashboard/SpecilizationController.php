<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Specilization;
class SpecilizationController extends Controller
{
    protected $Specilization;

    public function __construct(Specilization $Specilization)
    {
        $this->Specilization = $Specilization;
    }
    


    public function index()

    {
        return view('Dashboard.specliztion.index',['Specilization' => $this->Specilization->list(),]);

            
                
    }

    public function trashed()
    {
        return view('Dashboard.specliztion.trashed',['trashed' => $this->Specilization->trashed(),]);
            
       
    }

    public function create()
    {
        return view('Dashboard.specliztion.create');
    }


    public function store(Request $request)
    {
        $data =  $request->validate([
            'name_english' => 'required|unique:specilizations',
            'name_arabic' => 'required|unique:specilizations'
        ]);

      
    
       

        $this->Specilization->NewRecord($data);
        session()->flash('add');

        return redirect()->route('Specilization.index');


    }

    public function edit($id)
    {
        return view('Dashboard.specliztion.edit',[
            'Specilization'=>$this->Specilization->find($id)
        ]);

    }

    public function update(Request $request, $id)
    {
    $data =  $request->validate([
        'name_english' => 'required|unique:specilizations,id,' . $id,
        'name_arabic' => 'required|unique:specilizations,id,' . $id
    ]);



    
        $this->Specilization->updateRecord($id,$data);
        session()->flash('edit');

        return redirect()->route('Specilization.index');

    }


    public function destroy($id)
    {
        $this->Specilization->deleteRecord($id);
        session()->flash('delete');

        return redirect()->route('Specilization.trashed');



    }

    public function restore($id)
    {
     $this->Specilization->restore($id);
     session()->flash('add');

     return redirect()->route('Specilization.index');



    }

}







    
