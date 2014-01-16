<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= Anaconda_Core::get_product_name() ?></title>

    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-TileColor" content="#5bc0de">
    <meta name="msapplication-TileImage" content="/media/img/metis-tile.png">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/media/lib/bootstrap/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="/media/lib/Font-Awesome/css/font-awesome.min.css">

    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="/media/css/main.css">
    <link rel="stylesheet" href="/media/css/theme.css">
    <link rel="stylesheet" href="/media/lib/fullcalendar-1.6.2/fullcalendar/fullcalendar.css">
    <link rel="stylesheet" href="/media/lib/uniform/themes/default/css/uniform.default.css">
    <link rel="stylesheet" href="/media/lib/datatables/css/DT_bootstrap.css">
    <link rel="stylesheet" href="/media/lib/tagsinput/jquery.tagsinput.css">
    <link rel="stylesheet" href="/media/lib/chosen/chosen.min.css">
    <link rel="stylesheet" href="/media/css/chosen-bootstrap.css">
    <link rel="stylesheet" href="/media/css/bootstrap-fileupload.min.css">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/flick/jquery-ui.css">

    <script src="/media/lib/jquery.min.js"></script>
    <script src="/media/lib/bootstrap/js/bootstrap.min.js"></script>

    <style>
        div.dataTables_length {
            position: absolute;
            right: 10px;
            top: 14px;
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>
    <script src="/media/lib/html5shiv/html5shiv.js"></script>
    <script src="/media/lib/respond/respond.min.js"></script>
    <![endif]-->

    <!--Modernizr 3.0-->
    <script src="/media/lib/modernizr-build.min.js"></script>
</head>
<body>
<div id="wrap">
    <div id="top">

        <!-- .navbar -->
        <nav class="navbar navbar-inverse navbar-static-top">

            <!-- Brand and toggle get grouped for better mobile display -->
            <header class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="/" class="navbar-brand" style="padding-top: 5px;">
                    <img src="/media/img/logo.png" alt="">
                </a>
            </header>

            <?=View::factory('navbar/main')?>
            <?=View::factory('navbar/right')?>

            <div class="collapse navbar-collapse navbar-ex1-collapse">

            </div>
        </nav><!-- /.navbar -->

        <!-- header.head -->
        <header class="head">

        </header>

        <!-- end header.head -->
    </div><!-- /#top -->

    <div id="content">
        <div class="outer">
            <div class="inner">
                <?=$crumbs?>
                <?=$content?>
            </div>
            <!-- end .inner -->
        </div>
    </div>
    <!-- end #content -->
</div><!-- /#wrap -->
<div id="footer">
    <p>2013 &copy; SiteSoft</p>
</div>

<script type="text/javascript" src="/media/js/style-switcher.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="/media/lib/fullcalendar-1.6.2/fullcalendar/fullcalendar.min.js"></script>
<script src="/media/lib/tablesorter/js/jquery.tablesorter.min.js"></script>
<script src="/media/lib/sparkline/jquery.sparkline.min.js"></script>
<script src="/media/lib/flot/jquery.flot.js"></script>
<script src="/media/lib/flot/jquery.flot.selection.js"></script>
<script src="/media/lib/flot/jquery.flot.resize.js"></script>

<script src="/media/lib/datatables/jquery.dataTables.js"></script>
<script src="/media/lib/datatables/DT_bootstrap.js"></script>
<script src="/media/lib/tablesorter/js/jquery.tablesorter.min.js"></script>
<script src="/media/lib/touch-punch/jquery.ui.touch-punch.min.js"></script>
<script src="/media/lib/inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
<script src="/media/lib/autosize/jquery.autosize.min.js"></script>
<script src="/media/lib/chosen/chosen.jquery.min.js"></script>
<script src="/media/lib/uniform/jquery.uniform.min.js"></script>
<script src="/media/lib/tagsinput/jquery.tagsinput.min.js"></script>
<script src="/media/js/main.js"></script>

<script>
    $(function() {
        // TODO: refactor

        $( document ).on( "click", ".btn-danger", function(ev) {
            var text = "Вы действительно хотите это сделать?";

            if ( $(this).attr("alt") ) {
                text = $(this).attr("alt");
            }
            return confirm(text);
        } );

        $(".chzn-select").chosen();

        $(".chzn-select-deselect").chosen({
            allow_single_deselect: true
        });

        $('.int-spinner').spinner();


        metisTable();
        //metisSortable();
    });
</script>

</body>
</html>