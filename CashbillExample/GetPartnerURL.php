<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php
  /**
  * 파트너 포인트 충전 팝업 URL을 반환합니다.
  * - 반환된 URL은 보안정책에 따라 30초의 유효시간을 갖습니다.
  */

	include 'common.php';

  # 팝빌 회원 사업자 번호, "-"제외 10자리
	$testCorpNum = '1234567890';

  # [CHRG] : 포인트충전 팝업 URL
	$TOGO = 'CHRG';

	$Presponse = $CashbillService->GetPartnerURL($testCorpNum, $TOGO);

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
				<legend>파트너 포인트 충전 팝업 URL URL 확인</legend>
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
