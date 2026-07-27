<?php

namespace App\Repositories\Eloquent;

use App\Models\Project;
use App\Repositories\Contracts\ProjectRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ProjectRepository extends BaseRepository implements ProjectRepositoryInterface
{
    protected function makeModel(): Project
    {
        return new Project();
    }

    public function all(array $columns = ['*']): Collection
    {
        $this->criteria[] = fn($q) => $q->with('images');
        return parent::all($columns);
    }

    public function findBySlug(string $slug): ?Model
    {
        return $this->model->with(['images', 'features', 'technologies', 'results', 'testimonial', 'category'])->where('slug', $slug)->first();
    }

    public function findByCategory(int $categoryId): Collection
    {
        return $this->model->where('category_id', $categoryId)->where('status', true)->get();
    }

    public function getRelated(int $projectId, int $categoryId, int $limit = 3): Collection
    {
        return $this->model
            ->with('images')
            ->where('id', '!=', $projectId)
            ->where('category_id', $categoryId)
            ->where('status', true)
            ->limit($limit)
            ->get();
    }

    public function search(string $term): Collection
    {
        return $this->model
            ->where(function ($q) use ($term) {
                $q->where('name', 'like', "%{$term}%")
                  ->orWhere('description', 'like', "%{$term}%")
                  ->orWhere('client', 'like', "%{$term}%");
            })
            ->where('status', true)
            ->get();
    }
}
