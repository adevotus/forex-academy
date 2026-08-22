<?php
namespace App\Utils;

use Illuminate\Support\Facades\Log;
class LoggerUtil {

    private static function getChannel() {
        return Log::channel('e-academy-logs');
    }
    public static function error($msg) {
        LoggerUtil::getChannel()->error($msg);
    }

    public static function debug($msg) {
        LoggerUtil::getChannel()->debug($msg);
    }

    public static function info($msg) {
        LoggerUtil::getChannel()->info($msg);
    }

    public static function warning($msg) {
        LoggerUtil::getChannel()->warning($msg);
    }

}