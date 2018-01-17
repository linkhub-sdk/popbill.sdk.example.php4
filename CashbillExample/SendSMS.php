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

  // 현금영수증 문서관리번호
	$mgtKey = '20150210-01';
  
	$sender = '07075103710';			# 발신번호
	$receiver = '01043245117';			# 수신자번호
	$contents = '메시지 전송 내용입니다. 메세지의 길이가 90Byte를 초과하는 경우에는 메시지의 길이가 조정되어 전송되오니 참고하여 테스트하시기 바랍니다, 링크허브 문자 API 테스트 메시지 ';

	$Presponse = $CashbillService->SendSMS($testCorpNum,$mgtKey,$sender,$receiver,$contents);
?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>알림문자 재전송</legend>
				<ul>
					<li>Response.code : <?php echo $Presponse->code ?></li>
					<li>Response.message : <?php echo $Presponse->message ?></li>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
