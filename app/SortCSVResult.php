<?php

class SortCSVResult implements SortCSVResultInterface
{

    public function sort(array $results):array
    {
        usort($results['orders'], function ($a, $b) {
            $pc = -1 * ($a['priority'] <=> $b['priority']);
            return $pc == 0 ? $a['created_at'] <=> $b['created_at'] : $pc;
        });
        return $results;
    }

}
