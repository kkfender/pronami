<body>

<?php

try
{

$pro_code = $_POST['code'];
$pro_gazou_name = $_POST['gazou_name'];

$dsn = 'mysql:dbname=php;host=localhost;charset=utf8mb4';
$user = 'root';
$password = 'root';
$dbh = new PDO($dsn, $user, $password);

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'DELETE FROM mst_product WHERE code=?';
$stmt = $dbh->prepare($sql);
$data[] = $pro_code;
$stmt->execute($data);

$dbh = null;

if($pro_gazou_name != '')
{
	unlink('./gazou/'.$pro_gazou_name);
}
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
<a href="pro_list.php">戻る</a>
