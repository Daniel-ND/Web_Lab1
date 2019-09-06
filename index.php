<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Моя страница</title>
		<link rel="stylesheet" href="style.css">
		<script src="script.js"></script>
	</head>
	<body>
		<table id="main">
			<tr>
				<th id="cap" colspan=2>
					Лабораторная №1 <br>
					Вариант 211016 <br>
					Никольская Дарья Владимировна 
				</th>
			</tr>
			<tr>
				<th class="column">
					<img src="img/gr.jpg">
				</th>
				<th class="column">
					<fieldset>
						<legend>Введите пераметр и координаты точки</legend>
						<form action="index.php">
							<table width="100%"> <tr> <td>
							<label for="x">Изменение X:</label>
							</td> <td>
							<select id="x" name="x" size=1 style="width: 70%;">
									<option selected disabled>выберите значение</option>
									<option>-4</option> 
									<option>-3</option> 
									<option>-2</option> 
									<option>-1</option> 
									<option>0</option> 
									<option>1</option> 
									<option>2</option> 
									<option>3</option> 
									<option>4</option> 
							</select> 
							</td> </tr> <tr> <td>
							<label for="y">Изменение Y:</label>
							</td> <td>
							<input type="text" id="y" name="y" maxlength="10" placeholder="should be in (-3..5)" style="width: 70%;">
							</td> </tr> <tr> <td>
							<label for="r">Изменение R:</label>
							</td> <td>
							<input type="text" id="r" name="r" style="visibility: hidden; position: absolute;">
							<div>
								<button id="btn_R1" type="button" onclick="setNewR('1')">1</button>
								<button id="btn_R2" type="button" onclick="setNewR('2')">2</button>
								<button id="btn_R3" type="button" onclick="setNewR('3')">3</button>
								<button id="btn_R4" type="button" onclick="setNewR('4')">4</button>
								<button id="btn_R5" type="button" onclick="setNewR('5')">5</button>
							</div>
							</td> </tr> <tr> <td colspan="2">
							<input type = "submit" name = "submit">
							</td> </tr> </table>
						</form>
					</fieldset>
					<br><br>

					<?php
						$start=microtime(true); 
						date_default_timezone_set("UTC"); 
						
						if (!isset( $_GET['submit'])) 
						{
						   exit;
						}
						echo '<a href="https://se.ifmo.ru/~s265091/lab1/index.php">Back</a>';
						// echo "<meta http-equiv='refresh' content='1;url=index.php'>";
						if(!isset($_GET['x'])) {echo "Значение X не заполнено<br>"; exit;}
						if($_GET['r'] == "") {echo "Значение R не заполнено<br>"; exit;}

						 $var_y=$_GET['y'];
						if ($var_y =="") {echo "Значение Y не заполнено"; exit;}
						
					    elseif (!is_numeric($var_y)) {echo "Y should be a number"; exit;}
					    elseif (!(ceil((double)$var_y) > -3 && floor((double)$var_y) < 5)) {
					    	echo "Y should be in (-3..5)"; exit;
					    }
						else {
						 		$var_x=(int)$_GET['x'];
						 		$var_y=(double)$var_y;
					 	 		$var_r=(int)$_GET['r'];
						 		echo '<table style="width: 30%; margin: auto;" border=1><tr><td>X</td><td>'.$_GET['x'].'</td></tr>';
						 	    echo '<tr><td>Y</td><td>'.$_GET['y'].'</td></tr>';
						 	 	echo '<tr><td>R</td><td>'.$_GET['r'].'</td></tr>';

						 		if($var_x <= 0){
						 			if($var_y < 0) {echo "<tr>Point is outside</tr></table>";}
						 			elseif($var_y +(-1)*$var_x <= $var_r/2) {echo "<tr>Point is inside</tr></table>"; }
						 			else {echo "<tr>Point is outside</tr></table>";}
						 		} 
						 		else{
						 			if($var_y <= 0 && pow($var_y, 2)+pow($var_x, 2) <= pow($var_r, 2)) {echo "<tr>Point is inside</tr></table>";} 
						 			elseif($var_x<=$var_r/2 && $var_y <=$var_r) {echo "<tr>Point is inside</tr></table>";}
						 			else {echo "<tr>Point is outside</tr></table>";} 
						 		}
						 		
						 		$time = time() + 3*3600; 
								echo "<p id='time'>Текущее время: ".date("H:i:s", $time)."</p>";
								$t=number_format((float)(microtime(true)-$start), 8, '.', '');
								echo "Время работы скрипта: ".$t."msec";
						} 
					?>
				</th>
			</tr>
		</table>
	</body>
</html>
