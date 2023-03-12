<?php
include '../public/head.php';
include '../public/nav.php';
//connect
include '../App/config.php';
include '../App/functions.php';
// include '/department/edit.php';


if(isset($_GET['search'])){
    $namevalue = $_GET['Namevalue'];
    $SelctDep = "SELECT * FROM `employeewithdepartment` WHERE empName LIKE '%$namevalue%'";
    $S = mysqli_query($conn,$SelctDep);
}




auth();

?>



<div class="home text-center mt-3">
        <h1>Welcome To List Employee Page</h1>
    </div>


    <div class="container">
        <form method="GET">
            <div class="form-group">
                <input class="form-contol" type="text" name="Namevalue">
                <button class="btn btn-info" name="search">Search</button>
            </div>
        </form>
    <table class="table table-dark table-striped-columns mt-5 text-center">
        <tr>
            <td>ID</td>
            <td>NAME</td>
            <td>Salary</td>
            <td>Image</td>
            <td>Department ID</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
         <?php foreach ($S as $data){ ; ?>
            <tr>
                <th><?= $data['Id'] ?></th>
                <th><?= $data['empName'] ?></th>
                <th><?= $data['Salary'] ?></th>
                <th> <img width="100" src="./upload/<?= $data['image'] ?>" alt=""> </th>
                <th><?= $data['depName'] ?></th>
                <th><a href="/company/employee/edit.php?edit=<?= $data['Id'] ?>" class="btn btn-info">Edit</a></th>
                <th><a
                      onclick ="return confirm('Are You Sure')"
                     href="/company/employee/list.php?delete=<?= $data['Id'] ?>" class="btn btn-danger">Delete</a></th>
            </tr>
            <?php }; ?>
    </table>
    </div>



<?php

include '../public/script.php';

?>