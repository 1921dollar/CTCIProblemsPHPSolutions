<?php
    function isPermutationBySort($s1, $s2): bool
    {
        $s1 = str_split($s1);
        $s2 = str_split($s2);
        sort($s1, SORT_STRING);
        sort($s2, SORT_STRING);
        $s1 = implode($s1);
        $s2 = implode($s2);

        return strcmp($s1, $s2) === 0;
    }

    function isPermutationByCount($s1, $s2): bool
    {
        $lookupTable = [];
        $s1 = str_split($s1);
        $s2 = str_split($s2);
        for ($i = 0; $i < count($s1); $i++) {
            if (in_array($s1[$i], array_keys($lookupTable))) {
                $lookupTable[$s1[$i]]++;
            } else {
                $lookupTable[$s1[$i]] = 1;
            }
        }
        for ($i = 0; $i < count($s2); $i++) {
            if (in_array($s2[$i], array_keys($lookupTable))) {
                $lookupTable[$s2[$i]]--;

                if ($lookupTable[$s2[$i]] === 0) {
                    unset($lookupTable[$s2[$i]]);
                }
            } else {
                return false;
            }
        }

        return count($lookupTable) === 0;
    }

    echo("isPermutationBySort: " . json_encode(isPermutationBySort("banana", "abnnaa")) . PHP_EOL);
    echo("isPermutationByCount: " . json_encode(isPermutationByCount("banana", "abnnaa")) . PHP_EOL);