<?php

require_once("mysqlconn.php");

//Faction table columns: ID Name Leader Location IsSubFaction SubFactionOf Description Motivation
//Location table columns: ID Name Description LocationLevel IsInLocation MetaDescription
// -> LocationLevel set: Universe Planet Country City Neighborhood Lot
//Person table columns: ID Name ShortName Title Gender Description MetaDescription \
// Faction SecretFaction HomeLocation WorkLocation HobbyLocation Motivation

$search_Faction_byID = $conn->prepare("SELECT 
	`f`.`Name` AS FactionName, `p`.`Name` AS LeaderName, `l`.`Name` AS LocationName, 
	`f2`.`Name` AS SubFaction, `f`.`Description`, `f`.`Motivation` 
	FROM `Faction` AS `f` 
	LEFT JOIN `rPersonName` AS `p` ON `f`.`Leader`=`p`.`ID` 
	LEFT JOIN `Location` AS `l` ON `f`.`Location`=`l`.`ID` 
	LEFT JOIN `Faction` AS `f2` ON `f`.`SubFactionOf`=`f2`.`ID`
	WHERE `f`.`ID`=?");
$search_Location_byID = $conn->prepare("SELECT 
	l.Name AS LocationName, l.LocationLevel, l2.Name AS InLocation, l.Description, l.MetaDescription 
	FROM `Location` AS l 
	LEFT JOIN `Location` AS `l2` ON `l`.`IsInLocation`=`l2`.`ID` 
	WHERE l.`ID`=?");
$search_Person_byID = $conn->prepare("SELECT 
	p.Title, p.Name AS PersonName, p.Gender, f.Name AS Faction, f2.Name AS SecretFaction, 
	home.Name AS Home, work.Name AS Work, hobby.Name AS Hobby, p.Description, p.MetaDescription, p.Motivation 
	FROM Person AS p 
	LEFT JOIN `Faction` AS f ON p.Faction = f.ID 
	LEFT JOIN `Faction` AS f2 ON p.SecretFaction = f.ID 
	LEFT JOIN `Location` AS home ON p.HomeLocation = home.ID 
	LEFT JOIN `Location` AS work ON p.WorkLocation = home.ID 
	LEFT JOIN `Location` AS hobby ON p.HobbyLocation = home.ID 
	WHERE p.`ID`=?");
$search_rPersonName_byID = $conn->prepare("SELECT * FROM `rPersonName` WHERE `ID`=?");

$search_Faction_Table = $conn->prepare("SELECT ID,Name FROM `Faction`");
$search_Location_Table = $conn->prepare("SELECT ID,Name FROM `Location`"); 
$search_rPersonName_Table = $conn->prepare("SELECT ID,Name FROM `rPersonName`"); 

$insert_Faction = $conn->prepare("INSERT INTO `Faction` (Name, Leader, Location, SubFactionOf,\
	Description, Motivation) VALUES (?, ?, ?, ?, ?, ?)");
$insert_Location = $conn->prepare("INSERT INTO `Location` (Name, Description, LocationLevel, \
	IsInLocation, MetaDescription) VALUES (?, ?, ?, ?, ?)");
$insert_Person = $conn->prepare("INSERT INTO `Person` (Title, Name, Gender, Faction, SecretFaction, \
	HomeLocation, WorkLocation, HobbyLocation, Description, MetaDescription, Motivation) \
	VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$showcolumn_Faction = $conn->prepare("SHOW COLUMNS FROM Faction");
$showcolumn_Location = $conn->prepare("SHOW COLUMNS FROM Location");
$showcolumn_Person = $conn->prepare("SHOW COLUMNS FROM Person");

$search_Faction_byID->bind_param("s",$query);
$search_Location_byID->bind_param("s",$query);
$search_rPersonName_byID->bind_param("s",$query);
$search_Person_byID->bind_param("s", $query);

?>
