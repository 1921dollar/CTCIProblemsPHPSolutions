<?php
    function urlify($s, $trueLength): string
    {
        // Remove trailing whitespace as it's not needed
        $s = substr($s, 0, $trueLength);
        $s = str_split($s);
        for ($i = 0; $i < count($s); $i++) {
            if (strcmp($s[$i], " ") === 0) {
                $s[$i] = "%20";
            }
        }

        return implode($s);
    }

    echo("urlify: " . json_encode(urlify("Mr John Smith    ", 13)) . PHP_EOL);