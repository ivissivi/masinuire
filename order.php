<?php include('header.php'); ?>
<body>
<?php include('navbar.php'); ?>
<div class="container">
	<h1 class="page-header text-center">Pasūtīt</h1>
	<form method="POST" action="purchase.php">
		<table class="table table-striped table-bordered">
			<thead>
				<th class="text-center"><input type="checkbox" id="checkAll"></th>
				<th>Kategorija</th>
				<th>Mašīnas modelis</th>
				<th>Cena</th>
				<th>Dienas</th>
			</thead>
			<tbody>
				<?php 
					$sql="select * from product left join category on category.categoryid=product.categoryid order by product.categoryid asc, productname asc";
					$query=$conn->query($sql);
					$iterate=0;
					while($row=$query->fetch_array()){
						?>
						<tr>
							<td class="text-center"><input type="checkbox" value="<?php echo $row['productid']; ?>||<?php echo $iterate; ?>" name="productid[]" style=""></td>
							<td><?php echo $row['catname']; ?></td>
							<td><?php echo $row['productname']; ?></td>
							<td class="text-right">&euro; <?php echo number_format($row['price'], 2); ?></td>
							<td><input type="text" class="form-control" name="quantity_<?php echo $iterate; ?>"></td>
						</tr>
						<?php
						$iterate++;
					}
				?>
			</tbody>
		</table>
		
		<div class="row">
			<div class="col-md-3">
				<input type="text" name="customer" class="form-control" placeholder="Customer Name" required>
			</div>
			<div class="col-md-2" style="margin-left:-20px;">
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Saglabāt</button>
			</div>
		</div>
	</form>
</div>
</body>
</html>