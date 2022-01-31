<?php

namespace WebshippyTechTask;

use WebshippyTechTask\Interfaces\ReadCSVFileInterface;

class ReadCSVFile implements ReadCSVFileInterface
{

    public function read(string $filePath): array
    {
        $orders = [];
        $ordersHeader = [];

        $row = 1;
        if (($handle = @fopen($filePath, 'r')) !== false) {
            while (($data = fgetcsv($handle)) !== false) {
                if ($row === 1) {
                    $ordersHeader = $data;
                } else {
                    $order = [];
                    for ($i = 0; $i < count($ordersHeader); $i++) {
                        $order[$ordersHeader[$i]] = $data[$i];
                    }
                    $orders[] = $order;
                }
                $row++;
            }
            fclose($handle);
            return ['ordersHeader' => $ordersHeader, 'orders' => $orders];
        } else {
            throw new \Exception( 'Invalid file path!');
        }

    }

}
