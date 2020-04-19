<?php
/**
* Project: Hopuc Note
* File: noteapi.php
*
* @link http://hopuc.com
* @copyright 2020 Hopuc
* @author Hopuc <mail@hopuc.com>
* @version 1.2
* @date 2020-04-11
*
*/
header('Content-Type:application/json;Charset=utf-8');

$time=date("Y-m-d H:i:s");
$ip = $_SERVER['REMOTE_ADDR'];

if(isset($_POST['note'])){
	
	$content = array(
		'ip' => $ip,
		'time' => $time,
		'note' => $_POST['note'],
	);
	
	$json = json_encode($content,320);
	
	/* $file = fopen('note.json','w+');
	fwrite($file,$json);
	fclose($file); */
	
	file_put_contents('note.json',$json);
	
	$result = array(
		'success' => true,
		'message' => '保存成功',
		'data' => $content,
	);
	echo json_encode($result,320);
}else{
	$json_string = @file_get_contents('note.json');
	if($json_string==null||$json_string==''){
		$content = array(
			'ip' => $ip,
			'time' => $time,
			'note' => '你还未保存任何内容',
		);
		echo json_encode($content,320);
	}else{
		echo $json_string;
	}
}
?>