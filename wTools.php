<?php
require_once("query.php");

//$query = $_GET["query"];

//some precalculated strings
function gender(){
	return "<div class=\"dropdown\"><button class=\"btn btn-secondary dropdown-toggle\" type=\"button\" id=\"Gender\" data-toggle=\"dropdown\" value\"M\">M</button><div class=\"dropdown-menu\" aria-labelledby=\"Gender\"><button class=\"dropdown-item\ active" value\"M\">M</button><button class=\"dropdown-item\" value\"F\">F</button></div></div>";
}
function locationlevel(){
	// -> LocationLevel set: Universe Planet Country City Neighborhood Lot
	return "<div class=\"dropdown\">
		  <button class=\"btn btn-secondary dropdown-toggle\" type=\"button\" id=\"LocationLevel\" data-toggle=\"dropdown\" value=\"Lot\">Lot</button>
		  <div class=\"dropdown-menu\" aria-labelledby=\"LocationLevel\">
			<button class=\"dropdown-item\" value=\"Universe\">Universe</button>
			<button class=\"dropdown-item\" value=\"Planet\">Planet</button>
			<button class=\"dropdown-item\" value=\"Country\">Country</button>
			<button class=\"dropdown-item\" value=\"City\">City</button>
			<button class=\"dropdown-item\" value=\"Neighborhood\">Neighborhood</button>
			<button class=\"dropdown-item active\" value=\"Lot\">Lot</button>
		  </div>
		</div>";
}

function buildNameList($sql, $t){
	$sql->execute();
	$result=$sql->get_result();
	$payload = "<div class=\"row container-fluid\">
		<form method=\"post\" action=\"/api/roleplay/wTools.php?table=\"$t>
		<button type=\"submit\">Submit</button>";
		
	while($row = $result->fetch_assoc()){
		
		if(array_search("ID",$row)){}else
		{
			$payload .= "<div class=\"row col-sm-auto\">";
			$payload .= "<label class=\"\">$row[Field]</label><br>";
			
			if(array_search("Gender",$row)) $payload .= gender();
			else if (array_search("LocationLevel",$row)) payload .= locationlevel();
			//else if (array_search("",$row))
			//else if (array_search("",$row))
			else $payload .= "<input type=\"text\" id=\"$row[Field]\"></input></div>";
		}
	}
	echo $payload."</form></div>";
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
	case "Faction":
		//$insert_Faction->bind_params("ssssss",p("Name"),\
		//p("Leader"),p("Location"),p("SubFactionOf"),\
		//p("Description"),p("Motivation"));
		//buildInsert($insert_Faction, $table);
		break;
	case "Location":
		//$insert_Location->bind_params("ssss",p("Name"),\
		//p("Description"),p("LocationLevel"),p("IsInLocation"));
		//buildInsert($insert_Location, $table);
		break;
	case "Person": 
	//Title, Name, Gender, Faction, SecretFaction, HomeLocation, 
	//WorkLocation, HobbyLocation, Description, Motivation
		//$insert_Person->bind_params("ssssssssss",p("Title"),\
		//p("Name"),p("Gender"),p("Faction"),p("SecretFaction"),\
		//p("HomeLocation"),p("WorkLocation"),p("HobbyLocation"),\
		//p("Description"),p("Motivation"));
		//buildInsert($insert_Person,$table)
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

