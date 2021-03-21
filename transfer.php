<?php
	require 'connect.php';
?>
<form action="transfer.php" method="POST">
	<input placeholder="enter target gmail" name="target">
	<input type="number" name="amount" placeholder="enter amount to transfer">
	<button type="submit" name="trans">Transfer</button>
</form>


<?php
	if(isset($_POST['trans'])){
		$null=NULL;
		$id=$_POST['target'];
		$amount=$_POST['amount'];
		$query="UPDATE clients SET balance=balance+$amount WHERE `email`='$id'";
		$result=mysqli_query($link,$query);
		$query="UPDATE clients SET balance=balance-$amount WHERE `id`=1";
		$result=mysqli_query($link,$query);
		$query="insert into transfers values(NULL,'chmukesh1612@gmail.com','$id',$amount)";
		$result=mysqli_query($link,$query);
	}

?>