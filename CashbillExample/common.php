<?php
/**
* 팜빌 현금영수증 API PHP SDK Example
*
* PHP SDK 연동환경 설정방법 안내 : blog.linkhub.co.kr/584
* 업테이트 일자 : 2018-01-17
* 연동기술지원 연락처 : 1600-9854 / 070-4304-2991
* 연동기술지원 이메일 : code@linkhub.co.kr
*
* <테스트 연동개발 준비사항>
* 1) 19, 22번 라인에 선언된 링크아이디(LinkID)와 비밀키(SecretKey)를
*    링크허브 가입시 메일로 발급받은 인증정보를 참조하여 변경합니다.
* 2) 팝빌 개발용 사이트(test.popbill.com)에 연동회원으로 가입합니다.
*/

require_once '../Popbill/PopbillCashbill.php';

//링크 아이디
$LinkID = 'TESTER';

// 비밀키, 유출에 주의하시기 바랍니다.
$SecretKey = 'SwWxqU+0TErBXy/9TVjIPEnI0VTUMMSQZtJf3Ed8q3I=';

$CashbillService = new CashbillService($LinkID, $SecretKey);

// 연동환경 설정값, True-개발용, False-상업용
$CashbillService->IsTest(true);

?>
