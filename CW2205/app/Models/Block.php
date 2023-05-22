<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'Block';
    protected $fillable = ['contain','topicId','created_at','updated_at'];
}
