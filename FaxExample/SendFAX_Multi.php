<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php
	include 'common.php';

	$testCorpNum = '1234567890';	#팝빌 회원 사업자번호
	$testUserID = 'testkorea';		#팝빌 회원 아이디
#	$reserveDT = null;				#예약전송일시(yyyyMMddHHmmss), null인경우 즉시전송
	$reserveDT = '20151212230000';
	$Sender = '07075103710';		#발신번호

	$Receivers = array();

	$Receivers[] = array(
		'rcv' => '010111222',			#수신번호
		'rcvnm' => '팝빌담당자'		#수신자 명칭
	);

	#동보전송을 위해 1000건까지 반복가능.
	$Receivers[] = array(
		'rcv' => '010111222',		#수신번호
		'rcvnm' => '수신자성명'		#수신자 명칭
	);

	#해당파일에 읽기 권한이 설정되어 있어야 함. 최대 20개.
	$Files = array('./uploadtest.jpg','./uploadtest2.jpg');

	$Presponse = $FaxService->SendFAX($testCorpNum,$Sender,$Receivers, $Files, $reserveDT, $testUserID);

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
				<legend>팩스전송_Multi</legend>
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
