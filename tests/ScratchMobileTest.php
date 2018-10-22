<?php
namespace Tests;

use PHPUnit\Framework\TestCase;

final class ScratchMobileTest extends TestCase
{
    
    /**
     * @test
     */
    public function given_a_mobile_number_scratched_number_is_returned()
    {
        $scratcher = new \Baghayi\ContentScratcher\Mobile();
        $mobile = '9147800000';
        $result = $scratcher->scratch($mobile);

        $this->assertNotSame($mobile, $result);
        $this->assertSame(strlen($mobile), strlen($result));
    }
}
