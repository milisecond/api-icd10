<?php

namespace App\Http\Builder;

class ResponseBuilder
{
    public static function build($code = null, $success = null, $message = null, $data = null) {
        return [
           "status_code" => $code ?? 200,
           "message" => $message ?? "Ok",
           "data" => $data ?? null,
        ];
    }
}