<?
	$title="История склада | TYLER Storage: Sk";
	$path="../";
	require_once($path."library.php");
	require_once($path."head.php");
?>
<div class="container">
	<h1>TYLER Storage: Sk</h1>
	<?
		if($access==0){
			echo '<p>Вы вышли из системы. Попробуйте <a href="..">войти</a> заново.</p>';
		}else if($accessHistory===0){
			echo '<p>У вас нет прав просматривать историю склада. Вернитесь <a href="..">назад</a>.</p>';
		}else{
	?>
			<p><a href="..">← Назад</a></p>
			<?
				$dir = "../backup";
				$n=0;
				$files=scandir($dir);
				foreach($files as $file){
					if(strpos($file,".txt")!=false){
						//$f=file($dir."/".$file);
						$f=$dir."/".$file;
						$linecount = 0;
						$handle = fopen($f, "r");
						while(!feof($handle)){
						  $line = fgets($handle);
						  $linecount++;
						}
						fclose($handle);
						echo "<a href='../backup/".$file."' target='_blank'>".str_replace(".txt","",$file)."</a> (".$linecount." артикулов)<br>";
					}
				}
			?>
	<? } ?>
</div>
</body></html>