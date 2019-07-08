<?php
$query = mysql_query(
	"SELECT
	`simulators`.`id` AS `simulator_id`,
	`simulators`.`name` AS `simulator_name`,
	`simulators`.`date` AS `simulator_date`,
	`simulators`.`description` AS `simulator_description`,
	`simulators`.`client_id` AS `client_id`
	FROM `simulators`
	WHERE
	`simulators`.`id` = ".$s."
	");
	$row = mysql_fetch_array($query);
	
$simulator_name = $_POST['simulator_name'];
$simulator_date = $_POST['simulator_date'];
$simulator_description = $_POST['simulator_description'];
?>
<div class="cd">
<?php 
	$query = mysql_query("UPDATE simulators SET `simulators`.`name` = '$simulator_name', `simulators`.`date` = '$simulator_date', `simulators`.`description` = '$simulator_description' WHERE `simulators`.`id` = '$s'"); 
?>
<div class="cl_upd"><?php if ($query == TRUE) {echo 'Ваши данные успешно добавленны!';} else {echo '!Ошибка!';}?></div>
</div>
<script>
someTimeout = 2000; // редирект через 2 секунду
window.setTimeout("document.location = '<?php echo "?c=".$row['client_id']."&s=".$req2['simulator_id']."";?> '", someTimeout);
</script>