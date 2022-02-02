<?php
	# 参照ボタンが押されていれば、スタッフ参照画面へ移動する。
	if(isset($_POST['disp'])==true)
	{
		if(isset($_POST['staffcode'])==false)
		{
			header('Location: staff_ng.php');
			exit();
		}
		$staff_code=$_POST['staffcode'];
		header('Location: staff_disp.php?staffcode='.$staff_code);
		exit();
	}	

	# 追加ボタンが押されていれば、スタッフ追加画面へ移動する。
	if(isset($_POST['add'])==true)
	{
		header('Location: staff_add.php');
		exit();
	}

	# 修正ボタンが押されていれば、スタッフ修正画面へ移動する。
	if(isset($_POST['edit'])==true)
	{
		if(isset($_POST['staffcode'])==false)
		{
			header('Location: staff_ng.php');
			exit();
		}
		$staff_code=$_POST['staffcode'];
		header('Location: staff_edit.php?staffcode='.$staff_code);
		exit();
	}
	# 削除ボタンが押されていれば、スタッフ削除画面へ移動する。
	if(isset($_POST['delete'])==true)
	{
		if(isset($_POST['staffcode'])==false)
		{
			header('Location: staff_ng.php');
			exit();
		}

		$staff_code=$_POST['staffcode'];
		header('Location: staff_delete.php?staffcode='.$staff_code);
		exit();
	}

?>
