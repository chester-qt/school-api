<?php

namespace App\Services;

use App\Contracts\StudentRepositoryInterface;
use App\Mail\EnrolledMail;
use App\Repositories\StudentRepository;

class StudentService implements StudentRepositoryInterface
{
    public function __construct(protected StudentRepositoryInterface $studentRepository)
    {}

    public function getStudents()
    {
        return $this->studentRepository->getStudents();
    }

    public function createStudent(array $data)
    {
        return $this->studentRepository->createStudent($data);
    }

    public function findStudent(int $id)
    {
        return $this->studentRepository->findStudent($id);
    }

    public function deleteStudent(int $id)
    {
        return $this->studentRepository->deleteStudent($id);
    }

    public function updateStudent(int $id, array $data)
    {
        return $this->studentRepository->updateStudent($id, $data);

        //send email when the $student->email === true
    }

    public function filterStudents($value)
    {
        // TODO: Implement filterStudents() method.
    }
}
