	<?php include("header.php"); ?>
	<?php
		//database variables
		$serverName = "localhost";
		$userNAme = "root";
		$password = "root";
		$dbNAme = "vacationsdb";

		//prepare data before inserting to the database
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			$name = prepareInput($_POST["name"]);
			$lastName = prepareInput($_POST["lastName"]);
			$status = prepareInput($_POST["status"]);
			$empType = prepareInput($_POST["empType"]);
			$personal = prepareInput($_POST["personal"]);
			$sick = prepareInput($_POST["sick"]);
			$vacation = prepareInput($_POST["vacation"]);
			$startDate = prepareInput($_POST["startDate"]);
		}

		//FUNCTION: To prepare data
		function prepareInput($data){
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		//Instert data into database
		if($_SERVER["REQUEST_METHOD"] == ["POST"]){

			$insertConn = new mysqli($serverName, $userNAme, $password, $dbNAme);
			if($insertConn->connect_error){
				die("Connection filed: " . $insertConn->connect_error);
			}
			if (!$stmt = $insertConn->prepare("INSERT INTO employee (name, lastName, status, empType, personal, sick,
				vacation, startDate), values (?, ?, ?, ?, ?, ?, ?, ?)")){
				echo "prepare failed: " . $insertConn->error;;
			}
			$stmt->bind_param("ssssiiis", $name, $lastName, $$status, $empType, $personal, $sick, $vacation, $startDate);
			if(!$stmt->execute()){
				echo "Execution failed: " . $stmt->error;
			}
			//close statement and connection
			$stmt->close;
			$insertConn->close;
		}

	?>

	<?php include("footer.php"); ?>