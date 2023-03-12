<?php
include '../public/head.php';
include '../public/nav.php';
//connect
include '../App/config.php';
include '../App/functions.php';
// testMessage($conn,'Insert');

// $name= null;
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $SelctDep = "SELECT * FROM `department` WHERE Id = $id ";
    $S = mysqli_query($conn , $SelctDep);
    $row = mysqli_fetch_assoc($S);

    if(isset($_POST['send'])){
        $name = $_POST['Name'];
        $Update = "UPDATE `department` SET Name ='$name' WHERE Id = $id ";
        $U = mysqli_query($conn,$Update);
        // testMessage($I,'Insert');
        path('department/list.php');
    
    }
}


auth();
?>



    <div class="home text-center mt-3">
        <h1>Welcome To Edit Department Page</h1>
    </div>

    <div class="container mt-5">
        <div class="form-control">
         <form method="POST">
            <label class="form-label">Edit Department</label>
            <input type="text" class="form-control" placeholder="Add department" value="<?= $row['Name'] ?>" name="Name">
           <button class="btn btn-info mt-2" name="send">Update</button> 
         </form>
        </div>
        
        
    </div>



<?php

include '../public/script.php';

?>