<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model{
    protected $table = 'jobs_tables';
    protected $fillable = ['title', 'salary'];
    

}