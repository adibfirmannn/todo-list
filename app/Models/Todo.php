<?php

namespace App\Models;

use MongoDB\laravel\Eloquent\Model;

class Todo extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'todos';

    protected $fillable = ['title', 'is_complete'];
}
