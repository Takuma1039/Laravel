<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes; //論理削除用
    protected $fillable = [
        'grade',
        'name',
        'age'
    ];
    
    //科目に対するリレーション
    public function subjects(){
        return $this->belongsToMany(Subject::class);
    }
}
