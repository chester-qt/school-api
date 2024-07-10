<?php

namespace App\Services;

use App\Contracts\StudentRepositoryInterface;

class StudentService
{
    protected $studentRepository;
    public function __construct(StudentRepositoryInterface $studentRepository)
    {
        $this->$studentRepository = $studentRepository;
    }

    public function getAllDetails()
    {
        return $this->studentRepository->getAllDetails();
    }


}
