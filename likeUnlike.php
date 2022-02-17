<?php
session_start();
include 'connect.php';

if(isset($_POST['check']) && isset($_SESSION['user_id']))
{
    $userid = $_SESSION['user_id'];
    $postid = $_POST['data'];

    $sqlCheck = "select *from likedpost where userid = '$userid' && postid = '$postid'";
    $resultCheck = mysqli_query($conn,$sqlCheck);
    if($resultCheck->num_rows>0)
    {
        $sql = "delete from likedpost where userid = '$userid' && postid = '$postid'";
        $result = mysqli_query($conn,$sql);
    }else{
        $sql = "insert into likedpost (userid,postid) values('$userid','$postid')";
        $result = mysqli_query($conn,$sql);
    }

    
}
?>