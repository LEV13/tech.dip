<!doctype html>
<?php include('db.php');?>
<html>
    <head>
        <meta charset="utf-8" />
        <title>LEV13</title>
        <?php include_once('link.php') ?>
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>


    </head>
    <body>
<?php 
$edit = empty($_GET['edit'])?'':(int)$_GET['edit'];
$update = empty($_GET['update'])?'':(int)$_GET['update'];
$add = empty($_GET['add'])?'':(int)$_GET['add'];
$insert = empty($_GET['insert'])?'':(int)$_GET['insert'];
$del = empty($_GET['del'])?'':(int)$_GET['del'];
$l = empty($_GET['l'])?'':(int)$_GET['l'];
include 'top.php' ?>
<div class="mid">
<?php include 'menu.php'; ?>
<div class="table">
<div class="table1">
<?php
if($insert != NULL) {include "type_libs_insert.php";} else {
if($add != NULL) {include "type_libs_add.php";} else {
if($l != NULL) {
if($edit != NULL) {include "type_libs_edit.php";} 
else {
if($update != NULL) {include "type_libs_update.php";} 
else {
if($del != NULL) {include "type_libs_del.php";}
else {
include "type_libs_l.php";}}}}
else {

$query = mysql_query(
	"SELECT
	`lib_types`.`id` AS `lib_types_id`,
	`lib_types`.`name` AS `lib_types_name`,
	`lib_types`.`description` AS `lib_types_description`
	FROM `lib_types`
	");
	$row = mysql_fetch_array($query);

echo	"<div class='t_l'>
		<div class='t_l_name'>Название</div>
		<div class='t_l_desc'>Описание</div>
		<a href='?add=1'><div class='t_l_add'></div></a>";

	do
	{
	echo "
	<a href='/type-libs?l=".$row['lib_types_id']."'>
	<div class='t_l1'>
	<div class='t_l_name1'>".$row['lib_types_name']."</div>
	<div class='t_l_desc1'>".$row['lib_types_description']."</div>	
	</div>
	</a>
	";
	}

	while ($row = mysql_fetch_array($query));
	}
	}
	}
?>
</div>
</div>
</div>
    </body>
</html>

