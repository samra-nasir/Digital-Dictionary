<?php

$str = file_get_contents('dictionary.json');
$json = json_decode($str, true); // decode the JSON into an associative array
//print_r($json);


?>

<html>	
	<head>
	<style>
		body{
			
			padding: 3% 7%;
			color: #379cd8;
		}
	</style>
	
	</head>
	<body>
	
	<h1 style='font-size: 40px'>Dictionary</h1>
	
		<center>
		<form action="" method="post">
			<label style="color:black">Search Word: </label>
			<input type="text" name="word"/>
			<input type="submit" name="submit" value="Search">
		</form>
		</center>
		<br>
		<div>
		
			<?php

				if(isset($_POST['submit'])) {
	
				//getting value of search 
					$word = $_POST['word'];
					$count = 0;
	
					print "<span style='color:black;'>Showing result for </span><span style='font-weight:bold; font-size: 20px'>" .$word."</span><hr>";
					foreach( $json as $k=>$v ){
						if(preg_match('#^'.$word.'#i', $k) === 1){
							print "<span style='font-weight:bold'>$k<br></span><span style='color:black'>$v</span><br><br>";
							$count = 1;
						}
					}
	
					if($count==0)
						print "<div style='color:red;font-weight:bold;padding: 1% 0%'>No result found!</div>";
 
					}

			?>
		
		</div>
		
		
	</body>
	
</html>

