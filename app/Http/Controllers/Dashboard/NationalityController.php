<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\ Nationality;
class  NationalityController extends Controller
{
    protected $Nationality;

    public function __construct(Nationality $Nationality)
    {
        $this->Nationality = $Nationality;
    }
    


    public function index()

    {
        return view('Dashboard.nationality.index',['Nationality' => $this->Nationality->list(),]);

            
                
    }

    public function trashed()
    {
        return view('Dashboard.nationality.trashed',['trashed' => $this->Nationality->trashed(),]);
            
       
    }

    public function create()
    {
        return view('Dashboard.nationality.create');
    }


    public function store(Request $request)
    {
        $data =  $request->validate([
            'name_english' => 'required|unique:genders',
            'name_arabic' => 'required|unique:genders'
        ]);

      
    
       

        $this->Nationality->NewRecord($data);
        session()->flash('add');

        return redirect()->route('nationalities.index');


    }

    public function edit($id)
    {
        return view('Dashboard.nationality.edit',[
            'Nationality'=>$this->Nationality->find($id)
        ]);

    }

    public function update(Request $request, $id)
    {
    $data =  $request->validate([
        'name_english' => 'required|unique:genders,id,' . $id,
        'name_arabic' => 'required|unique:genders,id,' . $id
    ]);



    
        $this->Nationality->updateRecord($id,$data);
        session()->flash('edit');

        return redirect()->route('nationalities.index');

    }


    public function destroy($id)
    {
        $this->Nationality->deleteRecord($id);
        session()->flash('delete');

        return redirect()->route('nationalities.trashed');



    }

    public function restore($id)
    {
     $this->Nationality->restore($id);
     session()->flash('add');

     return redirect()->route('nationalities.index');



    }

}







    
