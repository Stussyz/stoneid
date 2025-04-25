<?php

if (! function_exists('formatCurrencyLabel')) {
    function formatCurrencyLabel($value)
    {
        if ($value >= 1_000_000_000_000) {
            $formatted = number_format($value / 1_000_000_000_000, 3, ',', '.');
            return rtrim(rtrim($formatted, '0'), ',') . ' Triliun';
        } elseif ($value >= 1_000_000_000) {
            $formatted = number_format($value / 1_000_000_000, 3, ',', '.');
            return rtrim(rtrim($formatted, '0'), ',') . ' Miliar';
        } elseif ($value >= 1_000_000) {
            $formatted = number_format($value / 1_000_000, 2, ',', '.');
            return rtrim(rtrim($formatted, '0'), ',') . ' Juta';
        } else {
            return number_format($value, 0, ',', '.');
        }
    }
}
