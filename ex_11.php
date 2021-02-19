
<!DOCTYPE HTML>  
<html>
<head>
<style>
  .cont{
     box-shadow: 10px 10px 5px grey;
     
    height: 70px;
  }
  .d{
     text-shadow: 0 0 3px #FF0000, 0 0 5px #0000FF;
  }
  .box{
      box-shadow: 10px 10px 5px grey;
    
  }
  table, th, td {
      border: 0px solid #202020;
      padding: 15px;
      
       text-indent: 50px;
  text-align: justify;
  letter-spacing: 3px;
  color: #990011FF;
  font-size: 120%;
margin-top: -100px;
}
table{
  width: 70%;
}
input[type=text], select {
  width:60%;
  padding: 12px 7px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  background: #f1f1f1;
}
input[type=password]{
  width:60%;
  padding: 12px 7px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  background: #f1f1f1;
}



input[type=submit] {
  width: 75%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
 
}
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php

$nameErr = $emailErr = $genderErr = $passwordErr = "";
$name = $email = $gender = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "* Name is required";
  } else {
    $name = test_input($_POST["name"]);
    
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "* Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "* Email is required";
  } else {
    $email = test_input($_POST["email"]);
 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "* Invalid email format";
    }
  }
     $password = test_input($_POST["password"]);
      if (strlen($_POST["password"]) <= '8') {
        $passwordErr = "*Invalid password!";
    }
    elseif(!preg_match("#[0-9]+#",$password)) {
        $passwordErr = "* Invalid format (ex: Password@123";
    }
    elseif(!preg_match("#[A-Z]+#",$password)) {
        $passwordErr = "* Invalid format (ex: Password@123";
    }
    elseif(!preg_match("#[a-z]+#",$password)) {
        $passwordErr = "* Invalid format (ex: Password@123";
    }
 

  if (empty($_POST["gender"])) {
    $genderErr = " * Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<div class="cont">
  <center>
  <h1 class="d">REGISTRATION FORM</h1></center>
</div>
<div class="box">
<center>
<table>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  <tr><td>
  Name:</td><td> <input type="text" name="name">
  <span class="error"> <?php echo $nameErr;?></span></td>
  <br><br>
  </tr>
  <tr>
    <td>
  E-mail:</td><td> <input type="text" name="email">
  <span class="error"><?php echo $emailErr;?></span></td>
  <br><br></tr>
   <tr>
    <td>
  Password:</td><td> <input type="password" name="password">
  <span class="error"><?php echo $passwordErr;?></span></td>
  </tr>
  <tr>
    <td>
  Gender:</td>
  <td>
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <span class="error"><?php echo $genderErr;?></span></td>
  <br><br>
</tr>
<tr>
  <td colspan="3">
  <input type="submit" name="submit" value="Submit"> 
</td>
</tr>
</form>
</table>
</center>
</div>
</body>
</html>