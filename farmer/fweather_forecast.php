<?php
include ('fsession.php');
ini_set('memory_limit', '-1');

if(!isset($_SESSION['farmer_login_user'])){
header("location: ../index.php");
exit;
}
$query4 = "SELECT * from farmerlogin where email='$user_check'";
              $ses_sq4 = mysqli_query($conn, $query4);
              $row4 = mysqli_fetch_assoc($ses_sq4);
              $para1 = $row4['farmer_id'];
              $para2 = $row4['farmer_name'];
			  
?>

<?php

$display_district_name ="";

$display_district="Select F_District from farmerlogin WHERE email='$user_check'";
$display_district_result=mysqli_query($conn,$display_district);
$display_district_name = mysqli_fetch_array($display_district_result);
$District_name_farmer=$display_district_name[0];


date_default_timezone_set("Asia/Kolkata");
$apiKey = app_env('OPENWEATHER_API_KEY', '');

$cityMap = [
    'Udupi' => 1253952,
    'Mangalore' => 1263780,
    'Mysore' => 1262321,
    'Bangalore' => 1277333,
    'Bengaluru' => 1277333,
    'Bagalkot' => 1278896,
    'Belgaum' => 1277636,
    'Bellary' => 1277609,
    'Bidar' => 1277258,
    'Bijapur' => 1277156,
    'Dharwad' => 1273185,
    'Gulbarga' => 1270583,
    'Hassan' => 1270116,
    'Shimoga' => 1256379,
    'Tumkur' => 1254187,
    'Mumbai' => 1275339,
    'Delhi' => 1273294,
    'Pune' => 1259229,
    'Chennai' => 1264527,
    'Kolkata' => 1275004,
    'Hyderabad' => 1269843,
];

$districtClean = trim($District_name_farmer ?? '');
$cityId = $cityMap[$districtClean] ?? 1253952;

if ($apiKey !== '') {
    if (isset($cityMap[$districtClean])) {
        $googleApiUrl = "https://api.openweathermap.org/data/2.5/forecast?id=" . $cityId . "&lang=en&units=metric&APPID=" . urlencode($apiKey);
    } else {
        $googleApiUrl = "https://api.openweathermap.org/data/2.5/forecast?q=" . urlencode($districtClean . ",IN") . "&lang=en&units=metric&APPID=" . urlencode($apiKey);
    }

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_VERBOSE, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($response);
    $forecast = isset($data->list) && is_array($data->list) ? $data->list : [];
} else {
    $forecast = [];
}
?>




<!DOCTYPE html>
<html>

<?php include ('fheader.php');  ?>

  <body class="bg-white" id="top">
  
<?php include ('fnav.php');  ?>

 	
  <section class="section section-shaped section-lg">
    <div class="shape shape-style-1 shape-primary">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
<!-- ======================================================================================================================================== -->
<div class="container ">
    
    	 <div class="row">
          <div class="col-md-8 mx-auto text-center">
            <span class="badge badge-danger badge-pill mb-3">Weather Forecast</span>
          </div>
        </div>
		
                    <div class="row row-content">
            <div class="col-md-12 mb-3">
    <div class="row">
        <div class="col-md-12">
				<div class="card text-white bg-gradient-secondary mb-3">
				  <div class="card-header">			  		
				  <span class="" id="openweathermap-widget-9"></span> 
				  
				  </div>
<script>window.myWidgetParam ? window.myWidgetParam : window.myWidgetParam = [];  window.myWidgetParam.push({id: 9,cityid: '<?php echo $cityId ?>',appid: '870887df4d2b01335921fe396c69a360',units: 'metric',containerid: 'openweathermap-widget-9',  });  (function() {var script = document.createElement('script');script.async = true;script.charset = "utf-8";script.src = "//openweathermap.org/themes/openweathermap/assets/vendor/owm/js/weather-widget-generator.js";var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(script, s);  })();</script>
				  			  
	  
				  <div class="card-body text-dark">
				<table class="table table-striped table-hover table- table-bordered bg-gradient-white text-center display" id="myTable">

    <thead>
					<tr class="font-weight-bold text-default">
					<th><center>Date</center></th>
					<th><center>Time</center></th>					
					<th><center>Temperature (Max / Min)</center></th>
					<th><center>Description</center></th>
					<th><center>Humidity</center></th>
					<th><center>Wind</center></th>

					

        </tr>
    </thead>
    <tbody>
	

<?php 
if (!empty($forecast)) {
    $loop=0; foreach($forecast as $f){ $loop++;
	
    $date = substr($f->dt_txt, 0, 10);
    $time = substr($f->dt_txt, 11);
?>
	<tr class="text-center">
<td > <?php echo $date?> </td>	
<td > <?php echo $time?> </td>						 
 <td > <img src="http://openweathermap.org/img/w/<?php echo $f->weather[0]->icon; ?>.png" class="weather-icon" />
					<?php echo $f->main->temp_max; ?> &#8451; &nbsp; <span class="min-temperature"><?php echo $f->main->temp_min; ?> &#8451; </span> </td>
<td > <?php echo $f->weather[0]->main .',' . $f->weather[0]->description ; ?> </td>	
<td > <?php echo $f->main->humidity; ?> &#37; </td>
<td > <?php echo $f->wind->speed; ?> KM/H</td>	

							</tr>
							
						
        <?php
             }
} else {
?>
    <tr><td colspan="6" class="text-center">Weather forecast is currently unavailable. Please configure OPENWEATHER_API_KEY in your environment (.env).</td></tr>
<?php
}
?>   
    </tbody>
</table>

	
  </div>
    </div>
       </div>
	  </div>
    </div>
       </div>	 
	   </div>
</section>

    <?php require("footer.php");?>
   <script>
				$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
</body>
</html>
