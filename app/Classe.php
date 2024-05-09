<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classe extends Model
{
    use SoftDeletes;
    protected $guarded = [];


    public function NewRecord(array $data){
        $this->create($data);
    }



    public function list(){
        $classes = DB::select('
            SELECT 

            classes.id ,
            classes.name_english,
            classes.name_arabic,
             grades.name_english as "grades_en" ,
             grades.name_arabic  as  "grades_ar"
                
            FROM  classes
            JOIN grades ON grades.id =  classes.grades_id 
            WHERE classes.deleted_at IS NULL
            ');
        return $classes;
    }


    public function trashed(){
        $classes = DB::select('
        SELECT 
        classes.id ,
        classes.name_english,
        classes.name_arabic,
         grades.name_english as "grades_en" ,
         grades.name_arabic  as  "grades_ar"
            
       FROM  classes
       JOIN grades ON grades.id =  classes.grades_id 

         WHERE  classes.deleted_at IS NOT NULL');
            
        return $classes;
    }



    

    public function find(int $id){
        $classes = DB::select('
            SELECT 
            classes.id ,
            classes.name_english,
            classes.name_arabic,
            classes.grades_id,


            grades.name_english as "grades_en" ,
            grades.name_arabic  as  "grades_ar"
            
            FROM classes
            JOIN grades ON grades.id =  classes.grades_id 
            WHERE classes.id = :id 
            ',['id' => $id]);

        return collect($classes)->first();
    }



    public function updateRecord(int $id , array $data){

        $this->findOrFail($id)->update($data);
    }



    public function deleteRecord(int $id){

        $this->findOrFail($id)->delete();
    }



    public function restore(int $id)
    {
      $Classe =  Classe::withTrashed()->where('id',$id)->restore();
      return $Classe;
    }


    


    

}
