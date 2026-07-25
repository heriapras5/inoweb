<?php

namespace App\Repositories\Eloquent;

use App\Models\Newsletter;
use App\Repositories\Contracts\NewsletterRepositoryInterface;

class NewsletterRepository extends BaseRepository implements NewsletterRepositoryInterface
{
    protected function makeModel(): Newsletter
    {
        return new Newsletter();
    }
}
