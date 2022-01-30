<?php

namespace WebshippyTechTask\Interfaces;

interface FormatCSVResultInterface
{
    public function format(array $results, string $stock):string;
}
