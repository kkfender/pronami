<body>

<?php

try
{

$staff_code = $_POST['code'];
$staff_name = $_POST['name'];
$staff_pass = $_POST['pass'];

$staff_name = htmlspecialchars($staff_name, ENT_QUOTES, 'UTF-8');
$staff_pass = htmlspecialchars($staff_pass, ENT_QUOTES, 'UTF-8');

$dsn = 'mysql:dbname=php;host=localhost;charset=utf8mb4';
$user = 'root';
$password = 'root';
$dbh = new PDO($dsn, $user, $password);

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'UPDATE mst_staff SET name=?, password=? WHERE code=?';
$stmt = $dbh->prepare($sql);
$data[] = $staff_name;
$data[] = $staff_pass;
$data[] = $staff_code;
$stmt->execute($data);

$dbh = null;
}
catch(Exception $e)
{
print $e->getMessage()." - ".$e->getLine().PHP_EOL;

	print $e;
	print 'ただいま小がいちゅ';
}
?>
修正しました<br/>
<br/>
<a href="staff_list.php">戻る</a>
