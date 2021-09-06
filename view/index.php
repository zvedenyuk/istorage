<?
	$title="Просмотр склада | TYLER Storage: Sk";
	$path="../";
	require_once($path."library.php");
	require_once($path."head.php");
?>
<div class="container">
	<h1>TYLER Storage: Sk</h1>
	<?
		if($access==0){
			echo '<p>Вы вышли из системы. Попробуйте <a href="..">войти</a> заново.</p>';
		}else if($accessView===0){
			echo '<p>У вас нет прав просматривать базу данных склада. Вернитесь <a href="..">назад</a>.</p>';
		}else{
	?>
			<p><a href="..">← Назад</a></p>
			<table>
				<tr><td>АРТИКУЛ</td><td>МАССА, г</td><td>КОЛ-ВО, шт</td></tr>
				<?
					$dbContent=fir("../db.txt");
					$dbContentArr=explode("\n",$dbContent);
					foreach($dbContentArr as $val){
						$val=explode("\t", $val);
						$quan=round($val[1]/0.7);
						if($quan<0) $quan=0;
						echo '<tr><td>'.$val[0].'</td><td>'.$val[1].'</td><td>'.$quan.'</td></tr>';
					}
				?>
			</table>
			<br /><br />
	<? } ?>
</div>
</body></html>