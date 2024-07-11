<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'enrolled',
        'date_of_birth',
        'department_id'
    ];

    public function department() : BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function teachers() : BelongsToMany
    {
        return $this->belongsToMany(Teacher::class, 'teacher_student')->withTimestamps();
    }

}
