<?php

include("../includes/config.php");
include("functions/blog.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- theme meta -->
    <meta name="theme-name" content="focus" />
    <title>Focus Admin: Creative Admin Dashboard</title>
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <!-- Styles -->
    <link href="css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="css/lib/chartist/chartist.min.css" rel="stylesheet">
    <link href="css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="css/lib/themify-icons.css" rel="stylesheet">
    <link href="css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="css/lib/weather-icons.css" rel="stylesheet" />
    <link href="css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="css/lib/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <?php include("includes/left.php"); ?>

    <?php include("includes/header.php"); ?>


    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="offset-lg-8 col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Blog</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Blog</h4>
                                    <a href="blog_create.php" class="btn btn-primary btn-sm pull-right">Create New</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Title</th>
                                                    <th>Slug</th>
                                                    <th>Caption</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                                <tr>
                                                    <form method="get" action="" id="filter-params">
                                                        <th>#</th>
                                                        <th><input class="form-control" type="text" name="params[title]" value="<?= isset($_GET['params']['title']) ? $_GET['params']['title'] : "" ?>" /></th>
                                                        <th><input class="form-control" type="text" name="params[slug]" value="<?= isset($_GET['params']['slug']) ? $_GET['params']['slug'] : "" ?>" /></th>
                                                        <th><input class="form-control" type="text" name="params[caption]" value="<?= isset($_GET['params']['caption']) ? $_GET['params']['caption'] : "" ?>" /></th>
                                                        <th><input class="form-control" type="text" name="params[date]" value="<?= isset($_GET['params']['date']) ? $_GET['params']['date'] : "" ?>" /></th>
                                                        <th><input type="submit" hidden /></th>
                                                    </form>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach (fetchIndex($connection, isset($_GET['params']) ? $_GET['params'] : []) as $index => $model) : ?>
                                                    <tr>
                                                        <td><?= $index + 1 ?></td>
                                                        <td><?= $model->title ?></td>
                                                        <td><?= $model->slug ?></td>
                                                        <td><?= $model->caption ?></td>
                                                        <td><?= date('d/m/Y', strtotime($model->date)) ?></td>
                                                        <td>[U] [D]</td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php include("includes/footer.php"); ?>
                </section>
            </div>
        </div>
    </div>

    <!-- jquery vendor -->
    <script src="js/lib/jquery.min.js"></script>
    <script src="js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="js/lib/menubar/sidebar.js"></script>
    <script src="js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->

    <script src="js/lib/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
    <!-- bootstrap -->

    <script src="js/lib/calendar-2/moment.latest.min.js"></script>
    <script src="js/lib/calendar-2/pignose.calendar.min.js"></script>
    <script src="js/lib/calendar-2/pignose.init.js"></script>


    <script src="js/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="js/lib/weather/weather-init.js"></script>
    <script src="js/lib/circle-progress/circle-progress.min.js"></script>
    <script src="js/lib/circle-progress/circle-progress-init.js"></script>
    <script src="js/lib/chartist/chartist.min.js"></script>
    <script src="js/lib/sparklinechart/jquery.sparkline.min.js"></script>
    <script src="js/lib/sparklinechart/sparkline.init.js"></script>
    <script src="js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/lib/owl-carousel/owl.carousel-init.js"></script>
    <!-- scripit init-->
    <script src="js/dashboard2.js"></script>
</body>

</html>