<?php

$query = mysql_query(
	"SELECT
	`libs`.`id` AS `lib_id`,
	`libs`.`name` AS `lib_name`,
	`libs`.`code` AS `lib_code`,
	`libs`.`description` AS `lib_description`
	FROM `libs`
	WHERE
	`simulator_id` = ".$s."
	");
	$row = mysql_fetch_array($query);
?>
<div class="mid_fon">
	<div class='s0001'> Созданые библиотеки </div>
	<div class='s01'>Название</div>
	<div class='s02'>Код</div>
	<div class='s02'>Описание</div>
	<a href='/?c=<?php echo $c;?>&s=<?php echo $s;?>&add=1'><div class='mid_fon_add'></div></a>
<?php
	
	
	do
	{
	echo "
	<div class='s'>
	<a href='/?c=".$c."&s=".$s."&l=".$row['lib_id']."'>
	<div class='s01'>".$row['lib_name']."</div>
	<div class='s02'>".$row['lib_code']."</div>
	<div class='s03'>".$row['lib_description']."</div>
	</a>	
	</div>
	";
	}

	while ($row = mysql_fetch_array($query));

?>

<?php
	$query1 = mysql_query(
	"	SELECT
	`reused_libs`.`lib_id` AS `reused_lib_id`,
	`reused_libs`.`simulator_id` AS `reused_sim_id`,
	`libs`.`id` AS `lib_id`,
	`libs`.`name` AS `lib_name`,
	`libs`.`code` AS `lib_code`,
	`libs`.`description` AS `lib_description`,
    `libs`.`simulator_id` AS `lib_simualator_id`,
	`simulators`.`name` AS `simulator_name`
	FROM `reused_libs`
        INNER JOIN `libs` ON `libs`.`id` = `reused_libs`.`lib_id`
	INNER JOIN `simulators` ON `simulators`.`id` = `libs`.`simulator_id`
	WHERE
	`reused_libs`.`simulator_id` = $s
	");
	$row1 = mysql_fetch_array($query1);

		echo "
	<div class='mid_fon1'>
	<div class='s001'> Используемые библиотеки </div>
	<div class='s01'>Название</div>
	<div class='s02'>Код</div>
	<div class='s02_0'>Описание</div>
	<div class='s02_1'>Тренажер</div> 
	<a href='/?c=$c&s=$s&reused=1'><div class='mid_fon_add_1'></div></a>";
	do
	{
	if ($row1 != NULL) {
	echo "
	<div id='".$row1['lib_id']."' class='s_1' >
	";?>
	<a title='Удалить'><div class='mid_del'  onclick="if(confirm('Уверен, что хочешь удалить библиотеку LEV'))location.href='<?php echo "/?c=$c&s=$s&libs=".$row1['lib_id']."&reused_del=1" ?>'";></div></a>
	<?php 
	echo"
	<a href='/?c=".$c."&s=".$s."&l=".$row1['lib_id']."'>
	<div class='s01'>".$row1['lib_name']."</div>
	<div class='s02'>".$row1['lib_code']."</div>
	<div class='s03'>".$row1['lib_description']."</div>
	<div class='s03_1'>".$row1['simulator_name']." </div>
	</a>
	</div>
	";}
	}

	while ($row1 = mysql_fetch_array($query1));

?>