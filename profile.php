<?php

session_start();
include("config/config.php");
if(!$_SESSION['user_id']){
    header('location:signin.php');die;

}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM `user` WHERE id = '$user_id '";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$user_data = mysqli_fetch_assoc($result);


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
    <div class="form"  >
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

        <input type="file" name="img_file" id="avatar" multiple style=" color: transparent;"><br>
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

    </div>

    </div>
<?php
include('layout/footer.php');