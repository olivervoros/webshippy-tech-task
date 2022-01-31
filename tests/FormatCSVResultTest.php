<?php

use PHPUnit\Framework\TestCase;

use WebshippyTechTask\FormatCSVResult;
use WebshippyTechTask\ReadCSVFile;

class FormatCSVResultTest extends TestCase
{
    public function test_if_format_CSV_displays_the_result_table_correctly()
    {
        $dataBeforeFormatting = $this->getDataBeforeFormatting();
        $formatter = new FormatCSVResult();
        $result = $formatter->format($dataBeforeFormatting['orders'], $dataBeforeFormatting['ordersHeader'], $dataBeforeFormatting['stock']);
        $this->assertStringContainsString("low", $result);
        $this->assertStringContainsString("quantity", $result);
        $this->assertStringContainsString("priority", $result);
        $this->assertStringContainsString("==========", $result);
        $this->assertStringContainsString("product_id", $result);
    }

    private function getDataBeforeFormatting()
    {
        $fileReader = new ReadCSVFile();
        $result = $fileReader->read("csv/orders.csv");
        $result['stock'] = '{"1":2,"2":3,"3":1}';

        return $result;
    }

}
