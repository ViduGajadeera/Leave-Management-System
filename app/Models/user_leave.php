<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class user_leave extends Model
{
    protected $table='user_leave';
    protected $primaryKey = 'LEAVEID'; // Define the custom primary key

    public $incrementing = true; // Set to true if the primary key is auto-incrementing
    protected $keyType = 'int'; // Specify the type of the primary key
    protected $fillable=['EMPID','EMPNAME','DESIGNATION','DATEFROM','DATETO','type','no_of_days','REASON','status','approver'];
}
