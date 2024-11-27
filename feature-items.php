
<aside id="fh5co-hero" class="js-fullheight">
			<div class="flexslider js-fullheight">
				<ul class="slides">
					<?php
					$getFeaturedItem = $Product->getFeaturedItem(0, 4);
					foreach ($getFeaturedItem as $value):
					?>
						<li style="background-size: cover;background-position: center;height: 300px; background-image: url(images/<?php echo $value['image'] ?>);">
							<div class="overlay-gradient"></div>
							<div class="container">
								<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
									<div class="slider-text-inner">
										<div class="desc">
											<span class="price"><?php echo $value['price'] ?> VNĐ</span>
											<h2><?php echo $value['name'] ?></h2>
											<p style="color: #333; font-size: 16px; line-height: 1.5;">
												<?php echo $value['excerpt'] ?>
											</p>
											<p><a href="single.html" class="btn btn-primary btn-outline btn-lg">Purchase Now</a></p>
										</div>
									</div>
								</div>
							</div>
						</li>
					<?php endforeach ?>
				</ul>
			</div>
		</aside>