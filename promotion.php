 <?php
include 'frontEnd_header.php';
include 'frontEnd_nav.php';

require 'dbconnect.php';


?>
<!-- Subcategory Title -->
	<div class="jumbotron jumbotron-fluid subtitle">
  		<div class="container">
    		<h1 class="text-center text-white"> Promotion Items </h1>
  		</div>
	</div>

<!-- Content -->
	<div class="container mt-5">


		<div class="row">
            <div class="col">
                <div class="bbb_viewed_title_container">
                    <h3 class="bbb_viewed_title"> Discount </h3>
                    <div class="bbb_viewed_nav_container">
                        <div class="bbb_viewed_nav bbb_viewed_prev"><i class="icofont-rounded-left"></i></div>
                        <div class="bbb_viewed_nav bbb_viewed_next"><i class="icofont-rounded-right"></i></div>
                    </div>
                </div>
                <div class="bbb_viewed_slider_container">
                    <div class="owl-carousel owl-theme bbb_viewed_slider">

                        <?php 
			        	 $sql="SELECT * FROM items WHERE discount !='' ORDER BY rand()";
			        	 $stmt=$conn->prepare($sql);
			        	 
			        	 $stmt->execute();
			        	 $items=$stmt->fetchAll();

			        	 foreach ($items as $item) :
                             $iid=$item['id'];
                             $iname=$item['name'];
                             $iphoto=$item['photo'];
                             $iprice=$item['price'];
                             $idiscount=$item['discount'];
			        	 
			        	 	?>

					    <div class="owl-item">
					        <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
					            <div class="pad15">
					        		<img src="<?= $iphoto ?>" class="img-fluid">
					            	<p class="text-truncate"><?= $iname ?></p>
					            	<p class="item-price">
					            		<strike><?= $iprice ?>Ks</strike> 
					            		<span class="d-block"><?= $idiscount ?>Ks</span>
					            	</p>

					                <div class="star-rating">
										<ul class="list-inline">
											<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
											<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
											<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
											<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
											<li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
										</ul>
									</div>

									<a href="#" class="addtocartBtn text-decoration-none">Add to Cart</a>
					        	</div>
					        </div>
					    </div>

					    <?php endforeach; ?>

					</div>
                </div>
            </div>
        </div>

	</div>
	

<?php
		include 'frontEnd_footer.php';

?>