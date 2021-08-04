
<?php 
	 
 session_start();
 
 $con=mysqli_connect('localhost','root','');

 mysqli_select_db($con, 'feedbacks');
	
 $name =$_POST['name'];
 $pno = $_POST['pno'];
 $comment = $_POST['comment'];
 $rat = $_POST['rating'];
 
        $reg= "INSERT INTO feedback(name , phonenumber , comment, rating) VALUES ('$name' , '$pno' , '$comment', '$rat' )";  
        
        mysqli_query($con,$reg); 
		
		echo "Feedback Submitted";
?>