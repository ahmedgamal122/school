<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Governrate;

class GovrnrateController extends Controller
{
    protected $Governrate;

    public function __construct(Governrate $Governrate)
    {
        $this->Governrate = $Governrate;
    }
    

    public function index()

    {
        return view('Dashboard.governrate.index',['Governrate' => $this->Governrate->list(),]);

            
                
    }

    public function trashed()
    {
        return view('Dashboard.governrate.trashed',['trashed' => $this->Governrate->trashed(),]);
            
       
    }


    public function create()
    {
        return view('Dashboard.governrate.create');
    }


    public function store(Request $request)
    {
        $data =  $request->validate([
            'name_english' => 'required|unique:genders',
            'name_arabic' => 'required|unique:genders'
        ]);

      

        $this->Governrate->NewRecord($data);
        session()->flash('add');

        return redirect()->route('governorates.index');


    }

    public function edit($id)
    {
        return view('Dashboard.governrate.edit',[
            'Governrate'=>$this->Governrate->find($id)
        ]);

    }

    public function update(Request $request, $id)
    {
    $data =  $request->validate([
        'name_english' => 'required|unique:genders,id,' . $id,
        'name_arabic' => 'required|unique:genders,id,' . $id
    ]);



    
        $this->Governrate->updateRecord($id,$data);
        session()->flash('edit');

        return redirect()->route('governorates.index');

    }


    public function destroy($id)
    {
        $this->Governrate->deleteRecord($id);
        session()->flash('delete');

        return redirect()->route('governorates.trashed');



    }

    public function restore($id)
    {
     $this->Governrate->restore($id);
     session()->flash('add');

     return redirect()->route('governorates.index');



    }


}
