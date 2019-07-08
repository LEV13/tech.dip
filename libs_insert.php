<?php
$lib_name = $_POST['lib_name'];
$lib_code = $_POST['lib_code'];
$lib_description = $_POST['lib_description'];

$query = mysql_query("INSERT INTO libs (name, code,description,simulator_id) 
	VALUES('$lib_name','$lib_code','$lib_description','$s')");
?>
<div class="cd">
<div class="cl_upd"><?php 	if ($query == TRUE) {echo "Ваши данные успешно добавленны!";} else {echo "Ошибка";}?></div>
</div>
<script>
someTimeout = 2000; // редирект через 2 секунду
window.setTimeout("document.location = '<?php echo "?c=$c&s=$s";?> '", someTimeout);
</script>