<?php include('connection.php'); ?>
<?php
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}
?>
<?php include('includes/header.php'); ?>

<br>

<!--RENT CAR VIEW SECTION START-->


<br>

<b>Rent Car Listing Page:<b><br>

<?php

//Start Delete Query

    if ($_GET['table'] == "car") {
        $sqls = "DELETE from rent_car where cid=$_GET[id]";
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

        <td align="center" bgcolor="#66FF66">CAPACITY </td>

        <td align="center" bgcolor="#66FF66">MILEAGE</td>

        <td align="center" bgcolor="#66FF66">FEATURES</td>

        <td align="center" bgcolor="#66FF66">CATEGORY</td>

        <td align="center" bgcolor="#66FF66">ACTION</td>
    </tr>

    <!--Select Query Start-->

    <?php

    $sqls3 = "SELECT * From rent_car";
    $result3 = $con->query($sqls3);

    //Select Query End

    //table row while loop start

    while ($rows = $result3->fetch_assoc()) {

    ?>

        <tr>

            <!--Select Table Loop Start-->


            <td><?php echo $rows['cid']; ?></td>

            <td><img width="80" height="80" src="photos/<?php echo $rows['cimage']; ?>"></td>

            <td><?php echo $rows['name']; ?></td>

            <td><?php echo $rows['capacity']; ?></td>

            <td><?php echo $rows['mileage']; ?></td>

            <td><?php echo $rows['features']; ?></td>

            <td><?php echo $rows['category']; ?></td>


            <td>
                <a href="?table=car&delimages=<?php echo $rows['cimage']; ?>&id=<?php echo $rows['cid']; ?>&action=delete">Delete</a>

                &nbsp;|&nbsp;
                <a href="rcupdate.php?cid=<?php echo $rows['cid']; ?>">Update</a>
            </td>

        </tr>

    <?php

    }

    ?>

    <!--Select Table Loop End-->

</table>


<!--RENT CAR VIEW SECTION END-->


<?php include('includes/footer.php'); ?>