<?php 
 session_start();
 if(!isset($_SESSION['uname']))
 { header('location:customer.html'); }
 
 if ( $_GET['logout']==1)
	{
		session_destroy();
		header('location:customer.html');
	}
$username=$_SESSION['uname'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
html,body{margin:0;}
body       {
	
            font-size:150%;			
	       }
#logo { height:50px; width:50px; vertical-align:middle;}
nav { background-color:#C0D3F8;
      position:fixed;
      width:100%;
      height:7%;
	  padding-bottom:10px;
	  top:0;
      	  
	}
nav a{ color:#10428D; 
	   text-decoration:none;
     }
nav a:hover{ color:#108D8A;}	

.container{ margin:auto;
            margin-top:100px;
			background-color:white;
			border:0;			
          }
nav form{ float:right;
          padding-right:50px;
		  padding:10px;}	
nav button { 
        
             border-radius:10px;
			 height:40px;
			 width:100px;
			 color:white;
			 background-color:#108D8A;
			 font-size:1em;
           }
#table { margin:auto;}
h3{font-size:2em; color:#7F166D;}		   
table      {
	        font-size:1em;
            border-spacing:30px;
            text-align:center;
			}
div         { 
			width:500px;
			margin:auto;
            border: 1px solid;
            background-color:#D3EBEC;
			padding:20px;
			text-align:center;
			height:100%;
			box-shadow:0 10px 10px 0 black;
      	   } 
		   
</style>
<title>customerpage</title>
<meta charset="UTF-8">
</head>
<body>
<nav>
<img id="logo" src="logs.png" alt="logo"/>
&emsp;<a href="homepage.html">Homepage</a>
&emsp;<a href="customer.html" target="_blank">Customer</a>
&emsp;<a href="Services.html" target="_blank">Services</a>
&emsp;<a href="prebook.html" target="_blank">Pre-book</a>
&emsp;<a href="availability.html" target="_blank">Availability</a>
&emsp;<a href="about.html" target="_blank">About Us</a>
&emsp;<a href="feedback.html" target="_blank">Feedback</a>
<form method="get" action="customerpage.php" ><button name="logout" value="1">Logout</button></form>
</nav>
<p class="container">
<h1> Welcome <?php echo $_SESSION['uname'] ?>! </h1>
</p>
<p id="table">
<?php
$con=mysqli_connect("localhost","root","","userdetails");

$result = mysqli_query($con,"SELECT * FROM users where username= '$username' ");

echo "<table>";
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td><div><h3>Name <br></h3>". $row['name'] ."</div></td>";
echo "<td><div><h3>Phone Number<br></h3>". $row['phonenumber'] ."</div></td>";
echo "</tr>";
echo "<tr>";
echo "<td><div><h3>Vehicle Number <br></h3>". $row['vehiclenumber'] ."</div></td>";
echo "<td><div><h3>Vehicle Type<br></h3>". $row['vehicletype'] ."</div></td>";
echo "</tr>";
}

echo "</table>";

mysqli_close($con);
?>
</p>
</body>
</html>