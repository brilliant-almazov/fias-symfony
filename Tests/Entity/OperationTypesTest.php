<?php

declare(strict_types=1);

namespace Liquetsoft\Fias\Symfony\LiquetsoftFiasBundle\Tests\Entity;

use DateTimeImmutable;
use Liquetsoft\Fias\Symfony\LiquetsoftFiasBundle\Entity\OperationTypes;
use Liquetsoft\Fias\Symfony\LiquetsoftFiasBundle\Tests\EntityCase;

/**
 * Тест для сущности 'Сведения по статусу действия'.
 *
 * @internal
 */
class OperationTypesTest extends EntityCase
{
    /**
     * {@inheritDoc}
     */
    protected function createEntity()
    {
        return new OperationTypes();
    }

    /**
     * {@inheritDoc}
     */
    protected function accessorsProvider(): array
    {
        return [
            'id' => $this->createFakeData()->numberBetween(1, 1000000),
            'name' => $this->createFakeData()->word(),
            'shortname' => $this->createFakeData()->word(),
            'desc' => $this->createFakeData()->word(),
            'updatedate' => new DateTimeImmutable(),
            'startdate' => new DateTimeImmutable(),
            'enddate' => new DateTimeImmutable(),
            'isactive' => $this->createFakeData()->word(),
        ];
    }
}
