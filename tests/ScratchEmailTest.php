<?php
namespace Tests;

use PHPUnit\Framework\TestCase;

final class ScratchEmailTest extends TestCase
{
    
    /**
     * @test
     */
    public function given_an_email_scratched_email_is_returned()
    {
        $emailStrig = 'hossein@gmail.com';
        $email = new \Baghayi\ContentScratcher\Email($emailStrig);
        $scratchedValue = $email->scratch();

        $this->assertNotSame($emailStrig, $scratchedValue);
        $this->assertSame(strlen($emailStrig), strlen($scratchedValue));
    }

    /**
     * @test
     * @expectedException \Baghayi\ContentScratcher\InvalidEmailAddress
     */
    public function invalid_email_is_not_accepted()
    {
        $email = new \Baghayi\ContentScratcher\Email('@gmail.com');
    }
}
