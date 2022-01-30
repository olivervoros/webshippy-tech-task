<?php

class FormatCSVResult implements FormatCSVResultInterface
{

    public function format(array $results): string
    {
        // TODO: work out $stock...
        foreach ($results['ordersHeader'] as $h) {
            echo str_pad($h, 20);
        }
        $displayResults = PHP_EOL;
        foreach ($results['ordersHeader'] as $h) {
            $result .= str_repeat('=', 20);
        }
        $displayResults .= PHP_EOL;
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
                        $displayResults .= str_pad($text, 20);
                    } else {
                        $displayResults .= str_pad($item[$h], 20);
                    }
                }
                $displayResults .= PHP_EOL;
            }
        }
        return $displayResults;

    }
}
