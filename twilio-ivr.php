<?php

require("Services/Twilio.php");

$response = new Services_Twilio_Twiml();

$out_tel_to = "�]����d�b�ԍ�";
$sound_url_s1 = "��i�ڂɐ����͂��ĉ΂ɂ�����B�t�����[�E�H�[�^�̏o���オ��I.mp3";

if (empty($_POST["Digits"])) {
    $gather = $response->gather(array('numDigits' => 1, 'timeout' => 30));
    $gather->say("Twilio�ւ悤�����B�����b�R�̂��ꂳ��̃��V�s���m�肽������1���B�d�b�̓]����2���B�Љ�l3�N�ڂ̕���3���B�d�b�̏I����4�������Ă��������B", array('language' => 'ja-jp'));
} elseif ($_POST["Digits"] == "1") {
    $response->play($sound_url, array("loop" => 1));
    $gather = $response->gather(array('numDigits' => 1, 'timeout' => 30));
} elseif ($_POST["Digits"] == "2") {
    $response->dial($out_tel_to);
    $gather = $response->gather(array('numDigits' => 1, 'timeout' => 30));
} elseif ($_POST["Digits"] == "3") {
    $response->say("�Љ�l3�N�ڂ̕��A�y�����f���ւ悤�����B", array('language' => 'ja-jp'));
} elseif ($_POST["Digits"] == "4") {
    $response->say("�y�����f���̂����p���肪�Ƃ��������܂����B", array('language' => 'ja-jp'));
}
print $response;