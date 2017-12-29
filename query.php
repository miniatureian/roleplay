<?php

require_once("mysqlconn.php");
$search_Faction_byID = $conn->prepare("SELECT * FROM `Faction` WHERE `ID`=?");
$search_Location_byID = $conn->prepare("SELECT * FROM `Location` WHERE `ID`=?");
$search_rPersonName_byID = $conn->prepare("SELECT * FROM `rPersonName` WHERE `ID`=?");

$search_Faction_Table = $conn->prepare("SELECT ID,Name FROM `Faction`");
$search_Location_Table = $conn->prepare("SELECT ID,Name FROM `Location`"); 
$search_rPersonName_Table = $conn->prepare("SELECT ID,Name FROM `rPersonName`"); 

$insert_Person = $conn->prepare("INSERT INTO `Person` (Name, ShortName, Title, Gender, Description,\
	 MetaDescription, Faction, SecretFaction, HomeLocation, WorkLocation, HobbyLocation, Motivation) \
	VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$insert_Faction = $conn->prepare("INSERT INTO `Faction` (Name, Leader, Location, IsSubFaction, SubFactionOf,\
	Description, Motivation) VALUES (?, ?, ?, ?, ?, ?, ?)");
$insert_Location = $conn->prepare("INSERT INTO `Location` (Name, Description, LocationLevel, \
	IsInLocation, MetaDescription) VALUES (?, ?, ?, ?, ?)");
$showcolumn_Faction = $conn->prepare("SHOW COLUMNS FROM Faction");
$showcolumn_Location = $conn->prepare("SHOW COLUMNS FROM Location");
$showcolumn_Person = $conn->prepare("SHOW COLUMNS FROM Person");

$search_Faction_byID->bind_param("s",$query);
$search_Location_byID->bind_param("s",$query);
$search_rPersonName_byID->bind_param("s",$query);

?>