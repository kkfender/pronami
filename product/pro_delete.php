<body>

<?php

try
{

$pro_code = $_GET['procode'];

$dsn = 'mysql:dbname=php;host=localhost;charset=utf8mb4';
$user = 'root';
$password = 'root';
$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT name,gazou FROM mst_product WHERE code = ?';
$stmt = $dbh->prepare($sql);
$data[] = $pro_code;
$stmt->execute($data);

$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$pro_name = $rec['name'];
$pro_gazou_name = $rec['gazou'];
$dbh = null;

if($pro_gazou_name == '')
{
	$disp_gazou='';
}
else
{
	$disp_gazou='<img src="./gazou/'.$pro_gazou_name.'">';
}

}
catch (Exception $e)
{
        print'shogaichu';
        exit();
}

?>

商品削除<br/>
<br/>
商品コード<br />
<?php print $pro_code; ?>
商品名<br />
<?php print $pro_name; ?>
<br/>
<?php print $disp_gazou; ?>
<br />
この商品を削除してよろしいですか？<br/>

<form method="post" action="pro_delete_done.php">
<input type="hidden" name="code" value="<?php print $pro_code; ?>">
<input type="hidden" name="gazou" value="<?php print $pro_gazou_name; ?>">
<input type="button" onclick="history.back()" value="戻る"><br/>
<input type="submit" value="OK">

</body>
