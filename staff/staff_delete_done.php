<body>

<?php

try
{

$staff_code = $_POST['code'];

$dsn = 'mysql:dbname=php;host=localhost;charset=utf8mb4';
$user = 'root';
$password = 'root';
$dbh = new PDO($dsn, $user, $password);

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'DELETE FROM mst_staff WHERE code=?';
$stmt = $dbh->prepare($sql);
$data[] = $staff_code;
$stmt->execute($data);

$dbh = null;
}
catch(Exception $e)
{
print $e->getMessage()." - ".$e->getLine().PHP_EOL;

	print $e;
	print 'ただいま障害中';
}
?>
削除しました<br/>
<br/>
<a href="staff_list.php">戻る</a>
