<?php
namespace Baghayi\ContentScratcher;

class Email
{

    private function validateEmail(string $email)
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidEmailAddress;
        }
    }

    public function scratch(string $email): string
    {
        $this->validateEmail($email);

        $email;
        $localPart = strstr($email, '@', true);
        $reversedArrayLocalPart = array_reverse(str_split($localPart));

        $halfChars = (int) ceil(count($reversedArrayLocalPart) / 2);
        foreach($reversedArrayLocalPart as &$char) {
            if((bool) $halfChars === false) {
                break;
            }

            $char = '*';

            $halfChars--;
        }

        $scratchedLocalPart = implode(array_reverse($reversedArrayLocalPart));

        $atSignDomain = strstr($email, '@');
        return $scratchedLocalPart . $atSignDomain;
    }
}
