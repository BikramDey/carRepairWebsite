<?php include('connection.php'); ?>
<?php
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}
?>
<?php include('includes/header.php'); ?>

<?php

$sqls = "SELECT * FROM about WHERE aid=$_GET[aid]";
$result = $con->query($sqls);
$rows = $result->fetch_assoc();
$oldfile =  $rows['aimage'];

?>

<br>


<!--html Banner From Start-->

<div class="topic">UPDATE ABOUT FORM</div>




<!--Banner photo upload php start-->


<?php

if ($_POST['update2'] == "Update") {
    $aid = $_GET['aid'];
    $title = $_POST['title'];
    $explanation = $_POST['content'];

    if ($_FILES['aimage']['name'] == "") {
        $sql = "UPDATE about SET explanation='$explanation' WHERE aid=$_GET[aid]";
        mysqli_query($con, $sql);
        header('Location: abtview.php');
        exit;
    } else {
        $delimgpath = "photos/" . $oldfile;
        unlink($delimgpath);

        $target = "photos/" . basename($_FILES['aimage']['name']);
        $image = $_FILES['aimage']['name'];

        $sql = "UPDATE about SET explanation='$explanation', aimage='$image' WHERE aid=$_GET[aid]";
        mysqli_query($con, $sql);

        if (move_uploaded_file($_FILES['aimage']['tmp_name'], $target)) {
            echo "Image is Sucessfully Uploaded";
            header('Location: abtview.php');
            exit;
        } else {
            echo "Image is Not Sucessfully Uploaded";
        }
    }
}
?>

<script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>

<!--Banner photo upload php end-->

<form action="" method="post" enctype="multipart/form-data">

    <table align="center" width="70%">


        <tr>
            <td class="form-label">About Us Description:</td>
            <td><textarea rows="5" cols="50" type="text" name="content" class="ckeditor" placeholder="Page Content"><?php echo $rows['explanation']; ?></textarea></td>
            <script>
                CKEDITOR.replace('content');
            </script>
        </tr>
        <tr>
            <td class="form-label">Old Image:</td>
            <td><img width="100" height="100" src="photos/<?php echo $rows['aimage']; ?>"></td>
        </tr>
        <tr>
            <td class="form-label">New Image:</td>
            <td><input type="file" name="aimage" id="formFile" class="form-control"></td>
        </tr>
        <tr>
            <td class="form-label">Submit Now:</td>
            <td><input type="submit" value="Update" name="update2" class="btn btn-primary mb-3 mt-3"></td>
        </tr>

    </table>

</form>


<?php include('includes/footer.php'); ?>