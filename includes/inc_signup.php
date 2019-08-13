<?php

    if (isset($_POST["signup-submit"])){

        require 'inc_db.php';

        $username = $_POST["uid"];
        $email = $_POST["email"];
        $password = $_POST["pwd"];
        $password_repeat = $_POST["pwd-repeat"];

        if (empty($username) || empty($email) || empty($password) || empty($password_repeat) ){

            $params = "&uid=". $username . "&email=". $email;
            header("Location: ../signup.php?error=emptyfields" . $params);

            //use exit to stop all if user enter invalid input
            exit();

        }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){

            header("Location: ../signup.php?error=invalidemailuid");

            //use exit to stop all if user enter invalid input
            exit();


        }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){

            $params = "&uid=". $username;
            header("Location: ../signup.php?error=invalidemail" . $params);

            //use exit to stop all if user enter invalid input
            exit();

        }elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)){

            $params = "&email=". $email;
            header("Location: ../signup.php?error=invaliuid" . $params);

            //use exit to stop all if user enter invalid input
            exit();

        }elseif ($password !== $password_repeat){

            $params = "&uid=". $username . "&email=". $email;
            header("Location: ../signup.php?error=passwordcheck" . $params);

            //use exit to stop all if user enter invalid input
            exit();

        }else{

            $sql = "SELECT username FROM users WHERE username=?";

            //The mysqli_stmt_init() function initializes a statement and returns an object suitable for mysqli_stmt_prepare().
            $statement = mysqli_stmt_init($connection);


            if(!mysqli_stmt_prepare($statement, $sql)){

                header("Location: ../signup.php?error=sqlerror");

                //use exit to stop all if user enter invalid input
                exit();

            }else{
                //s => String , i => Integer, b => Boolean , d => Double
                mysqli_stmt_bind_param($statement, "s", $username);
                mysqli_stmt_execute($statement);
                mysqli_stmt_store_result($statement);

                $num_rows = mysqli_stmt_num_rows($statement);

                if($num_rows > 0) {

                    $params = "&email=". $email;
                    header("Location: ../signup.php?error=usertaken" . $params);

                    //use exit to stop all if user enter invalid input
                    exit();

                }else{

                    $sql = "INSERT INTO users (username, email, password) VALUES (?, ? , ?)";
                    $statement = mysqli_stmt_init($connection);

                    if(!mysqli_stmt_prepare($statement, $sql)){

                        header("Location: ../signup.php?error=sqlerror");

                        //use exit to stop all if user enter invalid input
                        exit();

                    }else {

                        $hash_password = password_hash($password, PASSWORD_DEFAULT);

                        mysqli_stmt_bind_param($statement, "sss", $username, $email, $hash_password);
                        mysqli_stmt_execute($statement);


                        header("Location: ../signup.php?signup=success");

                        //use exit to stop all if user enter invalid input
                        exit();

                    }

                }

            }

        }


        mysqli_stmt_close($statement);
        mysqli_close($connection);

    }else{

        header("Location: ../signup.php");

        exit();

    }