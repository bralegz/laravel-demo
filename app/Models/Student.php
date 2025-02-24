<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    use HasFactory;

    //Model name that will be linked to the table
   protected $table = 'student';

   //fields that can be modified
   protected $fillable = [
    'name',
    'email',
    'phone',
    'address'
   ];
}
