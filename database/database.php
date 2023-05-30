
<?php
require_once("data.php");

$db = new Database();
echo $db->Isconnected() ? "db is conneted" : "db is not connected";


if(!$db->Isconnected())
{
   echo $db->geterror();
   die("unable to connect db");
}

$db->query("SELECT * FROM proj1");
var_dump($db -> resultset());

var_dump($db->getrowcount());
var_dump($db->single());

$db->query("SELECT * FROM proj1 where id=:id");
$db->bind(':id',101);
var_dump($db->single());
 
?>
