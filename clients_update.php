<?php
	$query = mysql_query(
	"SELECT
	`clients`.`id` AS `client_id`,
	`clients`.`name` AS `client_name`,
	`clients`.`image` AS `client_image`,
	`clients`.`address` AS `client_address`
	FROM `clients` 
	WHERE `clients`.`id` = '$c'");
	$row = mysql_fetch_array($query);
	
$client_name = $_POST['client_name'];
$client_address = $_POST['client_address'];
$full_path = $row['client_image'];

$path = 'images/clients/'; // директория для загрузки
$ext = array_pop(explode('.',$_FILES['image']['name'])); // расширение
$new_name = $c.'.'.$ext;  // новое имя с расширением
if($_FILES['image']['error'] == 0){
$full_path = $path.$new_name; // полный путь с новым именем и расширением
    if(move_uploaded_file($_FILES['image']['tmp_name'], $full_path)){
        // Можно сохранить $full_path (полный путь) или просто имя файла - $new_name
    }
}

?>
<div class="cd">
<?php 
	$query = mysql_query("UPDATE clients SET `name` = '$client_name', `address` = '$client_address', `image` = '$full_path' WHERE `clients`.`id` = '$c'"); 
?>
<div class="cl_upd">Ваши данные успешно добавленны!</div>
</div>
<script>
someTimeout = 2000; // редирект через 2 секунду
window.setTimeout("document.location = '<?php echo "?c=".$row['client_id']."";?> '", someTimeout);
</script>