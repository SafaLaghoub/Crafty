<htm>
<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Crafty</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
       
        <link href="css/item.css" rel="stylesheet" />   


    </head>
<body>
<?php
//include "myerrors.inc";
include "includes/navbar.php";

// This file contains the database access information. This file also establishes a connection to MySQL and selects the database.

// Set the database access information as constants.
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost:3306');
DEFINE ('DB_NAME', 'crafty');
DEFINE('ROWS',1);

include_once('config/dbconn.php'); 



function browse($scriptName, $connection, $offset, $pageHeader )
{
     $query = "SELECT * FROM products_ ";
     $query_run= mysqli_query($connection,$query);
     $check_products = mysqli_num_rows($query_run)>0;
   // $result = $connection->query("SELECT * FROM products");

     // Find out how many rows there are
    $rowsFound = @ mysqli_num_rows($query_run);//7
	echo $rowsFound;
  // Is there any data?

     // Yes, there is data.

     // (2a) The "Previous" page begins at the current 
     // offset LESS the number of ROWS per page
     $previousOffset = $offset - ROWS;
	if($previousOffset < 0) $previousOffset = 0;
     // (2b) The "Next" page begins at the current offset
     // PLUS the number of ROWS per page
     $nextOffset = $offset + ROWS;
	if($nextOffset>$rowsFound-1) $nextOffset=$rowsFound-1;

     // (3) Seek to the current offset
     if (!mysqli_data_seek($query_run, $offset))//the pointer on my result set will be changed to the offset
        showerror();

     // (4) Output the header 
    // echo $pageHeader;


     //<div class="card" style="width: 18rem;">

    
        // $query = "SELECT * FROM products";
        // $query_run= mysqli_query($connection,$query);
         //$check_products = mysqli_num_rows($query_run)>0;
         ?>
    <section class="py-5">
    <div class="container px-4 px-md-5 mt-5">
         <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
             

         <?php
                    
                    if($check_products)
                    {
                             for ( $rowCounter = 0; (($rowCounter < ROWS) && ($row = @ mysqli_fetch_array($query_run)) );$rowCounter++){  
                             ?>
                   
                           <div class="col mb-5">
                               <div class="card h-100">
                                   <!-- Product image-->
                                   <img class="card-img-top" src="<?php echo $row['product_picture'];?>" 
                                   alt="<?php echo $row['product_name'];?>" width="300" height="300" />
                                   <!-- Product details-->
                                   <div class="card-body p-4">
                                       <div class="text-center">
                                           <!-- Product name-->
                                           <h5 class="fw-bolder"><?php echo $row['product_name'];?></h5>
                                           <!-- Product price-->
                                       </div>
                                       <div class="text-center">
                                           <!-- Product name-->
                                           <h5 class="fw-bolder"><?php echo $row['product_price'];?>$</h5>
                                           <!-- Product price-->
                                       </div>

                                   </div>
                                   <!-- Product actions-->
                                   <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                       <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                                   </div>
                               </div>
                           </div>
                           
                       <?php
                   }}
                   else
       {
           echo "No products found";
       
       }
       
                   ?>
                           
       
                                   
                               </div>
                           </div>
                           
                           
                         
               </section>
             

   <?php
     //</div>
     // (5) Fetch one page of results (or less if on the last page)
     

     // (6) Show the row numbers that are being viewed
     echo ($offset + 1) .  "-" . 
          ($rowCounter + $offset) . " of ";
    // echo "$rowsFound records found\n<br>";

     // (7a) Are there any previous pages?
     if ($offset > 0)
       // Yes, so create a previous offset hyperlink
       echo "\n\t<a href=\"" . $scriptName . 
            "?offset=" . $previousOffset .
            "\">Previous</a> ";
     else
       // No, there is no previous page so don't print a link
       echo "Previous ";

     // (7b) Are there any Next pages?
     if (($row != false) )//&& ($rowsFound > $nextOffset)
       // Yes, so create a next link
       echo "\n\t<a href=\"" . $scriptName . 
            "?offset=" . $nextOffset .
            "\">Next</a> ";
     else
       // No,  there is no next page so don't print a link
       echo "Next ";

  } // end if rowsFound != 0
  
  $scriptName = "showProductsAll.php";//resource name

   // (7c) Create a link back to the query input page
   echo "<br><a href=\"" . $scriptName . 
       "\">Back to Search</a><br>";



// Make the connnection and then select the database. Note the password is not used.
//$connection = mysqli_connect (DB_HOST, DB_USER, "", DB_NAME);



$pageHeader = "<h2>Teachers</h2>";

// Set $offset to zero if not previously set
if (!isset($offset))
      $offset = 0;
$offset = @ $_GET["offset"];
//echo $offset;
// Call generic browsing code to browse query
browse($scriptName, $connection, $offset, $pageHeader);

?>
 <!-- Bootstrap core JS-->
        <!-- Core theme JS-->
</body>
</html>