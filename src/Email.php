<?php
namespace Baghayi\ContentScratcher;

class Email
{
    
    private $email;

    function __construct(string $email)
    {
        $this->email = $email;
    }

    public function scratch(): string
    {
        $this->email;
        $localPart = strstr($this->email, '@', true);
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

        $atSignDomain = strstr($this->email, '@');
        return $scratchedLocalPart . $atSignDomain;
    }
}
