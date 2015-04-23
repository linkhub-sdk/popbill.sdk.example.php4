<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php 
	include 'common.php';

	$testCorpNum = '1234567890';		# 팝빌회원 사업자번호, '-'제외 10자리
	$mgtKey = '20150209-01';			# 문서관리번호, 발행자별로 중복없이 1~24자리 영문,숫자로 구성
	$mgtKeyType = MgtKeyType_SELL;		# 발행유형, MgtKeyType_SELL:매출, MgtKeyType_BUY:매입, MgtKeyType_TURSEE:위수탁
	
	$Presponse = $TaxinvoiceService->CheckMgtKeyInUse($testCorpNum,$mgtKeyType,$mgtKey);
	$Presponse ? $Presponse = '사용중' : $Presponse = '미사용중';

	if(is_a($Presponse, 'PopbillException')) {
		$code = $Presponse->code;
		$message = $Presponse->message;
	}
?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>문서관리번호 사용여부 확인</legend>
				<ul>
					<?
						if(!isset($code)) { 
					?>
							<li>문서관리번호 사용여부 : <? echo $Presponse ?></li>					
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