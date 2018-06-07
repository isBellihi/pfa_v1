<?php
function whereAttr($table,$attr,$co,$value){
	include 'connect_mysql.php';
	$sql = "select * from " .  $table . " where " . $attr . " " . $co . " '" . $value ."' ;";
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
function fromTable($table,$id=-1){
	include 'connect_mysql.php';
	$sql ="";
	if($id==-1){
		$sql = "select * from " . $table .";";
	}else{
		$sql = "select * from " . $table . " where id = '$id' ;";
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

	/**
	 * [itemsOfTable description] 
	 * select table2.* from table1,table2 where table1.id_table2 = table2.id
	 * @param  [type]  $table1    items sous table
	 * @param  integer $id_table1 [description]
	 * @param  [type]  $table2    [description]
	 * @return [type]             [description]
	 */
	/* les etablissement de l'universite de id = 'id'*/
	function itemsOfTable($table1,$table2,$id){
		include 'connect_mysql.php';
		/*select competition.* from etablissement , competition where etablissement.id=competition.id_etab and competition.id_etab = 1; */
		$sql = " select $table1.* from $table2 , $table1 where $table2.id=$table1.id_$table2 and $table1.id_$table2 = $id;";
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
	//$eteblissements = itemsofTable("etablissement","universite" ,1);
	//itemsofTable("competition","etablissement" ,1);
	function search($table1,$list){
		
	}
	?>