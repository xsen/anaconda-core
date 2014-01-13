<ul class="nav navbar-nav">
<?php
    $top_menu = Kohana::$config->load('top_menu')->as_array();
    asort($top_menu);

    foreach ($top_menu as $_item_menu) {
        if ( !$_item_menu['access'] ) continue;

        $class = in_array(Request::current()->controller(), $_item_menu['controllers']) ? 'active' : null;

        if ( !isset($_item_menu['children']) ) {
            echo '<li class="' . $class . '"><a href="' . $_item_menu['url'] . '">' . $_item_menu['name'] . '</a></li>';
        }else {?>
            <li class="dropdown <?=$class?>">
                <a href="<?=$_item_menu['url']?>" class="dropdown-toggle" data-toggle="dropdown"><?=$_item_menu['name']?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <? foreach ($_item_menu['children'] as $_child_item) :?>
                        <? if ( !$_child_item['access'] ) continue; ?>
                        <li><a href="<?=$_child_item['url']?>"><?=$_child_item['name']?></a></li>
                    <?endforeach;?>
                </ul>
            </li>
        <?}
    }
?>

</ul>
