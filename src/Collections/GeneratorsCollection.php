<?php

declare(strict_types=1);

namespace App\Collections;

use App\Generators\GeneratorInterface;
use Doctrine\Common\Collections\ArrayCollection;

class GeneratorsCollection
{
    /**
     * @var $generators ArrayCollection<GeneratorInterface>
     */
    private ArrayCollection $generators;

    public function __construct(?array $generators = [])
    {
        $this->generators = new ArrayCollection($generators);
    }

    public function add(GeneratorInterface $generator): void
    {
        $this->generators->add($generator);
    }

    public function getAll(): ArrayCollection
    {
        return $this->generators;
    }
}
