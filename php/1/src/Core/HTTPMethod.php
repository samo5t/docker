<?php

namespace App\Core;

enum HTTPMethod: string {
    case GET = "GET";
    case POST = "POST";
    case ANY = 'GET|POST';
}

