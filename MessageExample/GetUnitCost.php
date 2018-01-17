<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php
	include 'common.php';

	$testCorpNum = '1234567890';			# 팝빌 회원 사업자 번호, "-"제외 10자리
	$messageType = ENumMessageType::SMS;	# 문자 전송유형 ENumMessageType::SMS(단문), ENumMessageType::LMS(장문)

	$Presponse = $MessagingService->GetUnitCost($testCorpNum, $messageType);
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
				<legend>전송 단가 확인</legend>
				<ul>
					<?php
						if(!isset($code)) {
					?>
							<li><?php echo $messageType ?> 전송단가 : <?php echo $Presponse ?></li>
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
