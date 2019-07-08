<?php
$lib_name = $_POST['lib_name'];
$lib_code = $_POST['lib_code'];
$lib_description = $_POST['lib_description'];
$lib_type = $_POST['lib_type'];

$query = mysql_query(
	"SELECT
	`libs`.`id` AS `lib_id`,
	`libs`.`name` AS `lib_name`,
	`libs`.`code` AS `lib_code`,
	`libs`.`description` AS `lib_description`
	FROM `libs`
	WHERE
	`libs`.`id` = '$l'
	");
	$row = mysql_fetch_array($query);
	
$query1 = mysql_query(
	"SELECT
		`lib_types`.`id` AS `lib_types_id`,
		`lib_types`.`name` AS `lib_types_name`
		FROM `lib_types`
		WHERE `lib_types`.`id` = '$lib_type'
	");
$row1 = mysql_fetch_array($query1);

?>
<div class="cd">
<?php 
	$query2 = mysql_query("UPDATE libs SET `libs`.`name` = '$lib_name', `libs`.`code` = '$lib_code', `libs`.`description` = '$lib_description', `libs`.`lib_type_id` = '".$row1['lib_types_id']."' WHERE `libs`.`id` = '$l'"); 
?>
<div class="cl_upd"><?php if ($query2 == TRUE) {echo 'Ваши данные успешно добавленны!';} else {echo "$lib_type";}?></div>
</div>
<script>
someTimeout = 2000; // редирект через 2 секунду
window.setTimeout("document.location = '<?php echo "?c=".$req1['client_id']."&s=".$req2['simulator_id']."&l=".$req3['lib_id']."";?> '", someTimeout);
</script>