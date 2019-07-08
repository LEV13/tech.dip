<form name="checkboxs" action="<?php  echo "?c=$c&s=$s&reused_add=1" ?>" method="post">
<div class="cd">
<?php echo "<a href='?c=$c&s=$s' title='Закрыть'><div class='cd_cancel'></div></a>"; ?>
<?php echo "<a href='javascript:document.checkboxs.submit();' title='Сохранить'><div class='cd_save'></div></a>"; ?>
	<div class="cd00">
		<div class="cd01">Название</div>
		<div class="si12"><select name="reused">
				  <option></option>
				  <?php
				  $query = mysql_query(
	"SELECT
	`libs`.`id` AS `lib_id`,
	`libs`.`name` AS `lib_name`,
	`libs`.`description` AS `lib_description`,
	`simulators`.`name` AS `simulator_name`
	FROM `libs`
	INNER JOIN `simulators` ON `libs`.`simulator_id` = `simulators`.`id`
	WHERE `libs`.`simulator_id` != $s and `libs`.`id` not in (select `reused_libs`.`lib_id` from `reused_libs` where `reused_libs`.`simulator_id` = $s ) 
	ORDER BY `simulator_name`, `lib_name` ASC
	");
	$row = mysql_fetch_array($query);
	do
	{
	echo "<option value='".$row['lib_id']."'>".$row['lib_name']." (".$row['simulator_name'].") </option>";
	}
		while ($row = mysql_fetch_array($query));
				  ?>
			</select></div>
	</div>
</div>
</form>