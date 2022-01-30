<?php

namespace WebshippyTechTask;

use WebshippyTechTask\Interfaces\FormatCSVResultInterface;

class FormatCSVResult implements FormatCSVResultInterface
{

    public function format(array $results, string $stock): string
    {
        $stock = json_decode($stock);

        $displayResult = "";
        foreach ($results['ordersHeader'] as $h) {
            $displayResult .= str_pad($h, 20);
        }
        $displayResult .= "\n";
        foreach ($results['ordersHeader'] as $h) {
            $displayResult .= str_repeat('=', 20);
        }
        $displayResult .= "\n";
        foreach ($results['orders'] as $item) {
            if ($stock->{$item['product_id']} >= $item['quantity']) {
                foreach ($results['ordersHeader'] as $h) {
                    if ($h == 'priority') {
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
                        $displayResult .= str_pad($item[$h], 20);
                    }
                }
                $displayResult .= "\n";
            }
        }
        return $displayResult;
    }
}
