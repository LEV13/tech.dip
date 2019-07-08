<?php
$reque1 = mysql_query(
"SELECT
	`clients`.`id` AS `client_id`,
	`clients`.`name` AS `client_name`
	FROM `clients`
	WHERE `clients`.`id` = ".$c."
	");
$req1 = mysql_fetch_array($reque1);
if ($s != NULL) {
$reque2 = mysql_query(
"SELECT
	`simulators`.`id` AS `simulator_id`,
	`simulators`.`name` AS `simulator_name`
	FROM `simulators`
	WHERE `simulators`.`id` = ".$s."
	");
$req2 = mysql_fetch_array($reque2);
}
if ($l != NULL) {
$reque3 = mysql_query(
"SELECT
	`libs`.`id` AS `lib_id`,
	`libs`.`name` AS `lib_name`,
	`libs`.`code` AS `lib_code`
	FROM `libs`
	WHERE `libs`.`id` = ".$l."
	");
$req3 = mysql_fetch_array($reque3);
}
if ($e != NULL) {
$reque4 = mysql_query(
"SELECT
	`elements`.`id` AS `element_id`,
	`elements`.`name` AS `element_name`,
	`elements`.`code` AS `element_code`,
	`elements`.`description` AS `element_description`
	FROM `elements`
	WHERE `elements`.`id` = ".$e."
	");
$req4 = mysql_fetch_array($reque4);
}

?>