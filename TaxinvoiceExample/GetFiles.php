<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php
  /**
  * 세금계산서 첨부파일 목록을 확인합니다.
  * - 응답항목 중 파일아이디(AttachedFile) 항목은 파일삭제(DeleteFile API)
  *   호출시 이용할 수 있습니다.
  */

	include 'common.php';

  // 팝빌회원 사업자번호, '-' 제외 10자리
	$testCorpNum = '1234567890';

  // 발행유형, MgtKeyType_SELL:매출, MgtKeyType_BUY:매입, MgtKeyType_TURSEE:위수탁
	$mgtKeyType = MgtKeyType_SELL;

  // 문서관리번호
	$mgtKey = '20150210-02';

	$Presponse= $TaxinvoiceService->GetFiles($testCorpNum, $mgtKeyType, $mgtKey);

	if(is_a($Presponse, 'PopbillException')){
		$code = $Presponse->code;
		$message = $Presponse->message;
	}
?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>세금계산서 첨부파일 목록 확인 </legend>
				<ul>
					<?php
						if(isset($code)) {
					?>
							<li>Response.code : <?php echo $code ?> </li>
							<li>Response.message : <?php echo $message ?></li>
					<?php
						} else {

							for ($i = 0; $i < Count($Presponse) ; $i++) {
					?>
							<fieldset class ="fieldset2">
								<legend> 첨부파일 [<?php echo $i+1 ?>] </legend>
								<ul>
									<li> serialNum : <?php echo $Presponse[$i]->serialNum; ?></li>
									<li> displayName : <?php echo $Presponse[$i]->displayName; ?></li>
									<li> attachedFile : <?php echo $Presponse[$i]->attachedFile; ?></li>
									<li> regDT : <?php echo $Presponse[$i]->regDT; ?></li>
								</ul>
							</fieldset>
					<?php
							}
						}
					?>
				</ul>
			</fieldset>
		 </div>
	</body>
</html>
