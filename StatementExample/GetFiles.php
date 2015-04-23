<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
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
					<?
						if(isset($code)) {
					?>
							<li>Response.code : <? echo $code ?> </li>
							<li>Response.message : <? echo $message ?></li>
					<?
						} else {

						for ($i = 0; $i < Count($Presponse) ; $i++) {
					?>
							<fieldset class ="fieldset2">
								<legend> 첨부파일 [<? echo $i+1 ?>] </legend>
								<ul>
									<li> displayName : <? echo $Presponse[$i]->displayName; ?></li>
									<li> attachedFile : <? echo $Presponse[$i]->attachedFile; ?></li>
									<li> regDT : <? echo $Presponse[$i]->regDT; ?></li>
									<li> serialNum : <? echo $Presponse[$i]->serialNum; ?></li>
								</ul>
							</fieldset>
					<?
							}
						}
					?>		
				</ul>
			</fieldset>
		 </div>
	</body>
</html>