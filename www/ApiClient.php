<?php
// Автозагрузчик Composer
require_once __DIR__ . '/../vendor/autoload.php';
use GuzzleHttp\Client;

class ApiClient {
    private Client $client;

    public function __construct() {
        // Создание объекта Guzzle клиента
        $this->client = new Client(['verify' => false, 'headers' => ['User-Agent' => 'Credit-App/1.0']]);
    }

    
    //Выполняет GET-запрос по указанному URL и возвращает данные в виде массива.
     
    public function request(string $url): array {
        try {
            // Отправляем запрос
            $response = $this->client->get($url);
            
            // Декодируем JSON-строку в ассоциативный массив PHP
            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}