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


    <div
      id="carouselExampleIndicators"
      class="carousel slide"
      data-bs-ride="carousel"
    >
      <div class="carousel-indicators">
        <button
          type="button"
          data-bs-target="#carouselExampleIndicators"
          data-bs-slide-to="0"
          class="active"
          aria-current="true"
          aria-label="Slide 1"
        ></button>
        <button
          type="button"
          data-bs-target="#carouselExampleIndicators"
          data-bs-slide-to="1"
          aria-label="Slide 2"
        ></button>
        <button
          type="button"
          data-bs-target="#carouselExampleIndicators"
          data-bs-slide-to="2"
          aria-label="Slide 3"
        ></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img
            width="auto"
            height="500"
            src=".\partials\forum1.jpg"
            class="d-block w-100"
            alt="..."
          />
        </div>
        <div class="carousel-item">
          <img
            width="auto"
            height="500"
            src=".\partials\forum2.jpg"
            class="d-block w-100"
            alt="..."
          />
        </div>
        <div class="carousel-item">
          <img
            width="auto"
            height="500"
            src=".\partials\forum3.png"
            class="d-block w-100"
            alt="..."
          />
        </div>
      </div>
      <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <div class="container my-5">
      <h2 class="text-center my-3 display-5">iDiscuss - Browse Categories</h2>
      <div class="row">
        <?php
        $sql = 'SELECT * from `categories`';
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
          $id = $row['category_id'];
          $cat = $row['category_name'];
          $desc = $row['category_description'];
          echo '
                <div class="col-md-4 my-4">
                <div class="card">
                  <a href="threadlist.php?catid=' . $id . '"> 
                  <img
                    src=".\partials\card-' . $id . '.png"
                    class="card-img-top"
                    alt="..."
                  /></a>
                  <div class="card-body">
                    <h5 class="card-title"> <a class="text-dark display-6" href = "threadlist.php?catid=' . $id . '">' . $cat . '</a> </h5>
                    <p class="card-text">' . substr($desc, 0, 100) . '...</p>
                    <a href="threadlist.php?catid=' . $id . '" class="btn btn-success">Open Threads</a>
                  </div>
                </div>
              </div>
            ';
        }
        ?>
      </div>
      <?php require 'partials/_threadform.php'; ?>
    </div>
  </section>
    <!-- Footer -->
    <?php require 'partials/_footer.php'; ?>
  </body>
</html>
