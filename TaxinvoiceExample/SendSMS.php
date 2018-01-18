<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php
  /**
  * 알림문자를 전송합니다. (단문/SMS- 한글 최대 45자)
  * - 알림문자 전송시 포인트가 차감됩니다. (전송실패시 환불처리)
  * - 전송내역 확인은 "팝빌 로그인" > [문자 팩스] > [전송내역] 탭에서
  *   전송결과를 확인할 수 있습니다.
  */

	include 'common.php';

  // 팝빌회원 사업자번호, '-' 제외 10자리
	$testCorpNum = '1234567890';

  // 팝빌 회원 아이디
	$testUserID = 'testkorea';

  // 발행유형, MgtKeyType_SELL:매출, MgtKeyType_BUY:매입, MgtKeyType_TURSEE:위수탁
	$mgtKeyType = MgtKeyType_SELL;

  // 문서관리번호
	$mgtKey = '20150210-01';

  // 발신번호
	$sender = '07075103710';

  // 수신번호
	$receiver = '010111222';

  // 내용, 90byte 초과된 내용은 삭제되어 전송됨
	$contents = '문자전송 내용입니다. 90Byte를 초과한내용은 길이 조정되어 전송됩니다. 참고하시기 바랍니다.';

	$Presponse = $TaxinvoiceService->SendSMS($testCorpNum , $mgtKeyType, $mgtKey, $sender, $receiver, $contents, $testUserID);
	$code = $Presponse->code;
	$message = $Presponse->message;
?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>알림문자 재전송</legend>
				<ul>
					<li>Response.code : <?php echo $code ?></li>
					<li>Response.message : <?php echo $message ?></li>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
