<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'Topic';
    protected $fillable = ['title','created_at','updated_at'];
}
