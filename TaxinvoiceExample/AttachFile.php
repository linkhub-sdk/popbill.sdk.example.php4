<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php
  /**
  * 세금계산서에 첨부파일을 등록합니다.
  * - [임시저장] 상태의 세금계산서만 파일을 첨부할수 있습니다.
  * - 첨부파일은 최대 5개까지 등록할 수 있습니다.
  */
  
	include 'common.php';

  // 팝빌회원 사업자번호, '-' 제외 10자리
	$testCorpNum = '1234567890';

  // 팝빌 회원 아이디
	$testUserID = 'testkorea';

  // 발행유형, MgtKeyType_SELL:매출, MgtKeyType_BUY:매입, MgtKeyType_TURSEE:위수탁
	$mgtKeyType = MgtKeyType_SELL;

  // 문서관리번호
	$mgtKey = '20150210-02';

  //첨부파일 경로, 해당 파일에 읽기 권한이 설정되어 있어야 합니다.
	$filePath = './uploadtest.jpg';

	#세금계산서 1건당 최대 5개 파일 첨부가능.
	$result = $TaxinvoiceService->AttachFile($testCorpNum,$mgtKeyType,$mgtKey,$filePath,$testUserID);
	$code = $result->code;
	$message = $result->message;
?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>세금계산서 파일첨부 </legend>
				<ul>
					<li>Response.code : <?php echo $code ?></li>
					<li>Response.message : <?php echo $message ?></li>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
