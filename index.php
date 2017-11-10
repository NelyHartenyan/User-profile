<?php include("layout/header.php"); ?>
    <div class="col-sm-4 col-sm-offset-4 center" id="center1">
        <div class="form-box">
            <div class="form-top">
                <div class="form-top-left">
                    <h3 class="color">Sign up now</h3>
                </div>
            </div>
            <div class="form-bottom">
                <form id="reg-form"  action="registrationProcess.php" method="post" class="registration-form" action="/?userid=8" method="post"
                      enctype="multipart/form-data" class="signUp">
                    <div class="form-group <?php echo isset($_SESSION["error"]["firstname"])?"has-error":"has-success" ?>">
                        <input type="text" name="firstname" value="<?php echo isset($_SESSION["firstname"])?$_SESSION["firstname"]:'' ?>" placeholder="First name..."
                               class="form-first-name form-control">
                        <?php if(isset($_SESSION["error"]["firstname"]))
                         echo '<small class="has-error">'.$_SESSION["error"]["firstname"].'</small>';
                        ?>

                    </div>
                    <div class="form-group <?php echo isset($_SESSION["error"]["lastname"])?"has-error":"has-success" ?>">
                        <input type="text" name="lastname" placeholder="Last name..."
                               class="form-last-name form-control" value="<?php echo isset($_SESSION["lastname"])?$_SESSION["lastname"]:'' ?>">
                        <?php if(isset($_SESSION["error"]["lastname"]))
                            echo '<small class="has-error">'.$_SESSION["error"]["lastname"].'</small>';
                        ?>
                    </div>
                    <div class="form-group <?php echo isset($_SESSION["error"]["email"])?"has-error":"has-success" ?>">
                        <input id="email" type="text" name="email" value="<?php echo isset($_SESSION["email"])?$_SESSION["email"]:'' ?>"placeholder="Email..." class="form-email form-control">
                        <span class='email-error'></span>
                        <?php if(isset($_SESSION["error"]["email"]))
                            echo '<small class="has-error">'.$_SESSION["error"]["email"].'</small>';
                        ?>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <?php if(isset($_SESSION["error"]["password"]))
                            echo '<small class="has-error">'.$_SESSION["error"]["password"].'</small>';
                        ?>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Repeat Password" name="rpassword">
                        <?php if(isset($_SESSION["error"]["rpassword"]))
                            echo '<small class="has-error">'.$_SESSION["error"]["rpassword"].'</small>';
                        ?>
                    </div>
                    <div class="form-group">
                        <label class="radio-inline color option">
                            <input type="radio" name="gender" value="MALE" <?php echo (isset($_SESSION["gender"]) && $_SESSION["gender"]=="MALE")?"checked":'' ?> >Male
                        </label>
                        <label class="radio-inline color option">
                            <input type="radio" name="gender" value="FEMALE" <?php echo (isset($_SESSION["gender"]) && $_SESSION["gender"]=="FEMALE")?"checked":'' ?>>Female
                        </label>
                        <label class="radio-inline color option">
                            <input type="radio" name="gender" value="OTHER" <?php echo (isset($_SESSION["gender"]) && $_SESSION["gender"]=="OTHER")?"checked":'' ?>>Other
                        </label>
                        <?php if(isset($_SESSION["error"]["gender"]))
                            echo '<small class="has-error">'.$_SESSION["error"]["gender"].'</small>';
                        ?>
                    </div>
                    <button type="submit" class="btn submit" id="submit1" name="register">Sign me up!</button>
                    <br>
                    <span class="color">Already have an account?</span>
                    <a href="signin.php" class="btn btn-default btn-sm" style="margin-left: 10px" >
                        Sign Up
                    </a>
                </form>
                
            </div>
        </div>
    </div>
<?php include("layout/footer.php"); ?>