	<?php include("header.php"); ?>


		<div class="vacation-table-container">
		<h2><?php echo $_POST["empName"] . " " . $_POST["empLastName"];?></h2>
		<table class="vacation-table">
			<thead>
				<tr class="vacation-table-header">
					<th>Start date</th>
					<th>End date</th>
					<th>Type</th>
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

					$sql = "SELECT vacation.startdate, employee.personal, employee.sick, employee.vacation, 
						vacation.enddate, vacation.type 
							FROM vacation, employee
							WHERE vacation.employee_employeeid = " . $_POST["empID"] . 
							" AND vacation.employee_employeeid = employee.employeeid";
							
					$result = $conn->query($sql);

					if($result->num_rows > 0){
						while ($row = $result->fetch_assoc()){
							echo "<tr class=\"vacation-row\">";
							echo "<td>" . $row["startdate"] . "</td>";
							echo "<td>" . $row["enddate"] . "</td>";
							echo "<td>" . $row["type"] . "</td></tr>";
							function myGetType($row["startdate"])
    {
        if (is_array($var)) return "array";
        if (is_bool($var)) return "boolean";
        if (is_float($var)) return "float";
        if (is_int($var)) return "integer";
        if (is_null($var)) return "NULL";
        if (is_numeric($var)) return "numeric";
        if (is_object($var)) return "object";
        if (is_resource($var)) return "resource";
        if (is_string($var)) return "string";
        return "unknown type";
    }
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