<?php include('connection.php'); ?>
<?php
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}
?>
<?php include('includes/header.php'); ?>

<br>

<!--REVIEW INSERT SECTION START-->




<!--html Banner From Start-->
<div class="topic">REVIEW INSERT FORM</div>




<!--Banner photo upload php start-->


<?php

    if ($_POST['submit4'] == "Submit") {
        $rid = $_POST['rid'];
        $name = $_POST['name'];
        $job = $_POST['job'];
        $comment = $_POST['comment'];
        $target = "photos/" . basename($_FILES['rimage']['name']);
        $rimage = $_FILES['rimage']['name'];


        $sql = "INSERT INTO review SET rid='$rid', name='$name', job='$job', comment='$comment', rimage='$rimage'";
        mysqli_query($con, $sql);

        if (move_uploaded_file($_FILES['rimage']['tmp_name'], $target)) {
            $msg = "Image Uploaded Sucessfully";
            header('Location: '.$_SERVER['PHP_SELF']);
            exit;
        } else {
            $msg = "There is Problem Uploaded Images";
        }

        echo "$msg";
    }
?>


<!--Banner photo upload php end-->

<form action="" method="post" enctype="multipart/form-data">

    <table align="center" width="70%">


        <tr>
            <td class="form-label">Review Person Image:</td>
            <td><input type="file" name="rimage" id="formFile" class="form-control"></td>
        </tr>

        <tr>
            <td class="form-label">Person Name:</td>
            <td><input type="text" name="name" placeholder="Person Name" class="form-control"></td>
        </tr>

        <tr>
            <td class="form-label">Person Job:</td>
            <td><input type="text" name="job" placeholder="Person Job" class="form-control"></td>
        </tr>

        <tr>
            <td class="form-label">Comment:</td>
            <td><textarea name="comment" id="" cols="50" rows="4" placeholder="Comment" class="form-control"></textarea></td>
        </tr>

        <tr>
            <td class="form-label">Submit Now:</td>
            <td><input type="submit" name="submit4" value="Submit" class="btn btn-primary mb-3 mt-3"></td>
        </tr>

    </table>

</form>


<!--REVIEW INSERT SECTION END-->


<?php include('includes/footer.php'); ?>