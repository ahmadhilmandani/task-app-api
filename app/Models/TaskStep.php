<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskStep extends Model
{
    use HasFactory;

    protected $fillable = ['task_id', 'description'];
    public $timestamps = false;
}
