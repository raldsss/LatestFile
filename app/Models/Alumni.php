<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Alumni extends Model
// {
//     use HasFactory;

//     protected $primaryKey = 'alumni_id';

//     protected $table = 'alumnis';

//     protected $guarded = ['alumni_id'];

//     protected $fillable = [
//         'email', 'password', 'firstName', 'batchNumber', 'pending',
//     ];
// }


namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Alumni extends Authenticatable
{
    use Notifiable;

    protected $table = 'alumnis'; // Ensure this matches your table name

    protected $primaryKey = 'alumni_id'; // Specify your primary key column

    protected $fillable = [
        'email', 'password', 'firstName', 'lastName', 'middleName',  'batchNumber', 'pending',
        'streetAddress','barangay','city','district','province','region',
        'birthdate','age','sex','civil_status','nationality','training_status',
        'scholarship',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
