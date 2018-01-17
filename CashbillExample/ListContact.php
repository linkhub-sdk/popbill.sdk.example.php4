<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/Example.css" media="screen" />
		<title>팝빌 SDK PHP 4.X Example.</title>
	</head>
<?php
	include 'common.php';

	$testCorpNum = '1234567890';	# 팝빌회원 사업자번호
	$Presponse = $CashbillService->ListContact($testCorpNum);

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
				<legend>담당자 목록 조회</legend>
				<ul>
					<?
						if(isset($code)) {
					?>
							<li>Response.code : <? echo $code ?> </li>
							<li>Response.message : <? echo $message ?></li>
					<?
						} else {
							for ($i = 0; $i < Count($Presponse); $i++) {
					?>
								<fieldset class="fieldset2">
									<legend> 담당자 목록[<? echo $i+1?>]</legend>
									<ul>
										<li> id : <? echo $Presponse[$i]->id ?></li>
                    <li> personName : <? echo $Presponse[$i]->personName ?></li>
                    <li> email : <? echo $Presponse[$i]->email ?></li>
                    <li> hp : <? echo $Presponse[$i]->hp ?></li>
                    <li> searchAllAllowYN : <? echo $Presponse[$i]->searchAllAllowYN ?></li>
                    <li> tel : <? echo $Presponse[$i]->tel ?></li>
                    <li> fax : <? echo $Presponse[$i]->fax ?></li>
                    <li> mgrYN : <? echo $Presponse[$i]->mgrYN ?></li>
                    <li> regDT : <? echo $Presponse[$i]->regDT ?></li>
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
