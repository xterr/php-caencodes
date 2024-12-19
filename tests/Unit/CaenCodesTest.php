<?php

declare(strict_types=1);

namespace Xterr\CaenCodes\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Xterr\CaenCodes\CaenCode;
use Xterr\CaenCodes\CaenCodesFactory;
use Xterr\CaenCodes\CaenVersion;

class CaenCodesTest extends TestCase
{
    public function testIterator(): void
    {
        $caenCodesFactory = new CaenCodesFactory();
        $caenCodes        = $caenCodesFactory->getCodes();

        foreach ($caenCodes as $caenCode) {
            static::assertInstanceOf(
                CaenCode::class,
                $caenCode
            );
        }

        static::assertIsArray($caenCodes->toArray());
        static::assertGreaterThan(0, count($caenCodes));
    }

    public function testGetByCodeAndVersion(): void
    {
        $caenCodesFactory = new CaenCodesFactory();
        $caenCode         = $caenCodesFactory->getCodes()->getByCodeAndVersion('6202', CaenVersion::VERSION_2);

        static::assertInstanceOf(CaenCode::class, $caenCode);

        static::assertEquals('J', $caenCode->getSection());
        static::assertEquals('62', $caenCode->getDivision());
        static::assertEquals('620', $caenCode->getGroup());
        static::assertEquals('6202', $caenCode->getCode());
        static::assertEquals('6202', $caenCode->getRawCode());
        static::assertEquals(CaenVersion::VERSION_2, $caenCode->getVersion());
        static::assertEquals('Activitati de consultanta in tehnologia informatiei', $caenCode->getName());
    }

    public function testGetByNormalizedCodeAndVersion(): void
    {
        $isoCodes = new CaenCodesFactory();
        $caenCode = $isoCodes->getCodes()->getByRawCodeAndVersion('6202', CaenVersion::VERSION_2);

        static::assertInstanceOf(CaenCode::class, $caenCode);

        static::assertEquals('J', $caenCode->getSection());
        static::assertEquals('62', $caenCode->getDivision());
        static::assertEquals('620', $caenCode->getGroup());
        static::assertEquals('6202', $caenCode->getCode());
        static::assertEquals('6202', $caenCode->getRawCode());
        static::assertEquals(CaenVersion::VERSION_2, $caenCode->getVersion());
        static::assertEquals('Activitati de consultanta in tehnologia informatiei', $caenCode->getName());
    }

    public function testGetAllByVersion(): void
    {
        $caenCodesFactory = new CaenCodesFactory();

        static::assertCount(
            615,
            $caenCodesFactory->getCodes()->getAllByVersion(CaenVersion::VERSION_2)
        );

        static::assertCount(
            0,
            $caenCodesFactory->getCodes()->getAllByVersion(1)
        );
    }

    public function testCount(): void
    {
        $caenCodesFactory = new CaenCodesFactory();
        static::assertEquals(615, $caenCodesFactory->getCodes()->count());
    }
}
