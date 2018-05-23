<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

class InsertMasterFacilityList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'masterlist:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert Facilities in the Master Facility List';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
         echo "\n Loading facilities---\n";
        //read list
        $master_list_data = $this->load_master_list();
        //insert into table
       $this->insert_master_list($master_list_data);
        echo "\n Finished---\n";

    }

    private function load_master_list(){
        $file = fopen("/Users/simon/projects/METS/unique_identifier/draft_master_list.csv", "r");
        $data = array();  
        $counter = 0;  
        while ( !feof($file)){

            $array_instance = fgetcsv($file);
            

            $facility_array['name']=$array_instance[0];
            $facility_array['nhpi_code']=$array_instance[2];
            $facility_array['hsdt_code']=$array_instance[3];
            $facility_array['country']=$array_instance[4];
            $facility_array['region']=$array_instance[5];
           
        
            $facility_array['sub_region']=$array_instance[6];
            $facility_array['district']=$array_instance[7];
            $facility_array['county']=$array_instance[8];
            $facility_array['sub_county']=$array_instance[9];
            $facility_array['parish']=$array_instance[10];

            $facility_array['facility_level']=$array_instance[11];
            $facility_array['hsd']=$array_instance[13];
            $facility_array['authority']=$array_instance[14];
            $facility_array['authority_description']=$array_instance[15];
            $facility_array['ownership_name']=$array_instance[16];


            $facility_array['ownership_description']=$array_instance[17];
            $facility_array['operational_status']=$array_instance[18];
            $facility_array['email_address']=$array_instance[19];
            $facility_array['telephone_number']=$array_instance[20];
            $facility_array['geo_coordinates']="";

            $facility_array['data_year']=$array_instance[22];
            $facility_array['services_offered']=$array_instance[23];
            
             if($counter > 0){//skip first row
                   array_push($data, $facility_array); 
                }
               

            $counter ++;
           
                
        }                              

        
        return $data;
    }//end load data

    /*
            'name'
            'nhpi_code'
            'hsdt_code'
            'country'
            'region'

            'sub_region'
            'district'
            'county'
            'sub_county'
            'parish'

            'facility_level'
            'hsd'
            'authority'
            'authority_description'
            'ownership_name'

            'ownership_description'
            'operational_status'
            'email_address'
            'telephone_number'
            'geo_coordinates'

            'data_year'
            'services_offered'
    */
    private function insert_master_list($master_list_data){
            

        $counter = 0;
        foreach ($master_list_data as $key => $row) {
            $counter ++;

            $name=$row['name'];
            $nhpi_code=$row['nhpi_code'];
            $hsdt_code=$row['hsdt_code'];
            $country=$row['country'];
            $region=$row['region'];

            $sub_region=$row['sub_region'];
            $district=$row['district'];
            $county=$row['county'];
            $sub_county=$row['sub_county'];
            $parish=$row['parish'];

            $facility_level=isset($row['facility_level'])?$row['facility_level']:'';
            $hsd=isset($row['hsd'])?$row['hsd']:'';
            $authority=isset($row['authority'])?$row['authority']:'';
            $authority_description=isset($row['authority_description'])?$row['authority_description']:'';
            $ownership_name=isset($row['ownership_name'])?$row['ownership_name']:'';

            $ownership_description=isset($row['ownership_description'])?$row['ownership_description']:'';
            $operational_status=isset($row['operational_status'])?$row['operational_status']:'';
            $email_address=isset($row['email_address'])?$row['email_address']:'';
            $telephone_number=isset($row['telephone_number'])?$row['telephone_number']:'';
            $geo_coordinates=isset($row['geo_coordinates'])?$row['geo_coordinates']:'';

            $data_year=isset($row['data_year'])?$row['data_year']:'';
            $services_offered=isset($row['services_offered'])?$row['services_offered']:'';

            $t=time();
            $created_at=date("Y-m-d",$t);
            $updated_at=date("Y-m-d",$t);




            
           
             try{
                  //$affectedRows =  \DB::connection('mysql')->insert($sql);
                  $affectedRows = \DB::insert('insert into facilities (name,nhpi_code,hsdt_code,country,region,sub_region,district,county,sub_county,parish,
            facility_level,hsd,authority,authority_description,ownership_name,
            ownership_description,operational_status,email_address,telephone_number,geo_coordinates,
            data_year,services_offered,comments) 
                  values (?,?,?,?,?, ?,?,?,?,?, ?,?,?,?,?, ?,?,?,?,?, ?,?,?)', 
                  [$name,$nhpi_code,$hsdt_code,$country,$region,
                 $sub_region,$district,$county,$sub_county,$parish,
                 $facility_level,$hsd,$authority,$authority_description,$ownership_name,
                 $ownership_description,$operational_status,$email_address,$telephone_number,$geo_coordinates,
                 $data_year,$services_offered,'']);
                  //$counter ++;
                }catch(Exception $e){

                  echo "\n ".$e->getMessage()." \n";
                  //continue;
                }
        }
        echo "\n We have inserted $counter facilities \n";
    }
}
