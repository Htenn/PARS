<?php
    if($_SESSION['session'] == 'A') {
        $menu = 'adminmenu.php';
    } else {
        $menu = 'mainmenu.php';
    }
?>

<div style='position: fixed; float: left; margin-left: 15px; margin-top: 15px; color: grey;'>
    <ul class='actions'>
        <li><a href="<?php echo $menu;?>" class="button primary small">Menu</a></li>
    </ul>
</div>