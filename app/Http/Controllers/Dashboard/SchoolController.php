<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\School;
class SchoolController extends Controller
{
    protected $School;

    public function __construct(School $School)
    {
        $this->School = $School;
    }
    


    public function index()

    {
        return view('Dashboard.school.index',['School' => $this->School->list(),]);

            
                
    }

    public function trashed()
    {
        return view('Dashboard.school.trashed',['trashed' => $this->School->trashed(),]);
            
       
    }

    public function create()
    {
        return view('Dashboard.school.create');
    }


    public function store(Request $request)
    {
        $data =  $request->validate([
            'name_english' => 'required|unique:schools',
            'name_arabic' => 'required|unique:schools',
            'logo_english' => 'nullable|image|mimes:png,jpg,jpeg|max:5000',
            'logo_arabic' => 'nullable|image|mimes:png,jpg,jpeg|max:5000'
        ]);

        if($request->has('logo_arabic') != null)
    {
        $imageName = Str::random() . ".{$request->file('logo_arabic')->getClientOriginalExtension()}";
        $request->file('logo_arabic')->storeAs('public/uploads/school', $imageName);

        $data['logo_arabic'] = "/uploads/school/{$imageName}";
    }

    if($request->has('logo_english') != null)
    {
        $imageName = Str::random() . ".{$request->file('logo_english')->getClientOriginalExtension()}";
        $request->file('logo_english')->storeAs('public/uploads/school', $imageName);

        $data['logo_english'] = "/uploads/school/{$imageName}";
    }

       

        $this->School->NewRecord($data);
        session()->flash('add');

        return redirect()->route('school.index');


    }

    public function edit($id)
    {
        return view('Dashboard.school.edit',[
            'School'=>$this->School->find($id)
        ]);

    }

    public function update(Request $request, $id)
    {
    $data =  $request->validate([
        'name_english' => 'required|unique:schools,id,' . $id,
        'name_arabic' => 'required|unique:schools,id,' . $id,
        'logo_english' => 'nullable|image|mimes:png,jpg,jpeg|max:5000',
        'logo_arabic' => 'nullable|image|mimes:png,jpg,jpeg|max:5000'
    ]);



    if($request->has('logo_arabic') != null)
    {
        $imageName = Str::random() . ".{$request->file('logo_arabic')->getClientOriginalExtension()}";
        $request->file('logo_arabic')->storeAs('public/uploads/school', $imageName);

        $data['logo_arabic'] = "/uploads/school/{$imageName}";
    }

    if($request->has('logo_english') != null)
    {
        $imageName = Str::random() . ".{$request->file('logo_english')->getClientOriginalExtension()}";
        $request->file('logo_english')->storeAs('public/uploads/school', $imageName);

        $data['logo_english'] = "/uploads/school/{$imageName}";
    }



        $this->School->updateRecord($id,$data);
        session()->flash('edit');

        return redirect()->route('school.index');



    }


    public function destroy($id)
    {
        $this->School->deleteRecord($id);
        session()->flash('delete');

        return redirect()->route('school.trashed');



    }

    public function restore($id)
    {
     $this->School->restore($id);
     session()->flash('add');

     return redirect()->route('school.index');



    }

}







    
