// not important 
<?php 
include_once('config/dbconn.php'); 
$query = "SELECT * FROM products_ WHERE  product_price = 75"; 
$result=mysqli_query($connection ,$query); 
?> 
<!DOCTYPE html> 
<html> 
<head> 
		<title> Fetch Data From Database </title> 
	</head> 
	<body> 
	<table align="center" border="1px" style="width:600px; line-height:40px;"> 
	<tr> 
		<th colspan="4"><h2>Student Record</h2></th> 
		</tr> 
			  <th> ID </th> 
			  <th> Name </th> 
			  <th> Email </th> 
			  <th> Country </th> 
			  
		</tr> 
		
		<?php while($rows=mysqli_fetch_assoc($result)) 
		{ 
          
		?> 
        
		<tr> <td><?php echo $rows['product_id']; ?></td>
		<td><img src="<?php echo $rows['product_picture'];?>" alt=" " height="300" width="300"></td>
  
		<td><?php echo $rows['product_id']; ?></td> 
		<td><?php echo $rows['product_id']; ?></td> 
		</tr> 
	

<div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>



<?php 









               } 
          ?> 

	</table> 
	</body> 
	</html>