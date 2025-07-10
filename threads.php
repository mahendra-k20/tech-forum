<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>iDiscuss Forum</title>
    <?php require 'partials/_bootstrap.php'; ?>
    <?php require 'partials/_dbconnect.php'; ?>
  </head>
  <body>
  <section class="main-section">
    <!-- Header -->
    <?php
    require 'partials/_header.php';
    $thread_id = $_GET['threadid'];
    $succesAlert = $errorAlert = false;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $comment = $_POST['comment'];
      $comment = str_replace('<', '&lt;', $comment);
      $comment = str_replace('>', '&gt;', $comment);
      $sno = $_POST['sno'];
      $sql = "INSERT INTO `comments` (comment_content, thread_id, created_by) VALUES ('$comment', '$thread_id', '$sno')";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        $succesAlert = true;
      } else {
        $errorAlert = true;
      }
    }
    if ($succesAlert) {
      echo "<div class='alert alert-success alert-dismissible fade show'     role='alert'><strong>Success!</strong> Your comment is successfully.
      </div>";
    }
    if ($errorAlert) {
      echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
      <strong>Error!</strong> There is an error while submitting. Please try again later.<div>";
    }
    ?>
    
    <div class="container mt-5">
      <?php
      $thread_id = $_GET['threadid'];
      $sql = "SELECT * FROM `threads` WHERE thread_id = $thread_id";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
        $threadname = $row['thread_title'];
        $threaddesc = $row['thread_description'];
        $thread_user_id = $row['thread_user_id'];
        $thread_cat_id = $row['thread_cat_id'];
        $timestamp = $row['timestamp'];
        $format_date = date('F j, Y', strtotime($timestamp));
        $sqlPoster = "SELECT * FROM `users` where sno = $thread_user_id";
        $resultPoster = mysqli_query($conn, $sqlPoster);
        $row = mysqli_fetch_assoc($resultPoster);
        $userPoster = $row['user_name'];

        echo '
          <div class="card mt-3">
            <div class="card-body">';
        $sqlCat = "SELECT * from `categories` where category_id = $thread_cat_id";
        $resultCat = mysqli_query($conn, $sqlCat);
        while ($rowCat = mysqli_fetch_assoc($resultCat)) {
          $catName = $rowCat['category_name'];
          $catId = $rowCat['category_id'];
          $catUrl = 'threadlist.php?catid=' . $catId;
          echo '<p class="thread-cat mb-0"><a class="text-light" href="' . $catUrl . '">' . $catName . '</a></p>';
        }
        echo '
               <h5 class="card-title py-2 display-6"> ' . $threadname . '</h5>
               <p class="lead">' . $threaddesc . '</p>
               <hr>
               <p class="card-text">
               <mark>Respectful Conduct:</mark> Treating others with courtesy and consideration,
               avoiding insults, harassment, or offensive language.<br />
               <mark>Relevance:</mark> Keeping discussions on topic and avoiding irrelevant or
               off-topic remarks. <br />
               <mark>No Spam/Self-Promotion:</mark> Avoiding excessive advertising, promotional
               content, or spamming. <br />
               <mark>Privacy:</mark> Protecting personal information and avoiding sharing
               sensitive data. <br />
               <mark>Moderation:</mark> Accepting the decisions and actions of forum moderators.
               </p>
               <em class="lead">Posted by - ' . $userPoster . ' on ' . $format_date . '</em>
            </div>
          </div>
          ';
      }
      ?>
    </div>

    <div class="container my-5">
      <h4 class="mb-3 display-6">Post a Comment</h4>
      <div class="card mb-5">
        <div class="card-body">
          <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { ?>
           <form method="POST" action="<?php echo $_SERVER['REQUEST_URI'] ?>">
            <input type="hidden" name="sno" value = <?php echo $_SESSION['sno'] ?>>
             <div class="mb-3">
               <label for="desc" class="form-label">Insert Your Comment</label>
               <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
             </div>
             <button type="submit" class="btn btn-success">Post Comment</button>
           </form>
          <?php } else { ?>
           <p class="lead">You are not logged in. Please log in to start a Discussion.</p>
          <?php } ?>
        </div>
      </div>
      <?php
      $thread_id = $_GET['threadid'];
      $sql = "SELECT * FROM `comments` WHERE thread_id = $thread_id";
      $result = mysqli_query($conn, $sql);
      $noComments = true;
      while ($row = mysqli_fetch_assoc($result)) {
        $noComments = false;
        $comment_id = $row['comment_id'];
        $content = $row['comment_content'];
        $comment_time = $row['created_at'];
        $formatted_time = date('F j, Y g:i A', strtotime($comment_time));

        $thread_user_id = $row['created_by'];
        $sqlNext = "SELECT user_name from `users` where sno = '$thread_user_id'";
        $resultNext = mysqli_query($conn, $sqlNext);
        $rowNext = mysqli_fetch_assoc($resultNext);
        $user = $rowNext['user_name'];
        echo '
              <div class="media p-3 mb-4">
              <img
                class="mr-5"
                src=".\partials\user-1.png"
                width="60"
                alt="Generic placeholder image"
              />
              <div class="media-body">
              <p class="mt-2"><i class="lead">- ' . $user . ' at ' . $formatted_time . '</i></p><hr class="user-divider">
                ' . $content . '<br>
              </div>
              </div>
              ';
      }
      if ($noComments) {
        include ('partials/_noComment.php');
      }
      ?>
    </div>
  </section>
    <!-- Footer -->
    <?php require 'partials/_footer.php'; ?>
  </body>
</html>
