<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php
	include 'common.php';

	$testCorpNum = '1234567890';	# 팝빌회원 사업자번호, '-'제외 10자리
	$itemCode = '121';				# 명세서 코드 - 121(거래명세서), 122(청구서), 123(견적서) 124(발주서), 125(입금표), 126(영수증)
	$mgtKey = '20150210-01';		# 문서관리번호
	$testUserID = 'testkorea';		# 팝빌회원 아이디

	$Presponse= $StatementService->GetFiles($testCorpNum, $itemCode, $mgtKey, $testUserID);

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
				<legend>전자명세서 첨부파일 목록 확인 </legend>
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
									<li> displayName : <?php echo $Presponse[$i]->displayName; ?></li>
									<li> attachedFile : <?php echo $Presponse[$i]->attachedFile; ?></li>
									<li> regDT : <?php echo $Presponse[$i]->regDT; ?></li>
									<li> serialNum : <?php echo $Presponse[$i]->serialNum; ?></li>
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
