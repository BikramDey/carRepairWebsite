<?php include('connection.php'); ?>
<?php
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}
?>
<?php include('includes/header.php'); ?>

<br>

<b>Banner Listing Page:<b>
<br>


<?php

    //Start Delete Query

    if ($_GET['table'] == "banner") {
        $sqls = "DELETE from banner where bid=$_GET[id]";
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

        <td align="center" bgcolor="#66FF66">PICTURES</td>

        <td align="center" bgcolor="#66FF66">TITLE </td>

        <td align="center" bgcolor="#66FF66">DETAIL</td>

        <td align="center" bgcolor="#66FF66">ACTION</td>
    </tr>

    <!--Select Query Start-->

    <?php

    $sqls = "SELECT * From banner";
    $result = $con->query($sqls);

    //Select Query End

    //table row while loop start

    while ($rows = $result->fetch_assoc()) {

    ?>

        <tr>

            <!--Select Table Loop Start-->


            <td><?php echo $rows['bid']; ?></td>

            <td><img width="80" height="80" src="photos/<?php echo $rows['bimage']; ?>"></td>

            <td><?php echo $rows['title']; ?></td>

            <td><?php echo $rows['detail']; ?></td>


            <td>
                <a href="?table=banner&delimages=<?php echo $rows['bimage']; ?>&id=<?php echo $rows['bid']; ?>&action=delete">Delete</a>

                &nbsp;|&nbsp;
                <a href="bnupdate.php?bid=<?php echo $rows['bid']; ?>">Update</a>
            </td>

        </tr>

    <?php

    }

    ?>

    <!--Select Table Loop End-->

</table>


<?php include('includes/footer.php'); ?>