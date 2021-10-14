<?php

declare(strict_types=1);

namespace Liquetsoft\Fias\Symfony\LiquetsoftFiasBundle\Entity;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;

/**
 * Сведения по типам нормативных документов.
 *
 * @ORM\MappedSuperclass
 */
class NormativeDocsTypes
{
    /**
     * Идентификатор записи.
     *
     * @ORM\Id
     * @ORM\Column(type="integer", nullable=false)
     *
     * @var int
     */
    protected int $id = 0;

    /**
     * Наименование.
     *
     * @ORM\Column(type="string", length=500, nullable=false)
     *
     * @var string
     */
    protected string $name = '';

    /**
     * Дата начала действия записи.
     *
     * @ORM\Column(type="datetime_immutable", nullable=false)
     *
     * @var DateTimeImmutable|null
     */
    protected ?DateTimeImmutable $startdate = null;

    /**
     * Дата окончания действия записи.
     *
     * @ORM\Column(type="datetime_immutable", nullable=false)
     *
     * @var DateTimeImmutable|null
     */
    protected ?DateTimeImmutable $enddate = null;

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setStartdate(DateTimeImmutable $startdate): self
    {
        $this->startdate = $startdate;

        return $this;
    }

    public function getStartdate(): ?DateTimeImmutable
    {
        return $this->startdate;
    }

    public function setEnddate(DateTimeImmutable $enddate): self
    {
        $this->enddate = $enddate;

        return $this;
    }

    public function getEnddate(): ?DateTimeImmutable
    {
        return $this->enddate;
    }
}
