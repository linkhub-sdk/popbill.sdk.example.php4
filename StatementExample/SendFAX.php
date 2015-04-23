<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php 
	include 'common.php';

	$testCorpNum = '1234567890';				# 팝빌 회원 사업자번호, '-' 제외 10자리
	$testUserID = 'testkorea';					# 팝빌 회원 아이디
	$itemCode = '121';							# 명세서 코드 - 121(거래명세서), 122(청구서), 123(견적서) 124(발주서), 125(입금표), 126(영수증)
	$mgtKey = '20150210-01';					# 문서관리번호
	$sender = '07075103710';					# 발신번호	
	$receiver = '010111222';					# 수신팩스번호

	$Presponse = $StatementService->SendFAX($testCorpNum,$itemCode,$mgtKey,$sender,$receiver,$testUserID);
	$code = $Presponse->code;
	$message = $Presponse->message;
?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>전자명세서 팩스전송</legend>
				<ul>
					<li>Response.code : <? echo $code ?></li>
					<li>Response.message : <? echo $message ?></li>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>