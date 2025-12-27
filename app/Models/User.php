<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    // um user pode ter vários habits
    public function habits(): HasMany {
        return $this->hasMany(Habit::class);
    }

    // um user pode ter vários registros
    public function habitLogs(): HasMany {
        return $this->hasMany(HabitLog::class);
    }
}
