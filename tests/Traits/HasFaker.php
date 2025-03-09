<?php

namespace Tests\Traits;

use Faker\Factory as FakerFactory;
use Faker\Generator as Faker;

trait HasFaker
{

    protected Faker $faker;


    public function __construct(?string $name = null)
    {
        parent::__construct($name);
        $this->faker = FakerFactory::create('pt_BR');
    }

}
