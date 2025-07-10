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
    <?php require 'partials/_header.php'; ?>
    <div class="container my-5">
        <h2 class="display-4 pb-3">Search result for the <strong><?php echo $_GET['search'] ?></strong></h2>
        <hr class="user-divider">
        <?php
        $query = $_GET['search'];
        $highlight = '<mark>' . htmlspecialchars($query) . '</mark>';
        $sql = "SELECT * from `threads` where match (`thread_title`, `thread_description`) against ('$query')";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while ($row = mysqli_fetch_assoc($result)) {
          $title = $row['thread_title'];
          $desc = $row['thread_description'];
          $thread_id = $row['thread_id'];
          $thread_cat_id = $row['thread_cat_id'];
          $thread_user_id = $row['thread_user_id'];
          $comment_time = $row['timestamp'];
          $formatted_time = date('F j, Y g:i A', strtotime($comment_time));
          $url = 'threads.php?threadid=' . $thread_id;
          $noResult = false;

          $highlighted_title = preg_replace('/(' . preg_quote($query, '/') . ')/i', $highlight, $title);
          $highlighted_desc = preg_replace('/(' . preg_quote($query, '/') . ')/i', $highlight, $desc);

          echo '
         <div class="searchResult py-3">';
          $sqlCat = "SELECT * from `categories` where category_id = $thread_cat_id";
          $resultCat = mysqli_query($conn, $sqlCat);
          while ($rowCat = mysqli_fetch_assoc($resultCat)) {
            $catName = $rowCat['category_name'];
            $catId = $rowCat['category_id'];
            $catUrl = 'threadlist.php?catid=' . $catId;
          }

          $sqlNext = "SELECT user_name from `users` where sno = '$thread_user_id'";
          $resultNext = mysqli_query($conn, $sqlNext);
          $rowNext = mysqli_fetch_assoc($resultNext);
          $user = $rowNext['user_name'];
          echo '
          <h5 class="display-6"><a class="text-dark" href="' . $url . '">' . $highlighted_title . '</a>
          </h5>
          <p class="lead">' . $highlighted_desc . '</p>
          <div class="d-flex align-items-center gap-3">
            <p class="thread-cat mb-0 ml-auto"><a class="text-light" href="' . $catUrl . '">' . $catName . '</a></p>
            <em class="">Posted by - <span class="">' . $user . '</span> on ' . $formatted_time . '</em>
          </div>
          <hr class="user-divider">
        </div>
        ';
        }
        if ($noResult) {
          echo '<br>';
          include 'partials/_noResult.php';
        }
        ?>
    </div>
  </section>
    <!-- Footer -->
    <?php require 'partials/_footer.php'; ?>
  </body>
</html>
