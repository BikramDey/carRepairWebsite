<?php include('connection.php'); ?>
<?php
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}
?>
<?php include('includes/header.php'); ?>

<br>

<!--ADD Page Insert VIEW SECTION START-->




<br>

<b>Page Insert Database:</b><br>


<?php

//Start Delete Query

if ($_GET['table'] == "about") {
    $sqls = "DELETE from about where aid=$_GET[id]";
    $con->query($sqls);


    /*Images Delete*/
    $delimages = $_GET['delimages'];
    $delimgpath = "photos/" . $delimages;
    unlink($delimgpath);
    header('Location: '.$_SERVER['PHP_SELF']);
    exit;
}

?>


<!--Html Part Start-->


<table width="100%" border="1" align="center" class="viewTable">

    <tr>
        <td align="center" bgcolor="#66FF66">ID</td>

        <td align="center" bgcolor="#66FF66">CONTENT</td>

        <td align="center" bgcolor="#66FF66">IMAGE</td>

        <td align="center" bgcolor="#66FF66">ACTION</td>
    </tr>



    <!--Select Query Start-->

    <?php

        $sqls2 = "SELECT * FROM about";
        $result2 = $con->query($sqls2);

        //Select Query End

        //table row while loop start

        while ($rows = $result2->fetch_assoc()) {

    ?>



        <tr>
            <!--Select Table Loop Start-->

            <form method="post" action="" enctype="multipart/form-data">

                <td><?php echo $rows['aid']; ?></td>

                <td><?php echo $rows['explanation']; ?></td>

                <td><img width="80" height="80" src="photos/<?php echo $rows['aimage']; ?>"></td>

            </form>

            <td>
                <a href="?table=about&id=<?php echo $rows['aid']; ?>&delimages=<?php echo $rows['aimage']; ?>&action=delete">Delete</a>
                &nbsp;|&nbsp;
                <a href="abtupdate.php?aid=<?php echo $rows['aid']; ?>">Update</a>
            </td>

        </tr>

    <?php
        }
    ?>

    <!--Select Table Loop End-->

</table>

<!--Html Part End-->


<!--ADD Page Insert VIEW SECTION END-->


<?php include('includes/footer.php'); ?>