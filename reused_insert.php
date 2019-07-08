<?php
$reused = $_POST['reused'];


$query = mysql_query("INSERT INTO reused_libs (lib_id, simulator_id) 
	VALUES('$reused','$s')");
?>
<div class="cd">
<div class="cl_upd"><?php 	if ($query== TRUE) {echo "Ваши данные успешно добавленны!";} else {echo "Ошибка";}?></div>
</div>
<script>
someTimeout = 2000; // редирект через 2 секунду
window.setTimeout("document.location = '<?php echo "?c=$c&s=$s";?> '", someTimeout);
</script>