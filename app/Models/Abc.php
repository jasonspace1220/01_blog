<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abc extends Model
{
    use HasFactory;
    protected $table = 'abc';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
