<?php

include 'connect.php';
include 'nav.php';
// create a post
if (isset($_POST['submitPost'])) {
    if (isset($_SESSION['user_id'])) {
        if (!empty($_POST['postCategory'])) {

            $selectedCategory = $_POST['postCategory'];
            $postText = $_POST['postTextarea'];
            date_default_timezone_set("Asia/Dhaka");
            $time = date("d/m/y") . " " . date("h:i:sa");
            $userid = $_SESSION['user_id'];
            $sqlPost = "insert into post(userid,text,category,created_at) values('$userid','$postText','$selectedCategory','$time')";
            $resultPost = mysqli_query($conn, $sqlPost);
            if ($resultPost) {
                echo "<script>alert('Post has been published.')</script>";
            } else {
                echo "<script>alert('There is something wrong! Please try again.')</script>";
            }
        } else {
            echo "<script>alert('select a category')</script>";
        }
    } else {
        echo "<script>alert('Please login first');location.href='login.php';</script>";
    }
}






//show all post from database
$sqlShowPost = "select post.postid,user.username,post.text,post.category,post.created_at from post join user where post.userid=user.userid order by post.postid desc";
$resultShowPost = mysqli_query($conn, $sqlShowPost);

if (isset($_GET['catShow'])) {
    $cat = $_GET['catShow'];
    if($cat=="all")
    {
        $sqlShowPost = "select post.postid,user.username,post.text,post.category,post.created_at from post join user where post.userid=user.userid order by post.postid desc";
        $resultShowPost = mysqli_query($conn, $sqlShowPost); 
    }
    else{
        $sqlShowPost = "select post.postid,user.username,post.text,post.category,post.created_at from post join user where post.userid=user.userid && post.category= '$cat' order by post.postid desc";
        $resultShowPost = mysqli_query($conn, $sqlShowPost);
    }
}




?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>

    <title>Homepage</title>
</head>

<body>

    <!-- search option -->
    <div class="container" style="margin-top:10px;">
        <div class="card">
            <div class="row ">
                <form action="" method="GET">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                        Select Category
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                            <li><a class="dropdown-item active" href="#">Show all</a></li>
                            <li><a class="dropdown-item" href="#">Physics</a></li>
                            <li><a class="dropdown-item" href="#">Chemistry</a></li>
                            <li><a class="dropdown-item" href="#">Biology</a></li>
                            <li><a class="dropdown-item" href="#">Math</a></li>
                            <li><a class="dropdown-item" href="#">Others</a></li>
                        </ul>
                    </div>

                    <!-- <label style="margin-left:17px;">Select Category</label>
                    <select name="catShow" style="margin-left:11px;width:201px">
                        <option value="" disabled selected>Choose option</option>
                        <option value="all">Show all</option>
                        <option value="Physics">Physics</option>
                        <option value="Chemistry">Chemistry</option>
                        <option value="Biology">Biology</option>
                        <option value="Math">Math</option>
                        <option value="Others">Others</option>
                    </select>
                    <button name="submitCat" value="category" class="btn btn-light">Search</button> -->
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <hr>
    </div>
    <!-- create a post -->
    <div class="container" style="margin-top: 20px;">
        <div class="card">
            <h5 class="card-header">Create a Post</h5>
            <div class="card-body">
                <h5 class="card-title">Broader your knowledge by asking questions</h5>
                <p class="card-text">Click the button to post</p>
                <!-- Button trigger modal for the post -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Post
                </button>
            </div>
        </div>
    </div>
    <!-- Modal for creating a post -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Post any Question</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="row">
                            <label>Select Category</label>
                            <select name="postCategory">
                                <option value="" disabled selected>Choose option</option>
                                <option value="Physics">Physics</option>
                                <option value="Chemistry">Chemistry</option>
                                <option value="Biology">Biology</option>
                                <option value="Math">Math</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        <div class="row">
                            <label>Write Something</label>
                        </div>
                        <div class="row">
                            <textarea name="postTextarea"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button name="submitPost" class="btn btn-secondary">Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    



    <!-- post template -->
    <?php
    while ($rowPost = mysqli_fetch_array($resultShowPost)) {

        $postID = $rowPost['postid'];
        $sqlComment = "select *from comment where postid = '$postID' ";
        $resultComment = mysqli_query($conn, $sqlComment);
        $countComment = $resultComment->num_rows;

        $sqlTotalLike = "select *from likedpost where postid = '$postID'";
        $resultTotalLike = mysqli_query($conn, $sqlTotalLike);
        $countTotalLike = $resultTotalLike->num_rows;

        if (isset($_SESSION['user_id'])) {
            $userid = $_SESSION['user_id'];
            $sqlLike = "select *from likedpost where userid = '$userid' && postid = '$postID'";
            $resultLike = mysqli_query($conn, $sqlLike);
            $countLike = $resultLike->num_rows;
        }

    ?>
        <div class="container mt-5 mb-5">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <!-- username,category,userimage,time of in the post -->
                        <div class="d-flex justify-content-between p-2 px-3">
                            <div class="d-flex flex-row align-items-center"> <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/61a32d90-92bd-48ba-be28-a459f5efac0c/d990c1a-6f6ce22e-6234-479e-a181-014cfc5f1019.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcLzYxYTMyZDkwLTkyYmQtNDhiYS1iZTI4LWE0NTlmNWVmYWMwY1wvZDk5MGMxYS02ZjZjZTIyZS02MjM0LTQ3OWUtYTE4MS0wMTRjZmM1ZjEwMTkucG5nIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.-YSXnvPiMVc0Zpb4RIXK2kTKiaxnA6oyOLhu0zGe_34" width="50" class="rounded-circle">
                                <div class="d-flex flex-column ml-2" style="margin-left: 10px;"> <span class="font-weight-bold"><b><?php echo $rowPost['username'] ?></b></span><small class="text-primary"><?php echo $rowPost['category'] ?></small> </div>
                            </div>
                            <div class="d-flex flex-row mt-1 ellipsis"> <small class="mr-2"><?php echo $rowPost['created_at'] ?></small> </i> </div>
                        </div>
                        <div class="p-2">
                            <!-- post main text -->
                            <p class="text-justify" style="margin-left: 12px;white-space: pre-line;"><?php echo $rowPost['text'] ?></p>
                            <hr>
                            <!-- show total comments in the post -->
                            <form action="post.php" method="GET">

                                <div class="d-flex justify-content-between align-items-center" style="margin-top: 5px;">
                                    <div class="d-flex flex-row icons d-flex align-items-center">
                                        <?php
                                        if (isset($_SESSION['user_id'])) {
                                            if ($countLike > 0) {
                                        ?>
                                                <i class="fa fa-heart like_btn" title="<?php echo $postID ?>"></i>
                                            <?php
                                            } else {
                                            ?>
                                                <i class="far fa-heart like_btn" title="<?php echo $postID ?>"></i>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <i class="far fa-heart" title=""></i>
                                        <?php
                                        }
                                        ?>

                                        <span style="margin-left: 5px;" id='likesCount'><?php echo $countTotalLike ?></span><span>likes</span>
                                    </div>
                                    <div class="d-flex flex-row muted-color"> <span style="margin-right: 10px;"><?php echo $countComment ?> comments</span><span><button name="postOpen">show post</button></span> </div>
                                    <input type="hidden" name="_postid" value="<?php echo $rowPost['postid'] ?>">
                                </div>
                            </form>
                            <hr>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>


    <script>
        $(".like_btn").click(function() {

            var post_id = $(this).attr("title");
            if ($(this).hasClass("far")) {
                $(this).removeClass("far");
                $(this).addClass("fa");
                // var res = Number($("#likesCount").text()) + 1; 
                //$("#likesCount").html(res);


            } else {
                $(this).removeClass("fa");
                $(this).addClass("far");

            }
            $.post("likeUnlike.php", {
                data: post_id,
                check: '1'
            });

        });
    </script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>