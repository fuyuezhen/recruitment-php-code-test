<?php
namespace App\Service\Logger;
use think\facade\Log;
class ThinkLog implements Logger
{

    public function __construct()
    {
        Log::init([
            'default'	=>	'file',
            'channels'	=>	[
                'file'	=>	[
                    'type'	=>	'file',
                    'path'	=>	'./logs/',
                ],
            ],
        ]);
    }
    
    public function info($message = '')
    {
        $this->log('info', $message);
    }

    public function debug($message = '')
    {
        $this->log('debug', $message);
    }

    public function error($message = '')
    {
        $this->log('error', $message);
    }

    private function log($type = 'info', $message)
    {
        Log::{$type}(strtoupper($message));
        Log::save();
    }

}