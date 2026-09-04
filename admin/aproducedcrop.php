<?php
session_start();
require('../sql.php');

if (!isset($_SESSION['admin_login_user'])) {
    header("location: alogin.php");
    exit;
}
$user = $_SESSION['admin_login_user'];
$stmtA = $conn->prepare("SELECT * from admin where admin_name = ?");
$stmtA->bind_param("s", $user);
$stmtA->execute();
$row4 = $stmtA->get_result()->fetch_assoc();
$para1 = $row4['admin_id'] ?? '';
$para2 = $row4['admin_name'] ?? '';
			  $para3 = $row4['admin_password'];
			  
?>

<!DOCTYPE html>
<html>
<?php require ('aheader.php');  ?>

  <body class="bg-white" id="top">
  
<?php require ('anav.php');  ?>
 	
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
            <span class="badge badge-danger badge-pill mb-3">Crops</span>
          </div>
        </div>
		
          <div class="row row-content">
            <div class="col-md-12 mb-3">

				<div class="card text-white bg-gradient-warning mb-3">
				  <div class="card-header">
				  <span class=" text-warning display-4" > Produced Crops  </span>
				  
					
				  </div>
				  
				  <div class="card-body text-white">
				<table class="table table-striped table-hover table-bordered bg-gradient-white text-center display" id="myTable">
				
				    <thead>
		<tr class="font-weight-bold text-default">
						
								
					<th><center>Crop Name</center></th>
					<th><center>Quantity (in KG)</center></th>
												
						</tr>
			</thead>
	
	
				
		<tbody>	  
							  
						<?php 
	$sql = "SELECT crop, quantity FROM production_approx where quantity > 0";

								$query = mysqli_query($conn,$sql);

								while($res = mysqli_fetch_array($query)){	
				 ?>		  
						  
		 <tr class="text-center">
							 <td> <?php echo $res['crop'];  ?> </td>
							 <td> <?php echo $res['quantity'];  ?> </td>
							</tr>

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
		 
</section>

    <?php require("footer.php");?>

	   <script>
				$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
</body>

</html>

