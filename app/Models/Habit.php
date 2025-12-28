<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Habit extends Model
{
    use HasFactory;
    
    // fala quais campos podem ser preenchidos na tabela 'habits'
    protected $fillable = [
        'name',
        'user_id',
    ];

    // um habit pertence a um usuário
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function habitLogs(): HasMany {
        return $this->hasMany(HabitLog::class);
    }
}
