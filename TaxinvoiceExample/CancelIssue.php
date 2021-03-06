<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php
  /**
  * [발행완료] 상태의 세금계산서를 [발행취소] 처리합니다.
  * - [발행취소]는 국세청 전송전에만 가능합니다.
  * - 발행취소된 세금계산서는 국세청에 전송되지 않습니다.
  * - 발행취소 세금계산서에 사용된 문서관리번호를 재사용 하기 위해서는
  *   삭제(Delete API)를 호출하여 해당세금계산서를 삭제해야 합니다.
  */

	include 'common.php';

  // 팝빌회원 사업자번호, '-' 제외 10자리
	$testCorpNum = '1234567890';

  // 팝빌회원 아이디
	$testUserID = 'testkorea';

  // 발행유형, MgtKeyType_SELL:매출, MgtKeyType_BUY:매입, MgtKeyType_TURSEE:위수탁
	$mgtKeyType = MgtKeyType_SELL;

  // 문서관리번호
	$mgtKey = '20150210-01';

  // 메모
	$memo = '발행 취소메모입니다';

	$Presponse = $TaxinvoiceService->CancelIssue($testCorpNum,$mgtKeyType,$mgtKey,$memo,$testUserID);
	$code = $Presponse->code;
	$message = $Presponse->message;
?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>발행취소 확인</legend>
				<ul>
					<li>Response.code : <?php echo $code ?></li>
					<li>Response.message : <?php echo $message ?></li>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
