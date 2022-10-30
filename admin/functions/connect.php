<?php 


define("HOST", 'localhost');
define("USER", 'root');
define("PASS", '');
define("DBNAME", 'import_project');


$conn = new mysqli(HOST , USER , PASS , DBNAME);

// arabic lang
$conn -> set_charset('utf8');