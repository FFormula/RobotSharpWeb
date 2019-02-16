<?php

namespace FFormula\RobotSharpWeb\System;

/**
 * Class Api - Клиент для подключения к RobotSharp Rest API
 * @package FFormula\RobotSharpWeb\System
 */
class Api
{
    /** @var string - Интернет-адрес скрипта RestAPI-сервера */
    private $host;
    /** @var string - Клиентский ключ для выполнения запросов */
    private $token;

    /**
     * Api constructor - инициализация класса
     * @param array $config - настройки класса
     *          host - адрес скрипта RestAPI-сервера
     */
    public function __construct(array $config)
    {
        $this->host = $config['host'];
    }

    /**
     * Установка клиентского ключа для RestAPI запросов
     * @param string $token - Клиентский ключ для выполнения запросов
     * Этот ключ сообщает сервер во время авторизации
     * Его необходимо передавать для всех последующих запросов
     * Срок действия ключа ограничен, например, 24 часа
     */
    public function setToken(string $token) : void
    {
        $this->token = $token;
    }

    /**
     * Выполнение запроса к RobotSharp RestAPI
     * и получение ответа в json-формате
     * @param string $class - с каким классом работаем
     * @param string $method - какой метод вызываем
     * @param array $params - начальные данные в линейном массиве
     * @return object - результат выполненного запроса к RestAPI
     * @throws \Exception - Будет сгенерировано исключение при любой ошибке в ответе RestAPI сервера.
     */
    public function call(string $class, string $method, array $params = []) : object
    {
        $url = $this->host .
            '&class=' . $class .
            '&method=' . $method .
            '&token=' . $this->token;

        foreach ($params as $name => $value)
            $url .= '&' . $name . '=' . urlencode($value);
        Log::get()->info('API Call: ' . $url);

        // @ Вместо Warning-сообщения от PHP - проверка ответа и генерация исключения
        $json = @file_get_contents($url);
        Log::get()->debug('API Resp: ' . $json);
        if ($json === FALSE)
            throw new \Exception('API Server unreachable: ' . $url);

        $result = json_decode($json);
        if ($result->error != 'ok')
            throw new \Exception($result->error);

        // иногда ответ приходит как массив, иногда как объект
        // для унифицированности возвращаем в виде объекта
        return (object)$result->answer;
    }
}