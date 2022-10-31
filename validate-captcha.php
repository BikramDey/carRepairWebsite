<?php include 'admin/connection.php'; ?>
<?php

if (isset($_POST['submit']) && $_POST['g-recaptcha-response'] != "") {

    $secret = '6LezzhQiAAAAAMG9blvmtskOGMFWj02aJMWNs57H';
    $site_key = '6LezzhQiAAAAACQZTJw4DaEJO4vnZT60jfESbxas';
    $recaptcha = $_POST['g-recaptcha-response'];
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $recaptcha);
    $responseData = json_decode($verifyResponse);
    if ($responseData->success) {

        $fid = $_POST['fid'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $phone = $_POST['phone'];


        $sql = "INSERT INTO contact SET fid='$fid', name='$name', email='$email', phone='$phone', message='$message'";

        mysqli_query($con, $sql);

        header("location: index2.php");
    }
}
