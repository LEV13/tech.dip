<?php
$query = mysql_query(
	"SELECT
	`lib_types`.`id` AS `lib_types_id`,
	`lib_types`.`name` AS `lib_types_name`,
	`lib_types`.`description` AS `lib_types_description`
	FROM `lib_types`
	WHERE
	`lib_types`.`id` = ".$l."
	");
	$row = mysql_fetch_array($query);
?>
<form name="checkboxs" action="<?php  echo "?l=".$row['lib_types_id']."&update=1" ?>" method="post">
<div class="cd">
<?php echo "<a href='?l=".$row['lib_types_id']."' title='Закрыть'><div class='cd_cancel'></div></a>"; ?>
<?php echo "<a href='javascript:document.checkboxs.submit();' title='Сохранить'><div class='cd_save'></div></a>"; ?>
<a  title="Удалить" ><div class="cd_del" onclick="if(confirm('Уверен, что хочешь удалить тип <?php echo $row['lib_types_name']?>?'))location.href='<?php echo "?l=$l&del=1";?>';"></div></a>
	<div class="cd00">
		<div class="cd01">Название</div>
		<div class="si12"><input name="lib_types_name" size="27" value="<?php echo $row['lib_types_name'];?>"></input></div>
	</div>
	<div class="si10">
		<div class="si01">Описание</div>
		<div class=""><textarea style="resize: none;"  name="lib_types_description" cols="39" rows="4" ><?php echo $row['lib_types_description'];?></textarea></div>
	</div>
</div>
</form>