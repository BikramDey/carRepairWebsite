<?php include('connection.php'); ?>
<?php
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}
?>
<?php include('includes/header.php'); ?>

<?php

$sqls = "SELECT * FROM review WHERE rid=$_GET[rid]";
$result = $con->query($sqls);
$rows = $result->fetch_assoc();
$oldfile =  $rows['rimage'];

?>

<br>


<!--RENT CAR INSERT SECTION START-->



<br>

<!--html Banner From Start-->

<div class="topic">REVIEW UPDATE FORM</div>




<!--Banner photo upload php start-->


<?php

if ($_POST['update4'] == "Update") {
    $cid = $_POST['rid'];
    $name = $_POST['name'];
    $job = $_POST['job'];
    $comment = $_POST['comment'];

    if ($_FILES['rimage']['name'] == "") {
        $sql = "UPDATE review SET name='$name', job='$job', comment='$comment' WHERE rid=$_GET[rid]";
        mysqli_query($con, $sql);
        header('Location: rvview.php');
        exit;
    } else {
        $delimgpath = "photos/" . $oldfile;
        unlink($delimgpath);

        $target = "photos/" . basename($_FILES['rimage']['name']);
        $image = $_FILES['rimage']['name'];

        $sql = "UPDATE review SET name='$name', job='$job', comment='$comment' rimage='$image' WHERE rid=$_GET[rid]";
        mysqli_query($con, $sql);

        if (move_uploaded_file($_FILES['rimage']['tmp_name'], $target)) {
            echo "Image is Sucessfully Uploaded";
            header('Location: rvview.php');
            exit;
        } else {
            echo "Image is Not Sucessfully Uploaded";
        }
    }
}
?>


<!--Banner photo upload php end-->

<form action="" method="post" enctype="multipart/form-data">

    <table align="center" width="70%">


        <tr>
            <td class="form-label">Review Person Old Image:</td>
            <td><img width="100" height="100" src="photos/<?php echo $rows['rimage']; ?>"></td>
        </tr>

        <tr>
            <td class="form-label">Review Person New Image:</td>
            <td><input type="file" name="rimage" id="formFile" class="form-control"></td>
        </tr>

        <tr>
            <td class="form-label">Person Name:</td>
            <td><input type="text" name="name" placeholder="Person Name" class="form-control" value="<?php echo $rows['name']; ?>"></td>
        </tr>

        <tr>
            <td class="form-label">Person Job:</td>
            <td><input type="text" name="job" placeholder="Person Job" class="form-control" value="<?php echo $rows['job']; ?>"></td>
        </tr>

        <tr>
            <td class="form-label">Comment:</td>
            <td><textarea name="comment" id="" cols="50" rows="4" placeholder="Comment" class="form-control"><?php echo $rows['comment']; ?></textarea></td>
        </tr>

        <tr>
            <td class="form-label">Submit Now:</td>
            <td><input type="submit" name="update4" value="Update" class="btn btn-primary mb-3 mt-3"></td>
        </tr>

    </table>

</form>


<!--RENT CAR INSERT SECTION END-->


<?php include('includes/footer.php'); ?>