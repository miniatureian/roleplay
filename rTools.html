<?php
require_once("mysqlconn.php");

$table = $_GET["table"];
$query = $_GET["query"];

function buildNameList($sql){
	$sql->execute();
	$result=$sql->get_result();

	echo "<form><table name=\"nameList\">";
	while($row = $result->fetch_assoc()){
		echo "<tr><th><span id=\"$row[ID]\" onclick=\"fillValues(this.id)\">$row[Name]</span></tr>";
	}
	echo "</table></form>";

	$result->close();
	$sql->close();
}

function buildItem($sql){
	$sql->execute();
	$result=$sql->get_result();
	while($row=$result->fetch_assoc()){
		foreach($row as $key=>$value){
			echo "$key - $value<br>";
		}
	}
}

//echo "finished initializing functions<br>";

if($query == "TODO"){
	//echo "starting switch1 case<br>";
	switch($table){
	case "rPersonName":
		buildNameList($search_rPersonName_Table);
		break;
	case "Faction":
		buildNameList($search_Faction_Table);
		break;
	case "Location":
		buildNameList($search_Location_Table);
		break;
	default:
		break;
	}
}else{
	//echo "switch case2 t:$table q:$query<br>";
	switch($table){
	case "rPersonName":
		buildItem($search_rPersonName_byID);
		break;
	case "Faction":
		buildItem($search_Faction_byID);
		break;
	case "Location":
		buildItem($search_Location_byID);
		break;
	default:
		break;
	}
}
?>

