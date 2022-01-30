<?php

namespace  App;
use ValidateCSVFileInterface;
use SortCSVResultInterface;
use FormatCSVResultInterface;
use ReadCSVFileInterface;

class GetFulfillableOrders
{
    private ValidateCSVFileInterface $validator;
    private ReadCSVFileInterface $reader;
    private FormatCSVResultInterface $formatter;
    private SortCSVResultInterface $resultSorter;

    public function __construct(ValidateCSVFileInterface $validator, ReadCSVFileInterface $reader, FormatCSVResultInterface $formatter, SortCSVResultInterface $resultSorter)
    {
        $this->validator = $validator;
        $this->reader = $reader;
        $this->formatter = $formatter;
        $this->resultSorter = $resultSorter;
    }
    public function getOrders(string $input): string
    {
        // 1. Validate CSV file
        $this->validator->validate($input);

        // 2. read CSV file
        $result = $this->reader->read($path = 'csv/orders.csv');

        // 3. format csv results
        $formattedResult = $this->formatter->format($result);

        // 4. sort csv results
        return $this->resultSorter->sort($formattedResult);

    }

}
