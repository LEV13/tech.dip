<div class="b2">
	<?php
	function check_image($a)
	{
			$image = "/images/noname.JPG";
			if ($a != NULL) {$image = $a;}
			return $image;
	}
	$query = mysql_query(
	"SELECT `elements`.`name`,
	`elements`.`code` AS `element_code`,
	`elements`.`description`, 
	`libs`.`code` AS `lib_code`,
	`libs`.`name` AS `lib_name`,
	`element_types`.`name` AS `type_name`,
	`simulators`.`name` AS `simulator_name`,
	`clients`.`name` AS `client_name`
	FROM `elements` 
	JOIN `libs`
	ON 
	`elements`.`lib_id` = `libs`.`id`
	JOIN `simulators`
	ON 
	`libs`.`simulator_id` = `simulators`.`id`
	JOIN `clients`
	ON 
	`simulators`.`client_id` = `clients`.`id`
	JOIN `element_types`
	ON  
	`elements`.`type_id` = `element_types`.`id` 
	ORDER BY `lib_code` ASC, `element_code` ASC	");
	$row = mysql_fetch_array($query);
	echo "<div class='b02'>
			<div class='b11'>&nbsp;</div>
			<div class='b14 b15' >Клиент</div>
			<div class='b14 b15'>Тренажер</div>
			<div class='b14 b15'>Библиотека</div>
			<div class='b14 b15'>Тип</div>
			<div class='b14 b15'>Код</div>
			<div class='b14 b15'>Название</div>
		</div>"
			;

	do
	{
	
	echo "<div class='b01'>
			<div class='b11'>&nbsp;</div>
			<div class='b14 b-popup-content' >". $row['client_name']."</div>
			<div class='b14'>". $row['simulator_name']."</div>
			<div class='b14'>". $row['lib_name']."</div>
			<div class='b14'>". $row['type_name']."</div>
			<div class='b14'>".$row['lib_code'].$row['element_code']."</div>
			<div class='b14'>". $row['name']."</div>
		</div>"
			;
	}

	while ($row = mysql_fetch_array($query));
	?>
	</div>
