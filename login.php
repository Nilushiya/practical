<?php
session_start();
$server = "localhost:3307";
$username = "root";
$password = "";
$databaseName = "practical1";
$connection = "";

$connection = mysqli_connect($server,$username,$password,$databaseName);


if(!$connection){
    die("not connected".mysqli_connect_error());
}
else if(isset($_POST['login'])){
    $mail = $_POST['mail'];
    $password = $_POST['password'];

    $sql = "select * from friend where email = '$mail' ";
    $row = mysqli_query($connection,$sql);

    $fetchresult = mysqli_fetch_assoc($row);
   
    if(mysqli_num_rows($row) > 0){
        if($password == $fetchresult['password']){
            $_SESSION['id'] = $fetchresult['friend_id'];
            $_SESSION['username'] = $fetchresult['profile_name'];
            header('location:friend.php');
        }
        else{
            echo "username or password wrong";
        }
    }
    else{
        echo "username or password incorrect";
    }
}
else{
    echo "something went wrong";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
   <div class="container">
    <div class="row">
        <div class="col-12 text-central colu text-center ">
            <div class="left">
                <h3>login page</h3>
                <form action="" method="post">
                    <div class="formgroup">
                        <label class="label" for="mail">Email</label>
                        <input class="input " type="email" name="mail" id="mail">
                    </div>
                    <div class="formgroup">
                        <label class="label" for="password">Password</label>
                        <input class="input"  type="password"  name="password" id="password">
                    </div>
        
                    <button  type="submit" class="btn btn-primary" name="login" id="loginformbtn">login</button>
                    <button  class="btn btn-primary" id="clearbtn">clear</button>
                </form>
            </div>
        </div>
    </div>
   </div>
   <script >
        let clearbtn = document.getElementById("clearbtn");
        let mail = document.getElementById("mail");
        let password = document.getElementById("Password");

        clearbtn.addEventListener("click",(e) => {
            e.preventDefault()
        mail.value = '';
        password.value = '';
}) </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" ></script>
    
</body>
</html>
