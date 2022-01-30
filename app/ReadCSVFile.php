<?php

namespace WebshippyTechTask;

use WebshippyTechTask\Interfaces\ReadCSVFileInterface;

class ReadCSVFile implements ReadCSVFileInterface
{

    public function read(string $filePath = "csv/orders.csv"): array
    {
        $orders = [];
        $ordersHeader = [];

        $row = 1;
        if (($handle = @fopen($filePath, 'r')) !== false) {
            while (($data = fgetcsv($handle)) !== false) {
                if ($row == 1) {
                    $ordersHeader = $data;
                } else {
                    $o = [];
                    for ($i = 0; $i < count($ordersHeader); $i++) {
                        $o[$ordersHeader[$i]] = $data[$i];
                    }
                    $orders[] = $o;
                }
                $row++;
            }
            fclose($handle);
            return ['ordersHeader' => $ordersHeader, 'orders' =>$orders];
        } else {
            throw new \Exception( 'Invalid file path!');
        }

    }

}
