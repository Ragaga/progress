<?php


namespace App\Repositories;


class GradeRepository
{
    public function getGradesWithSubjectsByStudentId(int $student_id)
    {
        $sql = "select 
                  s.name, 
                  string_agg(grade::TEXT, ',') grades, 
                  avg(grade) over (partition by student_id) average_grade 
                from grades
                  join subjects s on grades.subject_id = s.id
                where 
                  student_id = :student_id 
                  group by s.name, grade, student_id";
        return \DB::select($sql, [
            'student_id' => $student_id
        ]);
    }
}