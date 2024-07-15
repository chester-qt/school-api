<?php


namespace App\Repositories;

use App\Contracts\StudentRepositoryInterface;
use App\Http\Resources\StudentResource;
use App\Jobs\HandleQueueEmailJob;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class StudentRepository implements StudentRepositoryInterface
{
    public function __construct(
        protected Student $model
    ) {}

    public function getStudents()
    {
        $students = $this->model->with('teachers')->paginate();

        return Student::all()->toArray();
    }

    public function createStudent(array $data)
    {
        $data = $this->model->create($data);

        return new StudentResource($data);
    }

    public function findStudent(int $id)
    {
        $student = Student::findOrFail($id);

        return new StudentResource($student->load('teachers'));
    }

    public function deleteStudent(int $id)
    {
        $student = Student::findOrFail($id);

        if (!$student) {
            return new \Exception('Student not found.');
        }

        return $this->model->delete();
    }

    public function updateStudent(int $id, array $data)
    {
        $student = Student::findOrFail($id);

        if (!$student) {
            return new \Exception('Student not found.');
        }

        $updateStudent = DB::transaction(function () use ($student, $data) {
            return Student::where('id', $student->id)->update($data);
        });

        if (!$updateStudent) {
            return new \Exception('Error updating student.');
        }

        //HandleQueueEmailJob::dispatch($student, request()->user());

        return new StudentResource(Student::find($student->id));
    }

    public function filterStudents($value)
    {
        // TODO: Implement filterStudents() method.
    }
}
