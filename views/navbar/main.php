<ul class="nav navbar-nav">
    <?php
    $top_menu = Kohana::$config->load('top_menu')->as_array();
    asort($top_menu);

    foreach ($top_menu as $_item_menu) {
        if ( !$_item_menu['access'] )
            continue;

        $class = in_array(Request::current()->controller(), $_item_menu['controllers']) ? 'class="active"' : null;
        echo '<li ' . $class . '><a href="' . $_item_menu['url'] . '">' . $_item_menu['name'] . '</a></li>';
    }
    ?>
</ul>
