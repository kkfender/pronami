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
        print'障害中';
        exit();
}

?>

スタッフ修正<br/>

<?php print $staff_code; ?>

<br/>
<br/>

<form method="post" action="staff_edit_check.php">
<input type="hidden" name="code" value="<?php print $staff_code; ?>">
スタッフ名<br/>
<input type="text" name="name" style="width:200px" value="<?php print $staff_name; ?>"><br/>

パスワードを入力してください<br/>
<input type="password" name="pass" style="width:100px"><br/>
パスワードをもう一度<br/>
<input type="password" name="pass2" style="width:100px"><br/>
<br/>
<input type="button" onclick="history.back()" value="戻る"><br/>
<input type="submit" value="OK">

</body>
