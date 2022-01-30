<?php

require_once 'app/bootstrap.php';

use WebshippyTechTask\ValidateCSVFile;
use WebshippyTechTask\ReadCSVFile;
use WebshippyTechTask\FormatCSVResult;
use WebshippyTechTask\SortCSVResult;
use WebshippyTechTask\GetFulfillableOrders;

$validator = new ValidateCSVFile();
$reader = new ReadCSVFile();
$formatter = new FormatCSVResult();
$resultSorter = new SortCSVResult();

$orders = new GetFulfillableOrders($validator, $reader, $formatter, $resultSorter);

echo $orders->getOrders('{"1":2,"2":3,"3":1}');
