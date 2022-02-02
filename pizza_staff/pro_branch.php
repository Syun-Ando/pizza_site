<?php
	# 参照ボタンが押されていれば、商品参照画面へ移動する。
	if(isset($_POST['disp'])==true)
	{
		if(isset($_POST['pizza_code'])==false)
		{
			header('Location: pro_ng.php');
			exit();
		}
		$pro_code=$_POST['pizza_code'];
		header('Location: pro_disp.php?procode='.$pro_code);
		exit();
	}	

	# 追加ボタンが押されていれば、商品追加画面へ移動する。
	if(isset($_POST['add'])==true)
	{
		header('Location: pro_add.php');
		exit();
	}

	# 修正ボタンが押されていれば、商品修正画面へ移動する。
	if(isset($_POST['edit'])==true)
	{
		if(isset($_POST['pizza_code'])==false)
		{
			header('Location: pro_ng.php');
			exit();
		}
		$pro_code=$_POST['pizza_code'];
		header('Location: pro_edit.php?procode='.$pro_code);
		exit();
	}
	# 削除ボタンが押されていれば、商品削除画面へ移動する。
	if(isset($_POST['delete'])==true)
	{
		if(isset($_POST['pizza_code'])==false)
		{
			header('Location: pro_ng.php');
			exit();
		}

		$pro_code=$_POST['pizza_code'];
		header('Location: pro_delete.php?procode='.$pro_code);
		exit();
	}

?>
