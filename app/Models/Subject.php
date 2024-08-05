<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use HasFactory;
    use SoftDeletes; //論理削除用
    //生徒に対するリレーション
    public function students(){
        return $this->belongsToMany(Student::class);
    }
}
