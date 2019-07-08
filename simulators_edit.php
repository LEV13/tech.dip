<?php
$query = mysql_query(
	"SELECT
	`simulators`.`id` AS `simulator_id`,
	`simulators`.`name` AS `simulator_name`,
	`simulators`.`date` AS `simulator_date`,
	`simulators`.`description` AS `simulator_description`,
	`simulators`.`client_id` AS `client_id`
	FROM `simulators`
	WHERE
	`simulators`.`id` = ".$s."
	");
	$row = mysql_fetch_array($query);
?>
<form name="checkboxs" action="<?php  echo "?c=".$row['client_id']."&s=".$row['simulator_id']."&update=1" ?>" method="post">
<div class="cd">
<?php echo "<a href='?c=".$row['client_id']."&s=".$row['simulator_id']."' title='Закрыть'><div class='cd_cancel'></div></a>"; ?>
<?php echo "<a href='javascript:document.checkboxs.submit();' title='Сохранить'><div class='cd_save'></div></a>"; ?>
<a  title="Удалить" ><div class="cd_del" onclick="if(confirm('Уверен, что хочешь удалить тренажер <?php echo $row['simulator_name']?>?'))location.href='<?php echo "?c=$c&s=$s&del=1";?>';"></div></a>
	<div class="cd00">
		<div class="cd01">Название</div>
		<div class="si12"><input name="simulator_name" size="27" value="<?php echo $row['simulator_name'];?>"></input></div>
	</div>
	<div class="si10">
		<div class="si01">Дата</div>
		<div class=""><input name="simulator_date" size="27" value="<?php echo $row['simulator_date'];?>"></input></div>
	</div>
	<div class="si10">
		<div class="si01">Описание</div>
		<div class=""><textarea style="resize: none;"  name="simulator_description" cols="39" rows="4" ><?php echo $row['simulator_description'];?></textarea></div>
	</div>
</div>
</form>