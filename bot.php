<?php>
/*
نویسنده 》 علی اکبر مرادزاده 
کانال های من 》》
تلگرام 》 @drmr_ir
گپ  》 @drmr_ir
*/
require_once( 'Api.php' );

$token = 'token';  // توکن را بجای token قرار دهید
try {
	$gap = new Api( $token );
} catch ( Exception $e ) {
	throw new \Exception( 'an error was encountered' );
}

$data    = isset( $_POST['data'] ) ? $_POST['data'] : null;
$type    = isset( $_POST['type'] ) ? $_POST['type'] : null;
$chat_id = isset( $_POST['chat_id'] ) ? $_POST['chat_id'] : null;
$from    = isset( $_POST['from'] ) ? $_POST['from'] : null;
$channel = '@drmr_ir'; // آیدی کانال اینجا قرار گیرد.
/**** Welcome ***/
if ( isset( $type ) && $type == 'join' ) {
	$message = "سلام به ربات من خوش آمدید 
کانال ما 
🆔 $channel
";
	$gap->sendText( $chat_id, $message );
}
/**** Main Keyboard ***/
$buttons  = [
	[
		[ 'دریافت اطلاعات' => 'دریافت اطلاعات' ]
	]
];
$mainKeyboard = $gap->replyKeyboard( $buttons );
/**** Commands ***/
if ( isset( $type ) && $type == 'text' ) {


	switch ( $data ) {
		case 'getinfo':
		case '/getinfo':
		case 'دریافت اطلاعات':
			$message = "سلام اطلاعات شما به شرح ذیل میباشد.
یوزر آیدی تان 》
🆔 $user_id
آیدی عددی تان 》
🆔 $chat_id
_____________
جهت حمایت لطفا در کانال ما عضو شوید.
🆔 $channel
_____________";
			return $gap->sendText( $chat_id, $message, $mainKeyboard );
			break;
	}
}
