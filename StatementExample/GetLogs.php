<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php
	include 'common.php';

	$testCorpNum = '1234567890';	# 팝빌회원 사업자번호
	$itemCode = '121';				# 명세서 코드 - 121(거래명세서), 122(청구서), 123(견적서) 124(발주서), 125(입금표), 126(영수증)
	$mgtKey = '20150210-01';		# 문서관리번호

	$Presponse = $StatementService->GetLogs($testCorpNum,$itemCode,$mgtKey);

	if(is_a($Presponse,'PopbillException')){
		$code = $Presponse->code;
		$message = $Presponse->message;
	}
?>
	<body>
		<div id="content">
			<p class="heading1">Response</p>
			<br/>
			<fieldset class="fieldset1">
				<legend>전자명세서 문서이력 확인</legend>
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
								<legend>전자명세서 문서이력 [<?php echo $i ?>] </legend>
									<ul>
										<li>docLogType : <?php echo $Presponse[$i]->docLogType ?></li>
										<li>log : <?php echo $Presponse[$i]->log ?></li>
										<li>procType : <?php echo $Presponse[$i]->procType ?></li>
										<li>procCorpName : <?php echo $Presponse[$i]->procCorpName ?></li>
										<li>procMemo : <?php echo $Presponse[$i]->procMemo ?></li>
										<li>regDT : <?php echo $Presponse[$i]->regDT ?></li>
										<li>ip : <?php echo $Presponse[$i]->ip ?></li>

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
