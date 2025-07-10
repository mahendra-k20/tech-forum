<?php
$emailExist = $signupSuccess = $signupError = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include ('_dbconnect.php');
    $username = $_POST['username'];
    $useremail = $_POST['useremail'];
    $password = $_POST['password'];
    $cpass = $_POST['cpassword'];

    $existsql = "SELECT * FROM `users` WHERE user_email = '$useremail'";
    $result = mysqli_query($conn, $existsql);
    $numrows = mysqli_num_rows($result);

    if ($numrows > 0) {
        $emailExist = true;
        header('Location: /tech-forum/index.php?emailExist=true');
        exit;
    } else {
        if ($password == $cpass) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (user_name ,user_email, user_pass) VALUES ('$username','$useremail', '$hash')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $signupSuccess = true;
                header('Location: /tech-forum/index.php?signupSuccess=true');
                exit;
            }
        } else {
            $signupError = true;
            header('Location: /tech-forum/index.php?signupSuccess=false&passClash=true');
            exit;
        }
    }
}
?>