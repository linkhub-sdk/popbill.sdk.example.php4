<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php
	include 'common.php';

	$testCorpNum = '1234567890';		# 팝빌 회원 사업자 번호, "-"제외 10자리
	$testUserID = 'testkorea';			# 팝빌 회원 아이디
								
	$mgtKeyList = array (				# 문서관리번호배열, 최대 100건
				'20150210-01',
				'20150210-02',
				'20150210-03',
	);

	$Presponse = $CashbillService->GetMassPrintURL($testCorpNum,$mgtKeyList,$testUserID);

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
				<legend>현금영수증 다량 인쇄 URL </legend>
				<ul>
					<?
						if(!isset($code)) { 
					?>
							<li>url : <? echo $Presponse ?></li>
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