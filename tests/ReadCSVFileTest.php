<?php

use PHPUnit\Framework\TestCase;

use WebshippyTechTask\ReadCSVFile;

class ReadCSVFileTest extends TestCase
{
    public function test_invalid_file_path_throws_exception()
    {
        $fileReader = new ReadCSVFile();
        $this->expectException(\Exception::class);
        $fileReader->read('/wrong/file/path');
    }

    public function test_valid_file_path_returns_array()
    {
        $fileReader = new ReadCSVFile();
        $result = $fileReader->read("csv/orders.csv");
        $this->assertIsArray($result);
        $this->assertArrayHasKey("orders", $result);
        $this->assertArrayHasKey("ordersHeader", $result);
    }
}
