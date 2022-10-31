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

<div class="topic">ADMIN INSERT FORM</div>




<!--Banner photo upload php start-->


<?php

    if ($_POST['submit5'] == "Submit") {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];


        $sql = "INSERT INTO admin SET id='$id', username='$username', password='$password'";
        mysqli_query($con, $sql);

        header('Location: '.$_SERVER['PHP_SELF']);
        exit;

    }
?>


<!--Banner photo upload php end-->

<form action="" method="post" enctype="multipart/form-data">

    <table align="center" width="70%">

        <tr>
            <td class="form-label">User Name:</td>
            <td><input type="text" name="username" placeholder="User Name" class="form-control"></td>
        </tr>
        <tr>
            <td class="form-label">Enter Password:</td>
            <td><input type="password" name="password" placeholder="Enter Password" class="form-control"></td>
        </tr>

        <tr>
            <td class="form-label">Submit Now:</td>
            <td><input type="submit" name="submit5" value="Submit" class="btn btn-primary mb-3 mt-3"></td>
        </tr>

    </table>

</form>


<!--RENT CAR INSERT SECTION END-->


<?php include('includes/footer.php'); ?>