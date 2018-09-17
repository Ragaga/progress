<?php

namespace App\Http\Controllers;


use App\Http\Requests\RequestStudentAdd;
use App\Services\StudentService;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class StudentController extends Controller
{
    private $service;

    public function __construct(StudentService $service)
    {
        $this->service = $service;
    }

    public function add(RequestStudentAdd $request)
    {
        try {
            $this->service->add($request);
            return [
                'status' => true,
            ];
        } catch (\DomainException $exception) {
            throw new BadRequestHttpException($exception->getMessage(), null, $exception);
        }
    }

    public function getList(int $page = 1, int $limit = 20)
    {
        return $this->service->getStudentsWithGrades($page, $limit);
    }
}
