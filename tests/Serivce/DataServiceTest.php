<?php

namespace App\Tests\Serivce;

use App\Fixtures\MovieFixtures;
use App\Service\DataService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class DataServiceTest extends KernelTestCase
{
    private DataService $service;

    public function setUp(): void
    {
        parent::setUp();
        parent::bootKernel();
        $this->service = self::getContainer()->get(DataService::class);
    }

    public function testProcessBaseArray(): void
    {
        $result = $this->service->processArray(MovieFixtures::FIXTURES);

        self::assertLessThanOrEqual(3, count($result));

        foreach ($result as $value) {
            self::assertStringStartsWith('W', $value);
        }
    }

    public function testCustomCollection(): void
    {
        $collection = [
            'Whispering Shadows',
            'Wings of Destiny',
            'Wild Horizons',
            'Wicked Hearts',
            'Wanderlust Chronicles',
            'White Noise',
            'War of Echoes',
            'Woven Realities',
            'Wrath Unleashed',
            'Winter’s End',
        ];

        $result = $this->service->processArray($collection);

        self::assertCount(3, $result);
    }

    public function testEmptyInputCollection(): void
    {
        $this->expectExceptionMessage('DataProcessor has error: "Empty input collection.".');

        $this->service->processArray([]);
    }
}
