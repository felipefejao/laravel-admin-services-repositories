<?php

namespace App\Services\TelegramBotService;

use MercadoPago\Item;
use MercadoPago\Preference;
use Telegram\Bot\Api;

class TelegramBotService
{
    protected $telegram;

    public function __construct()
    {
        $this->telegram = new Api(env('TELEGRAM_BOT_TOKEN'));
    }

    public function sendMessage($chatId, $message, $button = null)
    {
        $keyboard = [
            'inline_keyboard' => $button
        ];

        $this->telegram->sendMessage([
            'chat_id' => $chatId,
            'text' => $message,
            'reply_markup' => json_encode($keyboard)
        ]);

    }

    public function handleWebhook($request)
    {
        $message = $request->input("message");
        $chatId = $message["chat"]["id"];
        $text = $message["text"];

        if ($text == '/start') {
            $this->sendMenu($chatId);
        }
    }

    public function sendMenu($chatId)
    {
        $buttons = [
            [
                ["text" => 'Comprar plano', 'callback_data' => 'comprar_plano'],
            ],
            [
                ["text" => 'Minhas Assinaturas', 'callback_data' => 'minhas_assinaturas'],
            ]
        ];

        $this->telegram->sendMessage($chatId, 'Escolha uma opção: ', $buttons);
    }

    public function createPixPayment()
    {
        $item = new Item();
        $item->title = "Plano Único";
        $item->quantity = 1;
        $item->unit_price = 0.99;

        $preference = new Preference();
        $preference->items = [$item];

        $preference->payment_methods = [
            "excluded_payments_type" => [
                [
                    "id" => "ticket"
                ]
            ]
        ];

        $preference->save();

        return response()->json([
            "pix_url" => $preference->init_point,
            "qr_code" => $preference->id
        ]);
    }

    public function sendPixPayment($chatId)
    {
        $paymentData = $this->createPixPayment();

        $this->sendMessage($chatId, "Pague seu plano usando Pix: ". $paymentData["pix_url"]);
    }

}
