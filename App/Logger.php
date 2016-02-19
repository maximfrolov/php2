<?php

namespace App;
/**
 * Class Logger Класс-логгер
 * @package App
 */
class Logger
{
    /**
     * @const PATH_TO_FILE string Путь к лог-файлу
     */
    const PATH_TO_FILE = __DIR__ . '/logs/log.txt';

    /**
     * Метод записи в текстовый лог информации об ошибках
     *@param $e object Переданное исключение
     */
    public static function loggingError($e)
    {
        $str = date('d.m.Y(L) H:i:s') . "\r\n" .
            'message: ' . $e->getMessage() . "\r\n" .
            'file: ' . $e->getFile() . "\r\n" .
            'line: ' . $e->getLine() . "\r\n" .
            'stack trace: ' . "\r\n" . $e->getTraceAsString() . "\r\n";

        file_put_contents(self::PATH_TO_FILE, $str, FILE_APPEND);
    }

    /*    protected $message;
    protected $file;
    protected $line;

    public function __construct($e)
    {
        $this->message = $e->getMessage();
        $this->file = $e->getFile();
        $this->line = $e->getLine();
    }
    public function loggingError()
    {
        $handle = fopen(self::PATH_TO_FILE, 'at+');
        fwrite($handle, date('d.m.Y(L) H:i:s') . "\n");
        foreach ($this as $key => $value) {
            $str = $key . ' : ' . $value . "\n";
            fwrite($handle, $str);
        }
        fwrite($handle, "\n");
        fclose($handle);
    }*/
}