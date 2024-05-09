<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class Governrate extends Model
{
    use SoftDeletes;
    protected $guarded = [];


    public function NewRecord(array $data){
        $this->create($data);
    }



    public function list(){
        return $this->get();
    }


    public function trashed(){
        $Doctor = DB::select('
            SELECT
                id, 
                name_english,
                name_arabic
            FROM governrates
            WHERE deleted_at IS NOT NULL
            ');
        return $Doctor;
    }



    public function find(int $id){
        return $this->findOrFail($id);
    }


    public function updateRecord(int $id , array $data){

        $this->findOrFail($id)->update($data);
    }



    public function deleteRecord(int $id){

        $this->findOrFail($id)->delete();
    }



    public function restore(int $id)
    {
      $Governrate = Governrate::withTrashed()->where('id',$id)->restore();
      return $Governrate;
    }


   


   
    


   
}
