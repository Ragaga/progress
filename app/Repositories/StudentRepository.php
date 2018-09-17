<?php


namespace App\Repositories;


use App\Entities\Student;

class StudentRepository
{
    public function add(Student $student){
        if(!$student->save()){
            throw new \RuntimeException('Student not saved');
        }
    }

    public function find(int $limit = 10, int $offset = 0){
        return Student::skip($offset)->take($limit)->get();
    }
}