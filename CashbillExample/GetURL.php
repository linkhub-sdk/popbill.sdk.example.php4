<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php
	include 'common.php';

	$testCorpNum = '1234567890';	# 팝빌 회원 사업자 번호, "-"제외 10자리
	$testUserID = 'testkorea';		# 팝빌 회원 아이디
	$TOGO = 'TBOX';				# TBOX(임시문서함), PBOX(발행문서함), WRITE(현금영수증 작성)

	$Presponse = $CashbillService->GetURL($testCorpNum, $testUserID, $TOGO);

	if(is_a($Presponse, 'PopbillException')){
		$code = $Presponse->code;
		$message = $Presponse->message;
	}
?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>현금영수증 관련 URL 확인</legend>
				<ul>
					<?php
						if(!isset($code)) {
					?>
							<li>url : <?php echo $Presponse ?></li>
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
