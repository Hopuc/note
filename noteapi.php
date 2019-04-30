<?php
/**
* Project: Hopuc Note
* File: noteapi.php
*
* @link http://hopuc.con
* @copyright 2019 Hopuc	
* @author Hopuc <mail@hopuc.com>
* @version 1.0 
* @date 2019-04-30
*
*/
header('Content-Type:text/html;Charset=utf-8'); 
if(isset($_POST['note'])){
	$json = json_encode($_POST,320);
	$file = fopen('note.txt','w+');
	fwrite($file,$json);
	fclose($file);
	$reuslt = array(
	'status' => 1,
	'message' => '保存成功',
	'data' => $json,
	);
	exit(json_encode($reuslt));
}else{
$json_string = file_get_contents('note.txt');
echo $json_string;
}
?>