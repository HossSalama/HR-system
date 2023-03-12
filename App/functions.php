<?php

function testMessage($condition, $message){
    if($condition){
        echo "$message Successfully";
    }else{
        echo "$message Failed";
    }
}

function path($go){
    echo "<script>location.replace('/company/$go')</script>";
}


function auth(){
    if(!$_SESSION['admin']){
        header("location:/company/admin/login.php");
    }
}

?>

