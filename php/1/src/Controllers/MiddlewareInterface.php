<?php

namespace App\Controllers;

use Sunrise\Http\Message\Request;
use Sunrise\Http\Message\Response;

interface MiddlewareInterface
{
public function handle(Request $request, callable $next): Response;
}