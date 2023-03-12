<?php
include '../public/head.php';
include '../public/nav.php';
//connect
include '../App/config.php';
include '../App/functions.php';
// testMessage($conn,'Insert');


$SelctDep = "SELECT * FROM `department`";
$S = mysqli_query($conn,$SelctDep);

if(isset($_POST['send'])){
    $name = $_POST['name'];
    $salary = $_POST['salary'];
    // image
    $imageName = rand(0 , 7000000) . $_FILES['image']['name'];
    $tmpName = $_FILES['image']['tmp_name'];
    $location = 'upload/' . $imageName;

    move_uploaded_file($tmpName , $location);


    $depId = $_POST['DepId'];
    $Insert = "INSERT INTO `employee` VALUES (NULL ,'$name',$salary, '$imageName' ,$depId)";
    $I = mysqli_query($conn,$Insert);
    testMessage($I,'Insert');

}


auth();
?>



    <div class="home text-center mt-3">
        <h1>Welcome To Add Employee Page</h1>
    </div>

    <div class="container mt-5">
        <div class="form-control">
         <form method="POST" enctype="multipart/form-data">
            <label class="form-label">Name Employee</label>
            <input type="text" class="form-control" placeholder="Add Employee" name="name">
            <label class="form-label">Salary</label>
            <input type="text" class="form-control" placeholder="Salary" name="salary">
            <label class="form-label">Image</label>
            <input type="file" class="form-control" placeholder="upload image" name="image">
            <label class="form-label">Department ID</label>
            <select name="DepId" class="form-control">
                <?php foreach($S as $data) : ?>
                <option value= <?= $data['Id'] ?> > <?= $data['Name'] ?> </option>
                <?php endforeach; ?>
            </select>

           <button class="btn btn-info mt-2" name="send">ADD Employee</button> 
         </form>
        </div>
        
        
    </div>



<?php

include '../public/script.php';

?>