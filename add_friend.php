<?php

session_start();

  if(isset($_POST["add_friend"])){
    header("location:friendlist.php");
  }
  if(isset($_POST["log_out"])){
    header("location:index.php");
  }
  $server = "localhost:3307";
  $username = "root";
  $password = "";
  $databaseName = "practical1";
  $connection = "";
  
  $connection = mysqli_connect($server,$username,$password,$databaseName);
  $userid= $_SESSION['id'];
  
//   $limit =5;
//   if(isset($_GET['page'])){
    // $page =$_GET['page'];
//   }else{
    // $page =1;
//   }
//   $start=($page-1)*$limit;

  $sql2 ="SELECT * FROM friend where friend_id !=$userid  AND FRIEND_ID NOT IN (SELECT friend_id from my_friend where user_id=$userid)";
  $result =mysqli_query($connection,$sql2);
       
    $sql5 ="SELECT * FROM my_friend where user_id='$userid'";
    $count_details=mysqli_query($connection,$sql5);
    $count =$count_details->num_rows;

     if(isset($_POST["add_friend"])){
          $friendId =$_POST["name"];
          $userid= $_SESSION['id'];
    //     $sql3 ="SELECT friend_id from friend where profile_name ='$username'";
    //    $userid = mysqli_query($conn,$sql3);
      $sqlupdate ="UPDATE friend SET no_friends='$count' where friend_id='$userid'";
      mysqli_query($connection,$sqlupdate);
         echo  $friendId;
        $sqlinsert ="INSERT INTO `my_friend`(`user_id`, `friend_id`) VALUES ('$userid','$friendId ')";
       mysqli_query($connection,$sqlinsert);
      header("location:addfriend.php");
  }

     if(isset($_POST['friend_list'])){
        header("location:friendlist.php");
     }

     if(isset($_POST["log_out"])){
      header("location:home.php");
    }
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

        .s1{
            margin-left: 45%;
        }

        .pre{
          position: absolute;
          top: 50%;
          left: 20%;
          font-size: 30px;
        }
        .next{
          position: absolute;
          top: 50%;
          left: 70%;
          font-size: 30px;
        }
    </style>
<body>

   <form action="" method="post">
   <h1>my friend system</h1>

     <div>
        <h2><?php  echo $_SESSION['username']; ?>'s add friend page</h2>
        <h2>total number of friends are <?php echo  $count; ?></h2>
    <table class="s1">
        <th>name</th>
        <th>want to add</th>
        
       
           <?php 
           if($result->num_rows>0){
            while($row=mysqli_fetch_assoc($result)){
                echo '<tr><td>'.$row['profile_name'].'</td><td>';
               
                ?>
                
           <button type="submit" onclick="add('<?php echo $row['friend_id'] ?>')" id="add_name" name="add_friend">add friend</button>
        
        <?php echo '</td></tr>'; }
           }?>
           
      
    </table>
     <input type="text" id="name" name="name" style="position: absolute;top:60%;border:transparent">
        <button name="friend_list" style="position: absolute;top:85%;left:40%">friend list</button>
        <button name="log_out" style="position: absolute;top:85%;left:50%">log out</button>
    </div>
   </form>
    <!-- <a id="pre"  href="#" class="pre">previous</a>
    <a id="next" href="#" class="next">next</a> -->
   
</body>

<script>
    

    function add(username){
        document.getElementById("name").value =username;
     // alert(document.getElementById("name").value);
        
    }

    // let page =
    <?php echo $page;?>;
    // document.getElementById("pre").onclick= function ADD1() {
    //     if(page>1){
    //         page--;
    //         window.location.href='addfriend.php?page='+page;
    //     }
    // }
    // document.getElementById("next").onclick= function ADD1() {
        
    //         page++;
    //         window.location.href='addfriend.php?page='+page;
        
    // }
    
</script>
</html>