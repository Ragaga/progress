<?php


namespace App\Services;


use App\Entities\Student;
use App\Http\Requests\RequestStudentAdd;
use App\Repositories\GradeRepository;
use App\Repositories\GroupRepository;
use App\Repositories\StudentRepository;

class StudentService
{
    private $studentRepository;
    private $groupRepository;
    private $gradeRepository;

    public function __construct(StudentRepository $studentRepository, GroupRepository $groupRepository, GradeRepository $gradeRepositort)
    {
        $this->studentRepository = $studentRepository;
        $this->groupRepository = $groupRepository;
        $this->gradeRepository = $gradeRepositort;
    }

    public function add(RequestStudentAdd $request)
    {
        $this->checkGroupExists($request->group_id);
        $registration_ip = $request->getClientIp();
        $registration_time = new \DateTime();
        $student = Student::create(
            $request->name,
            $request->surname,
            $request->group_id,
            $request->email,
            new \DateTime($request->birthdate),
            $registration_ip,
            $registration_time
        );
        $this->studentRepository->add($student);
    }

    private function checkGroupExists(int $group_id)
    {
        if(!$this->groupRepository->findById($group_id)){
            throw new \DomainException('Group not found');
        }
    }

    public function getStudentsWithGrades(int $page = 1, int $limit = 20){
        $offset = $limit * $page - 1;
        $students = $this->studentRepository->find($limit, $offset);
        $students = $students->toArray();
        foreach($students as &$student){
            $group = $this->groupRepository->findById($student['group_id']);
            $student['group'] = $group->name;
            $subjects = $this->gradeRepository->getGradesWithSubjectsByStudentId($student['id']);
            $student['subjects'] = $subjects;
            $student['average_grade'] = !empty($student['subjects'][0]) ? number_format($student['subjects'][0]->average_grade, 2) : '';
        }
        return $students;
    }
}