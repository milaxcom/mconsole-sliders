<?php

namespace Milax\Mconsole\Sliders\Repositories;

use Milax\Mconsole\Repositories\EloquentRepository;
use Milax\Mconsole\Sliders\Contracts\Repositories\SlidersRepository as Repository;

class SlidersRepository extends EloquentRepository implements Repository
{
    public $model = \Milax\Mconsole\Sliders\Models\Slider::class;
}
