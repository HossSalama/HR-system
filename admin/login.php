<?php
include '../public/head.php';
include '../public/nav.php';
//connect
include '../App/config.php';
include '../App/functions.php';
// testMessage($conn,'Insert');

if(isset($_POST['login'])){
    $name = $_POST['Name'];
    $password = $_POST['password'];
    $select = "SELECT * FROM `admin` WHERE Name='$name' AND password ='$password'";
    $s = mysqli_query($conn , $select);
    $numrows = mysqli_num_rows($s);

    if($numrows == 1){
        $_SESSION['admin'] = $name ;
        path("index.php");
    }else{
        echo "False Admin";
    }
}


?>



    <div class="home text-center mt-3">
        <h1>Welcome To Login Page</h1>
    </div>

    <div class="container mt-5">
        <div class="form-control">
         <form method="POST">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" placeholder="Admin Name" name="Name">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" placeholder="password" name="password">
           <button class="btn btn-primary mt-2" name="login">Login</button> 
         </form>
        </div>
        
        
    </div>



<?php

include '../public/script.php';

?>