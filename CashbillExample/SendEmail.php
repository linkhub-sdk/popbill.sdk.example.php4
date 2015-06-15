<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php 
	include 'common.php';

	$testCorpNum = '1234567890';	# 팝빌 회원 사업자번호, "-" 제외 10자리
	$mgtKey = '20150210-01';		# 문서관리번호
	$receiver = 'frenchofkiss@gmail.com';	# 수신 이메일주소

	$Presponse = $CashbillService->SendEmail($testCorpNum,$mgtKey,$receiver);
?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>알림메일 재전송</legend>
				<ul>
					<li>Response.code : <? echo $Presponse->code ?></li>
					<li>Response.message : <? echo $Presponse->message ?></li>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
