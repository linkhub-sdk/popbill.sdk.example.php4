<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php
  /**
  * 세금계산서 문서관리번호 중복여부를 확인합니다.
  * - 관리번호는 1~24자리로 숫자, 영문 '-', '_' 조합으로 사업자별로 중복되지 않도록 구성해야 합니다.
  */

	include 'common.php';

  // 팝빌회원 사업자번호, '-'제외 10자리
	$testCorpNum = '1234567890';

  // 문서관리번호, 발행자별로 중복없이 1~24자리 영문,숫자로 구성
	$mgtKey = '20150209-01';

  // 발행유형, MgtKeyType_SELL:매출, MgtKeyType_BUY:매입, MgtKeyType_TURSEE:위수탁
	$mgtKeyType = MgtKeyType_SELL;

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
					<?php
						if(!isset($code)) {
					?>
							<li>문서관리번호 사용여부 : <?php echo $Presponse ?></li>
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
