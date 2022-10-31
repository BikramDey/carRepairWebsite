<?php include('connection.php'); ?>
<?php
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}
?>
<?php include('includes/header.php'); ?>


<div class="form-container welcome">
    <div class="topic topic-welcome">WELCOME TO YOUR DASHBOARD <br><br><br><?php echo $_SESSION['username']; ?></div>
</div>

<?php include('includes/footer.php'); ?>