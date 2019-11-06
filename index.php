<?php

require 'vendor/autoload.php';
require 'core/bootstrap.php';
require 'core/functions.php';

use App\Core\{Request, Router};

require Router::load('app/routes.php')->direct(Request::uri(), Request::method());