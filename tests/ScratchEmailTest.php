<?php
namespace Tests;

use PHPUnit\Framework\TestCase;

final class ScratchEmailTest extends TestCase
{
    
    public function test_given_an_email_scratched_email_is_returned()
    {
        $emailStrig = 'hossein@gmail.com';
        $email = new \Baghayi\ContentScratcher\Email($emailStrig);
        $scratchedValue = $email->scratch();

        $this->assertNotSame($emailStrig, $scratchedValue);
        $this->assertSame(strlen($emailStrig), strlen($scratchedValue));
    }
}
