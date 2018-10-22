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
        $email = new \Baghayi\ContentScratcher\Email();
        $emailStrig = 'hossein@gmail.com';
        $scratchedValue = $email->scratch($emailStrig);

        $this->assertNotSame($emailStrig, $scratchedValue);
        $this->assertSame(strlen($emailStrig), strlen($scratchedValue));
    }

    /**
     * @test
     * @expectedException \Baghayi\ContentScratcher\InvalidEmailAddress
     */
    public function invalid_email_is_not_accepted()
    {
        (new \Baghayi\ContentScratcher\Email())->scratch('@gmail.com');
    }
}
