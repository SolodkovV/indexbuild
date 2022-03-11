<?php

$connection = mysqli_connect('localhost', 'root', '', 'buildingcompany');
if(!$connection){
	die('Ошибка: Произошла ошибка подключения к базе данных!');
}