<?php


namespace App\Contracts;

interface StudentRepositoryInterface
{
    public function getAllDetails();
    public function createStudent(array $data);
    public function findStudent(int $id);
    public function deleteStudent(int $id);
    public function updateStudent(int $id, array $data);
    public function filterStudents($value);

}
