<?php	
$elem_types_name = $_POST['elem_types_name'];

$query = mysql_query("INSERT INTO element_types (name) 
	VALUES('$elem_types_name')");
?>
<div class="cd">
<div class="cl_upd"><?php 	if ($query== TRUE) {echo "Ваши данные успешно добавленны!";} else {echo "Ошибка";}?></div>
</div>
<script>
someTimeout = 2000; // редирект через 2 секунду
window.setTimeout("document.location = '<?php echo "/type-elements";?> '", someTimeout);
</script>