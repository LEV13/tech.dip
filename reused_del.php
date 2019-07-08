<?php

$query = mysql_query("DELETE FROM `reused_libs` WHERE `lib_id` = $libs AND `simulator_id` = $s");
?>
<div class="cd">
<div class="cl_upd"><?php 	if ($query== TRUE) {echo "Ваши данные успешно удалены";} else {echo "Ошибка";}?></div>
</div>
<script>
someTimeout = 2000; // редирект через 2 секунду
window.setTimeout("document.location = '<?php echo "/?c=$c&s=$s";?> '", someTimeout);
</script>