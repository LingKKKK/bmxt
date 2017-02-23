<?php

if (! function_exists('api_response')) {
    function api_response($status, $message, $data = null, $httpcode = 200)
    {
        if ($data === null) {
            return response()->json(compact('status', 'message'));
        } else {
            return response()->json(compact('status', 'message', 'data'));
        }
    }
}
