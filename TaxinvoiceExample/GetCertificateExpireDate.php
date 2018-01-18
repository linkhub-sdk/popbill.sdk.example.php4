<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php
  /**
  * 팝빌에 등록되어 있는 공인인증서의 만료일자를 확인합니다.
  * - 공인인증서가 갱신/재발급/비밀번호 변경이 되는 경우 해당 인증서를
  *   재등록 하셔야 정상적으로 세금계산서를 발행할 수 있습니다.
  */
  
	include 'common.php';

  // 팝빌회원 사업자번호, '-' 제외 10자리
	$testCorpNum = '1234567890';

	$Presponse = $TaxinvoiceService->GetCertificateExpireDate($testCorpNum);

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
				<legend>공인인증서의 만료일 확인</legend>
				<ul>
					<?php
						if(!isset($code)) {
					?>
							<li>공인인증서 만료일자 : <?php echo $Presponse  ?></li>
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
