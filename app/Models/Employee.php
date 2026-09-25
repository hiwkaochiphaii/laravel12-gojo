<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'department',
        'salary',
        'email',
        'phone',
        'photo',
        'hired_at',
    ];

    protected $casts = [
        'salary'   => 'decimal:2',
        'hired_at' => 'date',
    ];

    /**
     * Accessor: full URL to the employee's photo, or null.
     */
    public function getPhotoUrlAttribute(): ?string
    {
        return $this->photo ? asset('storage/' . $this->photo) : null;
    }
}
