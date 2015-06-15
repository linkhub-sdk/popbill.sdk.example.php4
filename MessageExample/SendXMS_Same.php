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
#	$reserveDT = '20150210200000';  
	
	$senderNum = '07075103710';		# 동보전송 메시지 발신번호
	$subject = '동보전송 메시지 제목';
	$content = '동보전송 메시지 내용';
	
	$Messages = array();

	for ($i=0; $i<49; $i++){
		$Messages[] = array(
			'rcv' => '010111222',			# 수신번호
			'rcvnm' => '수신자성명',		# 수신자성명
		);
	}

	for ($i=50; $i<99; $i++){
		$Messages[] = array(
			'rcv' => '010111222',			# 수신번호
			'rcvnm' => '수신자성명',		# 수신자성명
		);
	}

	#자동인식 문자전송의 경우 문자메시지 내용의 길이에 따라 90Byte 이상인 경우 장문(LMS)으로 전송됩니다.
	#SendXMS(사업자번호, 동보전송발신번호, 동보전송제목, 동보전송내용, 전송정보배열, 예약전송일시, 회원아이디)
	$Presponse = $MessagingService->SendXMS($testCorpNum,$senderNum,$subject,$content,$Messages, $reserveDT, $testUserID);

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
				<legend>장/단문 자동인식 문자 동보전송</legend>
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