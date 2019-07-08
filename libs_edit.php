<?php
$query = mysql_query(
	"SELECT
	`libs`.`id` AS `lib_id`,
	`libs`.`name` AS `lib_name`,
	`libs`.`code` AS `lib_code`,
	`libs`.`lib_type_id` AS `lib_type_id`,
	`libs`.`description` AS `lib_description`
	FROM `libs`
	WHERE
	`libs`.`id` = ".$l."
	");
	$row = mysql_fetch_array($query);
?>
<form name="checkboxs" action="<?php  echo "?c=".$req1['client_id']."&s=".$req2['simulator_id']."&l=".$req3['lib_id']."&update=1" ?>" method="post">
<div class="cd">
<?php echo "<a href='?c=".$req1['client_id']."&s=".$req2['simulator_id']."&l=".$req3['lib_id']."' title='Закрыть'><div class='cd_cancel'></div></a>"; ?>
<?php echo "<a href='javascript:document.checkboxs.submit();' title='Сохранить'><div class='cd_save'></div></a>"; ?>
<a  title="Удалить" ><div class="cd_del" onclick="if(confirm('Уверен, что хочешь удалить библиотеку <?php echo $row['lib_name']?>?'))location.href='<?php echo "?c=".$req1['client_id']."&s=".$req2['simulator_id']."&l=".$req3['lib_id']."&del=1";?>';"></div></a>
	<div class="cd00">
		<div class="cd01">Название</div>
		<div class="si12"><input name="lib_name" size="27" value="<?php echo $row['lib_name'];?>"></input></div>
	</div>
	<div class="si10">
		<div class="si01">Код</div>
		<div class=""><input name="lib_code" size="27" value="<?php echo $row['lib_code'];?>"></input></div>
	</div>
	<div class="si10">
		<div class="si01">Тип</div>
		<div class=""><select name="lib_type">
				  <?php
				  $query111 = mysql_query(
	"SELECT
	`lib_types`.`id` AS `lib_types_id`,
	`lib_types`.`name` AS `lib_types_name`,
	`lib_types`.`description` AS `lib_types_description`
	FROM `lib_types`
	WHERE
	`lib_types`.`id` = ".$row['lib_type_id']."
	");
	$row11 = mysql_fetch_array($query111);
		//echo "<option value>".$row11['lib_types_name']."</option>";
			  $query222 = mysql_query(
	"SELECT
	`lib_types`.`id` AS `lib_types_id`,
	`lib_types`.`name` AS `lib_types_name`,
	`lib_types`.`description` AS `lib_types_description`
	FROM `lib_types`
	ORDER BY `lib_types_name` ASC
	");
	$row22 = mysql_fetch_array($query222);
	do
	{
		if ($row22['lib_types_id']==$row['lib_type_id'])
		{echo "<option value='".$row22['lib_types_id']."' selected='selected'>".$row22['lib_types_name']."</option>";}
		else
		{echo "<option value='".$row22['lib_types_id']."'>".$row22['lib_types_name']."</option>";}
	}
	while ($row22 = mysql_fetch_array($query222));
				  ?>

			</select>
		</div>
	</div>
	<div class="si10">
		<div class="si01">Описание</div>
		<div class=""><textarea style="resize: none;" name="lib_description" cols="39" rows="2" ><?php echo $row['lib_description'];?></textarea></div>
	</div>
</div>
</form>