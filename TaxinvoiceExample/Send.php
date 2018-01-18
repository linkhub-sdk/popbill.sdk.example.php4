<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php
  /**
  * 1건의 [임시저장] 상태의 세금계산서를 [발행예정] 처리합니다.
  * - 발행예정이란 공급자와 공급받는자 사이에 세금계산서 확인 후 발행하는
  *   방법입니다.
  * - "[전자세금계산서 API 연동매뉴얼] > 1.3.1. 정발행 프로세스 흐름도
  *   > 다. 임시저장 발행예정" 의 프로세스를 참조하시기 바랍니다.
  */

	include 'common.php';

  // 팝빌회원 사업자번호, '-' 제외 10자리
	$testCorpNum = '1234567890';

  // 팝빌 회원 아이디
	$testUserID = 'testkorea';

  // 발행유형, MgtKeyType_SELL:매출, MgtKeyType_BUY:매입, MgtKeyType_TURSEE:위수탁
	$mgtKeyType = MgtKeyType_SELL;

  // 문서관리번호
	$mgtKey = '20150615-12';

  // 메모
	$memo= '발행예정 메모입니다';

  // 발행예정 시 안내메일 제목, 미기재시 기본제목으로 전송
	$emailSubject = null;

	$Presponse = $TaxinvoiceService->Send($testCorpNum, $mgtKeyType, $mgtKey , $memo, $emailSubject, $testUserID);
	$code = $Presponse->code;
	$message = $Presponse->message;
?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>발행예정</legend>
				<ul>
					<li>Response.code : <?php echo $code ?></li>
					<li>Response.message : <?php echo $message ?></li>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
