<?php
require 'config.php';
$om=false;
$cp=false;
if(isset($_POST["submit"])){
    $oldpass=$_POST['oldpassword'];
    $confpass=$_POST['conpassword'];
    $id = $_SESSION["id"];
    $newpass=$_POST["newpassword"];
    $result = mysqli_query($con, "SELECT * FROM `students_details`.`details` WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
    if($row["pass"]!=$oldpass)
    {
       $om=true;
    }
    else if($newpass!=$confpass)
    {
        $cp=true;
    }
    else{
        $sql = "UPDATE `students_details`.`details` SET pass='$newpass' WHERE id=$id";
        if ($con->query($sql) === TRUE) {
        echo
      "<script> alert('Updated successfully');window.location.replace('login.php') </script>";}
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
    <title>change password</title>
    <style>
       body
        {
            font-family: 'Libre Baskerville', serif;
            height:98vh;
            background-color: #0093E9;
background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
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
a{
    margin: 6px 15px;
}
        .cont {
            font-size:18px;
            margin: auto;
            background: #80D0C7;
            margin-top: auto;
            text-align: center;
            width: 40%;
            padding: 10px;
            margin-top: auto;
            border-radius: 15px;
            border: 2px solid black;
            box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
        }
        .con {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90vh;
        }
        td {
    padding: 10px;
}

tr {
    width: 50vw;
}

input {
    margin: 2px;
    border-radius: 10px;
    padding: 10px;
    width: 110%; 
}
h1{
    font-family: 'Anton', sans-serif;
}
    </style>
</head>
<body>
    <div class="con">

        <div class="cont">
            <h1>
                
                change your password
            </h1>
            <form action="" method="post">
                <table align="center" cellSpacing="10px";>
                    <tr>
                        <td>Old Password:</td>
                        <td>
                            <input type="password" placeholder="enter your old password" name="oldpassword">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            New Password: 
                        </td>
                        <td>
                            <input type="password" placeholder="enter your new password" name="newpassword"><br>
                            <input type="password" placeholder="Confirm your password" name="conpassword" required>
                        </td>
                    </tr>
                </table>
                <?php if($om==true)
                {
                    echo "<P>Old password does not match</P>";
                }
                ?>
                  <?php if($cp==true)
                {
                    echo "<P>Password and Confirm Password Should be same</P>";
                }
                ?>
                <button type="submit" name="submit">Update</button>
            </form>
            <a href="logout.php">logout</a>
        </div>
    </div>
    </body>
</html>