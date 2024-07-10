<?php


namespace App\Repositories;

use App\Contracts\StudentRepositoryInterface;
use App\Http\Resources\StudentResource;
use App\Models\Student;

class StudentRepository implements StudentRepositoryInterface
{
    public function getAllDetails()
    {
        return StudentResource::collection(Student::paginate());
    }

    public function createStudent(array $data)
    {
        // TODO: Implement createStudent() method.
    }

    public function findStudent(int $id)
    {
        // TODO: Implement findStudent() method.
    }

    public function deleteStudent(int $id)
    {
        // TODO: Implement deleteStudent() method.
    }

    public function updateStudent(int $id, array $data)
    {
        // TODO: Implement updateStudent() method.
    }

    public function filterStudents($value)
    {
        // TODO: Implement filterStudents() method.
    }
}
