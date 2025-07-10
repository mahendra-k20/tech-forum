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
    $category_id = $_GET['catid'];
    $succesAlert = $errorAlert = false;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $qtitle = $_POST['title'];
      $qtitle = str_replace('<', '&lt;', $qtitle);
      $qtitle = str_replace('>', '&gt;', $qtitle);
      $qdesc = $_POST['desc'];
      $qdesc = str_replace('<', '&lt;', $qdesc);
      $qdesc = str_replace('>', '&gt;', $qdesc);
      $sno = $_POST['srno'];
      $sql = "INSERT INTO `threads` (thread_title, thread_description, thread_cat_id, thread_user_id) VALUES ('$qtitle', '$qdesc', '$category_id', '$sno')";
      $result = mysqli_query($conn, $sql);

      if ($result) {
        $succesAlert = true;
      } else {
        $errorAlert = true;
      }
    }
    if ($succesAlert) {
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>Success!</strong> Your question is submitted successfully.
                  </div>";
    }
    if ($errorAlert) {
      echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Error!</strong> There is an error while submitting. Please try again later.
                  </div>";
    }
    ?>
    
    <div class="container mt-5">
      <?php
      $sql = "SELECT * FROM `categories` WHERE category_id = $category_id";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
        $catname = $row['category_name'];
        $catdesc = $row['category_description'];

        echo '
          <div class="card mt-3">
            <div class="card-body">
               <h3 class="card-title py-2 display-3">Welcome to ' . $catname . ' Forum</h3>
               <p class="lead">' . $catdesc . '</p>
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
               <a href="#" class="btn btn-success mt-3">Know More</a>
            </div>
          </div>
          ';
      }
      ?>
    </div>

    <div class="container my-5">   
      <div class="card mt-3">
        <div class="card-body">
           <h4 class=" card-title py-2 display-6">Ask a Question</h4>
           <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { ?>
           <form method="POST" action="<?php echo $_SERVER['REQUEST_URI'] ?>">
            <input type="hidden" name="srno" value = <?php echo $_SESSION['sno'] ?>> 
             <div class="mb-3">
               <label for="title" class="form-label">Question Title</label>
               <input type="text" class="form-control" id="title" name="title" aria-describedby="questiontitle" required>
               <div id="titlehelp" class="form-text">Keep your question title short and relevant</div>
             </div>
             <div class="mb-3">
               <label for="desc" class="form-label">Explain the Question</label>
               <textarea class="form-control" id="desc" name="desc" rows="3" required></textarea>
             </div>
             <button type="submit" class="btn btn-success">Submit</button>
           </form>
           <?php } else { ?>
           <p class="lead">You are not logged in. Please log in to start a Discussion.</p>
           <?php } ?>
        </div>
      </div>
    </div>

    <div class="container my-5">
      <h4 class="mb-3 display-6">Browse Questions</h4>
      <?php
      $sql = "SELECT * FROM `threads` WHERE thread_cat_id = $category_id";
      $result = mysqli_query($conn, $sql);
      $noResult = true;
      while ($row = mysqli_fetch_assoc($result)) {
        $noResult = false;
        $thread_id = $row['thread_id'];
        $title = $row['thread_title'];
        $desc = $row['thread_description'];
        $comment_time = $row['timestamp'];
        $formatted_time = date('F j, Y g:i A', strtotime($comment_time));
        $thread_user_id = $row['thread_user_id'];
        $sqlNext = "SELECT user_name from `users` where sno = '$thread_user_id'";
        $resultNext = mysqli_query($conn, $sqlNext);
        $rowNext = mysqli_fetch_assoc($resultNext);
        $user = $rowNext['user_name'];

        echo '
        <div class="media p-4 mb-4">
        <img
          class="mr-5"
          src=".\partials\user-1.png"
          width="60"
          alt="Generic placeholder image"
        />
        <div class="media-body">
          <h5 class="mt-0"><a class="text-dark" href="threads.php?threadid= ' . $thread_id . '">' . $title . '</a></h5>
          ' . $desc . '<br><hr class="user-divider">
          <p><i class="">- ' . $user . ' at ' . $formatted_time . '</i></p>
        </div>
        </div>
        ';
      }
      if ($noResult) {
        include ('partials/_noResult.php');
      }
      ?>
    </div>
  </section>  
    <!-- Footer -->
    <?php require 'partials/_footer.php'; ?>
  </body>
</html>
