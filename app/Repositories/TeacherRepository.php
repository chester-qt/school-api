<?php

namespace App\Repositories;

use App\Contracts\TeacherRepositoryInterface;
use App\Http\Resources\TeacherResource;
use App\Models\Student;
use App\Models\Teacher;

class TeacherRepository implements TeacherRepositoryInterface
{
    public function __construct(protected Teacher $model)
    {
    }

    public function getAllStudentInformation()
    {
        $data = $this->model->with('students')->paginate();

        return TeacherResource::collection($data);
    }

    public function getStudentInformation(Student $student)
    {
        $data = $this->model->findOrFail($student);
    }

    public function editInformation(int $id, array $data)
    {
        // TODO: Implement editInformation() method.
    }

    public function deleteStudentInformation(int $id)
    {
        // TODO: Implement deleteStudentInformation() method.
    }
}
