<?php

namespace App\Services;

use App\Contracts\TeacherRepositoryInterface;

class TeacherService implements TeacherRepositoryInterface
{
    public function __construct(
        protected TeacherRepositoryInterface $repository
    ) {}

    public function getAllStudentInformation()
    {
        return $this->repository->getAllStudentInformation();
    }

    public function getStudentInformation(int $id)
    {
        // TODO: Implement getStudentInformation() method.
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
