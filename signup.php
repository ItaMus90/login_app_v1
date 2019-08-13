<?php require "header.php"; ?>

    <div class="container h-100">

        <div class="row h-100 justify-content-center align-items-center pt-4">

            <div class="card col-6">
                <div class="card-body text-center">

                    <?php

                        if(isset($_GET["error"])){

                            if ($_GET['error'] === "emptyfields"){

                                echo '<p style="color:red;">Empty Fileds</p>';

                            }elseif  ($_GET['error'] === "invalidemailuid"){

                                echo '<p style="color:red;">Invalid Username and Email</p>';

                            }elseif ($_GET['error'] === "invalidemail"){

                                echo '<p style="color:red;">Invalid Email</p>';

                            } elseif  ($_GET['error'] === "invaliuid"){

                                echo '<p style="color:red;">Invalid Username</p>';

                            } elseif ($_GET['error'] === "passwordcheck"){

                                echo '<p style="color:red;">Password are not match</p>';

                            }




                        }

                    ?>

                    <form method="post" action="includes/inc_signup.php">

                        <div class="form-group">
                            <input type="text" class="form-control" name="uid" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="E-mail">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="pwd" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="pwd-repeat" placeholder="Repeat password">
                        </div>

                        <button type="submit" class="btn btn-primary" name="signup-submit">Signup</button>
                    </form>

                </div>
            </div>

        </div>

    </div>


<?php require "footer.php"; ?>