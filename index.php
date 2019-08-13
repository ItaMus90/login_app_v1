<?php require "header.php"; ?>
    <!-- 30 -->
    <div class="container h-100">

        <div class="row h-100 justify-content-center align-items-center">

            <div class="card col-12">
                <div class="card-body text-center">
            <?php

                if ($_SESSION["id"]){

                    echo '<p>You are Logged in</p>';

                }else {

                    echo ' <p>You are Logged out</p>';

                }

            ?>


                </div>
            </div>


        </div>

    </div>
            

<?php require "footer.php"; ?>