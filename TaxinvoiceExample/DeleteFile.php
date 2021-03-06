<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php
  /**
  * 세금계산서에 첨부된 파일을 삭제합니다.
  * - 파일을 식별하는 파일아이디는 첨부파일 목록(GetFileList API) 의 응답항목 중
  *   파일아이디(AttachedFile) 값을 통해 확인할 수 있습니다.
  */
  
	include 'common.php';

  // 팝빌회원 사업자번호, '-' 제외 10자리
	$testCorpNum = '1234567890';

  // 팝빌회원 아이디
	$testUserID = 'testkorea';

  // 발행유형, MgtKeyType_SELL:매출, MgtKeyType_BUY:매입, MgtKeyType_TURSEE:위수탁
	$mgtKeyType = MgtKeyType_SELL;

  // 문서관리번호
	$mgtKey = '20150210-02';

  // 첨부파일아이디, getFiles(첨부파일목록) API 응답전문에서 attachedFile 변수값 참조
	$FileID = 'C1A91649-EF0C-40DD-9553-2805F5C71D4F.PBF';

	$Presponse = $TaxinvoiceService->DeleteFile($testCorpNum,$mgtKeyType,$mgtKey,$FileID,$testUserID);
	$code = $Presponse->code;
	$message = $Presponse->message;
?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>첨부파일 삭제 </legend>
				<ul>
					<li>Response.code : <?php echo $code ?></li>
					<li>Response.message : <?php echo $message ?></li>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
