<?php 
	function fromTable($table,$id=-1){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "pfa";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
		} 
		$sql ="";
		if($id==-1){
			$sql = "select * from " . $table .";";
		}else{
			$sql = "select * from competition where id = $id ;";
		}
		$array = array();
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $array[] = $row;
    }
	}
	return $array;
	}
?>