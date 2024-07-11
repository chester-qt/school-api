<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use App\Services\StudentService;
use Illuminate\Http\JsonResponse;

class StudentController extends Controller
{
    public function __construct(protected StudentService $studentService)
    {}

    public function index() : JsonResponse
    {
        $students = $this->studentService->getAllDetails();

        return $this->ok(200, $students, 'success');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request) : JsonResponse
    {
        $student = $this->studentService->createStudent($request->validated());

        return $this->ok(200, $student, 'created');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id) : JsonResponse
    {
        $student = $this->studentService->findStudent($id);

        return $this->ok(200, $student, 'found');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        // kapag nag patch nag update yung enrolled to true send email notification
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, int $id)
    {
        $student = $this->studentService->updateStudent($id, $request->validated());
    }

    public function test()
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return $this->studentService->deleteStudent($id);
    }
}
