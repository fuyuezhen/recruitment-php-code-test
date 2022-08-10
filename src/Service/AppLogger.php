<?php

namespace App\Service;


class AppLogger
{
    const TYPE_LOG4PHP  = 'log4php';
    const TYPE_THINKLOG = 'think-log';

    private $logger;

    public function __construct($type = self::TYPE_LOG4PHP)
    {
        if ($type == self::TYPE_LOG4PHP) {
            $this->logger = new \App\Service\Logger\Log4php();
        }elseif($type == self::TYPE_THINKLOG) {
            $this->logger = new \App\Service\Logger\ThinkLog();
        }
    }

    public function info($message = '')
    {
        print_r($message);
        $this->logger->info($message);
    }

    public function debug($message = '')
    {
        $this->logger->debug($message);
    }

    public function error($message = '')
    {
        $this->logger->error($message);
    }
}