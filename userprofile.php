<?php
include 'header.php';
?>
<div class="jumbotron">
    <?php
    if ($_GET['edit'] == "on") {
        ?>
        <span class="material-icons" style="font-size:36px"></span>
        <p>This is under Construction</p>
        <?php
    }else{
        ?>
        <span class="material-icons" style="font-size:36px"></span>
        <p>This is under Construction</p>
        <?php
    }
    ?>
</div>
<?php
include 'footer.php';
?>