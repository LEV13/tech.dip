<?php

$query = mysql_query("DELETE FROM `tags` WHERE `id` = $l");
?>
<div class="cd">
<div class="cl_upd"><?php 	if ($query== TRUE) {echo "Ваши данные успешно удалены";} else {echo "Ваши данные не добавлены";}?></div>
</div>
<script>
someTimeout = 2000; // редирект через 2 секунду
window.setTimeout("document.location = '<?php echo "/tags-elements";?> '", someTimeout);
</script>