<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'complex_id',
        'floors',
    ];

    public function  complex(){
        return $this->belongsTo(Complex::class);
      }
      public function rooms(){
        return $this->hasMany(Room::class);

      }

public function students(){
    return $this->hasMany(Student::class);

}

}
