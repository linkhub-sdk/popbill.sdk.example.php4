<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php
  /**
  * 1건의 임시저장 현금영수증을 발행처리합니다.
  * - 발행일 기준 오후 5시 이전에 발행된 현금영수증은 다음날 오후 2시에 국세청
  *   전송결과를 확인할 수 있습니다.
  * - 현금영수증 국세청 전송 정책에 대한 정보는 "[현금영수증 API 연동매뉴얼]
  *   > 1.4. 국세청 전송정책"을 참조하시기 바랍니다.
  */

	include 'common.php';

  // 팝빌회원 사업자번호, '-' 제외 10자리
	$testCorpNum = '1234567890';

  // 현금영수증 문서관리번호
	$mgtKey = '20150210-01';
  
	$memo = '현금영수증 발행메모';		# 메모

	$Presponse = $CashbillService->Issue($testCorpNum,$mgtKey,$memo);

?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>현금영수증 발행</legend>
				<ul>
					<li>Response.code : <?php echo $Presponse->code ?></li>
					<li>Response.message : <?php echo $Presponse->message ?></li>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
