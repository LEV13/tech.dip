<form name="checkboxs" action="?insert=1" method="post">
<div class="cd">
<?php echo "<a href='/type-libs' title='Закрыть'><div class='cd_cancel'></div></a>"; ?>
<?php echo "<a href='javascript:document.checkboxs.submit();' title='Сохранить'><div class='cd_save'></div></a>"; ?>
	<div class="cd00">
		<div class="cd01">Название</div>
		<div class="si12"><input name="lib_types_name" size="27" value=""></input></div>
	</div>
	<div class="si10">
		<div class="si01">Описание</div>
		<div class=""><textarea style="resize: none;"  name="lib_types_description" cols="39" rows="4" ></textarea></div>
	</div>
</div>
</form>