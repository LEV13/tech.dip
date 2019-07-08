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
if($insert != NULL) {include "type_elements_insert.php";} else {
if($add != NULL) {include "type_elements_add.php";} else {
if($l != NULL) {
if($edit != NULL) {include "type_elements_edit.php";} 
else {
if($update != NULL) {include "type_elements_update.php";} 
else {
if($del != NULL) {include "type_elements_del.php";}
else {
include "type_elements_edit.php";}}}}
else {

$query = mysql_query(
	"SELECT
	`element_types`.`id` AS `elem_types_id`,
	`element_types`.`name` AS `elem_types_name`
	FROM `element_types`
	");
	$row = mysql_fetch_array($query);

echo	"<div class='t_e'>
		<div class='t_e_name'>Название</div>
		<a href='?add=1'><div class='t_e_add'></div></a>";

	do
	{
	echo "
	<a href='?l=".$row['elem_types_id']."'>
	<div class='t_e1'>
	<div class='t_e_name1'>".$row['elem_types_name']."</div>
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

