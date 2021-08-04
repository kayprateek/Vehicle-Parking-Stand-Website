<?php 
	 
 session_start();
 
 $con=mysqli_connect('localhost','root','');

 mysqli_select_db($con, 'prebooking');
	
 $name =$_POST['name'];
 $pno = $_POST['pno'];
 $date= $_POST['date'];
 $vtype = $_POST['vtype'];
 $vno = $_POST['vno'];
 
 $s= "SELECT * FROM reservation WHERE vehiclenumber= '$vno' ";
 $result= mysqli_query($con , $s);
 $num= mysqli_num_rows($result);
 
    if ($num ==1)
		{ echo "Booking Already Done";}
	else
		
	{
        $reg= "INSERT INTO reservation(name , phonenumber , date, vehicletype, vehiclenumber) VALUES ('$name' , '$pno' , '$date', '$vtype', '$vno' )";  
		
        mysqli_query($con,$reg); 
		
		echo "Booking Confirmed";
	}
	
	
?>