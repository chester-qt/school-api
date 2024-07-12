<?php

namespace App\Contracts;

use App\Models\Student;

interface TeacherRepositoryInterface
{
    public function getAllStudentInformation();
    public function getStudentInformation(Student $student);
    public function editInformation(int $id, array $data);
    public function deleteStudentInformation(int $id);
}
