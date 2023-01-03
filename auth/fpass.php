<?php
require 'config.php';
$dis=false;
$em=false;
if(isset($_POST["submit"])){
$newpass=rand(100000,999999);
$email=$_POST["mail"];
$query="SELECT pass FROM `students_details`.`details` where email='$email'";
$result= mysqli_query($con,$query);
if(mysqli_num_rows($result)>0)
{
    $sql = "UPDATE `students_details`.`details` SET pass='$newpass' WHERE email='$email'";
    if ($con->query($sql) === TRUE) {
        $dis=true;
//     echo
//   "<script> alert(`your temparary password is $newpass`); </script>";
    }  
    // header("location:login.php");

}
else{
    $em=true;
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&family=Libre+Baskerville:ital@1&display=swap" rel="stylesheet">
    <title>forget password</title>
    <style>
.con{
            font-size:120x;
            margin: auto;
            background: #80D0C7;
            margin-top: auto;
            text-align: center;
            width: 40%;
            padding: 50px;
            margin-top: auto;
            border-radius: 15px;
            border: 2px solid black;
            box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
        }
        body
        {
            font-family: 'Libre Baskerville', serif;
            height:98vh;
            background-color: #0093E9;
background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
        }
        .cont{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90vh;
        }
        h1{
    font-family: 'Anton', sans-serif;
}
        input {
    margin: 2px;
    border-radius: 10px;
    padding: 10px;
    /* width: 10%; */
}
        button{
    margin: 10px;
    padding: 10px 15px;
    border-radius: 10px;
    transition: transform .2s ease-in-out;
    background:  #0093E9;

}
 button:hover{
    background: blueviolet;
    color: white;
    transform: scale(1.1);
}
a{
    margin: 10px;
    font-size:16px;
}
    </style>
</head>
<body>
    <div class="cont">
        <div class="con">
            <h1>Forgot Password</h1>
            <form action="" method="post">
                email:       <input type="email" placeholder="enter the email" name="mail">
                <button type="submit" name="submit">submit</button>
                <?php if($em==true)
                {
                    echo "<P>Email is not present !!</P>";
                }
                ?>
                <?php if($dis==true)
                {
                    echo "<P>your temporary password is: $newpass</P>";
                }
                ?>
            </form>
            <a href="login.php">login</a>
        </div>
    </div>
</body>
</html>