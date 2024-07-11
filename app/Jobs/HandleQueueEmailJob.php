<?php

namespace App\Jobs;

use App\Models\Student;
use App\Models\User;
use App\Notifications\EnrolledStudentNotif;
use App\Notifications\TestNotifi;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;


class HandleQueueEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        protected Student $student,
        protected User    $user
    )
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $auth = request()->user();

//        $student = $auth->students->where('email', $auth->email)->first();
//
//        if (!$student) {
//            return;
//        }

        $student = Student::first();
        //Mail::to($auth->email)->queue(new EnrolledStudentNotif());

    }
}
