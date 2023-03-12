<?php
include '../public/head.php';
include '../public/nav.php';
//connect
include '../App/config.php';
include '../App/functions.php';
// testMessage($conn,'Insert');

if(isset($_POST['send'])){
    $name = $_POST['name'];
    $Insert = "INSERT INTO `department` VALUES (NULL ,'$name')";
    $I = mysqli_query($conn,$Insert);
    testMessage($I,'Insert');

}


auth();

?>



    <div class="home text-center mt-3">
        <h1>Welcome To Add Department Page</h1>
    </div>

    <div class="container mt-5">
        <div class="form-control">
         <form method="POST">
            <label class="form-label">Add Department</label>
            <input type="text" class="form-control" placeholder="Add department" name="name">

            
           <button class="btn btn-info mt-2" name="send">ADD Department</button> 
         </form>
        </div>
        
        
    </div>



<?php

include '../public/script.php';

?>