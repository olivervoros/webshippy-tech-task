<?php

use PHPUnit\Framework\TestCase;

use WebshippyTechTask\ValidateCSVFile;

class ValidateCSVFileTest extends TestCase
{

    public function test_one_json_argument_returns_true()
    {
        $validator = new ValidateCSVFile();
        $result = $validator->validate('{"1":2,"2":3,"3":1}');
        $this->assertTrue($result);
    }

    public function test_invalid_json_argument_throws_exception()
    {
        $validator = new ValidateCSVFile();
        $this->expectException(\Exception::class);
        $validator->validate('example');
    }

    public function test_more_than_one_json_argument_throws_exception()
    {
        $validator = new ValidateCSVFile();
        $this->expectException(\Exception::class);
        $validator->validate('{"1":2,"2":3,"3":1}', '{"1":2,"2":3,"3":1}');
    }

    public function test_more_than_one_invalid_argument_throws_exception()
    {
        $validator = new ValidateCSVFile();
        $this->expectException(\Exception::class);
        $validator->validate('example1', 'example2');
    }

}
