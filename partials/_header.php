<?php
session_start();
echo '
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/tech-forum">iDiscuss</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/tech-forum">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/tech-forum/about.php">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Top Categories
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
$sql = 'SELECT * FROM `categories` LIMIT 3';
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
  $topCats = $row['category_name'];
  $topCats_id = strtolower($topCats);
  $cat_id = $row['category_id'];

  echo ' <li><a id="cat-' . $topCats_id . '" class="dropdown-item" href="threadlist.php?catid= ' . $cat_id . '">' . $topCats . '</a></li>';
}
echo '
          </ul>
        </li>
      </ul>
       <form class="d-flex mx-2" method="GET" action="search.php">
        <input class="form-control me-2" type="search" name="search" id="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        ';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  echo ' 
        <p class="text-light my-0 mx-3">Welcome <em>' . $_SESSION['username'] . '</em></p>;
        <a role="button" href="./partials/_logout.php" class="btn btn-primary mx-2">Logout</a>
        ';
} else {
  echo '
        <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#login">Login</button>
        <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#signup">Signup</button>
        ';
}
echo '   
    </div>
  </div>
</nav>
';
include 'partials/login.php';
include 'partials/signup.php';
// include 'partials/_dbconnect.php';
$sql = 'SELECT * FROM `users`';
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
  $name = $row['user_name'];
}

if (isset($_GET['signupSuccess']) && $_GET['signupSuccess'] == 'true') {
  echo "<div class='my-0 alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Hello $name,</strong> You have signed up successfully.
      </div>";
}
if (isset($_GET['emailExist']) && $_GET['emailExist'] == 'true') {
  echo "<div class='my-0 alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Error!</strong> The email is already existed.
      </div>";
}
if (isset($_GET['passClash']) == 'true' && ($_GET['signupSuccess']) && $_GET['signupSuccess'] == 'false') {
  echo "<div class='my-0 alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Error!</strong> Password do not match.
      </div>";
}
if (isset($_GET['login']) && $_GET['login'] == 'true') {
  echo "<div class='my-0 alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> You are logged in.
      </div>";
}
if (isset($_GET['login']) && $_GET['login'] == 'false') {
  echo "<div class='my-0 alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Password Error!</strong> Please enter the correct password.
      </div>";
}
if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
  echo "<div class='my-0 alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Logout!</strong> You are logged out successfully.
      </div>";
}
?>