<?php

session_start();

if(isset($_GET['logout'])){
    session_unset();
    session_destroy();
    header("location:/company/admin/login.php");
}



?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/company/index.php">My Company</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php if(isset($_SESSION['admin'])) : ?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/company/index.php">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Department
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/company/department/add.php">Add Department</a></li>
            <li><a class="dropdown-item" href="/company/department/list.php">List Department</a></li>
            
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Employee
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/company/employee/add.php">Add Employee</a></li>
            <li><a class="dropdown-item" href="/company/employee/list.php">List Employee</a></li>
            
          </ul>
        </li>
        <?php endif; ?>
        
      </ul>
      <?php if(!isset($_SESSION['admin'])) : ?>
        <a class="btn btn-outline-success" href="/company/admin/login.php">Login</a>
      <?php else : ?>
        <form method="GET">
        <button name="logout" class="btn btn-outline-danger" href="/company/admin/login.php">LogOut</button>
        </form>
       <?php endif; ?>
    </div>
  </div>
</nav>