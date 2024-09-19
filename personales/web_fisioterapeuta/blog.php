<?php
    include "connect.php";


    $sql = "SELECT * FROM escapastic ORDER BY id DESC";
    $cantidadArticulos = 9;
    $contador=0;
    $resultado = mysqli_query($enlace, $sql);
    $arrayName = [];
    while($row = mysqli_fetch_assoc($resultado)) {
        $contador++;
        array_push($arrayName, $row);
    }

?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Blog</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/sTablado.css">
</head>
<body>

    <!--Header Start-->
      <?php include "header.php" ;?>
    <!--Header Ends-->
    <main>
        <!--? Hero Start -->
        <div class="slider-area2">
            <div class="slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap hero-cap2 text-center">
                                <h2>Blog</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->
        <!--================Blog Area =================-->
        <section class="blog_area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-8">
                            <?php
                                $contadorPagina=1;
                                for ($i=0; $i <count($arrayName) ; $i++) {
                                    echo '<article class="blog_item">';
                                    echo '<div class="blog_item_img">';
                                    echo '<img class="card-img rounded-0" src="images/blog/'.$arrayName[$i]['imagen'].'" alt="">
                                        <a href="#" class="blog_item_date">';
                                    echo '<p>'.$arrayName[$i]["fecha"].'</p>';
                                    echo '</a>';
                                    echo '</div>
                                        <div class="blog_details">
                                        <a class="d-inline-block" href="'.$arrayName[$i]['url'].'">
                                        <h2 class="blog-head" style="color: #2d2d2d;">'.$arrayName[$i]['titulo'].'</h2>
                                        </a>
                                        <p>'.$arrayName[$i]['descripcion'].'</p>
                                        </div>';
                                    echo '</article>';
                                    $contadorI = $i + 1;
                                    if ($cantidadArticulos == $contadorI) {
                                        echo('</div>');
                                    }
                                    if ($contadorI >= $cantidadArticulos) {
                                        if (($contadorI % $cantidadArticulos)==0) {
                                            echo '</div>';
                                            echo '<div id="blog-'.$contadorPagina.'" style="display:none;">';
                                            $contadorPagina++;
                                        }
                                    }
                                }
                            ?>

                    <div class="col-lg-12 col-xs-12">
                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <?php
                                    $cantidadPaginas = $contador / $cantidadArticulos;
                                    for ($i=0; $i < $cantidadPaginas;$i++) {
                                        $imasuno = $i + 1;
                                        echo "<li class='page-item'><a class='page-link' href='#inicio' onclick='mostrar(".$i.");'>".$imasuno."</a></li>";
                                    }
                                ?>
                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 postsRecientes">
                        <div class="blog_right_sidebar">
                            <aside class="single_sidebar_widget popular_post_widget">
                                <h3 class="widget_title" style="color: #2d2d2d;">Post recientes</h3>
                                    <?php
                                        for($i=0;$i<4;$i++){
                                            if ($i == count($arrayName)) {
                                                break;
                                            } else {
                                        echo'<div class="media post_item">
                                                <img src="images/blog/'.$arrayName[$i]['imagen'].'" alt="post" style="max-width:40%;">
                                                <div class="media-body">
                                                    <a href="'.$arrayName[$i]['url'].'">
                                                        <h3 style="color: #2d2d2d;">'.$arrayName[$i]['titulo'].'</h3>
                                                    </a>
                                                        <p>'.$arrayName[$i]['fecha'].'</p>
                                                    </div>
                                                </div>';
                                            }
                                        }
                                    ?>
                            </aside>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!--================Blog Area =================-->
    </main>
    <footer>
        <!--? Footer Start-->
          <?php include "footer.php" ;?>
        <!-- Footer End-->
    </footer>
    <!-- Scroll Up -->
    <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->

    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>

    <!-- Nice-select, sticky -->
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>
    <script type="text/javascript">
        function mostrar(idBlog) {
            for (var i = 0; i <= <?php echo $cantidadPaginas; ?>; i++) {
                document.getElementById('blog-'+i).style.display='none';
            }
            document.getElementById('blog-'+idBlog).style.display='block';
        }
    </script>
    </body>
</html>
