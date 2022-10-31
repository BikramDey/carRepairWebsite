
<?php include('connection.php'); ?>
<?php
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}
?>
<?php include('includes/header.php'); ?>

<?php

    $sqls = "SELECT * FROM banner WHERE bid=$_GET[bid]";
    $result = $con->query($sqls);
    $rows = $result->fetch_assoc();
    $oldfile=  $rows['bimage'];

?>

<br>


<!--html Banner From Start-->

<div class="topic">UPDATE BANNER FORM</div>




<!--Banner photo upload php start-->


<?php

if ($_POST['update1'] == "Update") {
    $bid = $_GET['bid'];
    $title = $_POST['title'];
    $detail = $_POST['detail'];

    if ($_FILES['bimage']['name'] == "") {
        $sql = "UPDATE banner SET detail='$detail', title='$title' WHERE bid=$_GET[bid]";
        mysqli_query($con, $sql);
        header('Location: bnview.php');
        exit;
    } 
    else {
        $delimgpath = "photos/" . $oldfile;
        unlink($delimgpath);

        $target = "photos/" . basename($_FILES['bimage']['name']);
        $image = $_FILES['bimage']['name'];

        $sql = "UPDATE banner SET detail='$detail', title='$title', bimage='$image' WHERE bid=$_GET[bid]";
        mysqli_query($con, $sql);

        if (move_uploaded_file($_FILES['bimage']['tmp_name'], $target)) {
            echo "Image is Sucessfully Uploaded";
            header('Location: bnview.php');
            exit;
        } 
        else {
            echo "Image is Not Sucessfully Uploaded";
        }
    }
}
?>


<!--Banner photo upload php end-->

<form action="" method="post" enctype="multipart/form-data">

    <table align="center" width="70%">


        <tr>
            <td class="form-label">Old Banner Image:</td>
            <td><img width="100" height="100" src="photos/<?php echo $rows['bimage']; ?>"></td>
        </tr>
        <tr>
            <td class="form-label">New Banner Image:</td>
            <td><input type="file" name="bimage" id="formFile" class="form-control"></td>
        </tr>
        <tr>
            <td class="form-label">Banner Title:</td>
            <td><input type="text" name="title" placeholder="Banner Title" class="form-control" value="<?php echo $rows['title']; ?>"></td>
        </tr>
        <tr>
            <td class="form-label">Banner Detail:</td>
            <td><textarea name="detail" id="" cols="50" rows="3" placeholder="Banner Detail" class="form-control"><?php echo $rows['detail']; ?></textarea></td>
        </tr>

        <tr>

            <td>Submit Now:</td>

            <td><input type="submit" name="update1" value="Update" class="btn btn-primary mb-3 mt-3"></td>

        </tr>

    </table>

</form>


<?php include('includes/footer.php'); ?>