<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php 
	include 'common.php';

	$testCorpNum = '1234567890';			# 팝빌 회원 사업자번호, '-' 제외 10자리
	$mgtKey = '20150210-01';				# 문서관리번호
	$memo = '현금영수증 발행취소메모';		# 메모	

	$Presponse = $CashbillService->CancelIssue($testCorpNum,$mgtKey,$memo);
?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>현금영수증 발행취소</legend>
				<ul>
					<li>Response.code : <? echo $Presponse->code ?></li>
					<li>Response.message : <? echo $Presponse->message ?></li>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>