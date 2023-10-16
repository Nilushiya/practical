<?php

$server = "localhost:3307";
$username = "root";
$password = "";
$databaseName = "practical1";
$connection = "";

$connection = mysqli_connect($server,$username,$password,$databaseName);
if(!$connection){
    die("connection feild".mysqli_connect_error());
}

else if(isset($_POST['register'])){
    
    $mail = $_POST['mail'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    // $confirmPassword = $_POST['confirmPassword'];

    $sql = "insert into friend(email,profile_name,password) 
    values('$mail','$name','$password')";
    $result = mysqli_query($connection,$sql);
    echo "hi";
    header('location:index.php');
    
}
else{
    echo "something went ";
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
                <h3>Register</h3>
                <form action="" method="POST">
                    <div class="formgroup">
                        <label class="label" for="mail">Email</label>
                        <input class="input " type="email" name="mail" id="mail">
                    </div>
                    <div class="formgroup">
                        <label class="label" for="name">Profile name</label>
                        <input class="input"  type="text" name="name" id="name">
                    </div>
                    <div class="formgroup">
                        <label class="label" for="password">Password</label>
                        <input class="input"  type="password"  name="password" id="password">
                    </div>
                    <div class="formgroup">
                        <label class="label" for="confirmPassword">ConfirmPassword</label>
                        <input class="input"  type="password" name="confirmPassword" id="confirmPassword">
                    </div>
        
                    <button type="submit" class="btn btn-primary" name="register" id="registerFormbtn">Register</button>
                    <button class="btn btn-primary" id="clearbtn">clear</button>
                
                </form>
            </div>
            <div id="error">
                  
            </div>
        </div>
    </div>
   </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" ></script>
    <script>
    let mail = document.getElementById("mail");
    let proname = document.getElementById("name");
    let password = document.getElementById("password");
    let confirmPassword = document.getElementById("confirmPassword");
    let registerFormbtn = document.getElementById("registerFormbtn");
    let clearbtn = document.getElementById("clearbtn");

    let error = document.getElementById("error");

    let valiMail = true;
    let valiname = true;
    let valipassword = true;
    let valiconfirmPassword = true;

    const errormsg = [];

    function checkemail(mail){
        
        if(mail.value === ''){
            
            errormsg.push("mail is requried")
            valiMail = false;
        }
        return valiname
    }

    function checkname(name){
        if(name.value == ''){
            
            errormsg.push("name is requried")
            valiname = false;
        }
        return valiname
    }

    function checkpassword(password){
        if(password.value == ''){
            errormsg.push("password is requried")
            valipassword = false;
        }
        return valipassword;
    }

    function checkconfirmpassword(confirmPassword,password){
        if(confirmPassword.value == '' && password.value == ''){
            // error.innerHTML = "confirmPassword is requried"
            valiconfirmPassword = false;
        }
        else if(confirmPassword.value === ''){
            errormsg.push("confirmPassword is requried");
            valiconfirmPassword = false;
        }
        else if(confirmPassword.value != password.value){
            errormsg.push("confirmPassword is not correct");
            valiconfirmPassword = false;
        }
        return valiconfirmPassword;
    }

    function validate(){
        let validate;
        let resultmail = checkemail(mail);
        let resultname = checkname(proname);
        let resultpassword= checkpassword(password);
        let resultconfirmPassword = checkconfirmpassword(confirmPassword,password);
        

        if(resultmail && resultname && resultpassword && resultconfirmPassword == true){
        validate = true;
        }
        //console.log( errormsg.join('\r\n'));
        return validate;
    }

    registerFormbtn.addEventListener("click",(e) => {
        if(!validate()){
            error.innerHTML = errormsg
            errormsg.length = 0;    
            e.preventDefault();
        }
        
    })
    clearbtn.addEventListener("click",(e) => {
        mail.value = '';
        proname.value = '';
        password.value = '';
        confirmPassword.value = '';
        errormsg.length = 0; 
    })
    </script>
</body>

</html>