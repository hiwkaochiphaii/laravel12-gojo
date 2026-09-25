<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

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
        'hired_at',
        'photo',
    ];

    protected $casts = [
        'hired_at' => 'date',
        'salary' => 'decimal:2',
    ];

    /**
     * Accessor สำหรับสร้าง $employee->photo_url
     */
    protected function photoUrl(): Attribute
    {
        return Attribute::make(
            get: function () {
                if ($this->photo && Storage::disk('public')->exists($this->photo)) {
                    return Storage::url($this->photo);
                }
                return null;
            }
        );
    }
}
