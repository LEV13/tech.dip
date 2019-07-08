<?php
//Определяем пришедшие данные с формы 
$client_name = $_POST['client_name'];
$client_address = $_POST['client_address'];
$image = $_FILES['image']['name'];
//-------------------------------------
$time = time(); // Определяем время
$query = mysql_query("INSERT INTO clients(name, address,image) 
	VALUES('$client_name','$client_address','$time')"); // Заносим данные в БД
// Выбор данных с заданным временем
$query1 = mysql_query("SELECT `id` FROM `clients` WHERE `image` = '$time'"); 
$query11 = mysql_fetch_array($query1);
	
$path = 'images/clients/'; // директория для загрузки
$ext = array_pop(explode('.',$_FILES['image']['name'])); // расширение
$new_name = $query11['id'].'.'.$ext;  // новое имя с расширением
if($_FILES['image']['error'] == 0){
$full_path = $path.$new_name; // полный путь с новым именем и расширением
    if(move_uploaded_file($_FILES['image']['tmp_name'], $full_path)){
        // Можно сохранить $full_path (полный путь) или просто имя файла - $new_name
    }
}
// Обновляем данные
$query2 = mysql_query("UPDATE clients SET `image` = '$full_path' WHERE `id` = ".$query11['id']);


?>
<div class="cd">
<div class="cl_upd"><?php 	if ($query2== TRUE) {echo "Ваши данные добавленны";} else {echo "Ошибка";}?></div>
</div>
<script>
someTimeout = 2000; // редирект через 2 секунду
window.setTimeout("document.location = '<?php echo "../";?> '", someTimeout);
</script? 