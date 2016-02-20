<?php

namespace App;
/**
 * Class Logger
 * @package App
 */
class Logger
{
    /**
     * Константа класса - путь к лог-файлу
     */
    const PATH_TO_FILE = __DIR__ . '/logs/log.txt';

    /**
     * Метод записи в текстовый лог информации об ошибках
     *@param $e object Переданное исключение
     */
    public static function loggingError($e)
    {
        $errorInform = [
            date('d.m.Y(L) H:i:s'),
            'message: ' . $e->getMessage(),
            'file: ' . $e->getFile(),
            'line: ' . $e->getLine(),
            'stack trace: ' . $e->getTraceAsString(),
        ];
        $str = implode(PHP_EOL, $errorInform);

        file_put_contents(self::PATH_TO_FILE, $str, FILE_APPEND);
    }

}