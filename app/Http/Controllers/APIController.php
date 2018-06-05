<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use LucaDegasperi\OAuth2Server\Authorizer;
use Log;
use App\Patient;
use App\Facility;

class APIController extends Controller
{
    //

    public function storePatient(Authorizer $authorizer){
        //$user_id=$authorizer->getResourceOwnerId(); // the token user_id
        //$user=\App\User::find($user_id);// get the user data from database



		$accessTockenStatus = $authorizer->validateAccessToken();
		
       
		if(isset($accessTockenStatus)){
		 	
        	extract(\Request::all());
        	//save patient
        	

	        try{
	        	$patient_instance = new Patient;

	        	$patient_instance->name = $name;
	        	$patient_instance->sex = $this->getSex($sex);
	        	$patient_instance->date_of_birth = $date_of_birth;
	            $patient_instance->art_number = $art_number ;

	            $health_facility_instance = $this->getHealthFacility($facility_code);
	            
	            $patient_instance->district = $health_facility_instance->district;
	            $patient_instance->sub_county = $health_facility_instance->sub_county;
	            $patient_instance->health_facility = $health_facility_instance->nhpi_code;

	            $generated_patient_unique_number = "{$facility_code}{$art_number}";
	            $patient_instance->patient_unique_number =  $generated_patient_unique_number;

	            $patient_instance->save();

	            return "Generated PUN: {$generated_patient_unique_number}";
	        }catch(Exception $e){
	        	abort(500, 'Unauthorized action.');
	        }
        	

        }else{
        	//send error that invalid token
        }

        
    }

    private function getSex($sex){
    	$sex_identifier='x';
    	if(isset($sex)){
    		if($sex == 'Female')
    			$sex_identifier=1;
    		elseif($sex == 'Male')
    			$sex_identifier=2;
    	}
    	return $sex_identifier;
    }

    private function getHealthFacility($facility_code){
    	return Facility::where('nhpi_code',$facility_code)->firstOrFail();

    }
}
