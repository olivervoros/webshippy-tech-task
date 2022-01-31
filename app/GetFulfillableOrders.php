<?php

namespace WebshippyTechTask;

use WebshippyTechTask\Interfaces\ValidateCSVFileInterface;
use WebshippyTechTask\Interfaces\SortCSVResultInterface;
use WebshippyTechTask\Interfaces\FormatCSVResultInterface;
use WebshippyTechTask\Interfaces\ReadCSVFileInterface;

class GetFulfillableOrders
{
    private ValidateCSVFileInterface $validator;
    private ReadCSVFileInterface $reader;
    private FormatCSVResultInterface $formatter;
    private SortCSVResultInterface $resultSorter;

    public function __construct(
                ValidateCSVFileInterface $validator,
                ReadCSVFileInterface $reader,
                FormatCSVResultInterface $formatter,
                SortCSVResultInterface $resultSorter)
    {
        $this->validator = $validator;
        $this->reader = $reader;
        $this->formatter = $formatter;
        $this->resultSorter = $resultSorter;
    }
    public function getOrders(string $stock): string
    {
        // 1. Validate CSV file
        try {
            $this->validator->validate($stock);
        } catch(\Exception $e) {
           die($e->getMessage().PHP_EOL);
        }

        // 2. read CSV file
        try {
            $results = $this->reader->read('csv/orders.csv');
        } catch(\Exception $e) {
            die($e->getMessage().PHP_EOL);
        }

        // 3. sort csv results
        $sortedResults = $this->resultSorter->sort($results['orders']);

        // 4. format csv results
        return $this->formatter->format($sortedResults, $results['ordersHeader'], $stock);

    }

}
