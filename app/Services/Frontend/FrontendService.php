<?php

namespace App\Services\Frontend;

use App\Repositories\Contracts\ProjectRepositoryInterface;
use App\Repositories\Contracts\ServiceRepositoryInterface;
use App\Repositories\Contracts\FaqRepositoryInterface;
use App\Repositories\Contracts\TestimonialRepositoryInterface;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\MessageRepositoryInterface;
use App\Repositories\Contracts\NewsletterRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class FrontendService
{
    public function __construct(
        protected ProjectRepositoryInterface $projectRepo,
        protected ServiceRepositoryInterface $serviceRepo,
        protected FaqRepositoryInterface $faqRepo,
        protected TestimonialRepositoryInterface $testimonialRepo,
        protected CategoryRepositoryInterface $categoryRepo,
        protected MessageRepositoryInterface $messageRepo,
        protected NewsletterRepositoryInterface $newsletterRepo,
    ) {}

    public function getProjects(int $limit = 0): Collection
    {
        $q = $this->projectRepo->active()->orderBy('created_at', 'desc');
        if ($limit > 0) {
            $q->limit($limit);
        }
        return $q->all();
    }

    public function getProjectBySlug(string $slug)
    {
        return $this->projectRepo->findBySlug($slug);
    }

    public function getRelatedProjects(int $projectId, int $categoryId, int $limit = 3): Collection
    {
        return $this->projectRepo->getRelated($projectId, $categoryId, $limit);
    }

    public function getProjectCategories(): Collection
    {
        return $this->categoryRepo->active()->orderBy('sort_order')->all();
    }

    public function getFeaturedProjects(int $limit = 6): Collection
    {
        return $this->projectRepo->featured()->active()->orderBy('created_at', 'desc')->limit($limit)->all();
    }

    public function getServices(): Collection
    {
        return $this->serviceRepo->active()->orderBy('sort_order')->all();
    }

    public function getFaqs(): Collection
    {
        return $this->faqRepo->active()->orderBy('sort_order')->all();
    }

    public function getTestimonials(): Collection
    {
        return $this->testimonialRepo->active()->orderBy('sort_order')->all();
    }

    public function submitContact(array $data)
    {
        return $this->messageRepo->create($data);
    }

    public function subscribeNewsletter(string $email)
    {
        return $this->newsletterRepo->create(['email' => $email]);
    }
}
