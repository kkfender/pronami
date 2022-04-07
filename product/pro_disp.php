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

$sql = 'SELECT name,price,gazou FROM mst_product WHERE code = ?';
$stmt = $dbh->prepare($sql);
$data[] = $pro_code;
$stmt->execute($data);

$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$pro_name = $rec['name'];
$pro_price = $rec['price'];
$pro_gazou_name = $rec['gazou'];


$dbh = null;

if ($pro_gazou_name=='')
{
	$disp_gazou='';
}
else
{
	$disp_gazou='<img src="./gazou/'.$pro_gazou_name.'">';
}


var_dump(disp_gazou);
}
catch (Exception $e)
{
        print'障害中';
        exit();
}

?>

商品情報参照<br/>
<br/>
商品コード<br/>
<?php print $pro_code; ?>
<br/>
商品名<br/>
<?php print $pro_name; ?>
<br/>
<br/>
<?php print $disp_gazou; ?>
<br />
<form>
<input type="button" onclick="history.back()" value="戻る"><br/>
</form>
</body>
