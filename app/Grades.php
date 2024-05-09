<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grades extends Model
{
    use SoftDeletes;
    protected $guarded = [];


    public function NewRecord(array $data){
        $this->create($data);
    }



    public function list(){
        $grades = DB::select('
            SELECT 
                grades.id ,
                grades.name_english,
                grades.name_arabic,
                schools.name_english as "school_en" ,
                schools.name_arabic  as  "school_ar"
                
            FROM grades
            JOIN schools ON schools.id = grades.school_id 
            WHERE grades.deleted_at IS NULL
            ');
        return $grades;
    }


    public function trashed(){
        $Doctor = DB::select('
        SELECT 
        grades.id ,
        grades.name_english,
        grades.name_arabic,
        schools.name_english as "school_en",
        schools.name_arabic  as   "school_ar"
        
       FROM grades
       JOIN schools ON schools.id = grades.school_id 

         WHERE  grades.deleted_at IS NOT NULL');
            
        return $Doctor;
    }



    

    public function find(int $id){
        $grades = DB::select('
            SELECT 
            grades.id,
            grades.name_english,
            grades.name_arabic,
            grades.school_id,
            schools.name_english AS "school_en",
            schools.name_arabic AS "school_ar"
            FROM grades
            JOIN schools ON schools.id = grades.school_id
            WHERE grades.id = :id 
            ',['id' => $id]);

        return collect($grades)->first();
    }



    public function updateRecord(int $id , array $data){

        $this->findOrFail($id)->update($data);
    }



    public function deleteRecord(int $id){

        $this->findOrFail($id)->delete();
    }



    public function restore(int $id)
    {
      $Grades = Grades::withTrashed()->where('id',$id)->restore();
      return $Grades;
    }


    public function getsgrades()
    {
        $grades = DB::select('
            SELECT 
                id,
                name_english,
                name_arabic
                
                
            FROM grades
            WHERE deleted_at IS NULL
            ');

        return $grades;
    }


    

}
