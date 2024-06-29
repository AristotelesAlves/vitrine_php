<?php 

require_once __DIR__."/vendor/autoload.php";
require_once __DIR__."/src/Router/Router.php";

use App\Config\ModelRouter;
use App\Core\Core;


Core::dispatch(ModelRouter::routes());