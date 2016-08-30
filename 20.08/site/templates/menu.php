<?php

$menu = array(
    'Main' => 'index.php',
    'Contact' => 'index.php?page=contact',
    'Admin panel' => 'index.php?page=admin',
    'Logout' => 'index.php?action=logout',
);

?>
<nav>
    <h4>Menu:</h4>
    <ul>
        <?php foreach ($menu as $title => $link) { ?>
            <li><a href="<?php echo $link ?>"><?php echo $title ?></a></li>
        <?php } ?>
    </ul>

    <h4>Users pages:</h4>
    <ul>
        <?php
        $search = array('./users_pages/', '.html');
        foreach (glob("./users_pages/*.html") as $filename) { ?>
            <li><a href="<?php echo $filename; ?>" target="_blank"><?php echo(str_replace($search, '', $filename)); ?></a></li>
        <?php } ?>
    </ul>

   
</nav>









