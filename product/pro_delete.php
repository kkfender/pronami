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

$sql = 'SELECT name FROM mst_product WHERE code = ?';
$stmt = $dbh->prepare($sql);
$data[] = $pro_code;
$stmt->execute($data);

$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$pro_name = $rec['name'];

$dbh = null;

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
この商品を削除してよろしいですか？<br/>

<form method="post" action="pro_delete_done.php">
<input type="hidden" name="code" value="<?php print $pro_code; ?>">
<input type="button" onclick="history.back()" value="戻る"><br/>
<input type="submit" value="OK">

</body>
