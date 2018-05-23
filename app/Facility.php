<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $table = 'facilities';
    public $fillable = ['name','nhpi_code','hsdt_code','country','region',
    'sub_region','district','county','sub_county','parish',
    'facility_level','hsd','authority','authority_description','ownership_name',
    'ownership_description','operational_status','email_address','telephone_number','geo_coordinates',
    'data_year','services_offered'];
}

