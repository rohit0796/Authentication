<?php
require 'config.php';
$dis=false;
$pas=false;
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
    $name= $_POST["name"];
    $redg = $_POST["id"];
    $email=$_POST["email"];
    $dob= $_POST["dob"];
    $mobile = $_POST["mob"];
    $gender=$_POST["gender"];
    $branch= $_POST["branch"];
    $hobbies=$_POST["hobbies"];
    $hobb = implode("," ,$hobbies);
    $password=$_POST["password"];
    $confirmpassword=$_POST["cpass"];
  $duplicate = mysqli_query($con,"SELECT * FROM `students_details`.`details` WHERE email = '$email' OR regd = '$redg';") ;
  if(mysqli_num_rows($duplicate) > 0){
    $dis=true;
  }
  else{
    if($password == $confirmpassword){
      $query = "INSERT INTO `students_details`.`details` (`name`, `regd`, `email`, `dob`, `mob`, `gender`, `branch`, `hobbie`, `pass`) 
      VALUES ('$name', '$redg', '$email', '$dob', '$mobile','$gender', '$branch',' $hobb', '$password');";
 if($con->query($query)==true)
    {      echo
      "<script> alert('Registration Successful');window.location.replace('login.php') </script>";
    //   header("location:login.php");
     } 
       }
    else{
      $pas=true;
    }
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
    <title>student details</title>
    <style>
        .body {
    text-align: center;
}
h1{
    font-family: 'Anton', sans-serif;
}
td {
    padding: 10px;
}

tr {
    width: 50vw;
}

input {
    margin: 2px;
    border-radius: 12px;
    padding: 5px;
    /* width: 10%; */
}

table {
    border: none;
    border-radius: 5px;
    background: #80D0C7;
    width: 500px;
}
.tab {
    border: none;
    width: 100px;
}

.button {
    text-align: center;
}
 button{
    margin: 10px;
    padding: 5px 15px;
    border-radius: 10px;
    transition: transform .2s ease-in-out;
    background:  #0093E9;
}
 button:hover{
    background: blueviolet;
    color: white;
    transform: scale(1.1);
}
body
        {
            /* height:100vh; */
            font-family: 'Libre Baskerville', serif;
            background-repeat: no-repeat;
            background-color: #0093E9;
background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
        }
.log {
    display: flex;
    justify-content: center;
    margin:10px;
}

.container {
    font-size:16px;
    border: 1px solid black;
    border-radius: 15px;
    background: #80D0C7;
    width:35%;
    margin: auto;
    box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
    padding: 5px 10px;
}
.inp{
    width:75%;
}
    </style>
</head>
<body>
    <div class="container">
    <div class="body">

        <h1>Registration form</h1>
        <?php if($dis==true)
                {
                    echo
                     "<p>'Regd or Email is Already exists'</p>";
                }
                if($pas==true)
                {
                    echo
                     "<p>'Password and Confirm Password does not match'</p>";
                }
                ?>
    </div>

        <form action="" method="post">
            
        <table class="tb" align="center" cellSpacing="3px">
            <tr>
                <td>Name:</td>
                <td> <input type="text" placeholder="enter your name" id="name" name="name" required class="inp"> </td>
            </tr>
            <tr>
                <td>Regd no.</td>
                <td> <input type="number" placeholder="enter your regd no" id="redg" value="redg"  name="id" required class="inp"> </td>
            </tr>
            <tr>
                <td>Email:</td>
                <td> <input type="email" placeholder="enter your Email" id="mail" name="email" required class="inp"> </td>
            </tr>
            <tr>
                <td>Mobile no:</td>
                <td> <input type="text" placeholder="enter your mob no." id="mob"  pattern="[7-9]{1}[0-9]{9}" name="mob" required class="inp"> </td>
            </tr>
            <tr>
                <td>Date of birth:</td>
                <td> <input type="date" id="date" value="date" name="dob" required> </td>
            </tr>
        <tr>
            <td>Gender:</td>
            <td> 
                <input type="radio" name="gender" value="Male" >
                <span>Male</span>
                <input type="radio" name="gender" value="Female" >
                <span>Female</span>
                <input type="radio" name="gender" value="Others">
                <span>others</span>
            </td>
        </tr>
        <tr>
            <td>Branch:</td>
            <td> <select id="branch" name="branch">
                <option value="Information Technology">Information Technology</option>
                <option value="Computer Science">Computer Science</option>
                <option value="Mechanical">Mechanical</option>
                <option value="Chemical">Chemical</option>
                <option value="Civil engeneering">Civil engeneering</option>
                <option value="ETC">Electrical and tele communication</option>
                <option value="EE">Electrical engeneering</option>
            </select></td>
        </tr>
        <tr>
            <td>Hobbies:</td>
            <td> 
                <input type="checkbox" value="Dancing" name="hobbies[]">
                <span>Dancing</span><br>
                <input type="checkbox" value="Singing" name="hobbies[]">
                <span>Singing</span><br>
                <input type="checkbox" value="Acting" name="hobbies[]">
                <span>Acting</span><br>
                <input type="checkbox" value="cricket" name="hobbies[]">
                <span>cricket</span><br>
                <input type="checkbox" value="drawing" name="hobbies[]">
                <span>drawing</span><br>
                <input type="checkbox"value="others" name="hobbies[]">
                <span>others</pspan> <br>
            </td>
        </tr>
        <tr>
            <td>Password:</td>
            <td> <input type="password" placeholder="enter your password" name="password" required minlength="6" class="inp"> <br>
            <input type="password" placeholder="Confirm your password" name="cpass" required minlength="6" class="inp"> </td>
            
        </tr>
        
    </table>
    <div class="button">
             <button type="reset" style="text-align: center;">Reset</button> 
             <button type="submit" style="text-align: center;" name="submit">submit</button>
        </div>
</form>
<!-- <script src="index.js"></script> -->
<div class="log">
    <span> if you have already registered </span><a href="login.php">Log in</a>
</div>
</div>

</body>
</html>