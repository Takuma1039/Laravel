<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //論理削除用

class Post extends Model
{
    use HasFactory;
    use SoftDeletes; //論理削除用
    
    protected $fillable = [
        'title',
        'body',
        'image',
        'category_id',
        'user_id'
    ];
    
    /*public function getByLimit(int $limit_count = 10) {
        //updated_atで降順に並べた後、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    } */
    
    public function getPaginateByLimit(int $limit_count = 5) {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
        return $this::with('user')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function category() //1対多なのでcategory単数形
    {
        return $this->belongsTo(Category::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
