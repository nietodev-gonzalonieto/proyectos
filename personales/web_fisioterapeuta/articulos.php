<?php
    include "connect.php";
	$publicacion = $_GET["num"];
    $sql = "SELECT * FROM articulos WHERE id = $publicacion";
    $resultado = mysqli_query($enlace, $sql);
    $arrayName = [];
    while($row = mysqli_fetch_assoc($resultado)) {
        array_push($arrayName, $row);
    }

    $sql = "SELECT * FROM escapastic ORDER BY id DESC";
    $cantidadArticulos = 4;
    $contador=0;
    $resultado2 = mysqli_query($enlace, $sql);
    $arrayName2 = [];
    while($row2 = mysqli_fetch_assoc($resultado2)) {
        $contador++;
        array_push($arrayName2, $row2);
    }
?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title><?php echo $arrayName[0]['tituloParrafo1']; ?></title>
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
	<link rel="stylesheet" href="assets/css/slick.css">
	<link rel="stylesheet" href="assets/css/nice-select.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/sTablado.css">

</head>
<body>

  
      <!--Header Start-->
        <?php include "header.php" ;?>
      <!-- Header End -->
   <main class="articulo">
      <!--? Hero Start -->
      <div class="slider-area2">
         <div class="slider-height2 d-flex align-items-center">
               <div class="container">
                  <div class="row">
                     <div class="col-xl-12">
                           <div class="hero-cap hero-cap2 text-center">
                              <h2 class="tituloParrafo1"><?php echo $arrayName[0]['tituloParrafo1']; ?></h2>
                           </div>
                     </div>
                  </div>
               </div>
         </div>
      </div>
      <!-- Hero End -->
      <!--================Blog Area =================-->
      <section class="blog_area single-post-area section-padding">
         <div class="container">
            <div class="row">

               <div class="col-lg-8 posts-list">
                  <div class="single-post">
                  	<?php
                    	// Primera
	                    if (empty($arrayName[0]['imagenPrincipal'])) {
	                    	echo '<article class="blog_item">';
	                        echo '<div class="blog_item_img">
	                            <div>
	                            <h2 style="color: #2d2d2d;">'.$arrayName[0]['tituloParrafo1'].'</h2>
	                            <p class="excert">'.$arrayName[0]['parrafo1'].'</p>
	                            </div>';
	                    } else if (empty($arrayName[0]['tituloParrafo1'])) {
                        	echo '<article class="blog_item">';
	                        echo '<div class="blog_item_img">';
	                       	echo '<div class="feature-img">
		                        <img class="img-fluid" src="images/blog/'.$arrayName[0]['imagenPrincipal'].'" alt="">';
	                        echo '</a>';
	                        echo '</div>
	                            <div>
	                            <p class="excert">'.$arrayName[0]['parrafo1'].'</p>
	                            </div>';

                        } else if (empty($arrayName[0]['parrafo1'])) {
                    		echo '<article class="blog_item">';
	                        echo '<div class="blog_item_img">';
	                       	echo '<div class="feature-img">
		                        <img class="img-fluid" src="images/blog/'.$arrayName[0]['imagenPrincipal'].'" alt="">';
	                        echo '</a>';
	                        echo '</div>
	                            <div>
	                            <h2 style="color: #2d2d2d;">'.$arrayName[0]['tituloParrafo1'].'</h2>
	                            </div>';
                        } else {
                        	echo '<article class="blog_item">';
	                        echo '<div class="blog_item_img">';
	                       	echo '<div class="feature-img">
		                        <img class="img-fluid" src="images/blog/'.$arrayName[0]['imagenPrincipal'].'" alt="">';
	                        echo '</a>';
	                        echo '</div>
	                            <div>
	                            <h2 style="color: #2d2d2d;">'.$arrayName[0]['tituloParrafo1'].'</h2>
	                            <p class="excert">'.$arrayName[0]['parrafo1'].'</p>
	                            </div>';
                        }
                        // Segunda
                        if (empty($arrayName[0]['imagen2'])) {
                        	echo '<article class="blog_item">';
	                        echo '<div class="blog_item_img">
	                            <div>
	                            <h2 style="color: #2d2d2d;">'.$arrayName[0]['tituloParrafo2'].'</h2>
	                            <p class="excert">'.$arrayName[0]['parrafo2'].'</p>
	                            </div>';
                        } else if (empty($arrayName[0]['tituloParrafo2'])) {
                        	echo '<article class="blog_item">';
	                        echo '<div class="blog_item_img">';
	                       	echo '<div class="feature-img">
		                        <img class="img-fluid" src="images/blog/'.$arrayName[0]['imagen2'].'" alt="">';
	                        echo '</a>';
	                        echo '</div>
	                            <div>
	                            <p class="excert">'.$arrayName[0]['parrafo2'].'</p>
	                            </div>';

                        } else if (empty($arrayName[0]['parrafo2'])) {
                    		echo '<article class="blog_item">';
	                        echo '<div class="blog_item_img">';
	                       	echo '<div class="feature-img">
		                        <img class="img-fluid" src="images/blog/'.$arrayName[0]['imagen2'].'" alt="">';
	                        echo '</a>';
	                        echo '</div>
	                            <div>
	                            <h2 style="color: #2d2d2d;">'.$arrayName[0]['tituloParrafo2'].'</h2>
	                            </div>';
                        } else {
                        	echo '<article class="blog_item">';
	                        echo '<div class="blog_item_img">';
	                       	echo '<div class="feature-img">
		                        <img class="img-fluid" src="images/blog/'.$arrayName[0]['imagen2'].'" alt="">';
	                        echo '</a>';
	                        echo '</div>
	                            <div>
	                            <h2 style="color: #2d2d2d;">'.$arrayName[0]['tituloParrafo2'].'</h2>
	                            <p class="excert">'.$arrayName[0]['parrafo2'].'</p>
	                            </div>';
                        }
                        // Tercero
                        if (empty($arrayName[0]['imagen3'])) {
                        	echo '<article class="blog_item">';
	                        echo '<div class="blog_item_img">
	                            <div>
	                            <h2 style="color: #2d2d2d;">'.$arrayName[0]['tituloParrafo3'].'</h2>
	                            <p class="excert">'.$arrayName[0]['parrafo3'].'</p>
	                            </div>';
                        } else if (empty($arrayName[0]['tituloParrafo3'])) {
                        	echo '<article class="blog_item">';
	                        echo '<div class="blog_item_img">';
	                       	echo '<div class="feature-img">
		                        <img class="img-fluid" src="images/blog/'.$arrayName[0]['imagen3'].'" alt="">';
	                        echo '</a>';
	                        echo '</div>
	                            <div>
	                            <p class="excert">'.$arrayName[0]['parrafo3'].'</p>
	                            </div>';

                        } else if (empty($arrayName[0]['parrafo3'])) {
                    		echo '<article class="blog_item">';
	                        echo '<div class="blog_item_img">';
	                       	echo '<div class="feature-img">
		                        <img class="img-fluid" src="images/blog/'.$arrayName[0]['imagen3'].'" alt="">';
	                        echo '</a>';
	                        echo '</div>
	                            <div>
	                            <h2 style="color: #2d2d2d;">'.$arrayName[0]['tituloParrafo3'].'</h2>
	                            </div>';
                        } else {
                        	echo '<article class="blog_item">';
	                        echo '<div class="blog_item_img">';
	                       	echo '<div class="feature-img">
		                        <img class="img-fluid" src="images/blog/'.$arrayName[0]['imagen3'].'" alt="">';
	                        echo '</a>';
	                        echo '</div>
	                            <div>
	                            <h2 style="color: #2d2d2d;">'.$arrayName[0]['tituloParrafo3'].'</h2>
	                            <p class="excert">'.$arrayName[0]['parrafo3'].'</p>
	                            </div>';
                        }
                        // Cuarto
                        if (empty($arrayName[0]['imagen4'])) {
                        	echo '<article class="blog_item">';
	                        echo '<div class="blog_item_img">
	                            <div>
	                            <h2 style="color: #2d2d2d;">'.$arrayName[0]['tituloParrafo4'].'</h2>
	                            <p class="excert">'.$arrayName[0]['parrafo4'].'</p>
	                            </div>';
                        } else if (empty($arrayName[0]['tituloParrafo4'])) {
                        	echo '<article class="blog_item">';
	                        echo '<div class="blog_item_img">';
	                       	echo '<div class="feature-img">
		                        <img class="img-fluid" src="images/blog/'.$arrayName[0]['imagen4'].'" alt="">';
	                        echo '</a>';
	                        echo '</div>
	                            <div>
	                            <p class="excert">'.$arrayName[0]['parrafo4'].'</p>
	                            </div>';

                        } else if (empty($arrayName[0]['parrafo4'])) {
                    		echo '<article class="blog_item">';
	                        echo '<div class="blog_item_img">';
	                       	echo '<div class="feature-img">
		                        <img class="img-fluid" src="images/blog/'.$arrayName[0]['imagen4'].'" alt="">';
	                        echo '</a>';
	                        echo '</div>
	                            <div>
	                            <h2 style="color: #2d2d2d;">'.$arrayName[0]['tituloParrafo4'].'</h2>
	                            </div>';
                        } else {
                        	echo '<article class="blog_item">';
	                        echo '<div class="blog_item_img">';
	                       	echo '<div class="feature-img">
		                        <img class="img-fluid" src="images/blog/'.$arrayName[0]['imagen4'].'" alt="">';
	                        echo '</a>';
	                        echo '</div>
	                            <div>
	                            <h2 style="color: #2d2d2d;">'.$arrayName[0]['tituloParrafo4'].'</h2>
	                            <p class="excert">'.$arrayName[0]['parrafo4'].'</p>
	                            </div>';
                        }
                        // Quinto
                        if (empty($arrayName[0]['imagen5'])) {
                        	echo '<article class="blog_item">';
	                        echo '<div class="blog_item_img">
	                            <div>
	                            <h2 style="color: #2d2d2d;">'.$arrayName[0]['tituloParrafo5'].'</h2>
	                            <p class="excert">'.$arrayName[0]['parrafo5'].'</p>
	                            </div>';
                        } else if (empty($arrayName[0]['tituloParrafo5'])) {
                        	echo '<article class="blog_item">';
	                        echo '<div class="blog_item_img">';
	                       	echo '<div class="feature-img">
		                        <img class="img-fluid" src="images/blog/'.$arrayName[0]['imagen5'].'" alt="">';
	                        echo '</a>';
	                        echo '</div>
	                            <div>
	                            <p class="excert">'.$arrayName[0]['parrafo5'].'</p>
	                            </div>';

                        } else if (empty($arrayName[0]['parrafo5'])) {
                    		echo '<article class="blog_item">';
	                        echo '<div class="blog_item_img">';
	                       	echo '<div class="feature-img">
		                        <img class="img-fluid" src="images/blog/'.$arrayName[0]['imagen5'].'" alt="">';
	                        echo '</a>';
	                        echo '</div>
	                            <div>
	                            <h2 style="color: #2d2d2d;">'.$arrayName[0]['tituloParrafo5'].'</h2>
	                            </div>';
                        } else {
                        	echo '<article class="blog_item">';
	                        echo '<div class="blog_item_img">';
	                       	echo '<div class="feature-img">
		                        <img class="img-fluid" src="images/blog/'.$arrayName[0]['imagen5'].'" alt="">';
	                        echo '</a>';
	                        echo '</div>
	                            <div>
	                            <h2 style="color: #2d2d2d;">'.$arrayName[0]['tituloParrafo5'].'</h2>
	                            <p class="excert">'.$arrayName[0]['parrafo5'].'</p>
	                            </div>';
                        }
                	     ?>
                  </div>
               </div>
            </div>
         </div>
         </div>
       </div>
     </div>
     <div class="col-xl-4 col-lg-4 col-md-4 postsRecientes">
             <div class="blog_right_sidebar">
                 <aside class="single_sidebar_widget popular_post_widget">
                     <h3 class="widget_title" style="color: #2d2d2d;">Post recientes</h3>
                         <?php
                             for($i=0;$i<4;$i++){
                                 if ($i == count($arrayName2)) {
                                     break;
                                 } else {
                             echo'<div class="media post_item">
                                     <img src="images/blog/'.$arrayName2[$i]['imagen'].'" alt="post" style="max-width:40%;">
                                     <div class="media-body">
                                         <a href="'.$arrayName2[$i]['url'].'">
                                             <h3 style="color: #2d2d2d;">'.$arrayName2[$i]['titulo'].'</h3>
                                         </a>
                                             <p>'.$arrayName2[$i]['fecha'].'</p>
                                         </div>
                                     </div>';
                                 }
                             }
                         ?>
                 </aside>
             </div>
         </div>
      </section>
      <!--================ Blog Area end =================-->
   </main>
   <!--Footer Start-->
     <?php include "footer.php" ;?>
   <!--Footer Ends-->
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
   <script src="./assets/js/jquery.magnific-popup.js"></script>

   <!-- Nice-select, sticky -->
   <script src="./assets/js/jquery.nice-select.min.js"></script>
   <script src="./assets/js/jquery.sticky.js"></script>

   <!-- contact js -->
   <script src="./assets/js/contact.js"></script>
   <script src="./assets/js/jquery.form.js"></script>
   <script src="./assets/js/jquery.validate.min.js"></script>
   <script src="./assets/js/mail-script.js"></script>
   <script src="./assets/js/jquery.ajaxchimp.min.js"></script>

   <!-- Jquery Plugins, main Jquery -->
   <script src="./assets/js/plugins.js"></script>
   <script src="./assets/js/main.js"></script>

   </body>
</html>
