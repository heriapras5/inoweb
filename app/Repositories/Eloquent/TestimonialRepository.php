<?php

namespace App\Repositories\Eloquent;

use App\Models\Testimonial;
use App\Repositories\Contracts\TestimonialRepositoryInterface;

class TestimonialRepository extends BaseRepository implements TestimonialRepositoryInterface
{
    protected function makeModel(): Testimonial
    {
        return new Testimonial();
    }
}
