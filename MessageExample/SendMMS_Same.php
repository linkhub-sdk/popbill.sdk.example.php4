<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php
	include 'common.php';
	
	$testCorpNum = '1234567890';	# 팝빌 회원 사업자번호, "-"제외 10자리
	$testUserID = 'testkorea';		# 팝빌 회원 아이디
	$reserveDT = null;				# 예약전송일시(yyyyMMddHHmmss), null인경우 즉시전송 

#	$reserveDT = '20150211200000';  

	$senderNum = '07075103710';		#동보메시지 발신자번호
	$subject = '동보메시지 제목';
	$content = '동보메시지 내용. 2000byte';

	$Messages = array();

	for ($i=0; $i<99; $i++){
		$Messages[] = array(
			'rcv' => '010111222',			# 수신번호
			'rcvnm' => '수신자성명'+$i,		# 수신자 성명
		);
	}
	$FilePath = './test.jpg';
	
	#SendMMS(사업자번호, 동보전송발신번호, 동보전송제목 동보전송내용, 전송정보배열,파일경로, 예약전송일시, 회원아이디)
	$Presponse = $MessagingService->SendMMS($testCorpNum, $senderNum, $subject, $content,$Messages, $FilePath, $reserveDT, $testUserID);
	
	if(is_a($Presponse,'PopbillException')){
		$code = $Presponse->code;
		$message = $Presponse->message;
	}
?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>MMS 문자 동보전송</legend>
				<ul>
					<?
						if(!isset($code)) { 
					?>
							<li>receiptNum : <? echo $Presponse?></li>
					<?
						} else {
					?>
							<li>Response.code : <? echo $code ?> </li>
							<li>Response.message : <? echo $message ?></li>
					<?
						}
					?>		
				</ul>
			</fieldset>
		 </div>
	</body>
</html>