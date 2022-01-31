<?php

use PHPUnit\Framework\TestCase;

use WebshippyTechTask\SortCSVResult;

class SortCSVResultTest extends TestCase
{
    public function test_if_sorts_array_by_priority_and_created_at()
    {
        $arrayBeforeSort = $this->getArrayBeforeSort();
        $arrayAfterSort = $this->getArrayAfterSort();
        $fileSorter = new SortCSVResult();
        $result = $fileSorter->sort($arrayBeforeSort);
        $this->assertEquals($arrayAfterSort, $result);

    }

    private function getArrayBeforeSort() {
        return array([
                "product_id" => "1",
                "quantity" => "5",
                "priority" => "2",
                "created_at" => "2021-03-25 14:51:47"
            ],
            [
                "product_id" => "2",
                "quantity" => "1",
                "priority" => "3",
                "created_at" => "2021-03-21 14:00:26"
            ],
            [
                "product_id" => "2",
                "quantity" => "4",
                "priority" => "3",
                "created_at" => "2021-03-22 17:41:32"
            ],
            [
                "product_id" => "3",
                "quantity" => "1",
                "priority" => "1",
                "created_at" => "2021-03-22 12:31:54"
            ]);
    }

    private function getArrayAfterSort() {
        return array([
                "product_id" => "2",
                "quantity" => "1",
                "priority" => "3",
                "created_at" => "2021-03-21 14:00:26"
            ],
            [
                "product_id" => "2",
                "quantity" => "4",
                "priority" => "3",
                "created_at" => "2021-03-22 17:41:32"
            ],
            [
                "product_id" => "1",
                "quantity" => "5",
                "priority" => "2",
                "created_at" => "2021-03-25 14:51:47"
            ],
            [
                "product_id" => "3",
                "quantity" => "1",
                "priority" => "1",
                "created_at" => "2021-03-22 12:31:54"
            ]);
    }

}
