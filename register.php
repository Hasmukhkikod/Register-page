<?php

$nameError = "";
$passwordError = "";
$emailError ="";
$confirm_passwordError ="";

if(isset($_REQUEST["submit"])) {
    $User_name = $_REQUEST["User_name"];
    $email = $_REQUEST["email"];
    $password = $_REQUEST["password"];
    $confirm_password = $_REQUEST["confirm_password"];

	 //user Name 
	if (empty($User_name)){
		$nameError ="user Name is Required";
    } else {
	  $User_name =trim($User_name);
	  $User_name =htmlspecialchars($User_name);
	  if(preg_match("/^[a-zA-Z ]*$/",$User_name)){
		$nameError ="User Name Should Have </br> at least one Special Charter";
      }  
	  
	}
       //email id 
	 if (empty($email)){
		$emailError= "email id Required";	
	 } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$emailError ="invalidate email";
		
	 }

  //password nd confirm Password
     if(empty($password)&& empty($confirm_password)){
         $passwordError ="please Submit the Password";
         $confirm_passwordError = "please Submit the Password";
        }
         
	


      elseif($password!=$confirm_password){
	        $passwordError = "password not match";
		}
   
        if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/", $password)) {
            $passwordError = "Password must be at least 8 characters long,</br> contain at least one uppercase letter,</br> one lowercase letter, and one digit.";
        }
        




	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register page</title>
	
	</head>
<body>
	<?php
       require 'css.php';
	?>
    <div class="container">
        <h2 style=" margin :10px;">User Register Page</h2>
        <form action="" autocomplete="on">
            <div class="box">
                <label for="User_name" class="fl fontLabel"> User Name: </label>
                <div class="fr">
                    <input type="text" name="User_name" placeholder="User Name" class="textBox">
                    <br> <br><span style="color:red;"><?php echo $nameError; ?></span>
                </div>
            </div>
			<br>
			<br>
            <br>
			<br>
			<div class="box">
                <label for="User_name" class="fl fontLabel">Email Address: </label>
                <div class="fr">
                    <input type="email" name="email" placeholder="Email Address" class="textBox">
                    <br> <br><span style="color:red;"><?php echo $emailError; ?></span>
                </div>
            </div>
			<br>
			<br>
			<div class="box">
                <label for="User_name" class="fl fontLabel">password: </label>
                <div class="fr">
                    <br> <input type="password" name="password" placeholder="password" class="textBox">
                    <br> <br><span style="color:red; margin: 10px -45px -12px;"><?php echo $passwordError; ?></span>
                </div>
            </div>
			<br>
			<br>
            <br>
			<br>
            <br>
			<br>
			<div class="box">
                <label for="User_name" class="fl fontLabel"> confirm_password: </label>
                <div class="fr">
                    <input type="password" name="confirm_password" placeholder="confirm_password" class="textBox">
                    <br> <br><span style="color:red;"><?php echo $confirm_passwordError; ?></span>
                </div>
            </div>
			<br>
			<br>
			<div class="box" style="background: #2d3e3f;">
                <input type="submit" name="submit" class="submit" value="Register">
            </div>

        </form>
    </div>
</body>
</html>