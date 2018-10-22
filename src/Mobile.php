<?php
namespace Baghayi\ContentScratcher;

use libphonenumber\PhoneNumberUtil;

final class Mobile {

    private $util;

    public function __construct(PhoneNumberUtil $util)
    {
        $this->util = $util;
    }

    private function validateMobileNumber(string $mobile)
    {
        if(empty($mobile)) {
            throw new InvalidMobileNumber;
        }

        $phoneNumberInstance = $this->util->parse($mobile, 'IR', null, true);
        if(!$this->util->isValidNumber($phoneNumberInstance)) {
            throw new InvalidMobileNumber;
        }
    }

    public function scratch(string $mobile): string
    {
        $this->validateMobileNumber($mobile);

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
