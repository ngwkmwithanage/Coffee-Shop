
<?php

$host="localhost";
$user="root";
$password="";
$db="user";

session_start();

$data=mysqli_connect($host,$user,$password,$db);
if($data==false)
{
    die("connection error");
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $username=$_POST["username"];
    $password=$_POST["password"];

    $sql="select * from login where username='".$username."' AND password='".$password."'  ";

    $result=mysqli_query($data,$sql);

    $row=mysqli_fetch_array($result);

    if($row["usertype"]=="user")
    {
       $_SESSION["username"]=$username;
        header("location:userhome.php");
    }

    elseif($row["usertype"]=="admin")
    {
        $_SESSION["username"]=$username;
        header("location:adminhome.php");
    }

    else
    {
        echo "username or password incorrect";
    }

}


?>

<!DOCTYPE html>
<html>
<head>
    <title></title> 
</head> 
<style>
body{
    background-image:  url(bg.jpg)
}   
input[type="text"],
    input[type="password"]{
        color:black;
    }

    input[type="submit"] {
      
    padding: 10px 20px;
    border: 0;
    background: gold;
    font-weight: bold;
    cursor: pointer; 

    }
    input[type="submit"]:hover{
    background-color: white;
}
    label{
        color: white;
        font-size: 20px;
    margin-bottom: 30px;
    }
    h1{
        color: white;
    }
</style>
<body>

<center>

<h1>Login Form</h1>
<br><br><br><br>   
<div>
<br><br> 

<form action="#" method="POST">
    <div>
        <label>username</label>
        <input type="text" name="username" required>
    </div>
    <br><br>

    <div>
        <label>password</label>
        <input type="password" name="password" required>
    </div>
    <br><br>

    <div>
        <input type="submit" value="lOGIN">
    </div>
</form>    
    <br><br>
</div>    
</center>    
</body>
</html>