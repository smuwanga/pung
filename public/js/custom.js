$(document).ready(function() {

    $('select[name="district"]').on('change', function(){
        var selected_district =  $(this).find("option:selected").text();
        if(selected_district) {
            $.ajax({
                url: '/subcounties/get/'+selected_district,
                type:"GET",
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },

                success:function(data) {

                    $('select[name="sub_county"]').empty();

                    $.each(data, function(key, value){

                        $('select[name="sub_county"]').append('<option value="'+ key +'">' + value + '</option>');

                    });
                },
                complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
            });
        } else {
            $('select[name="sub_county"]').empty();
        }

    });


    $('select[name="sub_county"]').on('change', function(){
        var selected_subcounty =  $(this).find("option:selected").text();
        var district_element = $('select[name="district"]');
        var selected_district = district_element.find("option:selected").text();
        if(selected_subcounty) {
            $.ajax({
                url: '/subcountyFacilities/get/'+selected_district+'/'+selected_subcounty,
                type:"GET",
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },

                success:function(data) {

                    $('select[name="health_facility"]').empty();

                    $.each(data, function(key, value){

                        $('select[name="health_facility"]').append('<option value="'+ key +'">' + value + '</option>');

                    });
                },
                complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
            });
        } else {
            $('select[name="health_facility"]').empty();
        }

    });

    

    $('select[name="health_facility"]').on('change', function(e){

        var selected_facility_nhpi_code =  e.target.value;
        var art_number = 198;
        var pung_code=selected_facility_nhpi_code+""+art_number;
        if(selected_facility_nhpi_code) {
             
            //document.create_patient.pun.value=pung_code;
            document.getElementById("pun").value = selected_facility_nhpi_code+art_number;
        } 

    });


   
});