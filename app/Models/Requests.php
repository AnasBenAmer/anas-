<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'student_id',
      'user_id',
    ];
    public function  student(){
        return $this->belongsTo(Student::class);
      }
      public function  user(){
        return $this->belongsTo(User::class);
      }
}
