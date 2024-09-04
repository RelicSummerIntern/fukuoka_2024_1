<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    public function user()
    {
        // 日記（Diary）は1人のUserに属すというリレーションを定義
        return $this->belongsTo(User::class, 'user_id');
    }
}
