<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>

<?php

$pro_code=$_POST['code'];
$pro_name=$_POST['name'];
$pro_price=$_POST['price'];
$pro_gazou_name_old=$_POST['gazou_name_old'];
$pro_gazou=$_FILES['gazou'];

$pro_code=htmlspecialchars($pro_code, ENT_QUOTES, 'UTF-8');
$pro_name=htmlspecialchars($pro_name, ENT_QUOTES, 'UTF-8');
$pro_price=htmlspecialchars($pro_price, ENT_QUOTES, 'UTF-8');

if($pro_name=='')
{
	print '商品名が入力されていません。<br />';
}
else
{
	print '商品名:';
	print $pro_name;
	print '<br />';
}

if(preg_match('/^[0-9]+$/',$pro_price)==0)
{
	print '価格をきちんと入力してください。<br />';
}
else
{
	print '価格:';
	print $pro_price;
	print '円<br />';
}

if($pro_gazou['size'] > 0)
{
	if($pro_gazou['size'] > 1000000)
	{
		print'画像が大きすぎます';
	}
	else
	{

		move_uploaded_file($pro_gazou['tmp_name'],'./gazou/'.$pro_gazou['name']);
		print '<img src="./gazou/'.$pro_gazou['name'].'">';
		print '<br />';
	}
}


if($pro_name=='' || preg_match('/^[0-9]+$/',$pro_price)==0 || $pro_gazou['size']>100000000)
{
	print '<form>';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '</form>';
}
else
{
	print '上記の様に変更します。<br />';
	print '<form method="post" action="pro_edit_done.php">';
	print '<input type="hidden" name="code" value="'.$pro_code.'">';
	print '<input type="hidden" name="name" value="'.$pro_name.'">';
	print '<input type="hidden" name="price" value="'.$pro_price.'">';
	print '<input type="hidden" name="gazou_name_old" value="'.$pro_gazou_name_old .'">';
	print '<input type="hidden" name="gazou_name" value="'.$pro_gazou['name'] .'">';
	print '<br />';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '<input type="submit" value="ＯＫ">';
	print '</form>';
}

?>
</body>
</html>
