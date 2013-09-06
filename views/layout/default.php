
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">

    <title><?= Anaconda_Core::get_product_name() ?></title>
    <?=$_css_file?>
    <style>
        body {
            padding-top: 50px;
        }
        .starter-template {
            padding: 40px 15px;
            text-align: center;
        }
    </style>
</head>

<body>

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?= Anaconda_Core::get_product_name() ?></a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <?
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
        </div><!--/.nav-collapse -->
    </div>
</div>

<div class="container">
    <?=View::factory('crumbs', array('crumbs' => $crumbs))?>
    <?=$content?>
</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<?=$_js_file?>
</body>
</html>
