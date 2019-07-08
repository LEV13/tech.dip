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
if($insert != NULL) {include "tags_elements_insert.php";} else {
if($add != NULL) {include "tags_elements_add.php";} else {
if($l != NULL) {
if($edit != NULL) {include "tags_elements_edit.php";} 
else {
if($update != NULL) {include "tags_elements_update.php";} 
else {
if($del != NULL) {include "tags_elements_del.php";}
else {
include "tags_elements_edit.php";}}}}
else {

$query = mysql_query(
	"SELECT
	`tags`.`id` AS `tags_id`,
	`tags`.`name` AS `tags_name`
	FROM `tags`
	");
	$row = mysql_fetch_array($query);

echo	"<div class='t_e'>
		<div class='t_e_name'>Название</div>
		<a href='?add=1'><div class='t_e_add'></div></a>";

	do
	{
	echo "
	<a href='?l=".$row['tags_id']."'>
	<div class='t_e1'>
	<div class='t_e_name1'>".$row['tags_name']."</div>
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

