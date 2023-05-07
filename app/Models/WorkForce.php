<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;


use Illuminate\Database\Eloquent\Model;



class Workforce extends Model
{


    protected $table = 'work_forces';
    protected $fillable = [
        'company_id',
        'number',
        'daily',
        'monthly',
        'quarterly',
        'annualy',
    ];
}
