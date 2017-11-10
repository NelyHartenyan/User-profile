<?php
session_start();
include('layout/header.php');
?>



<div class="main">
    <form action="signinProcess.php" method="post">
        <div id="signin_back">Login</div><br>
       <div id="signin_input">
           <div class="input-group" style="padding-left: 10px;">
               <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
               <input id="email1" type="text" class="form-control" name="email" placeholder="Email">
           </div><br>
           <div class="input-group" style="padding-left: 10px; ">
               <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
               <input id="password" type="password" class="form-control" name="password" placeholder="Password" >
           </div><br>
           <button type="submit" class="btn btn-default btn-sm" style="padding-left: 10px; margin-left: 150px; ">
               <span class="glyphicon glyphicon-log-in"></span> Log in
           </button>
           <a href="index.php" class="btn btn-default btn-sm" style="margin-left: 10px" >
               Sign Up
           </a>


       </div>

        <?php if(isset($_SESSION['res'])){
            ?><div class="alert alert-danger">
            <?php   echo $_SESSION['res'];
            unset($_SESSION['res']);  ?>
            </div>
            <?php

        } ?>

    </form>
</div>

<?php

include('layout/footer.php');

?>




