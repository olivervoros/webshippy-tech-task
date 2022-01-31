<?php

namespace WebshippyTechTask\Interfaces;

interface FormatCSVResultInterface
{
    public function format(array $orders, array $headers, string $stock):string;
}
