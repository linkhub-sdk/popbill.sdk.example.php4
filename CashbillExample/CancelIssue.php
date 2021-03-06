<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php
  /**
  * [발행완료] 상태의 현금영수증을 [발행취소] 합니다.
  * - 발행취소는 국세청 전송전에만 가능합니다.
  * - 발행취소된 형금영수증은 국세청에 전송되지 않습니다.
  */

	include 'common.php';

  // 팝빌회원 사업자번호, '-' 제외 10자리
  $testCorpNum = '1234567890';

  // 문서관리번호
  $mgtKey = '20170302-02';

  // 메모
  $memo = '현금영수증 발행취소메모';

	$Presponse = $CashbillService->CancelIssue($testCorpNum, $mgtKey, $memo);
?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>현금영수증 발행취소</legend>
				<ul>
					<li>Response.code : <?php echo $Presponse->code ?></li>
					<li>Response.message : <?php echo $Presponse->message ?></li>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
