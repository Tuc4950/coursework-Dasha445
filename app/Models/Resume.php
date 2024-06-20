<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $fillable = [
        'name', // имя
        'surname', // фамилия
        'patronymic',
        'resume_title', // заголовок резюме
        'email', // электронная почта
        'phone', // телефон
        'summary', // резюме
        'experience', // опыт работы
        'education', // образование
        'skills', // навыки
    ];

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
