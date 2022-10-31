<?php include('connection.php'); ?>
<?php
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}
?>
<?php include('includes/header.php'); ?>

<?php

    $sqls = "SELECT * FROM rent_car WHERE cid=$_GET[cid]";
    $result = $con->query($sqls);
    $rows = $result->fetch_assoc();
    $oldfile=  $rows['cimage'];

?>

<br>


<!--RENT CAR INSERT SECTION START-->



<br>

<!--html Banner From Start-->

<div class="topic">RENT CAR UPDATE FORM</div>




<!--Banner photo upload php start-->


<?php

    if ($_POST['update3'] == "Update") {
        $cid = $_POST['cid'];
        $name = $_POST['name'];
        $capacity = $_POST['capacity'];
        $mileage = $_POST['mileage'];
        $features = $_POST['features'];
        $category = $_POST['category'];
        
        if ($_FILES['cimage']['name'] == "") {
            $sql = "UPDATE rent_car SET name='$name', capacity='$capacity', mileage='$mileage', features='$features', category='$category' WHERE cid=$_GET[cid]";
            mysqli_query($con, $sql);
            header('Location: rcview.php');
            exit;
        } 
        else {
            $delimgpath = "photos/" . $oldfile;
            unlink($delimgpath);
    
            $target = "photos/" . basename($_FILES['cimage']['name']);
            $image = $_FILES['cimage']['name'];
    
            $sql = "UPDATE rent_car SET name='$name', capacity='$capacity', mileage='$mileage', features='$features', category='$category', cimage='$image' WHERE cid=$_GET[cid]";
            mysqli_query($con, $sql);
    
            if (move_uploaded_file($_FILES['cimage']['tmp_name'], $target)) {
                echo "Image is Sucessfully Uploaded";
                header('Location: rcview.php');
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
            <td class="form-label">Old Car Image:</td>
            <td><img width="100" height="100" src="photos/<?php echo $rows['cimage']; ?>"></td>
        </tr>

        <tr>
            <td class="form-label">New Car Image:</td>
            <td><input type="file" name="cimage" id="formFile" class="form-control"></td>
        </tr>

        <tr>
            <td class="form-label">Car Name:</td>
            <td><input type="text" name="name" placeholder="Car Name" class="form-control" value="<?php echo $rows['name']; ?>"></td>
        </tr>

        <tr>
            <td class="form-label">Car Capacity:</td>
            <td><input type="number" name="capacity" placeholder="Car Capacity" class="form-control" value="<?php echo $rows['capacity']; ?>"></td>
        </tr>

        <tr>
            <td class="form-label">Car Mileage:</td>
            <td><input type="number" name="mileage" placeholder="Car Mileage" class="form-control" value="<?php echo $rows['mileage']; ?>"></td>
        </tr>

        <tr>
            <td class="form-label">Car Features:</td>
            <td><input type="text" name="features" placeholder="Car Features" class="form-control" value="<?php echo $rows['features']; ?>"></td>
        </tr>

        <tr>
            <td class="form-label">Car Category:</td>
            <td><input type="text" name="category" placeholder="Car Category" class="form-control" value="<?php echo $rows['category']; ?>"></td>
        </tr>

        <tr>
            <td class="form-label">Submit Now:</td>
            <td><input type="submit" name="update3" value="Update" class="btn btn-primary mb-3 mt-3"></td>
        </tr>

    </table>

</form>


<!--RENT CAR INSERT SECTION END-->


<?php include('includes/footer.php'); ?>