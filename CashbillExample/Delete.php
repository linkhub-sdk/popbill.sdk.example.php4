<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php
  /**
  * 1건의 현금영수증을 삭제합니다.
  * - 현금영수증을 삭제하면 사용된 문서관리번호(mgtKey)를 재사용할 수 있습니다.
  * - 삭제가능한 문서 상태 : [임시저장], [발행취소]
  */

	include 'common.php';

  // 팝빌회원 사업자번호, '-' 제외 10자리
	$testCorpNum = '1234567890';
  
	$mgtKey = '20150210-01';		# 문서관리번호

	$Presponse = $CashbillService->Delete($testCorpNum,$mgtKey);
?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>현금영수증 삭제</legend>
				<ul>
					<li>Response.code : <?php echo $Presponse->code ?></li>
					<li>Response.message : <?php echo $Presponse->message ?></li>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
