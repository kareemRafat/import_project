

<a class="btn btn-primary" href="?action=add">Add Product</a>
				<br>
				<br>
				<table class="table table-hover table-bordered table-striped">
					<thead>
						<tr>
							<th>id</th>
							<th>name</th>
							<th>price</th>
							<th>sale</th>
							<th>image</th>
							<th>category</th>
							<th>controlls</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						include 'functions/connect.php';
						$select = "SELECT * FROM products";
						$query 	= $conn -> query($select);
						foreach($query as $product) {
						 ?>
						<tr>
							<td><?= $product['id'] ?></td>
							<td><?= $product['name'] ?></td>
							<td><?= $product['price'] ?></td>
							<td><?= $product['sale'] ?></td>
							<td><img class="img-responsive" src="images/<?= $product['img'] ?>" alt=""></td>
							<td><?php 
							$cat_id = $product['cat_id'] ;
							$selectCat = "SELECT name FROM category WHERE id = $cat_id";
							$queryCat = $conn -> query($selectCat);
							$cat = $queryCat -> fetch_assoc();
							echo $cat['name'];

							 ?></td>
							<td>
								<a class="btn btn-primary" href="">Edit</a>
								<a class="btn btn-danger" href="">Delete</a>

							</td>
						</tr>
					<?php } ?>
					</tbody>
	
				</table>