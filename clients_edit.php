<?php
	$query = mysql_query(
	"SELECT
	`clients`.`id` AS `client_id`,
	`clients`.`name` AS `client_name`,
	`clients`.`image` AS `client_image`,
	`clients`.`address` AS `client_address`
	FROM `clients` 
	WHERE `clients`.`id` = ".$c."");
	$row = mysql_fetch_array($query);
?>
<form name="checkboxs" action="<?php echo "?c=".$row['client_id']."&update=1"?>" method="post" enctype="multipart/form-data">
<div class="cd">
<?php echo "<a href='?c=".$req1['client_id']."' title='Закрыть'><div class='cd_cancel'></div></a>"; ?>
<?php echo "<a href='javascript:document.checkboxs.submit();' title='Сохранить'><div class='cd_save'></div></a>"; ?>
<?php echo "<a href='?c=".$req1['client_id']."&del=1' title='Удалить'><div class='cd_del'></div></a>"; ?>
<a  title="Удалить" ><div class="cd_del" onclick="if(confirm('Уверен, что хочешь удалить клиента <?php echo $row['client_name']?>?'))location.href='<?php echo "?c=".$req1['client_id']."&del=1";?>';"></div></a>
	<div class="cd_img"><div class="cd_img1"><img id="image_preview" height="100px" src="<?php echo $row['client_image'];?>"/></div></div>
	<div class="cd00">
		<div class="cd01">Название</div>
		<div class="cd02"><input name="client_name" size="27" value="<?php echo $row['client_name'];?>"></input></div>
	</div>
	<div class="cd10">
		<div class="cd01">Адрес</div>
		<div class="cd02"><input name="client_address" size="27" value="<?php echo $row['client_address'];?>"></input></div>
	</div>
	<div class="cd_bottom">
		<div class="cd_bottom1"><input type="file" id="image" name="image" value="Выбрать"/></div>
	</div>
</div>
</form>
<script type="text/javascript">
$('#image').change(function() {
    var input = $(this)[0];
    if ( input.files && input.files[0] ) {
        if ( input.files[0].type.match('image.*') ) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        } else console.log('is not image mime type');
    } else console.log('not isset files data or files API not supordet');
});
</script>
