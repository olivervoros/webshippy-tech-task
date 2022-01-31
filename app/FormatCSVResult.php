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
        $displayResult .= PHP_EOL;
        foreach ($headers as $header) {
            $displayResult .= str_repeat('=', 20);
        }
        $displayResult .= PHP_EOL;
        foreach ($orders as $order) {
            if ($stock->{$order['product_id']} >= $order['quantity']) {
                foreach ($headers as $header) {
                    if ($header == 'priority') {
                        $text = $this->convertPriorityToString($order['priority']);
                        $displayResult .= str_pad($text, 20);
                    } else {
                        $displayResult .= str_pad($order[$header], 20);
                    }
                }
                $displayResult .= PHP_EOL;
            }
        }
        return $displayResult;
    }

    private function convertPriorityToString(int $priority): string {
        switch ($priority) {
            case $priority === 1:
                return 'low';
            case $priority === 2:
                return 'medium';
            case $priority === 3:
                return 'high';
            default:
                return 'unknown';
        }
    }
}
