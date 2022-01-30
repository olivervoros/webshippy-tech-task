<?php

namespace App;
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
        try {
            $this->validator->validate($input);
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }

        // 2. read CSV file
        $results = $this->reader->read($path = 'csv/orders.csv');

        // 3. sort csv results
        $sortedResults = $this->resultSorter->sort($results);

        // 4. format csv results
        return $this->formatter->format($sortedResults);

    }

}
