<?php

namespace WebshippyTechTask;

use WebshippyTechTask\Interfaces\FormatCSVResultInterface;

class FormatCSVResult implements FormatCSVResultInterface
{

    public function format(array $orders, array $headers, string $stock): string
    {
        $stock = json_decode($stock);

        $displayResult = "";
        foreach ($headers as $header) {
            $displayResult .= str_pad($header, 20);
        }
        $displayResult .= "\n";
        foreach ($headers as $header) {
            $displayResult .= str_repeat('=', 20);
        }
        $displayResult .= "\n";
        foreach ($orders as $item) {
            if ($stock->{$item['product_id']} >= $item['quantity']) {
                foreach ($headers as $header) {
                    if ($header == 'priority') {
                        if ($item['priority'] == 1) {
                            $text = 'low';
                        } else {
                            if ($item['priority'] == 2) {
                                $text = 'medium';
                            } else {
                                $text = 'high';
                            }
                        }
                        $displayResult .= str_pad($text, 20);
                    } else {
                        $displayResult .= str_pad($item[$header], 20);
                    }
                }
                $displayResult .= "\n";
            }
        }
        return $displayResult;
    }
}
