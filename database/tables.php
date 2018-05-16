<?php 
	function fromTable($table,$id=-1){
		include 'connect_mysql.php';
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
	$conn->close();
	return $array;
	}
?>