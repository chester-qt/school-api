<?php


namespace App\Repositories;

use App\Contracts\StudentRepositoryInterface;
use App\Http\Resources\StudentResource;
use App\Jobs\HandleQueueEmailJob;
use App\Models\Student;

class StudentRepository implements StudentRepositoryInterface
{
    public function __construct(protected Student $student)
    {
    }

    public function getAllDetails()
    {
        return StudentResource::collection($this->student->paginate());
    }

    public function createStudent(array $data)
    {
        $data = $this->student->create($data);

        return new StudentResource($data);
    }

    public function findStudent(int $id)
    {
        $student = Student::findOrFail($id);

        return new StudentResource($student);
    }

    public function deleteStudent(int $id)
    {
        $student = Student::findOrFail($id);

        if (! $student) {
            return new \Exception('Student not found.');
        }

        return $student->delete();
    }

    public function updateStudent(int $id, array $data)
    {
        $student = Student::findOrFail($id);

        if (! $student) {
            return new \Exception('Student not found.');
        }

        $updatedStudent = Student::where('id', $student->id)->update($data);

        HandleQueueEmailJob::dispatch($student, request()->user());

        return new StudentResource($updatedStudent);
    }

    public function filterStudents($value)
    {
        // TODO: Implement filterStudents() method.
    }
}
