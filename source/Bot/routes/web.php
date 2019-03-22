<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	echo print_r(new \Telegram\Commands\BantuanCommand(),1);
    //return view('welcome');
});

Route::post('749547079:AAENKboMYmpzg5qnck1Q5Lraud9XtvvXynU/webhook', function () {
  $update = Telegram::commandsHandler(true); // semua respond dari telegram 
  
  $update = json_decode('['.$update.']')[0]; // sudah jadi object JSON

  $id = $update->message->from->id;
  $message = $update->message->text;
  if(strtolower($message) == 'selamat pagi'){
  	\Telegram::sendMessage([
	        'chat_id' => $id,
	        'text' => 'Pagii...'
	    ]);
  }
  else
  \Telegram::sendMessage([
	        'chat_id' => $id,
	        'text' => $message
	    ]);
  
  return 'ok';
});

Route::get('749547079:AAENKboMYmpzg5qnck1Q5Lraud9XtvvXynU/setWebhook', function () {
  $response = Telegram::setWebhook(['url' =>
    url('749547079:AAENKboMYmpzg5qnck1Q5Lraud9XtvvXynU/webhook')
  ]);
  return $response;
});
