<?php
$errorAlert = $succesAlert = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '_dbconnect.php';
    $thread_title = $_POST['thread_title'];
    $thread_description = $_POST['thread_description'];
    $sno = $_POST['srno'];
    $thread_cat_id = $_POST['selcat'];
    $sqlInsert = "INSERT into `threads` (thread_title, thread_description, thread_cat_id, thread_user_id) VALUES ('$thread_title', '$thread_description', '$thread_cat_id', '$sno')";
    $resultInsert = mysqli_query($conn, $sqlInsert);

    if ($resultInsert) {
        $succesAlert = true;
    } else {
        $errorAlert = true;
    }
}

?>

<div class="card mt-3" id="threadform">
    <div class="card-body">
        <?php
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
        <h4 class=" card-title py-2 display-6">Ask a Question</h4>
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { ?>
        <form method="POST" action="<?php echo $_SERVER['REQUEST_URI'] . '#threadform'; ?>">
        <input type="hidden" name="srno" value = <?php echo $_SESSION['sno'] ?>> 
            <div class="mb-3">
            <label for="thread_title" class="form-label">Question Title</label>
            <input type="text" class="form-control" id="thread_title" name="thread_title"aria-describedby="questiontitle" required>
            <div id="titlehelp" class="form-text">Keep your question title short andrelevant</div>
            </div>
            <div class="mb-3">
            <label for="thread_description" class="form-label">Explain the Question</label>
            <textarea class="form-control" id="thread_description" name="thread_description" rows="3" required></textarea>
            </div>
            <div class="mb-3">
            <label for="title" class="form-label">Select the Category</label>
            <select name="selcat" id ="selcat" class="form-select" aria-label="Default select example" required>
                <option value="">Select a category</option>
            <?php
            $sql = 'SELECT * from Categories';
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $cat_name = $row['category_name'];
                $cat_id = $row['category_id'];

                echo '
                   <option value="' . $cat_id . '">' . $cat_name . '</option>
                ';
            }
            ?>
            </select>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
        <?php } else { ?>
        <p class="lead">You are not logged in. Please log in to start a Discussion.</p>
        <?php } ?>
    </div>
</div>