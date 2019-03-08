<?php

namespace App\Utils;

class JsChannel
{
    public static function reloadAndClose()
    {
        echo "<script>"
            . "bc_hrm_channel = new BroadcastChannel('hrm_channel');"
            . "bc_hrm_channel.postMessage('reload');"
            . "window.close();"
            . "</script>";
    }
}
