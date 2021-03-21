<?php
	require_once("connect.php");
	$query="select balance from clients where id=1";
	$result=mysqli_query($link,$query);
	$balance=mysqli_fetch_assoc($result);
	// print_r($balance);
?>
<style type="text/css">
	*{
		margin: 0px;
		padding: 0px;
	}
	.example::-webkit-scrollbar {
	  display: none;
	}
	.example {
	  -ms-overflow-style: none;
	  scrollbar-width: none;
	}
	table { 
		width: 750px; 
		border-collapse: collapse; 
		margin:50px auto;
		}
	tr:nth-of-type(odd) { 
		background: #eee; 
		}
	th { 
		background: #3498db; 
		color: white; 
		font-weight: bold; 
		}
	td, th { 
		padding: 10px; 
		border: 1px solid #ccc; 
		text-align: left; 
		font-size: 18px;
		}
	button {
	  display: inline-block;
	  padding: 6px 10px;
	  font-size: 20px;
	  cursor: pointer;
	  text-align: center;
	  text-decoration: none;
	  outline: none;
	  color: #fff;
	  background-color: #4CAF50;
	  border: none;
	  border-radius: 15px;
	  box-shadow: 0 9px #999;
	}

	button:hover {background-color: #3e8e41}

	button:active {
	  background-color: #3e8e41;
	  box-shadow: 0 5px #666;
	  transform: translateY(4px);
	}

	@media 
	only screen and (max-width: 760px),
	(min-device-width: 768px) and (max-device-width: 1024px)  {

		table { 
		  	width: 100%; 
		}

		table, thead, tbody, th, td, tr { 
			display: block; 
		}
		thead tr { 
			position: absolute;
			top: -9999px;
			left: -9999px;
		}
		
		tr { border: 1px solid #ccc; }
		td { 
			border: none;
			border-bottom: 1px solid #eee; 
			position: relative;
			padding-left: 50%; 
		}
		td:before { 
			position: absolute;
			top: 6px;
			left: 6px;
			width: 45%; 
			padding-right: 10px; 
			white-space: nowrap;
			content: attr(data-column);
			color: #000;
			font-weight: bold;
		}
	}
	.header {
	  padding: 60px;
	  text-align: center;
	  background: #1abc9c;
	  color: white;
	  font-size: 30px;
	}
</style>
<body class="example">
	<div class="header">
		<h1>chmukesh1612@gmail.com</h1>
		<br><br>
		<p>WALLET BALANCE: <label style="color: white; background-color: violet;padding: 10px;"><?php echo $balance['balance'];?> ₹</label></p>
	</div>

	<?php
		$query="SELECT * FROM clients";
		$result=mysqli_query($link,$query);
	?>
	<table>
		<tr>
			<th>Name</th>
			<th>Email address</th>
			<th></th>
		</tr>
	<?php
		while($row=mysqli_fetch_array($result)){
			if($row['id']==1) continue;
			echo "<form action='transfer.php' method='POST'><tr>
					<td>".
						$row['name']
					."</td>
					<td>".
						$row['email']
					."</td>
					<td>
						<button type='submit' value=".$row['id'].">pay now ➤</button>
					</td>
				</tr></form>";
		}

	?>
	</table>
</body>