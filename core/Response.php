<?php

namespace anas\core;

class Response
{
    public function setStatusCode()
    {
        http_response_code(404);
    }
}