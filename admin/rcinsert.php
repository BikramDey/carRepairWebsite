<?php include('connection.php'); ?>
<?php
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}
?>
<?php include('includes/header.php'); ?>

<br>


<!--RENT CAR INSERT SECTION START-->



<br>

<!--html Banner From Start-->

<div class="topic">RENT CAR INSERT FORM</div>




<!--Banner photo upload php start-->


<?php

    if ($_POST['submit3'] == "Submit") {
        $cid = $_POST['cid'];
        $name = $_POST['name'];
        $capacity = $_POST['capacity'];
        $mileage = $_POST['mileage'];
        $features = $_POST['features'];
        $category = $_POST['category'];
        $target = "photos/" . basename($_FILES['cimage']['name']);
        $cimage = $_FILES['cimage']['name'];


        $sql = "INSERT INTO rent_car SET cid='$cid', name='$name', capacity='$capacity', mileage='$mileage', features='$features', category='$category', cimage='$cimage'";
        mysqli_query($con, $sql);

        if (move_uploaded_file($_FILES['cimage']['tmp_name'], $target)) {
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

            <td class="form-label">Car Image:</td>

            <td>
                <input type="file" name="cimage" id="formFile" class="form-control">
            </td>
        </tr>
        <tr>
            <td class="form-label">Car Name:</td>
            <td><input type="text" name="name" placeholder="Car Name" class="form-control"></td>
        </tr>
        <tr>
            <td class="form-label">Car Capacity:</td>
            <td><input type="number" name="capacity" placeholder="Car Capacity" class="form-control"></td>
        </tr>
        <tr>
            <td class="form-label">Car Mileage:</td>
            <td><input type="number" name="mileage" placeholder="Car Mileage" class="form-control"></td>
        </tr>
        <tr>
            <td class="form-label">Car Features:</td>
            <td><input type="text" name="features" placeholder="Car Features" class="form-control"></td>
        </tr>
        <tr>
            <td class="form-label">Car Category:</td>
            <td><input type="text" name="category" placeholder="Car Category" class="form-control"></td>
        </tr>

        <tr>

            <td class="form-label">Submit Now:</td>

            <td><input type="submit" name="submit3" value="Submit" class="btn btn-primary mb-3 mt-3"></td>

        </tr>

    </table>

</form>


<!--RENT CAR INSERT SECTION END-->


<?php include('includes/footer.php'); ?>