<?php	
$elem_tags_name = $_POST['elem_tags_name'];

$query = mysql_query("INSERT INTO tags (name) 
	VALUES('$elem_tags_name')");
?>
<div class="cd">
<div class="cl_upd"><?php 	if ($query== TRUE) {echo "Ваши данные успешно добавленны!";} else {echo "Ошибка";}?></div>
</div>
<script>
someTimeout = 2000; // редирект через 2 секунду
window.setTimeout("document.location = '<?php echo "/tags-elements";?> '", someTimeout);
</script>