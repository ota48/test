<?php

require("Services/Twilio.php");

$response = new Services_Twilio_Twiml();

$out_tel_to = "転送先電話番号";
$sound_url_s1 = "一段目に水をはって火にかける。フラワーウォータの出来上がり！.mp3";

if (empty($_POST["Digits"])) {
    $gather = $response->gather(array('numDigits' => 1, 'timeout' => 30));
    $gather->say("Twilioへようこそ。モロッコのお母さんのレシピが知りたい方は1を。電話の転送は2を。社会人3年目の方は3を。電話の終了は4をおしてください。", array('language' => 'ja-jp'));
} elseif ($_POST["Digits"] == "1") {
    $response->play($sound_url, array("loop" => 1));
    $gather = $response->gather(array('numDigits' => 1, 'timeout' => 30));
} elseif ($_POST["Digits"] == "2") {
    $response->dial($out_tel_to);
    $gather = $response->gather(array('numDigits' => 1, 'timeout' => 30));
} elseif ($_POST["Digits"] == "3") {
    $response->say("社会人3年目の方、楽しいデモへようこそ。", array('language' => 'ja-jp'));
} elseif ($_POST["Digits"] == "4") {
    $response->say("楽しいデモのご利用ありがとうございました。", array('language' => 'ja-jp'));
}
print $response;