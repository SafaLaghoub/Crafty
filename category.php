<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Crafty</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>

      <?php include 'includes/navbar.php'; ?>
            <?php include 'includes/header.php'; ?>
                        <?php include 'myfunctions.php'; ?>




<div class="container">
<div class ="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
Categories
</div>
<div class ="card-body">
<table class = "table table-bordered table-striped">
<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Slug</th>
<th>Edit</th>

</tr>
</thead>
<tbody>
<?php
	$query = "SELECT * FROM products WHERE category_id =1";
	$query_run = mysqli_query ($connection,$query);
   // $category = getAll("products");
    echo mysqli_num_rows($query_run);
    
if (mysqli_num_rows($query_run)>0)
{
    foreach($query_run as $item)
    {
        ?>
        <tr>

             <td> <?= $item['id']; ?> </td>
             <td> <?= $item['product_name']; ?> </td>
             <td> 
             <img src="../uploads/ <?= $item['image']; ?>" alt=" <?= $item['product_name']; ?>"/>
             </td>
             <td> 
                <a href="#" class="btn btn-primary" >Edit</a>
        
             </td>
        </tr>
<?php


    }
}
else {
	echo "No records found";
}



?>
</table>
</div>
</div>
</div>
</div>
</div>

    
      
      <?php include 'includes/footer.php'; ?>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
