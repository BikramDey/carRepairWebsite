
<?php include('connection.php'); ?>
<?php
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}
?>
<?php include('includes/header.php'); ?>

<br>

<!--REVIEW VIEW SECTION START-->

<br>

<b>Rent Car Listing Page:<b><br>

<?php

    //Start Delete Query

    if ($_GET['table'] == "review") {
        $sqls = "DELETE from review where rid=$_GET[id]";
        $con->query($sqls);


        /*Images Delete*/
        $delimages = $_GET['delimages'];
        $delimgpath = "photos/" . $delimages;
        unlink($delimgpath);
        header('Location: '.$_SERVER['PHP_SELF']);
        exit;
    }

?>


<!--Html Part-->


<table width="100%" border="1" align="center" class="viewTable">

    <tr>
        <td align="center" bgcolor="#66FF66">ID</td>

        <td align="center" bgcolor="#66FF66">IMAGE</td>

        <td align="center" bgcolor="#66FF66">NAME</td>

        <td align="center" bgcolor="#66FF66">JOB </td>

        <td align="center" bgcolor="#66FF66">COMMENT</td>

        <td align="center" bgcolor="#66FF66">ACTION</td>
    </tr>

    <!--Select Query Start-->

    <?php

    $sqls4 = "SELECT * From review";
    $result4 = $con->query($sqls4);

    //Select Query End

    //table row while loop start

    while ($rows = $result4->fetch_assoc()) {

    ?>

        <tr>

            <!--Select Table Loop Start-->


            <td><?php echo $rows['rid']; ?></td>

            <td><img width="80" height="80" src="photos/<?php echo $rows['rimage']; ?>"></td>

            <td><?php echo $rows['name']; ?></td>

            <td><?php echo $rows['job']; ?></td>

            <td><?php echo $rows['comment']; ?></td>

            <td>
                <a href="?table=review&delimages=<?php echo $rows['rimage']; ?>&id=<?php echo $rows['rid']; ?>&action=delete">Delete</a>

                &nbsp;|&nbsp;
                <a href="rvupdate.php?rid=<?php echo $rows['rid']; ?>">Update</a>
            </td>

        </tr>

    <?php

    }

    ?>

    <!--Select Table Loop End-->

</table>

<!--REVIEW VIEW SECTION END-->


<?php include('includes/footer.php'); ?>