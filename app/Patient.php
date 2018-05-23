<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    protected $table = 'patients';
    public $fillable = ['name','sex','date_of_birth','art_number','district','sub_county','health_facility','patient_unique_number'];
}
