<?php
namespace App\Config;

class View {
    public static function render($view, $data = []) {
        extract($data);
        include(__DIR__ . "/../View/$view.php");
    }
}
?>
