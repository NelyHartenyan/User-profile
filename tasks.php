<?php
session_start();
include("config/config.php");
if(!$_SESSION['user_id']){
    header('location:signin.php');die;

}

$user_id = $_SESSION['user_id'];

$page_size = 10;
$current_page = 1;

if(isset($_GET['page'])){

    $current_page =  $_GET['page'];
}


$offset = $page_size*($current_page-1);



$sql = "SELECT * FROM `user` WHERE id = '$user_id '";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$user_data = mysqli_fetch_assoc($result);

$sql = "SELECT * FROM `task` WHERE user_id='$user_id' LIMIT $page_size OFFSET $offset ";
$resultt = mysqli_query($conn,$sql);

$sqlAll = "SELECT * FROM `task` WHERE user_id='$user_id'";

$resulttAll = mysqli_query($conn,$sqlAll);
$taskcount = $resulttAll->num_rows;
$count = ceil($taskcount/$page_size);

include('layout/header.php');

?>
    <div class="container">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <span class="navbar-brand" style="color:white!important;">WebSiteName</span>
            </div>
            <ul class="nav navbar-nav">
                <li ><a href="profile.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                <li><a href="gallery.php"><span class="glyphicon glyphicon-picture"></span> Gallery</a></li>
                <li><a href="tasks.php"><span class="glyphicon glyphicon-user"></span> Tasks</a></li>
                <li><a href="#"> <span class="glyphicon glyphicon-cog"></span> Settings</a></li>
                <li style="position: absolute; right:20px"><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>  Sign  Out </a></li>
            </ul>
        </div>
    </nav>

    <div class="row" >

        <div class="col-md-4">
            <div class="form" >
                <?php

                if($user_data['avatar']){ ?>
                    <img class="img-responsive" style="margin: 10px!important;width: 300px; height: 300px;border-radius: 20px;" src="uploads/<?php echo  $user_data['avatar'];   ?>" alt="">
                    <?php
                }
                else {
                    if ($user_data['gender'] == "MALE") {

                        echo "<img id='#img' class='img-responsive' src='images/male.jpg' style='margin: 10px!important;width: 300px; height: 300px;border-radius: 20px; '>";
                    } elseif($user_data['gender'] == "FEMALE") {
                        echo "<img id='#img' class='img-responsive' src='images/female.jpg' style='margin: 10px!important;width: 300px; height: 300px;border-radius: 20px; '>";
                    }
                    else{
                        echo "<img id='#img' class='img-responsive' src='images/other.jpg' style='margin: 10px!important;width: 300px; height: 300px;border-radius: 20px; '>";
                    }
                }


                ?>
                <form action="upload.php" method="post" enctype="multipart/form-data" class="add">

                    <input type="file" name="img_file" id="avatar" multiple style="color: transparent;">
                    <input type="hidden" name="cuurrent-image" value="<?php echo  $user_data['avatar']; ?>">
                    <button name="upload" class="hide" id="saveBtn">Save image</button>
                </form>


                <hr>
                <div class="user" style="width: 250px;">
                    <h3><?php echo $user_data['firstname']; echo "     "; echo $user_data['lastname'];?></h3>
                    <hr>
                    <span style="font-size:15px;">Email: </span><?php echo $user_data['email']; ?>

                </div>

            </div>
        </div>
    <div class=" col-md-8" >
<form action="createTasks.php" method="post">
        <div class="form-group">
            <label for="usr">Title:</label>
            <input type="text" class="form-control" id="title" name="title" style="width: 350px!important;" value="<?php echo isset($_SESSION["title"])?$_SESSION["title"]:'' ?>">
            <?php if(isset($_SESSION["error"]["title"]))
                echo '<small class="has-error" style="color: red!important;">'.$_SESSION["error"]["title"].'</small>';
            ?>
        </div>
        <div class="form-group">
            <label for="comment">Description:</label>
            <textarea class="form-control" rows="5" id="description" name="description" style="width: 800px!important;" value="<?php echo isset($_SESSION["description"])?$_SESSION["description"]:'' ?>"></textarea>
            <?php if(isset($_SESSION["error"]["description"]))
                echo '<small class="has-error" style="color: red!important;">'.$_SESSION["error"]["description"].'</small>';
            ?>
        </div>
    <button type="submit" class="btn btn-default btn-sm" name="task_btn">
        Save
    </button>
</form>
        <br>
        <table class="table table-hover">
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Description</th>


            </tr>
        <?php    while ($user=mysqli_fetch_assoc($resultt)){
   $i++;
            ?>

                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $user['title']; ?></td>
                    <td><?php echo $user['description']; ?> </td>
                    <td> <a href="updateTask.php?task_id=<?php echo $user['id'];  ?>"><button type="button" class="btn btn-default btn-sm" >Update </button> </a> </td>
                    <td> <a onclick="return confirm('Are you  sure?')" href="deleteTask.php?task_id=<?php echo $user['id'];  ?>"> <button type="submit" class="btn btn-default btn-sm" name="delete">Delete </button> </a> </td>

                </tr>


        <?php } ?>
        </table>
    </div>
    </div>
    <nav aria-label="Page navigation example" style="    text-align: center;">
    <ul class="pagination">

        <?php
        if($taskcount > $page_size){
        for($page=1;$page<=$count;$page++) { ?>
        <li  class="page-item"><a class="page-link" href="tasks.php?page=<?php echo $page;  ?>"><?php echo $page; ?> </a> </li>

    <?php } } ?>

    </ul>
    </nav>
<?php
include('layout/footer.php');?>