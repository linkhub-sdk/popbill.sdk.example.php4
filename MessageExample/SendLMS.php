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
	#$reserveDT = '20150211200000';

	$Messages = array();

	$Messages[] = array(
		'snd' => '07075106766',			# 발신번호
		'rcv' => '010111222',			# 수신번호
		'rcvnm' => '수신자성명',		# 수신자 성명
		'msg'	=> '개별 메시지 내용',	# 개별 메시지 내용. 장문은 2000byte로 길이가 조정되어 전송됨.
		'sjt'	=> '개발 메시지 제목'	# 개별 메시지 내용
	);

	#SendLMS(사업자번호, 동보전송발신번호, 동보전송제목 동보전송내용, 전송정보배열, 예약전송일시, 회원아이디)
	$Presponse = $MessagingService->SendLMS($testCorpNum,'','','',$Messages, $reserveDT, $testUserID);

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
				<legend>장문문자 전송</legend>
				<ul>
					<?php
						if(!isset($code)) {
					?>
							<li>receiptNum : <?php echo $Presponse?></li>
					<?php
						} else {
					?>
							<li>Response.code : <?php echo $code ?> </li>
							<li>Response.message : <?php echo $message ?></li>
					<?php
						}
					?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
