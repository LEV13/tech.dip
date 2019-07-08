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
?>
<form name="checkboxs" action="<?php  echo "?l=".$row['tags_id']."&update=1" ?>" method="post">
<div class="cd">
<?php echo "<a href='tags-elements' title='Закрыть'><div class='cd_cancel'></div></a>"; ?>
<?php echo "<a href='javascript:document.checkboxs.submit();' title='Сохранить'><div class='cd_save'></div></a>"; ?>
<a  title="Удалить" ><div class="cd_del" onclick="if(confirm('Уверен, что хочешь удалить тип <?php echo $row['tags_name']?>?'))location.href='<?php echo "?l=$l&del=1";?>';"></div></a>
	<div class="cd00">
		<div class="cd01">Название</div>
		<div class="si12"><input name="tags_name" size="27" value="<?php echo $row['tags_name'];?>"></input></div>
	</div>
</div>
</form>