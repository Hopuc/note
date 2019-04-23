<?php
header('Content-Type:text/html;Charset=utf-8'); 
if(isset($_POST['note'])){
	if(empty($_POST['note'])){
		$reuslt = array(
		'status' => 0,
		'message' => '保存内容不能为空',
		'data' => $json,
		);
		exit(json_encode($reuslt));
	}else{
		$userInfo = $_POST;
		$json = json_encode($userInfo,320);
		$file = fopen('note.txt','w+');
		fwrite($file,$json);
		fclose($file);
		$reuslt = array(
		'status' => 1,
		'message' => '保存成功',
		'data' => $json,
		);
		exit(json_encode($reuslt));
	}
}else{
$json_string = file_get_contents('note.txt');
//$data = json_decode($json_string, true);
echo $json_string;
//var_dump($data);
}
?>