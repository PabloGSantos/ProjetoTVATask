<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $fillable = [
    
    'venda_name',

    'venda_inf',

    'venda_tipo',

    'venda_image'];
}
