<body>

<?php

try
{

$staff_code = $_GET['staffcode'];

$dsn = 'mysql:dbname=php;host=localhost;charset=utf8mb4';
$user = 'root';
$password = 'root';
$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT name FROM mst_staff WHERE code = ?';
$stmt = $dbh->prepare($sql);
$data[] = $staff_code;
$stmt->execute($data);

$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$staff_name = $rec['name'];

$dbh = null;

}
catch (Exception $e)
{
        print'shogaichu';
        exit();
}

?>

スタッフ削除<br/>
<?php print $staff_name; ?>
<br/>
このスタッフを削除してよろしいですか？<br/>

<form method="post" action="staff_delete_done.php">
<input type="hidden" name="code" value="<?php print $staff_code; ?>">
<input type="button" onclick="history.back()" value="戻る"><br/>
<input type="submit" value="OK">

</body>
