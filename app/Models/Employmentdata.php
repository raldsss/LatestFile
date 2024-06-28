<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employmentdata extends Model
{
    use HasFactory;

    protected $primaryKey = 'emp_id';

    protected $table = 'employmentdatas';

    protected $guarded = ['emp_id'];
}

