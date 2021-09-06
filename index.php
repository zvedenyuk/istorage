<?
	
	if($_POST["dbLogin"]=="ВОЙТИ"){
		$pass=md5($_POST["pass"]);
	}

	$title="Доступ к складу | TYLER Storage: Sk";
	$path="";
	require_once($path."library.php");
	require_once($path."head.php");

	if($_POST["dbLogin"]=="ВОЙТИ"){
		cook("user",$pass);
	}
?>
<div class="container">
	<h1>TYLER Storage: Sk</h1>
	<?
		if($pass=="" || $access==0){
			if($_POST["dbLogin"]=="ВОЙТИ" && $access===0){
				echo '<p style="color:red">Введён неправильный код</p>';
			}
	?>
	<p>Пожалуйста введите свой код доступа</p>
	<form action="" method="post">
		<br /><input type="password" name="pass" placeholder="*****" />
		<br /><br /><input type="submit" value="ВОЙТИ" class="btnSubmit" name="dbLogin" />
	</form>
	<?
		}
		if($access==1){
			echo '<p>Вам открыт доступ к складу. Ваши права: '.$userAccess.'</p><br />';
			if($accessView===1){
				echo '<p><a href="view">Просмотреть состояние склада</a></p>';
			}else{
				echo '<p>Просмотреть состояние склада</p>';
			}
			if($accessEdit===1){
				echo '<p><a href="edit">Обновить склад</a></p>';
			}else{
				echo '<p>Обновить склад</p>';
			}
			if($accessApi===1){
				echo '<p><a href="api">Доступ к API</a></p>';
			}else{
				echo '<p>Доступ к API</p>';
			}
			if($accessHistory===1){
				echo '<p><a href="history">История склада</a></p>';
			}else{
				echo '<p>История склада</p>';
			}
		}
	?>
</div>
</body></html>