<?php
require_once("query.php");

//$query = $_GET["query"];

//some precalculated strings
function gender(){
	return "<div class=\"btn-group dropright\">
		  <button class=\"btn btn-secondary dropdown-toggle\" type=\"button\" id=\"gender\" data-toggle=\"dropdown\" value=\"M\">M<span class=\"caret\"></span></button>
		  <div class=\"dropdown-menu btn btn-secondary align-top\" aria-labelledby=\"gender\">
			<button type=\"button\" class=\"dropdown-item btn btn-secondary\" 
			id=\"M\" value=\"gender\" onclick=\"ddfill(this)\">M</button>
			<button type=\"button\" class=\"dropdown-item btn btn-secondary\" 
			id=\"F\" value=\"gender\" onclick=\"ddfill(this)\">F</button>
		  </div>
		</div></div>";
}
function locationlevel(){
	// -> LocationLevel set: Universe Planet Country City Neighborhood Lot
	return "<div class=\"btn-group dropright\">
		  <button class=\"btn btn-secondary dropdown-toggle\" type=\"button\" id=\"LocationLevel\" data-toggle=\"dropdown\" value=\"Lot\">Lot<span class=\"caret\"></span></button>
		  <div class=\"dropdown-menu btn btn-secondary align-bottom\" aria-labelledby=\"LocationLevel\">
			<button type=\"button\" class=\"dropdown-item btn btn-secondary\" 
			id=\"Universe\" value=\"LocationLevel\" onclick=\"ddfill(this)\">Universe</button>
			<button type=\"button\" class=\"dropdown-item btn btn-secondary\" 
			id=\"Planet\" value=\"LocationLevel\" onclick=\"ddfill(this)\">Planet</button>
		  </div>
		</div></div>";
}

function buildNameList($sql, $t){
	$sql->execute();
	$result=$sql->get_result();
	$payload = "<form method=\"post\" action=\"/api/roleplay/wTools.php?table=\"$t>
		<button type=\"submit\">Submit</button>
		<div class=\"container-fluid\">
		<div class=\"row\">";
		
	while($row = $result->fetch_assoc()){
		
		if(array_search("ID",$row)){}
		else{
			$payload .= "<div class=\"col-sm\">";
			$payload .= "<label class=\"\">$row[Field]</label><br>";
			
			if(array_search("Gender",$row)) $payload .= gender();
			else if (array_search("LocationLevel",$row)) $payload .= locationlevel();
			//else if (array_search("",$row))
			//else if (array_search("",$row))
			else $payload .= "<input type=\"text\" id=\"$row[Field]\"></input></div>";
		}
	}
	echo $payload."</div></div></form>";
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

