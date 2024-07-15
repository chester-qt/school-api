<?php

namespace App\Repositories;

use App\Contracts\TeacherRepositoryInterface;
use App\Http\Resources\TeacherResource;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        try {
            $student = $this->model->where('id', $id)->first();

            $student->update($data);

            return new TeacherResource($student);

        } catch (ModelNotFoundException $e) {
            abort(404);
        }


    }

    public function deleteStudentInformation(int $id)
    {
        // TODO: Implement deleteStudentInformation() method.
    }
}
