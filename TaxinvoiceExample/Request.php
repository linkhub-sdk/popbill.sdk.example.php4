<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php
  /**
  * 공급받는자가 공급자에게 1건의 역발행 세금계산서를 요청합니다.
  * - 역발행 세금계산서 프로세스를 구현하기 위해서는 공급자/공급받는자가 모두
  *   팝빌에 회원이여야 합니다.
  * - 역발행 요청후 공급자가 [발행] 처리시 포인트가 차감되며 역발행
  *   세금계산서 항목중 과금방향(ChargeDirection) 에 기재한 값에 따라
  *   정과금(공급자과금) 또는 역과금(공급받는자과금) 처리됩니다.
  */

	include 'common.php';

  // 팝빌회원 사업자번호, '-' 제외 10자리
	$testCorpNum = '1234567890';

  // 팝빌 회원 아이디
	$testUserID = 'testkorea';

  // 발행유형, MgtKeyType_SELL:매출, MgtKeyType_BUY:매입, MgtKeyType_TURSEE:위수탁
	$mgtKeyType = MgtKeyType_SELL;

  // 문서관리번호
	$mgtKey = '20150204-01';

  // 메모
	$memo= '역)발행 요청 메모입니다';

	$Presponse = $TaxinvoiceService->Request($testCorpNum, $mgtKeyType, $mgtKey, $memo, $testUserID);
	$code = $Presponse->code;
	$message = $Presponse->message;
?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>역)발행 요청처리</legend>
				<ul>
					<li>Response.code : <?php echo $code ?></li>
					<li>Response.message : <?php echo $message ?></li>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
