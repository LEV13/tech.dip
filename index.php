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
$c = empty($_GET['c'])?'':(int)$_GET['c'];
$s = empty($_GET['s'])?'':(int)$_GET['s'];
$l = empty($_GET['l'])?'':(int)$_GET['l'];
$e = empty($_GET['e'])?'':(int)$_GET['e'];
$libs = empty($_GET['libs'])?'':(int)$_GET['libs'];
$edit = empty($_GET['edit'])?'':(int)$_GET['edit'];
$update = empty($_GET['update'])?'':(int)$_GET['update'];
$add = empty($_GET['add'])?'':(int)$_GET['add'];
$insert = empty($_GET['insert'])?'':(int)$_GET['insert'];
$del = empty($_GET['del'])?'':(int)$_GET['del'];
$reused = empty($_GET['reused'])?'':(int)$_GET['reused'];
$reused_add = empty($_GET['reused_add'])?'':(int)$_GET['reused_add'];
$reused_del = empty($_GET['reused_del'])?'':(int)$_GET['reused_del'];
include 'top.php' ?>
<div class="mid">
<?php include 'menu.php'; ?>
<div class="table">
<div class="table1">
<?php
	if ($c == NULL) 
	{
	echo	"<div class='nav'><div><a href='/?add=1'><div class='nav_add'></div></a></div><a href='../'><img src='images/icon/home.png' height='13px'/> Клиенты</a></div>";
	if ($insert != NULL) {include 'clients_insert.php';} else {
	if ($add != NULL) { include 'clients_add.php'; } else {
	include 'clients.php'; }}} else 
	{
	if ($s == NULL){
	include 'request.php';
	echo	"<div class='nav'><a href='../'><img src='images/icon/home.png' height='13px'/> Клиенты</a> / <a href='/?c=".$c."'><img src='images/icon/clients.png' height='13px'/> ".$req1['client_name']."</a></div>";
	if ($insert != NULL) {include 'simulators_insert.php';} else {
	if ($add != NULL) { include 'simulators_add.php'; } else {
	if ($del != NULL) { include 'clients_del.php'; } else { 
	if ($update != NULL) {include 'clients_update.php';} else {
	if ($edit == NULL) {include 'clients_line.php';} else {include 'clients_edit.php';}}}
	include 'simulators.php';}}} else
	{
	if ($l == NULL){
	include 'request.php';
	echo	"<div class='nav'><a href='../'><img src='images/icon/home.png' height='13px'/> Клиенты</a> / <a href='/?c=".$c."'><img src='images/icon/clients.png' height='13px'/> ".$req1['client_name']."</a> / <a href='/?c=".$c."&s=".$s."'><img src='images/icon/simulator.png' height='13px'/> ".$req2['simulator_name']."</a></div>";
	if ($reused_del != NULL) {include 'reused_del.php';} else {
	if ($reused_add != NULL) {include 'reused_insert.php';} else {
	if ($reused != NULL) {include 'reused_add.php';} else {
	if ($insert != NULL) {include 'libs_insert.php';} else {
	if ($add != NULL) { include 'libs_add.php'; } else {
	if ($del != NULL) { include 'simulators_del.php'; } else { 
	if ($update != NULL) {include 'simulators_update.php';} else {
	if ($edit == NULL) {include 'simulators_line.php';} else {include 'simulators_edit.php';}}
	include 'libs.php';}}}}}}
	} else
	{
	if ($e == NULL){
	include 'request.php';
	echo	"<div class='nav'><a href='../'><img src='images/icon/home.png' height='13px'/> Клиенты</a> / <a href='/?c=".$c."'><img src='images/icon/clients.png' height='13px'/> ".$req1['client_name']."</a> / <a href='/?c=".$c."&s=".$s."'><img src='images/icon/simulator.png' height='13px'/> ".$req2['simulator_name']."</a> / <a href='/?c=".$c."&s=".$s."&l=".$l."'><img src='images/icon/lib.png' height='13px'/> ".$req3['lib_name']."</a></div>";
	if ($del != NULL) { include 'libs_del.php'; } else {
	if ($add != NULL) { include 'elements_add.php'; } else {
	if ($insert != NULL) {include 'elements_insert.php';} else {
	if ($update != NULL) {include 'libs_update.php';} else {
	if ($edit == NULL) {include 'libs_line.php';} else {include 'libs_edit.php';}}}
	include 'elements.php';}}
	} else 
	{
	include 'request.php';
	echo	"<div class='nav'><a href='../'><img src='images/icon/home.png' height='13px'/> Клиенты</a> / <a href='/?c=".$c."'><img src='images/icon/clients.png' height='13px'/> ".$req1['client_name']."</a> / <a href='/?c=".$c."&s=".$s."'><img src='images/icon/simulator.png' height='13px'/> ".$req2['simulator_name']."</a> / <a href='/?c=".$c."&s=".$s."&l=".$l."'><img src='images/icon/lib.png' height='13px'/> ".$req3['lib_name']."</a> / <a href='/?c=".$c."&s=".$s."&l=".$l."&e=".$e."'><img src='images/icon/elem.png' height='13px'/> ".$req4['element_name']."</a></div>";
	if ($update != NULL) {include 'elements_update.php';} else {
	if ($del != NULL) {include 'elements_del.php';} else { 
	if ($edit == NULL) {include 'elements_line.php';} else {include 'elements_edit.php';}}}
	}
	}
	}
	}
?>
</div>
</div>
</div>
    </body>
</html>

