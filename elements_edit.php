<?php
	$elem_sql = mysql_query(
	"SELECT
	`elements`.`id` AS `element_id`,
	`elements`.`name` AS `element_name`,
	`elements`.`code` AS `element_code`,
	`elements`.`type_id` AS `type_id`,
	`elements`.`icon` AS `element_icon`,
	`elements`.`description` AS `element_description`,
	`element_types`.`name` AS `type_name`
	FROM `elements`
	INNER JOIN `element_types` ON `element_types`.`id` = `elements`.`type_id`
	WHERE
	`elements`.`id` = ".$e."
	");
	$element_sql = mysql_fetch_array($elem_sql);
?>
<form id="form" name="checkboxs" action="<?php  echo "?c=$c&s=$s&l=$l&e=$e&update=1" ?>" method="post" enctype="multipart/form-data">
<div class="elem_table1">
<div class="elem_table2">
<div class="cd">
<?php echo "<a href='?c=$c&s=$s&l=$l&e=$e' title='Закрыть'><div class='cd_cancel'></div></a>"; ?>
<a  title="Удалить" ><div class="cd_del" onclick="if(confirm('Уверен, что хочешь удалить элемент <?php echo $element_sql['element_name']?>?'))location.href='<?php echo "?c=$c&s=$s&l=$l&e=$e&del=1";?>';"></div></a>
<?php echo "<a href='javascript:document.checkboxs.submit();' title='Сохранить'><div class='cd_save'></div></a>";
	
	
	$element_states_sql = mysql_query(
		"SELECT 
		`element_states`.`id` AS `element_states_id`,
		`element_states`.`name` AS `element_states_name`,
		`element_states`.`element_id` AS `element_states_element_id`,
		`element_states`.`image` AS `element_states_element_image`
		FROM `element_states`
		WHERE `element_states`.`element_id` = ".$e."
		LIMIT 5
		");
	$element_states = mysql_fetch_array($element_states_sql);
 ?>
	<div class="cd00">
		<div class="cd01">Название</div>
		<div class="si12"><input name="element_name" size="27" value="<?php echo $element_sql['element_name'];?>"></input></div>
	</div>
	<div class="si10">
		<div class="si01">Код</div>
		<div class=""><input name="element_code" size="2" value="<?php echo $element_sql['element_code'];?>"></input></div>
	</div>
	<div class="si10">
		<div class="si01">Тип</div>
				<div class=""><select name="element_type">
			 <?php
				  $query222 = mysql_query(
	"SELECT
	`element_types`.`id` AS `types_id`,
	`element_types`.`name` AS `types_name`
	FROM `element_types`
	");
	$row22 = mysql_fetch_array($query222);
	do
	{
		if ($row22['types_id']==$element_sql['type_id'])
		{echo "<option value='".$row22['types_id']."' selected='selected'>".$row22['types_name']."</option>";}
		else
		{echo "<option value='".$row22['types_id']."'>".$row22['types_name']."</option>";}
	}
	while ($row22 = mysql_fetch_array($query222));
				  ?>
			</select>
		</div>
	</div>
	<div class="si10">
		<div class="si01">Описание</div>
		<div class=""><textarea style="resize: none;"  name="element_description" cols="39" rows="2" ><?php echo $element_sql['element_description'];?></textarea></div>
	</div>
</div>
<div id="parentId">
<div class="ele3">
	<div class="ele21">Картинка</div>
	<div class="cd_bottom1" style="padding-left: 130px"><img id="a0" height="100px" src="<?php echo $element_sql['element_icon'];?>"/>
		<input type="file" id="b0" name="image" value="Выбрать"/>
	</div>
</div>
<button onclick="return addField()" class="action bluebtn" style="margin: 30px;"><span class="label">Добавить позиции</span></button>

<?php 
$i=1;
do
	{ ?>
<div class='add_div'>
	<div class='add_div_img'>
		<img id='a<?php echo $i; ?>' height='100px' src='<?php echo $element_states['element_states_element_image'];?>'/>
		<input type='file' id='b<?php echo $i; ?>' name='image' value='Выбрать'/>
	</div>
		<div class='add_div_text'>
			<div><?php echo $element_states['element_states_name'];?></div>
		</div>
</div>
<button id="button<?php echo $i++; ?>" onclick=\"return clickbutton()\" href=\"#\" class='action redbtn' style='margin-left: 30px;'><span class='label'>Удалить</span></button>
<?php 
	}
	while ($element_states = mysql_fetch_array($element_states_sql));
	?>
	</div>
<script type="text/javascript">
$( "button1" ).click(function clickbutton() {
  $( "span" ).remove();
});
var linkId = 5; // Номер позиции
var countOfFields = 5; // Текущее число полей
var curFieldNameId = 5; // Уникальное значение для атрибута name
var maxFieldLimit = 100; // Максимальное число возможных полей
function deleteField(a) {
 // Получаем доступ к ДИВу, содержащему поле
 var contDiv = a.parentNode;
 // Удаляем этот ДИВ из DOM-дерева
 contDiv.parentNode.removeChild(contDiv);
 // Уменьшаем значение текущего числа полей
 countOfFields--;
 // Возвращаем false, чтобы не было перехода по сслыке
 return false;
}
function addField() {
 // Проверяем, не достигло ли число полей максимума
 if (countOfFields >= maxFieldLimit) {
 alert("Число полей достигло своего максимума = " + maxFieldLimit);
 return false;
 }
 countOfFields++;// Увеличиваем текущее значение числа полей
 curFieldNameId++;// Увеличиваем ID
 linkId++;// Увеличиваем позицию
 // Создаем элемент ДИВ
 var div = document.createElement("div");
 // Добавляем HTML-контент с пом. свойства innerHTML
 div.innerHTML = "<div class='add_div'><div class='add_div_img'><img id='a"+linkId+"' height='100px' src=''/><input type='file' id='b"+linkId+"' name='image' value='Выбрать'/></div><div class='add_div_text'><div>Описание</div><input name='text' size='27' value=''></input></div></div><button onclick=\"return deleteField(this)\" href=\"#\" class='action redbtn' style='margin-left: 30px;'><span class='label'>Удалить</span></button>";
 // Добавляем новый узел в конец списка полей
 document.getElementById("parentId").appendChild(div);
 // Возвращаем false, чтобы не было перехода по сслыке 
 $("#b1").change(function(input){
    readURLa(this);
});
 $("#b2").change(function(input){
    readURLb(this);
});
$("#b3").change(function(input){
    readURLc(this);
});
$("#b4").change(function(input){
    readURLd(this);
});
$("#b5").change(function(input){
    readURLe(this);
});
 return false;
}
//-------------------
$("#b0").change(function(input){
    readURL(this);
});
//---------------------------------------
function readURL(input) {
    if (input.files && input.files[0]) { // проверяем файл на пустату
        var reader = new FileReader(); // читаем файл
        reader.onload = function (e) { // Определите обработчик событий
			var text = reader.result; // Содержимое файла
            $('#a0').attr('src', e.target.result); 
        }
        reader.readAsDataURL(input.files[0]);
    }
}
function readURLa(input) {
    if (input.files && input.files[0]) { // проверяем файл на пустату
        var reader = new FileReader(); // читаем файл
        reader.onload = function (e) { // Определите обработчик событий
			var text = reader.result; // Содержимое файла
            $('#a1').attr('src', e.target.result); 
        }
        reader.readAsDataURL(input.files[0]);
    }
}
function readURLb(input) {
    if (input.files && input.files[0]) { // проверяем файл на пустату
        var reader = new FileReader(); // читаем файл
        reader.onload = function (e) { // Определите обработчик событий
			var text = reader.result; // Содержимое файла
            $('#a2').attr('src', e.target.result); 
        }
        reader.readAsDataURL(input.files[0]);
    }
}
function readURLc(input) {
    if (input.files && input.files[0]) { // проверяем файл на пустату
        var reader = new FileReader(); // читаем файл
        reader.onload = function (e) { // Определите обработчик событий
			var text = reader.result; // Содержимое файла
            $('#a3').attr('src', e.target.result); 
        }
        reader.readAsDataURL(input.files[0]);
    }
}
function readURLd(input) {
    if (input.files && input.files[0]) { // проверяем файл на пустату
        var reader = new FileReader(); // читаем файл
        reader.onload = function (e) { // Определите обработчик событий
			var text = reader.result; // Содержимое файла
            $('#a4').attr('src', e.target.result); 
        }
        reader.readAsDataURL(input.files[0]);
    }
}
function readURLe(input) {
    if (input.files && input.files[0]) { // проверяем файл на пустату
        var reader = new FileReader(); // читаем файл
        reader.onload = function (e) { // Определите обработчик событий
			var text = reader.result; // Содержимое файла
            $('#a5').attr('src', e.target.result); 
        }
        reader.readAsDataURL(input.files[0]);
    }
}
//---------------------------------------

</script>

</div>
<div class="ele_add">
	<div class="ele1">Теги</div>
	<div class="ele_prim"><i style="padding-left: 13px"><b>Примечание:</b> Для выбора нескольких элементов используете "Ctrl"</i></div>
	<div class="ele11">
		<select name="tag[]" multiple size="10">
			<?php
			$sele_sql = mysql_query(
			"SELECT
			`tags_elements`.`element_id` AS `tag_element_id`,
			`tags_elements`.`tag_id` AS `tags_tag_id`,
			`tags`.`name` AS `tags_name`
			FROM `tags_elements`
			INNER JOIN `tags` ON `tags`.`id` = `tags_elements`.`tag_id`
			WHERE
			`tags_elements`.`element_id` = ".$e."
				");
						
			
			$sele = mysql_query(
			"SELECT
			`tags`.`id` AS `tags_id`,
			`tags`.`name` AS `tags_name`
			FROM `tags`
			ORDER BY `tags`.`name` ASC
				");
			//$sel = mysql_fetch_array($sele);
			while ($sel = mysql_fetch_array($sele))
			{ 
				echo "<option";
				
				//$sel_sql = mysql_fetch_array($sele_sql);
				//$tmp = false;
				if (mysql_num_rows($sele_sql) > 0)
				{
					while ($sel_sql = mysql_fetch_array($sele_sql))
					{	
						if ($sel['tags_id'] == $sel_sql['tags_tag_id'])
						{echo " selected='selected'";}
						//$tmp = true;
					}
					mysql_data_seek($sele_sql, 0);
				}
				//while ($sel_sql = mysql_fetch_array($sele_sql));
				//if ($tmp == true) { mysql_data_seek($sele_sql, 0);}
				echo " name=".$sel['tags_id'].">".$sel['tags_name']."</option>";
			}
			//while ($sel = mysql_fetch_array($sele));
			?>
		</select>
	</div>
</div>
</div>
</form>

