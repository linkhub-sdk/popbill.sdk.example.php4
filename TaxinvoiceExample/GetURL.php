<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php
  /**
  * 팝빌 전자세금계산서 문서함 팝업 URL을 반환합니다.
  * TOGO - TBOX(임시문서함), SBOX(매출문서함), PBOX(매입문서함), WRITE(매출문서작성)
  * 반환된 URL은 보안정책에 따라 30초의 유효시간을 갖습니다.
  */

	include 'common.php';

  // 팝빌회원 사업자번호, '-' 제외 10자리
	$testCorpNum = '1234567890';

  // 팝빌 회원 아이디
	$testUserID = 'testkorea';

  // [TBOX] 임시문서함, [SBOX] 매출문서함, [PBOX] 매입문서함, [WRITE] 매출문서작성
	$TOGO = 'SBOX';

	$Presponse = $TaxinvoiceService->GetURL($testCorpNum, $testUserID, $TOGO);

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
				<legend>세금계산서 URL 확인</legend>
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
