
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
            <?=View::factory('navbar/main')?>
            <?=View::factory('navbar/right')?>
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
