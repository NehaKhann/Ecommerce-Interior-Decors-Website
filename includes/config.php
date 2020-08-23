<?php
////$con=mysqli_init(); mysqli_ssl_set($con, NULL, NULL, {ca-cert filename}, NULL, NULL); mysqli_real_connect($con, "we-project.mysql.database.azure.com", "neha@we-project", {your_password}, {your_database}, 3306);
//define('DB_SERVER','we-project.mysql.database.azure.com');
//define('DB_USER','neha@we-project');
//define('DB_PASS' ,'Admin123');
//define('DB_NAME', 'we-project');
//$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
////$con->options(MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, false);
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
