<?
	$pass=md5($_GET["token"]);
	
	$path="../";
	require_once($path."library.php");
?>

<?
if($_GET["token"]==""){
	echo 'Bad request';
}else if($access===0 || $accessApi===0){
	echo 'You don\'t have access to the API.';
}else{
	$dbContent=fir("../db.txt");
	$dbContentArr=explode("\n", $dbContent);
	$dbContentSum=[];
	foreach($dbContentArr as $val){
		$val=explode("\t",$val);
		$dbContentSum[$val[0]]=$dbContentSum[$val[0]]+$val[1];
	}
	echo '{';
	foreach($dbContentSum as $k=>$v){
		$quan=round($v/0.7);
		if($quan<0) $quan=0;
		echo '"'.$k.'":'.$quan.',';
	}
	echo '}';
}