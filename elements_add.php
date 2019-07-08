
<form id="form" name="checkboxs" action="<?php  echo "?c=$c&s=$s&l=$l&insert=1" ?>" method="post" enctype="multipart/form-data">
<div class="elem_table1">
<div class="elem_table2">
<div class="cd">
<?php echo "<a href='?c=$c&s=$s&l=$l' title='Закрыть'><div class='cd_cancel'></div></a>"; ?>
<?php echo "<a href='javascript:document.checkboxs.submit();' title='Сохранить'><div class='cd_save'></div></a>"; ?>
	<div class="cd00">
		<div class="cd01">Название</div>
		<div class="si12"><input name="element_name" size="27" value=""></input></div>
	</div>
	<div class="si10">
		<div class="si01">Код</div>
		<div class=""><input name="element_code" size="2" value=""></input></div>
	</div>
	<div class="si10">
		<div class="si01">Тип</div>
				<div class=""><select name="element_type">
				  <option></option>
			 <?php
				  $query = mysql_query(
	"SELECT
	`element_types`.`id` AS `types_id`,
	`element_types`.`name` AS `types_name`
	FROM `element_types`
	");
	$row = mysql_fetch_array($query);
	do
	{
	echo "<option>".$row['types_name']."</option>";
	}
		while ($row = mysql_fetch_array($query));
				  ?>
			</select>
		</div>
	</div>
	<div class="si10">
		<div class="si01">Описание</div>
		<div class=""><textarea style="resize: none;"  name="element_description" cols="39" rows="2" ></textarea></div>
	</div>
</div>

<div id="parentId">
<div class="ele3">
	<div class="ele21">Картинка</div>
	<div class="cd_bottom1" style="padding-left: 130px"><img id="a0" height="100px" src=""/>
		<input type="file" id="b0" name="image" value="Выбрать" onclick=""/>
	</div>
</div>
<button onclick="return addField()" class="action bluebtn" style="margin: 30px;"><span class="label">Добавить позиции</span></button>
</div>



</div>
<div class="ele_add">
	<div class="ele1">Теги</div>
	<div class="ele_prim"><i style="padding-left: 13px"><b>Примечание:</b> Для выбора нескольких элементов используете "Ctrl"</i></div>
	<div class="ele11">
		<select name="tag[]" multiple size="10">
			<?php
			$sele = mysql_query(
			"SELECT
			`tags`.`id` AS `tags_id`,
			`tags`.`name` AS `tags_name`
			FROM `tags`
				");
			$sel = mysql_fetch_array($sele);
			do
			{ ?>
			<option name="<?php echo $sel['tags_id'];?>"><?php echo $sel['tags_name'];?></option>
			<?php
			}
			while ($sel = mysql_fetch_array($sele));
			?>
		</select>
	</div>
</div>
</div>
</form>
<script type="text/javascript">
var linkId = 0; // Номер позиции
var curFieldNameId = 1; // Уникальное значение для атрибута name
var dummy = 0;

function deleteField(a) {
	// Получаем доступ к ДИВу, содержащему поле
	var contDiv = a.parentNode;
	// Удаляем этот ДИВ из DOM-дерева
	contDiv.parentNode.removeChild(contDiv);
	// Возвращаем false, чтобы не было перехода по сслыке
	return false;
}

function addField() {
	curFieldNameId++;// Увеличиваем ID
	linkId++;// Увеличиваем позицию
	// Создаем элемент ДИВ
	var div = document.createElement("div");
	// Добавляем HTML-контент с пом. свойства innerHTML
	div.innerHTML = "<div class='add_div' id='add_div" + linkId + "'><div class='add_div_img'><img id='a"+linkId+"' height='100px' src=''/><input type='file' id='b"+linkId+"' name='images[]' value='Выбрать' onclick='dummy=0'/></div><div class='add_div_text'><div>Описание</div><input name='text[]' size='27' value=''></input></div></div><button onclick=\"return deleteField(this)\" href=\"#\" class='action redbtn' style='margin-left: 30px;'><span class='label'>Удалить</span></button>";
	// Добавляем новый узел в конец списка полей
	document.getElementById("parentId").appendChild(div);

	$("input").change(function(input){
		if (dummy === 0) {
			dummy=1;
			//alert('id in change: ' + $(this).attr('id'));
			readURL(this,$(this).attr('id'));
		}
	});

	// Возвращаем false, чтобы не было перехода по сслыке 
	return false;
}

$("input").change(function(input){
	//alert('id in change: ' + $(this).attr('id'));
	readURL(this,$(this).attr('id'));
});

//---------------------------------------

function readURL(input,id) {
    if (input.files && input.files[0]) { // проверяем файл на пустату
        var reader = new FileReader(); // читаем файл
        reader.onload = function (e) { // Определите обработчик событий
			var text = reader.result; // Содержимое файла
			var id_num = id.substring(1);
            $('#a' + id_num).attr('src', e.target.result); 
        }
        reader.readAsDataURL(input.files[0]);
    }
	return id_num;
}
//---------------------------------------

</script>