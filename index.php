<?php

require 'vendor/autoload.php';

use App\GetFulfillableOrders;

$validator = new ValidateCSVfile('{"1":2,"2":3,"3":1}');
$reader = new ReadCSVFile();
$formatter = new FormatCSVResult();
$resultSorter = new SortCSVResult();

$orders = new GetFulfillableOrders($validator, $reader, $formatter, $resultSorter);

$orders->getOrders('{"1":2,"2":3,"3":1}');
