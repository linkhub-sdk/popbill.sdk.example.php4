<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php
	include 'common.php';

	$testCorpNum = '1234567890';				#팝빌 회원 사업자번호, "-"제외 10자리
	$testUserID = 'testkorea';					#팝빌 회원 아이디
	$ReceiptNum = '015020611434500001';			#예약전송팩스 접수번호

	#예약팩스 전송취소는 전송시간 10분전까지만 가능합니다
	$Presponse = $FaxService->CancelReserve($testCorpNum ,$ReceiptNum, $testUserID);
	$code = $Presponse->code;
	$message = $Presponse->message;
?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>예약전송건 취소 </legend>
				<ul>
					<li>Response.code : <?php echo $code ?></li>
					<li>Response.message : <?php echo $message ?></li>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
