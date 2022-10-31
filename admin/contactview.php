
<?php include('connection.php'); ?>
<?php
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}
?>
<?php include('includes/header.php'); ?>

<br>

<!----contact list view section start---->

<br>

<b>Contact Insert Database:</b><br>


<?php

    //Start Delete Query

    if ($_GET['table'] == "contact") {
        $sqls = "DELETE FROM contact WHERE fid=$_GET[id]";
        $con->query($sqls);
        header('Location: '.$_SERVER['PHP_SELF']);
        exit;
    }

?>


<!--Html Part Start-->


<table width="100%" border="1" align="center" class="viewTable">

    <tr>
        <td align="center" bgcolor="#66FF66">ID</td>

        <td align="center" bgcolor="#66FF66">NAME</td>

        <td align="center" bgcolor="#66FF66">EMAIL</td>

        <td align="center" bgcolor="#66FF66">PHONE</td>

        <td align="center" bgcolor="#66FF66">MESSAGE</td>

        <td align="center" bgcolor="#66FF66">ACTION</td>
    </tr>



    <!--Select Query Start-->

    <?php

        $sqls5 = "SELECT * FROM contact";
        $result5 = $con->query($sqls5);

        //Select Query End

        //table row while loop start

        while ($rows = $result5->fetch_assoc()) {

    ?>

    <tr>

            <!--Select Table Loop Start-->

        <form method="post" action="" enctype="multipart/form-data">

            <td><?php echo $rows['fid']; ?></td>

            <td><?php echo $rows['name']; ?></td>

            <td><?php echo $rows['email']; ?></td>

            <td><?php echo $rows['phone']; ?></td>

            <td><?php echo $rows['message']; ?></td>

        </form>
        <td>
            <a href="?table=contact&id=<?php echo $rows['fid']; ?>&action=delete">Delete</a>
            &nbsp;|&nbsp;
            <a href="index_update.php?page=pageinsertedit&csl=<?php echo $rows['csl']; ?>">Update</a>
        </td>

    </tr>

    <?php

        }

    ?>

    <!--Select Table Loop End-->

</table>

<!--Html Part End-->


<!----contact list view section end---->


<?php include('includes/footer.php'); ?>