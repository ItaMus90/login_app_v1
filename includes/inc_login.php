<?php

    if(isset($_POST["login-submit"])){

        require 'inc_db.php';

        $mailuid = $_POST["mailuid"];
        $pwd = $_POST["pwd"];

        if (empty($mailuid) || empty($pwd)){

            header("Location: ../index.php?error=emptyfields");

            exit();

        }else{

            $sql = "SELECT * FROM users WHERE username=? OR email=?;";
            $statement = mysqli_stmt_init($connection);

            if (!mysqli_stmt_prepare($statement, $sql)){

                header("Location: ../index.php?error=sqlerror");

                exit();

            }else{

                mysqli_stmt_bind_param($statement, "ss",$mailuid, $mailuid);
                mysqli_stmt_execute($statement);
                $result = mysqli_stmt_get_result($statement);


                if ($row = mysqli_fetch_assoc($result)){

                    $is_pwd_equlas = password_verify($pwd, $row["password"]);

                    if (!$is_pwd_equlas){

                        header("Location: ../index.php?error=wrongpassword");

                        exit();

                    }elseif ($is_pwd_equlas){

                        session_start();
                        $_SESSION["id"] = $row["id"];
                        $_SESSION["username"] = $row["username"];
                        echo 1;
                        header("Location: ../index.php?login=success");

                        exit();

                    }else{

                        header("Location: ../index.php?error=wrongpassword");

                        exit();

                    }


                }else{

                    header("Location: ../index.php?error=nouser");

                    exit();

                }

            }

        }

    }else{

        header("Location: ../index.php");

        exit();

    }