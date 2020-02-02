<?php
/**
* Project: Hopuc Note
* File: noteapi.php
*
* @link http://hopuc.com
* @copyright 2019 Hopuc
* @author Hopuc <mail@hopuc.com>
* @version 1.1
* @date 2019-12-23
*
*/
header('Content-Type:text/plain;Charset=utf-8'); 
if(isset($_POST['note'])){
	$json = json_encode($_POST,320);
	$file = fopen('note.txt','w+');
	fwrite($file,$json);
	fclose($file);
	$reuslt = array(
	'status' => 1,
	'message' => '保存成功',
	'ip' => $_SERVER['REMOTE_ADDR'],
	'data' => $json,
	);
	exit(json_encode($reuslt));
}else{
$json_string = file_get_contents('note.txt');
echo $json_string;
}
?>