
<?php
$dsn="mysql:host=localhost;dbname=userd";
$username="root";
$pass="";


try
{
    $db=new PDO($dsn,$username,$pass);

}
catch(Exception $e)
{
    $error=$e->getmessage();
    echo "$error";
}
?>


