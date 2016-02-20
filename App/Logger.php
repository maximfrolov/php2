<?php

namespace App;
/**
 * Class Logger Класс-логгер
 * @package App
 */
class Logger
{
    /**
     * PATH_TO_FILE string Константа класса - путь к лог-файлу
     */
    const PATH_TO_FILE = __DIR__ . '/logs/log.txt';

    /**
     * Метод записи в текстовый лог информации об ошибках
     *@param $e object Переданное исключение
     */
    public static function loggingError($e)
    {
        $str = date('d.m.Y(L) H:i:s') . PHP_EOL .
            'message: ' . $e->getMessage() . PHP_EOL .
            'file: ' . $e->getFile() . PHP_EOL .
            'line: ' . $e->getLine() . PHP_EOL .
            'stack trace: ' . $e->getTraceAsString() . PHP_EOL;

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