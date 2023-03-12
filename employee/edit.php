<?php
include '../public/head.php';
include '../public/nav.php';
//connect
include '../App/config.php';
include '../App/functions.php';
// testMessage($conn,'Insert');

$SelctDep = "SELECT * FROM `department`";
$Ss = mysqli_query($conn,$SelctDep);

// $name= null;
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $SelctDep = "SELECT * FROM `employeewithdepartment` WHERE Id = $id ";
    $S = mysqli_query($conn , $SelctDep);
    $row = mysqli_fetch_assoc($S);

    if(isset($_POST['send'])){
        $name = $_POST['Name'];
        $salary = $_POST['salary'];
        // image
        $imageName = rand(0 , 7000000) . $_FILES['image']['name'];
        $tmpName = $_FILES['image']['tmp_name'];
        $location = 'upload/' . $imageName;
        move_uploaded_file($tmpName , $location);
        $image_Name = $row['image'];
        unlink("./upload/$image_Name");

        $depName = $_POST['DepId'];
        $Update = "UPDATE `employee` SET Name ='$name', Salary = $salary , image = '$imageName' , DepId = $depName  WHERE Id = $id ";
        $U = mysqli_query($conn,$Update);
        // testMessage($I,'Insert');
        path('employee/list.php');
    
    }
}



auth();
?>



    <div class="home text-center mt-3">
        <h1>Welcome To Edit Employee Page</h1>
    </div>

    <div class="container mt-5">
        <div class="form-control">
         <form method="POST" enctype="multipart/form-data">
            <label class="form-label">Edit Employee</label>
            <label class="form-label">Name</label>
            <input type="text" class="form-control" placeholder="Add Employee" value="<?= $row['empName'] ?>" name="Name">
            <label class="form-label">Salary</label>
            <input type="text" class="form-control" placeholder="Add Employee" value="<?= $row['Salary'] ?>" name="salary">
            <label class="form-label">Image</label>
            <input type="file" class="form-control" placeholder="upload image" name="image">
            <label class="form-label">Department ID</label>
            <select name="DepId" class="form-control">
            <option selected> <?= $row['depName'] ?> </option>
                <?php foreach($Ss as $data) : ?>
                <option value= <?= $data['Id'] ?> > <?= $data['Name'] ?> </option>
                <?php endforeach; ?>
            </select>
           <button class="btn btn-info mt-2" name="send">Update</button> 
         </form>
        </div>
        
        
    </div>



<?php

include '../public/script.php';

?>