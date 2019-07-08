<?php
// Данные с формы
$simulator_name = $_POST['simulator_name'];
$simulator_date = $_POST['simulator_date'];
$simulator_description = $_POST['simulator_description'];
//----------------------------------------------------------
// SQL запрос
$query = mysql_query(
	"INSERT INTO simulators (name, date,description,client_id) 
	VALUES('$simulator_name','$simulator_date','$simulator_description','$c')
	");
//--------------------------------------------------------------------------
?>
<div class="cd">
<div class="cl_upd"><?php 	if ($query== TRUE) {echo "Ваши данные успешно добавленны!";} else {echo "Ошибка";}?></div>
</div>
<script>
someTimeout = 2000; // редирект через 2 секунду
window.setTimeout("document.location = '<?php echo "?c=$c";?> '", someTimeout);
</script>