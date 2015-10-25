<?php
	include 'header.php';

	// Displays a list of results, using values from the query string.
	
	// Obtain results
	include 'db_musicians.php';
?>

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Search results</h3>
		</div>
		<div class="panel-body">
			<table>

				<!-- Header row -->
				<tr>
					<th>Name</th>
					<th>Born on</th>
				</tr>

				<?php 
					// Iterate over the results obtained earlier
					while($mus_stmt->fetch()) { 
				?>

					<tr>
						<td>
							<?php
								// Echo full name
								$name = $db_mus_fname;
								if($db_mus_mname != 'null') {
									$name .= ' ' . $db_mus_mname;
								}
								$name .= ' ' . $db_mus_lname;
								echo $name;
							?>
						</td>

						<td><?php echo $db_mus_dob; ?></td>
					</tr>

				<?php 
					} 
				?>

			</table>
		</div>
	<div>

<?php
	include 'footer.php';
?>