<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '_dbconnect.php';
    $email = $_POST['usermail'];
    $pass = $_POST['pass'];
    $sql = "SELECT * from `users` where user_email = '$email'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);

    if ($numRows == 1) {
        $rows = mysqli_fetch_assoc($result);
        if (password_verify($pass, $rows['user_pass'])) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['sno'] = $rows['sno'];
            $_SESSION['username'] = $rows['user_name'];
            $_SESSION['usermail'] = $email;
            header('location: /tech-forum/index.php?login=true');
            exit;
        } else {
            header('location: /tech-forum/index.php?login=false');
        }
    }
}
?>