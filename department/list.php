<?php
include '../public/head.php';
include '../public/nav.php';
//connect
include '../App/config.php';
include '../App/functions.php';
// include '/department/edit.php';



$SelctDep = "SELECT * FROM `department`";
$S = mysqli_query($conn,$SelctDep);



//delete
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $Delete ="DELETE FROM `department` WHERE Id= $id " ;
    $D = mysqli_query($conn,$Delete);
    path('department/list.php');
}


auth();
?>



<div class="home text-center mt-3">
        <h1>Welcome To List Department Page</h1>
    </div>

    <div class="container">
    <table class="table table-dark table-striped-columns mt-5 text-center">
        <tr>
            <td>ID</td>
            <td>NAME</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
         <?php foreach ($S as $data){ ; ?>
            <tr>
                <th><?= $data['Id'] ?></th>
                <th><?= $data['Name'] ?></th>
                <th><a href="/company/department/edit.php?edit=<?= $data['Id'] ?>" class="btn btn-info">Edit</a></th>
                <th><a
                      onclick ="return confirm('Are You Sure')"
                     href="/company/department/list.php?delete=<?= $data['Id'] ?>" class="btn btn-danger">Delete</a></th>
            </tr>
            <?php }; ?>
    </table>
    </div>



<?php

include '../public/script.php';

?>