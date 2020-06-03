<?php include('header.php'); ?>
<body>
<?php include('navbar.php'); ?>
<div class="container">
	<h1 class="page-header text-center">Pasūtījumi</h1>
	<table class="table table-striped table-bordered">
		<thead>
			<th>Datums</th>
			<th>Iznomātājs</th>
			<th>Pakalpojuma cena</th>
			<th>Info</th>
		</thead>
		<tbody>
			<?php 
				$sql="select * from purchase order by purchaseid desc";
				$query=$conn->query($sql);
				while($row=$query->fetch_array()){
					?>
					<tr>
						<td><?php echo date('M d, Y h:i A', strtotime($row['date_purchase'])) ?></td>
						<td><?php echo $row['customer']; ?></td>
						<td class="text-right">&euro; <?php echo number_format($row['total'], 2); ?></td>
						<td><a href="#details<?php echo $row['purchaseid']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span> Apskatīt </a>
							<?php include('sales_modal.php'); ?>
						</td>
					</tr>
					<?php
				}
			?>
		</tbody>
	</table>
</div>
</body>
</html>