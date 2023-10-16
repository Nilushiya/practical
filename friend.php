<?php

  session_start();

  if(isset($_POST["add_friend"])){
    header("location:add_friend.php");
  }
  if(isset($_POST["log_out"])){
    header("location:index.php");
  }
  $friend_id=$_SESSION['id'];
  $friend_name=$_SESSION['username'];

  $server = "localhost:3307";
  $username = "root";
  $password = "";
  $databaseName = "practical1";
  $connection = "";
  
  $connection = mysqli_connect($server,$username,$password,$databaseName);
  $sql4 ="SELECT * FROM my_friend where user_id='$friend_id'";
  $result1 =mysqli_query($connection,$sql4);
  $count =mysqli_num_rows($result1);


  
  $sql5 = "UPDATE friend SET 'no_friends'='$count' where profile_name='$friend_name'";
    mysqli_query($connection,$sql5);
  
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
        body{
            text-align: center;
            justify-content: center;
            align-items: center;
        }
    </style>
<body>

   <form action="" method="post">
   <h1>my friend system</h1>

     <div>
        <h2><?php  echo $_SESSION['username']; ?>'s add friend page</h2>
        <h2>total number of friends are<?php echo " ".$count; ?> </h2>
        <button name="add_friend">Add friend</button>
        <button name="log_out">log out</button>
    </div>
   </form>
    
</body>
</html>