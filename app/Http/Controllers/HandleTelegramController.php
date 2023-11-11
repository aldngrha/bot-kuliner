<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class HandleTelegramController extends Controller
{
    public function handleWebhook(Request $request)
    {
        $update = $request->all();

        $chatId = $update['message']['chat']['id'];
        $messageText = $update['message']['text'];
        Telegram::sendMessage(['chat_id' => $chatId, 'text' => 'Anda mengirim: ' . $messageText]);

        return response()->json(['status' => 'success']);
    }
}
