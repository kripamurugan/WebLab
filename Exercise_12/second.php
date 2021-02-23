<?php

include "connection.php";
if (isset($_POST["submit"])) 
{
 $name=$_POST["name"];
  $age=$_POST["age"];
   $email=$_POST["email"];
    $password=$_POST["password"];
     $number=$_POST["number"];

     $sql="insert into admission1(name,age,email,password,number) values('$name',$age,'$email','$password','$number')";

      if (mysqli_query($conn,$sql))
      {

 echo '<script>alert("New Record Created Sucessfully");</script>';
  
    }
   
   
  }
         else
         {
          echo "" .$sql."<br>".mysqli_error($conn);
         }
         mysqli_close($conn);
     

?>
<!DOCTYPE html>
<html>
<head>
	<style>
    body
    {
      background-color:#ADEFD1FF;
    }
		.block{
			width: 1510px;
			height:50px;
			background-color:#DAA03DFF;
		}
   
		
		table, th, td {
  		border: 0px solid #202020;
  		padding: 15px;
      margin-left: 209px;
       text-indent: 50px;
  text-align: justify;
  letter-spacing: 3px;
  color: #990011FF;
  font-size: 120%;

}
th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #4CAF50;
  color: white;
}
table {
  border-spacing: 4px;
   border: 1px solid;
  padding: 10px;
  box-shadow: 5px 10px #888888;
}
table.d {
  table-layout: fixed;
  width: 55%;  
}
	</style>
   
	<title>
		FORM
	</title>
</head>
<body>
	
	<div class="block">

			<center><h1 class="s">REGISTRATION FORM LIST</h1></center>
    </div>
    <div class="rr">
		<?php
    include "connection.php";
    $sql="select * from admission1";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result))
     {
      echo '<table border="1" style="border-collapse"><tr><th>Name</th><th>Age</th><th>Email</th><th>Phone nummber</th></tr>';
      while ($row=mysqli_fetch_assoc($result)) {
       echo '<tr><td>'.$row["name"].'<td>'.$row["age"].'<td>'.$row["email"].'<td>'.$row["number"].'</td></tr>';
      }
      echo '</table>';
    }
    else
    {
      echo '<script>alert("Table is empty");</script>';
    }?>
		</div>
	</div>
</body>
</html>