<?php
namespace Baghayi\ContentScratcher;

final class Mobile {

    public function scratch(string $mobile): string
    {
        $mobile = array_reverse(str_split($mobile));

        $totalScratchedChars = 5;
        for($i = 2; $i < count($mobile); $i++) {
            if($totalScratchedChars == 0) {
                break;
            }

            $mobile[$i] = '*';

            $totalScratchedChars--;
        }

        return implode(array_reverse($mobile));
    }
}
