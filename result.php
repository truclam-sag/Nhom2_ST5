<?php 
include "header.php"; 
if (isset($_GET['keyword'])) :
    $keyword = $_GET['keyword'];
    // hiển thị 2 sản phẩm trên 1 trang
    $count = 3;
    // Lấy số trang trên thanh địa chỉ
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    // Tính tổng số dòng, ví dụ kết quả là 18
    $total = count($Product->searchAll($keyword));
    // lấy đường dẫn đến file hiện hành
    $url = $_SERVER['PHP_SELF'] . "?keyword=" . $keyword;
?>


<div id="fh5co-product">
		<div class="container text-center">
			<!-- <div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<span>Cool Stuff</span>
					<h2>Products.</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div> -->
			<div class="row" style="display: flex; flex-wrap: wrap; justify-content: space-between;">
				<?php 
                $search = $Product->search($keyword,$page, $count);
                foreach ($search as $value):
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
			<div class="pagination col-12 d-flex justify-content-center text-center" style="font-size: 20px;">
                            <?php echo $Product->paginateCoTuKhoa($url, $total, $count, $page) ?>
                </div>
		</div>
	</div>


<?php include "started.php" ?>	

<?php
endif; include "footer.php"; ?>