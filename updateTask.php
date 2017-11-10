<?php
session_start();
include("config/config.php");

$user_id = $_SESSION["user_id"];

if(!$user_id){
    header("Location:index.php");die;
}
$task_id = $_GET['task_id'];
$sql = "SELECT * FROM `task` WHERE `user_id` = '$user_id' AND `id`='$task_id'";
$row = mysqli_query($conn,$sql);
$task = mysqli_fetch_assoc($row);



if(isset($_POST['update'])){

    if (isset($_POST["title"]) && !empty($_POST["title"])) {
        $title = mysqli_real_escape_string($conn, strip_tags($_POST["title"]));
    }
    if (isset($_POST["description"]) && !empty($_POST["description"])) {
        $description = mysqli_real_escape_string($conn, strip_tags($_POST["description"]));

    }

    $sql = "UPDATE `task` SET `title`='$title',`description`=
'$description' WHERE `user_id` = '$user_id' AND `id`='$task_id' ";
  /* echo '<pre>';
    var_dump( $sql);
    echo '</pre>';die;*/
    $update = mysqli_query($conn,$sql);
    if($update){
        header('Location:tasks.php');
    }

}

include('layout/header.php');
?>

<form  method="post">
    <div class="form-group">
        <label for="usr">Title:</label>
        <input type="text" class="form-control" id="title" name="title" style="width: 350px!important;" value="<?php echo $task['title']; ?>">
    </div>
    <div class="form-group">
        <label for="comment">Description:</label>
        <textarea class="form-control" rows="5" id="description" name="description" style="width: 800px!important;" ><?php echo $task['description']; ?></textarea>
    </div>
    <button type="submit" class="btn btn-default btn-sm" name="update">
        Save
    </button>
</form>
