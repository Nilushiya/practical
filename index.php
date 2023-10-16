<?php 
    if(isset($_POST['register'])){
        header('location:register.php');
    }
    if(isset($_POST['login'])){
        header('location:login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="home" style="margin: 180px auto; background-color: aquamarine; width: 700px;">
        <form action="" method="post">
        <h4>Paractical Exam</h4>
        <div class="studentDetail">
            <div class="name">
                Name : 
            </div>
            <div class="id">
                Student id :
            </div>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat mollitia laborum modi aut facere vel quae cumque iste perspiciatis impedit.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat mollitia laborum modi aut facere vel quae cumque iste perspiciatis impedit.</p>

        <button type="submit" class="btn btn-primary " id="registerbtn" name="register">Register</button>
        <button type="submit" class="btn btn-primary " id="loginbtn" name="login">login</button>

        </form>
    </div>
</body>
</html>