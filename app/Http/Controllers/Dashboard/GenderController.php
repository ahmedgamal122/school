<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Gender;
class GenderController extends Controller
{
    protected $Gender;

    public function __construct(Gender $Gender)
    {
        $this->Gender = $Gender;
    }
    


    public function index()

    {
        return view('Dashboard.gender.index',['Gender' => $this->Gender->list(),]);

            
                
    }

    public function trashed()
    {
        return view('Dashboard.gender.trashed',['trashed' => $this->Gender->trashed(),]);
            
       
    }

    public function create()
    {
        return view('Dashboard.gender.create');
    }


    public function store(Request $request)
    {
        $data =  $request->validate([
            'name_english' => 'required|unique:genders',
            'name_arabic' => 'required|unique:genders'
        ]);

      
    
       

        $this->Gender->NewRecord($data);
        session()->flash('add');

        return redirect()->route('gender.index');


    }

    public function edit($id)
    {
        return view('Dashboard.gender.edit',[
            'Gender'=>$this->Gender->find($id)
        ]);

    }

    public function update(Request $request, $id)
    {
    $data =  $request->validate([
        'name_english' => 'required|unique:genders,id,' . $id,
        'name_arabic' => 'required|unique:genders,id,' . $id
    ]);



    
        $this->Gender->updateRecord($id,$data);
        session()->flash('edit');

        return redirect()->route('gender.index');

    }


    public function destroy($id)
    {
        $this->Gender->deleteRecord($id);
        session()->flash('delete');

        return redirect()->route('gender.trashed');



    }

    public function restore($id)
    {
     $this->Gender->restore($id);
     session()->flash('add');

     return redirect()->route('gender.index');



    }

}







    
