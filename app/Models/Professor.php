<?php

 namespace App\Models;

 use Illuminate\Database\Eloquent\Factories\HasFactory;

 use Illuminate\Database\Eloquent\Model;

 class Professor extends Model

{

    use HasFactory;

     protected $fillable = ['professor_name',

                          'professor_email',

                          'professor_gender',

                          'professor_image'];

}