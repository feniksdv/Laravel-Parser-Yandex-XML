<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use function PHPUnit\Framework\returnArgument;

class Controller extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Возвращает массив со списком заказов
     *
     * @return array[]
     */
    protected function getOrder(): array
    {
        $dir = '/var/www/html/storage/app/public/';
        $_files = scandir($dir);
        unset($_files[0],$_files[1],$_files[2]);
        $files = array_values($_files);
        $buffer=[];
        foreach ($files as $file) {
            $handle = fopen($dir.$file, "r");
            if ($handle) {
                while (($_buffer = fgets($handle)) !== false) {
                    $buffer[$file][] = $_buffer;
                }
                if (!feof($handle)) {
                    echo "Ошибка: fgets() неожиданно потерпел неудачу\n";
                }
                fclose($handle);
            }
        }
        $listOrders=[];
        $i=0;
        foreach ($buffer as $item) {
            $listOrders[] = [
                'id' => $i,
                'name' => $item[0],
                'tel' => $item[1],
                'email' => $item[2],
                'content' => implode("\n", array_slice($item, 3))
            ];
            $i++;
        }
        return $listOrders;
    }
}
