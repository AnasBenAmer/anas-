<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'number',
        'building_id',
        'floor',
    ];

    public function  building(){
        return $this->belongsTo(Building::class);
      }
      public function students(){
        return $this->hasMany(Student::class);

      }
}
