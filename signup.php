<?php require "header.php"; ?>

    <div class="container h-100">

        <div class="row h-100 justify-content-center align-items-center pt-4">

            <div class="card col-6">
                <div class="card-body text-center">

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