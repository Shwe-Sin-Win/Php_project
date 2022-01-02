<?php
require 'dbconnect.php';
require 'frontEnd_header.php';
require 'frontEnd_nav.php';
$id=$_GET['id'];

$sql="SELECT * FROM brands WHERE id=:id";
$stmt=$conn->prepare($sql);
$stmt->bindParam('id',$id);
$stmt->execute();
$rows=$stmt->fetch(PDO:: FETCH_ASSOC);

//$bid=$rows['id'];
$bname=$rows['name'];


?>

<!-- Subcategory Title -->
	<div class="jumbotron jumbotron-fluid subtitle">
  		<div class="container">
    		<h1 class="text-center text-white"> <?= $bname; ?> </h1>
  		</div>
	</div>

<div class="container">

		<!-- Breadcrumb -->
		<nav aria-label="breadcrumb ">
		  	<ol class="breadcrumb bg-transparent">
		    	<li class="breadcrumb-item">
		    		<a href="index.php" class="text-decoration-none secondarycolor"> Home </a>
		    	</li>
		    	<li class="breadcrumb-item">
		    		<a href="#" class="text-decoration-none secondarycolor"> Brands </a>
		    	</li>
		    	<li class="breadcrumb-item">
		    		<a href="#" class="text-decoration-none secondarycolor"> <?= $bname; ?> </a>
		    	</li>
		  	</ol>
		</nav>

		<div class="row mt-5">
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<ul class="list-group">
					<?php 
			        	 $sql="SELECT * FROM  brands";
			        	 $stmt=$conn->prepare($sql);
			        	 $stmt->execute();
			        	 $brands=$stmt->fetchAll();

			        	 foreach ($brands as $brand) :
                             $bid=$brand['id'];
                             $name=$brand['name'];
			        	 
			        	 	?>

				  	<li class="list-group-item">
				  		<a href="brand.php?id=<?= $bid; ?>" class="text-decoration-none secondarycolor"><?= $name ?></a>
				  	</li>
				  <?php endforeach; ?>
				  	
				</ul>
			</div>	


			<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">

				<div class="row">
                    <?php

		            	$sql="SELECT * FROM items WHERE brand_id=:id";

		            	$stmt = $conn->prepare($sql);
		            	$stmt->bindParam('id',$id);
		            	$stmt->execute();
		            	$items=$stmt->fetchAll();

		            	foreach ($items as $item):
		            		$iid=$item['id'];
		            		$iname=$item['name'];
		            		$iphoto=$item['photo'];
		            		$iprice=$item['price'];
		            		$idiscount=$item['discount'];
		            		$icodeno=$item['codeno'];

		            		?>

					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
						<div class="card pad15 mb-3">
						  	<img src="<?= $iphoto ?>" class="card-img-top" alt="..." style="height: 170px; object-fit: cover;">
						  	
						  	<div class="card-body text-center">
						    	<h5 class="card-title text-truncate"><?= $iname ?></h5>
						    	
						    	<p class="item-price">
		                        	<?php if($idiscount): ?>
		                        	<strike><?= $iprice; ?> Ks</strike> 
		                        	<span class="d-block"><?= $iprice-$idiscount; ?> Ks</span>

		                        	<?php else: ?>
		                        		<span class="d-block"><?= $iprice; ?> Ks</span>
		                        	<?php endif ?>
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

								<a href="#" class="addtocartBtn text-decoration-none" data-id="<?= $iid ?>" data-name="<?= $iname ?>" data-codeno="<?= $icodeno ?>" data-photo="<?= $iphoto ?>" data-price="<?= $iprice ?>" data-discount="<?= $idiscount ?>">Add to Cart</a>
						  	</div>
						</div>
					
					</div>
				<?php endforeach; ?>

				</div>
				<nav aria-label="Page navigation example">
					<ul class="pagination justify-content-end">
					    <li class="page-item disabled">
					      	<a class="page-link" href="#" tabindex="-1" aria-disabled="true"><i class="icofont-rounded-left"></i>
					      	</a>
					    </li>
					    <li class="page-item">
					    	<a class="page-link" href="#">1</a>
					    </li>
					    <li class="page-item active">
					    	<a class="page-link" href="#">2</a>
					    </li>
					    <li class="page-item">
					    	<a class="page-link" href="#">3</a>
					    </li>
					    <li class="page-item">
					      	<a class="page-link" href="#">
					      		<i class="icofont-rounded-right"></i>
					      	</a>
					    </li>
					</ul>
				</nav>
			</div>
		</div>

		
</div>

<?php
	require 'frontEnd_footer.php';

?>