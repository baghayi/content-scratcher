<?php
namespace Tests;

use PHPUnit\Framework\TestCase;
use Baghayi\ContentScratcher\MobileFactory;

final class ScratchMobileTest extends TestCase
{
    
    private $scratcher;

    public function setUp()
    {
        $this->scratcher = (new MobileFactory())->create();
    }

    /**
     * @test
     */
    public function given_a_mobile_number_scratched_number_is_returned()
    {
        $mobile = '9147800000';
        $result = $this->scratcher->scratch($mobile);

        $this->assertNotSame($mobile, $result);
        $this->assertSame(strlen($mobile), strlen($result));
    }

    /**
     * @test
     * @expectedException Baghayi\ContentScratcher\InvalidMobileNumber
     */
    public function invalid_mobile_number_is_not_supported()
    {
        $result = $this->scratcher->scratch('7800000');
    }
}
