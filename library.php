<?
function fir($file){
	$fo = fopen($file, "r");
	$data = @fread($fo, filesize($file));
	fclose($fo);
	return $data;
}
function fia($file,$data){
	$fd = @fopen($file, 'a');
	fwrite($fd, $data);
	fclose($fd);
}
function fiw($file,$data){
	$fd = @fopen($file, 'w');
	fwrite($fd, $data);
	fclose($fd);
}
function cook($par,$val=false){
	if($val!=""){
		setcookie($par, $val, time()+60*60*24*30*6,"/");
	}else{
		setcookie($par, "", time(),"/");
	}
}

$access=0;
if($_COOKIE["user"]!="" || $pass!=""){
	if($pass=="") $pass=$_COOKIE["user"];
	$userDataF=$path."users/q".$pass.".txt";
	if(file_exists($userDataF)){
		$access=1;
		$userAccess=fir($userDataF);
		if(strpos($userAccess,"view")===false){
			$accessView=0;
		}else{
			$accessView=1;
		}
		if(strpos($userAccess,"edit")===false){
			$accessEdit=0;
		}else{
			$accessEdit=1;
		}
		if(strpos($userAccess,"api")===false){
			$accessApi=0;
		}else{
			$accessApi=1;
		}
		if(strpos($userAccess,"history")===false){
			$accessHistory=0;
		}else{
			$accessHistory=1;
		}
	}
}