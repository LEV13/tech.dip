<?php
$query = mysql_query(
"SELECT
	`tags`.`id` AS `tags_id`,
	`tags`.`name` AS `tags_name`
	FROM `tags`
	WHERE
	`tags`.`id` = ".$l."
	");
	$row = mysql_fetch_array($query);
	
$tags_name = $_POST['tags_name'];
?>
<div class="cd">
<?php 
	$query = mysql_query("UPDATE tags SET `tags`.`name` = '$elem_types_name' WHERE `tags`.`id` = '$l'"); 
?>
<div class="cl_upd"><?php if ($query == TRUE) {echo 'Ваши данные успешно добавленны!';} else {echo '!Ошибка!';}?></div>
</div>
<script>
someTimeout = 2000; // редирект через 2 секунду
window.setTimeout("document.location = '<?php echo "?l=".$row['tags_id'];?> '", someTimeout);
</script>