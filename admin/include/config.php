<?php
//define('DB_SERVER','localhost');
//define('DB_USER','root');
//define('DB_PASS' ,'');
//define('DB_NAME', 'shopping');
//$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
//// Check connection
//if (mysqli_connect_errno())
//{
// echo "Failed to connect to MySQL: " . mysqli_connect_error();
//}
//?>
<?php
define('DB_SERVER','niit-php-project-mysqldbserver.mysql.database.azure.com');
define('DB_USER','mysqldbuser@niit-php-project-mysqldbserver');
define('DB_PASS' ,'Admin123');
define('DB_NAME', 'niit_commerce');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>

