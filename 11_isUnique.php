<?php
    function isUniqueBySort($s): bool
    {
        $s = str_split($s);
        sort($s, SORT_STRING);
        for ($i = 0; $i < count($s) - 1; $i++) {
            if ($s[$i] === $s[$i + 1])
                return false;
        }

        return true;
    }

    function isUniqueByLookup($s): bool
    {
        $lookupTable = [];
        $s = str_split($s);
        for ($i = 0; $i < count($s); $i++) {
            if (in_array($s[$i], $lookupTable)) {
                return false;
            }

            $lookupTable[] = $s[$i];
        }

        return true;
    }

    echo("isUniqueBySort: " . json_encode(isUniqueBySort("banana")) . PHP_EOL);
    echo("isUniqueByLookup: " . json_encode(isUniqueByLookup("banana")) . PHP_EOL);