<?php	
$lib_types_name = $_POST['lib_types_name'];
$lib_types_description = $_POST['lib_types_description'];

$query = mysql_query("INSERT INTO lib_types (name,description) 
	VALUES('$lib_types_name','$lib_types_description')");
?>
<div class="cd">
<div class="cl_upd"><?php 	if ($query== TRUE) {echo "Ваши данные успешно добавленны!";} else {echo "Ошибка";}?></div>
</div>
<script>
someTimeout = 2000; // редирект через 2 секунду
window.setTimeout("document.location = '<?php echo "/type-libs";?> '", someTimeout);
</script>