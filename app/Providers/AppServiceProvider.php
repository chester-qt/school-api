<?php

namespace App\Providers;

use App\Contracts\StudentRepositoryInterface;
use App\Contracts\TeacherRepositoryInterface;
use App\Repositories\StudentRepository;
use App\Repositories\TeacherRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(StudentRepositoryInterface::class, StudentRepository::class);
        $this->app->bind(TeacherRepositoryInterface::class, TeacherRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
