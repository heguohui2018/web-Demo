<?php
include('classes/Crud.php');

$crud = new Crud();

$id = $crud->escape_string($_GET['id']);

$result = $crud->delete($id, 'users2');

if ($result) {
	header("Location:index.php");
}
