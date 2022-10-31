
<?php include('connection.php'); ?>
<?php
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}
?>
<?php include('includes/header.php'); ?>

<br>


<!--html Banner From Start-->

<div class="topic">BANNER PICTURE INSERT FORM</div>




<!--Banner photo upload php start-->


<?php

if ($_POST['submit1'] == "Submit") {
    $bid = $_POST['bid'];
    $title = $_POST['title'];
    $detail = $_POST['detail'];
    $target = "photos/" . basename($_FILES['bimage']['name']);
    $bimage = $_FILES['bimage']['name'];


    $sql = "INSERT INTO banner SET bid='$bid', detail='$detail', title='$title', bimage='$bimage'";
    mysqli_query($con, $sql);

    if (move_uploaded_file($_FILES['bimage']['tmp_name'], $target)) {
        $msg = "Image Uploaded Sucessfully";
        // header("location: home.php");
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

            <td class="form-label">Banner Image:</td>

            <td>
                <input type="file" name="bimage" id="formFile" class="form-control">
            </td>
        </tr>
        <tr>
            <td class="form-label">Banner Title:</td>
            <td><input type="text" name="title" placeholder="Banner Title" class="form-control"></td>
        </tr>
        <tr>
            <td class="form-label">Banner Detail:</td>
            <td><textarea name="detail" id="" cols="50" rows="3" placeholder="Banner Detail" class="form-control"></textarea></td>
        </tr>

        <tr>

            <td>Submit Now:</td>

            <td><input type="submit" name="submit1" value="Submit" class="btn btn-primary mb-3 mt-3"></td>

        </tr>

    </table>

</form>


<?php include('includes/footer.php'); ?>