<?
	$title="Обновление склада | TYLER Storage: Sk";
	$path="../";
	require_once($path."library.php");
	require_once($path."head.php");
?>
<div class="container">
	<h1>TYLER Storage: Sk</h1>
	<?
		if($access==0){
			echo '<p>Вы вышли из системы. Попробуйте <a href="..">войти</a> заново.</p>';
		}else if($accessEdit===0){
			echo '<p>У вас нет прав редактировать базу данных склада. Вернитесь <a href="..">назад</a>.</p>';
		}else{
			if($_POST["dbUpdate"]=="СОХРАНИТЬ"){
				$dbText=$_POST["dbText"];
				if($_POST["dbOrder"]=="yes"){
					$dbText=explode("\n", $dbText);
					sort($dbText);
					$dbText=join("\n", $dbText);
				}
				$dbText=explode("\n", $dbText);
				for($i=0;$i<sizeof($dbText);$i++){
					$dbText[$i]=trim($dbText[$i]);
				}
				$dbText=join("\n", $dbText);
				$dbText=str_replace(" ", "\t", $dbText);
				$dbText=trim($dbText);
				if($_POST["dbNull"]=="yes"){
					$dbText=explode("\n", $dbText);
					$dbTextDelete=[];
					for($i=0;$i<sizeof($dbText);$i++){
						$dbText[$i]=explode("\t", $dbText[$i]);
						if($dbText[$i][1]<=0){
							array_push($dbTextDelete,$i);
						}else{
							$dbText[$i]=join("\t", $dbText[$i]);
						}
					}
					for($i=0;$i<sizeof($dbTextDelete);$i++){
						unset($dbText[$dbTextDelete[$i]]);
					}
					$dbText=join("\n", $dbText);
				}
				fiw("../db.txt",$dbText);
				fiw("../backup/db_".date("Ymd_His").".txt",$dbText);
			}
			
			$dbContent=fir("../db.txt");
	?>
			<p><a href="..">← Назад</a></p>
			<form action="" method="post">
				<p>В качестве значений вводить массу в&nbsp;граммах</p>
				<textarea rows="10" cols="50" name="dbText" class="uiTextarea"><?=$dbContent?></textarea>
				<br /><br /><input type="checkbox" name="dbOrder" id="dbOrder" value="yes" /><label for="dbOrder"> Сортировать по алфавиту</label>
				<br /><input type="checkbox" name="dbNull" id="dbNull" value="yes" /><label for="dbNull"> Удалить нулевые значения</label>
				<br /><br />
				<input type="submit" value="СОХРАНИТЬ" name="dbUpdate" class="btnSubmit" />
			</form>
	<? } ?>
</div>
</body></html>