<div id="fh5co-product">
			<div class="container">
				<div class="row animate-box">
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
						<span>Cool Stuff</span>
						<h2>Products.</h2>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
					</div>
				</div>
				<div class="row"  style="display: flex; flex-wrap: wrap; justify-content: space-between;">
					<?php 
                    $getNewProduct = $Product->getNewProduct(0, 6);
                    foreach ($getNewProduct as $value):
						//var_dump($getAllProduct);
					?>
						<div class="col-md-4 text-center animate-box">
							<div class="product">
								<div class="product-grid" style="background-image:url(images/<?php echo $value['image'] ?>);">
									<div class="inner">
										<p>
											<a href="single.html" class="icon"><i class="icon-shopping-cart"></i></a>
											<a href="single.html" class="icon"><i class="icon-eye"></i></a>
										</p>
									</div>
								</div>
								<div class="desc">
									<h3><a href="single.html"><?php echo $value['name'] ?></a></h3>
									<span class="price">
										<?php echo $value['price']; ?>
										<span style="font-size: 0.7em; vertical-align: super; text-decoration: underline; text-transform: lowercase;">đ</span>
									</span>
								</div>
							</div>
						</div>
					<?php endforeach ?>
				</div>
                <div class="xemThem text-center">
                    <a href="products.php">Xem Thêm</a>
                </div>
			</div>
		</div>