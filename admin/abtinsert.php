<?php include('connection.php'); ?>
<?php
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
        header("location: login.php");
        exit;
    }
?>
<?php include('includes/header.php'); ?>

<br>


<!--ADD Page Insert USER INSERT SECTION START-->


<br>

<div class="topic">About Us PAGE INSERT FORM</div><br>


<?php

if ($_POST['submit2'] == "Submit") {
    $aid = $_POST['aid'];
    $title = $_POST['title'];
    $explanation = $_POST['content'];
    $targetimg = "photos/" . basename($_FILES['aimage']['name']);
    $aimage = $_FILES['aimage']['name'];
    $video = $_POST['video'];
    $page = $_POST['page'];

    $sql = "INSERT INTO about SET aid='$aid', explanation='$explanation', aimage='$aimage'";

    mysqli_query($con, $sql);


    if (move_uploaded_file($_FILES['aimage']['tmp_name'], $targetimg)) {
        $msg = "Image Uploaded Sucessfully";
        // header("location: home.php");
        header('Location: '.$_SERVER['PHP_SELF']);
        exit;
    } else {
        $msg = "There is Problem Uploaded Image";
    }
}

?>


<script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>


<!--Page Insert html start-->

<form action="" method="post" enctype="multipart/form-data">

    <table align="center" width="70%">

        <tr>
            <td class="form-label">About Us Description:</td>
            <td><textarea rows="5" cols="50" type="text" name="content" class="ckeditor" placeholder="Page Content"></textarea></td>
            <script>
                CKEDITOR.replace('content');
            </script>
        </tr>
        
        <tr>
            <td class="form-label">Image:</td>
            <td><input type="file" name="aimage" id="formFile" class="form-control"></td>
        </tr>

        <tr>
            <td class="form-label">Submit Now:</td>
            <td><input type="submit" value="Submit" name="submit2" class="btn btn-primary mb-3 mt-3"></td>
        </tr>

    </table>

</form>

<!--Page Insert html end-->


<!--ADD Page Insert USER INSERT SECTION END-->


<?php include('includes/footer.php'); ?>