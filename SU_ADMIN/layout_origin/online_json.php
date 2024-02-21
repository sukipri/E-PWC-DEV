<?php
	/* wunderground.com */
		echo"<h4>wunderground.com</h4>";
  $json_string = @file_get_contents("http://api.wunderground.com/api/4390c5b95f638d8f/geolookup/conditions/q/IA/semarang.json");
  $parsed_json = @json_decode($json_string);
  $location = @$parsed_json->{'location'}->{'country_name'};
  $location1 = @$parsed_json->{'location'}->{'city'};
  $koordinat_lat = @$parsed_json->{'location'}->{'lat'};
  $koordinat_long = @$parsed_json->{'location'}->{'lon'};
  $tempat = @$parsed_json->{'location'}->{'city'};
  $temp_c = @$parsed_json->{'current_observation'}->{'temp_c'};
  echo "Country name ${location} di kota: ${location1}\n</br>";
  echo "Koordinat_lat in ${location1}: ${koordinat_lat}\n</br>";
  echo "Koordinat_long in ${location1}: ${koordinat_long}\n</br>";
  echo "Location Now ${tempat}\n</br>";
  echo "Current temperature in ${location} is: ${temp_c}\n";
?>
	<br /><br />
    <div class="well">
	 <b>IN PHP</b><br />
  $json_string = file_get_contents("http://api.wunderground.com/api/Your_Key/geolookup/conditions/q/IA/Cedar_Rapids.json"); <br />
  $parsed_json = json_decode($json_string);<br />
  $location = $parsed_json->{'location'}->{'city'};<br />
  $temp_f = $parsed_json->{'current_observation'}->{'temp_f'};<br />
  echo "Current temperature in ${location} is: ${temp_f}\n";
	
</div>