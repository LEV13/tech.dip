<form name="checkboxs" action="<?php  echo "?c=$c&s=$s&insert=1" ?>" method="post">
<div class="cd">
<?php echo "<a href='?c=$c&s=$s' title='Закрыть'><div class='cd_cancel'></div></a>"; ?>
<?php echo "<a href='javascript:document.checkboxs.submit();' title='Сохранить'><div class='cd_save'></div></a>"; ?>
	<div class="cd00">
		<div class="cd01">Название</div>
		<div class="si12"><input name="lib_name" size="27" value=""></input></div>
	</div>
	<div class="si10">
		<div class="si01">Код</div>
		<div class=""><input name="lib_code" size="27" value=""></input></div>
	</div>
	<div class="si10">
		<div class="si01">Тип</div>
				<div class=""><select>
				  <option></option>
				  <?php
				  $query = mysql_query(
	"SELECT
	`lib_types`.`id` AS `lib_types_id`,
	`lib_types`.`name` AS `lib_types_name`,
	`lib_types`.`description` AS `lib_types_description`
	FROM `lib_types`
	");
	$row = mysql_fetch_array($query);
	do
	{
	echo "<option>".$row['lib_types_name']."</option>";
	}
		while ($row = mysql_fetch_array($query));
				  ?>
			</select>
		</div>
	</div>
	<div class="si10">
		<div class="si01">Описание</div>
		<div class=""><textarea style="resize: none;"  name="lib_description" cols="39" rows="2" ></textarea></div>
	</div>
</div>
</form>