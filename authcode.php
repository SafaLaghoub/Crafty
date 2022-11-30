<?php
	   session_start();
       include 'config/dbconn.php';

if (isset($_POST['register_btn']))
{
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	//$cpassword = $_POST['cpassword'];

/*if($password == $cpassword)
	{

	}
	else {
	$_SESSION ['message']="Password do not match";
	header("Location: register.php");
*/
	 $valid = 0 ;

    if (isset($_POST['username'])) 
    {

        $username = $_POST['username'];
		$_SESSION['username'] = $username;

        if (!preg_match("/^[a-zA-Z0-9_-]{5,}$/", $username)) {
           $_SESSION['message'] = " username is invalid, please include a-zA-Z0-9_-";
            //echo $nameErr . ' ';
		  // $formVars["username"] = $username ;
			//header("Location:register.php");

        }
        else
        {
            $valid++;
        }
    }

    if (isset($_POST['email']))
    {
		
        $email = $_POST['email'];
	   // $_SESSION['email'] = $email;

		
        if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email))
        {
             $_SESSION['message'] = " email is invalid ,";
            //echo $emailErr . ' ';
        } 
		
		
		else {
            $valid++;
        }

    }

    if(isset($_POST['password']))
    {

        $password = $_POST['password'];
	    $_SESSION['password'] = $password;

		$hashed_password = password_hash($password, PASSWORD_DEFAULT);
        if (!preg_match("/^[a-zA-Z0-9]{6,24}/",$password)) 
        {
            $_SESSION['message']  = " password should be at least 6 characters and contains a-z A-Z 0-9 ";
            //echo $passwordErr . ' ' ;
        }
        else{
            $valid++;
        }
    }

    if (  $valid == 3 )
    {
  $sql = "INSERT INTO users ( user_name , email , password) VALUES (?,?,?)";
    
        $stmInsert = $connection ->prepare($sql);
    //  $result = $connection->query($sql);
    
    if ($stmt = $connection->prepare($sql))
    {
    //bind your inputs
        $stmt->bind_param('sss',$_POST['username'],$_POST['email'],$hashed_password);    
  
   //execute the prepared query
   if($stmt->execute())
   {
         $_SESSION['message'] = "New record created successfully";
	     header('location: index.php');

   }
   //esle
     //   $_SESSION['message'] = "Something went wrong" ;
   

      //  $result = $stmInsert->execute([ 0 ,$username, $email, $hashed_password]);

       // if ($result) {
            //echo "successfully saved. " ;
      //  } else
      //  echo "there were errors while saving the data.";

    }//end connection
    
}//end if valid =3;
    
    
    }//end if isset register_btn

?>