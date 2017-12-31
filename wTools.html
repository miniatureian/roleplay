<?php
require_once("mysqlconn.php");

//$query = $_GET["query"];

function buildNameList($sql, $t){
	$sql->execute();
	$result=$sql->get_result();

	echo "<form method=\"post\" action=\"/api/wTools.php?table=\"$t><table name=\"columnName\">";
	while($row = $result->fetch_assoc()){
		if(array_search("ID",$row)){}else
			echo "<tr><th><span>$row[Field]</span><th><input type=\"text\" name=\"$row[Field]\"></input></tr>";
	}
	echo "</table><button type=\"submit\"></form>";

	$result->close();
	$sql->close();
}

function buildInsert($sql,$t){
	$sql->execute();
	$result=$sql->get_result();
	while($row=$result->fetch_assoc()){
		foreach($row as $key=>$value){
			echo "$key - $value<br>";
		}
	}
}

function p($str){
	return $_POST["$str"];
}

if(isset($_POST["table"])){
	$table = $_POST["table"];
	switch($table)
	{
	case "Person":
		//$insert_Person->bind_params("ssssssssssss",p("Name"),\
		//p("ShortName"),p("Title"),p("Gender"),p("Description"),\
		//p("MetaDescription"),p("Faction"),p("SecretFaction"),\
		//p("HomeLocation"),p("WorkLocation"),p("HobbyLocation"),\
		//p("Motivation"));
		//buildInsert($insert_Person,$table)
		break;
	case "Faction":
		//$insert_Faction->bind_params("sssssss",p("Name"),\
		//p("Leader"),p("Location"),p("IsSubFaction"),\
		//p("SubFactionOf"),p("Description"),p("Motivation"));
		//buildInsert($insert_Faction, $table);
		break;
	case "Location":
		//$insert_Location->bind_params("sssss",p("Name"),\
		//p("Description"),p("LocationLevel"),p("IsInLocation")\
		//p("MetaDescription"));
		//buildInsert($insert_Location, $table);
		break;
	default:
		break;
	}
}else
{
	$table = $_GET["table"];
	switch($table)
	{
	case "Person":
		buildNameList($showcolumn_Person,$table);
		break;
	case "Faction":
		buildNameList($showcolumn_Faction,$table);
		break;
	case "Location":
		buildNameList($showcolumn_Location,$table);
		break;
	default:
		break;
	}
}
?>

