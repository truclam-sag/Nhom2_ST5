
<?php 
if (isset($_GET['manu-id'])):
    $manu_id = $_GET['manu-id'];
?>
<aside id="fh5co-hero" class="js-fullheight">
			<div class="flexslider js-fullheight">
				<ul class="slides">
				<?php
            $getFeaturedItemByManu = $Product->getFeaturedItemByManu($manu_id, 0, 1);

            // Kiểm tra nếu có dữ liệu
            if (!empty($getFeaturedItemByManu) && count($getFeaturedItemByManu) > 0): 
                foreach ($getFeaturedItemByManu as $value):
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
						<?php 
                endforeach;
            else:
            ?>
                <!-- Hiển thị thông báo nếu không có sản phẩm -->
                <li style="height: 300px; display: flex; align-items: center; justify-content: center; text-align: center;">
                    <div>
						<?php include "feature-items.php"; ?>
                    </div>
                </li>
            <?php endif ?>
				</ul>
			</div>
		</aside>
<?php endif ?>