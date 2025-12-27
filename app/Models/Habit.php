<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habit extends Model
{
    // fala quais campos podem ser preenchidos na tabela 'habits'
    protected $fillable = [
        'name',
        'user_id',
    ];
}
