<?php 
	 
 session_start();
 
 $con=mysqli_connect('localhost','root','');

 mysqli_select_db($con, 'userdetails');

 //Registration
if(isset($_POST['rbutton'] ))
{	
 $name =$_POST['name'];
 $pno = $_POST['pno'];
 $vtype = $_POST['vtype'];
 $vno = $_POST['vno'];
 $username =$_POST['username'];
 $password1 = $_POST['password1'];
 $password2 = $_POST['password2'];
 
 
 $s= "SELECT * FROM users WHERE username= '$username' ";
 $result= mysqli_query($con , $s);
 $num= mysqli_num_rows($result);

if ($num !=1)
{
   if( $password1==$password2)
     {
        $reg= "INSERT INTO users(name , phonenumber , vehicletype, vehiclenumber , username , password) VALUES ('$name' , '$pno' , '$vtype','$vno','$username','$password1')";  
        
        mysqli_query($con,$reg); 
		
		echo "Registration Successfull";
     }
	else
	{ echo "Passwords do not match"; }
}
else
{ echo "Username already takken"; }
}

if(isset($_POST['lbutton']))

{
	 $username = $_POST['uname'];
 $password = $_POST['pass'];
 
 $s= "SELECT * FROM users WHERE username= '$username' && password= '$password' ";
 
 $result= mysqli_query($con , $s);
 
 $num= mysqli_num_rows($result);

if ($num == 1)
{  
   
   $_SESSION['uname']=$username;
   
   header('location:customerpage.php');

}
else
{ echo "Username/Password is incorrect"; }

}
