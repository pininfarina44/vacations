	<?php include("header.php"); ?>


		<div class="vacation-table-container">
		<table class="vacation-table">
			<thead>
				<tr class="vacation-table-header">
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

					$sql = "SELECT vacationid, vacation.startdate, enddate, type 
							FROM vacation, employee
							WHERE vacation.employee_employeeid = " . $_POST["var"];
					$result = $conn->query($sql);

					if($result->num_rows > 0){
						while ($row = $result->fetch_assoc()){
							echo "<tr class=\"vacation-row\">";
							echo "<td class=\"vacation-cell\">" . $row["type"] . "</td>";
							echo "<td>" . $row["startdate"] . "</td>";
							echo "<td>" . $row["enddate"] . "</td></tr>";
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