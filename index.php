


	<?php include("header.php"); ?>

	<h2>Vacations</h2>
	<div class="main-table-container">
		<table class="main-table">
			<thead>
				<tr class="main-table-header-row">
					<th></th>
					<th>Name</th>
					<th>Last Name</th>
					<th>Personal</th>
					<th>Sick</th>
					<th>Vacation</th>
				</tr>
			</thead>
			<tbody>
				<?php
					//database variables
					$serverName = "localhost";
					$userName = "root";
					$password = "root";
					$dbName = "vacationsdb";
					$conn = new mysqli($serverName, $userName, $password, $dbName);

					//Connect
					if($conn->connect_error){
						die("Connection failed : " . $conn->connect_error);
					}

					$sql = "SELECT employeeid, name, lastname, sick, personal, vacation from employee";
					$result = $conn->query($sql);

					if($result->num_rows > 0){
						while ($row = $result->fetch_assoc()){
							echo "<tr class=\"employee-row\">";
							echo "<td><form action=\"details.php\" method = \"post\">";
							echo "<input type = \"submit\" value=\"Details\">";
							echo "<input type=\"hidden\" name=\"var\" value=\"" . 
								$row["employeeid"] . "\"></form></td>";
							echo "<td id=\"name\">" . $row["name"] . "</td>";
							echo "<td>" . $row["lastname"] . "</td>";
							echo "<td>" . $row["sick"] . "</td>";
							echo "<td>" . $row["personal"] . "</td>";
							echo "<td>" . $row["vacation"] . "</td></tr>";
						}
					}
					else{
						echo "0 results";
					}

					//close connection
					$conn->close();
				?>
			</tbody>
		</table>
	</div>


	<?php include("footer.php"); ?>














