<html>  
	<body>
		<?php
			$inputErr = "";
			$digits = "";
			$result = array();
			$combination = array();
			$dialpad;
	
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				if (empty($_POST["digits"])) {
					$inputErr = "Number is required";
				}
				else {
				$digits = $_POST["digits"];
					if (!preg_match('/^[1-9]*$/', $digits))
						$inputErr = "Only numeric values 1-9 allowed!";
					else if(strlen($digits) > 9)
						$inputErr = "Maximum 9 digit allowed!";
					else
					{
						prepareDialpad();
						findCombination(0,0, $result);
					}
				}		
			}
	
			function prepareDialpad() {
				global $dialpad;
				$dialpad = array(
					1 => "",    2 => "ABC", 3 => "DEF",
					4 => "GHI",  5 => "JKL", 6 => "MNO",
					7 => "PQRS", 8 => "TUV", 9 => "WXYZ"
				);
				//echo "<pre>";
				//print_r($dialpad);
			}
			function findCombination($digitsIndex, $chardigitsIndex, $result)
			{
				global $digits, $dialpad, $combination;
				if($digitsIndex >= strlen($digits)){
					$combination[] = $result;
					return;
				}
				else
				{
					$digit = $digits[$digitsIndex];
					$letters = str_split($dialpad[$digit], 1);
					//echo count($letters);
					if ($chardigitsIndex >= count($letters))
						return;
					array_push($result, $letters[$chardigitsIndex]);
					findCombination($digitsIndex + 1, 0, $result);
					array_pop($result);
					findCombination($digitsIndex, $chardigitsIndex + 1, $result);
				}	
			}

		?>
		<form action="" method="post">
			Enter Number: <input type="text" name="digits">
			<span class="error">* <?php echo $inputErr;?></span>
			<br>
			<input type="submit">
		</form>
		<?php
			foreach ($combination as $row)
				echo implode('', $row) . "\n"."<br>";
		?>
	</body>
</html>
