<?php
namespace Baghayi\ContentScratcher;

use libphonenumber\PhoneNumberUtil;

final class MobileFactory {

    public function create(): Mobile
    {
        $phoneNumberUtil = PhoneNumberUtil::getInstance();
        return new Mobile($phoneNumberUtil);
    }
}
