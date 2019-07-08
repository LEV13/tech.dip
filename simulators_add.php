<form name="checkboxs" action="<?php  echo "?c=$c&insert=1" ?>" method="post">
<div class="cd">
<?php echo "<a href='?c=$c' title='Закрыть'><div class='cd_cancel'></div></a>"; ?>
<?php echo "<a href='javascript:document.checkboxs.submit();' title='Сохранить'><div class='cd_save'></div></a>"; ?>
	<div class="cd00">
		<div class="cd01">Название</div>
		<div class="si12"><input name="simulator_name" size="27" value=""></input></div>
	</div>
	<div class="si10">
		<div class="si01">Дата</div>
		<div class=""><input name="simulator_date" size="27" value=""></input></div>
	</div>
	<div class="si10">
		<div class="si01">Описание</div>
		<div class=""><textarea style="resize: none;"  name="simulator_description" cols="39" rows="4" ></textarea></div>
	</div>
</div>
</form>