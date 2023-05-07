<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Model;



class RawMaterials extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_id',
        'steel',
        'copper',
        'aluminium',
        'daily',
        'monthly',
        'quarterly',
        'annualy',
    ];
}
