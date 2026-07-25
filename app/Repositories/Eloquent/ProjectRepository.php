<?php

namespace App\Repositories\Eloquent;

use App\Models\Project;
use App\Repositories\Contracts\ProjectRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ProjectRepository extends BaseRepository implements ProjectRepositoryInterface
{
    protected function makeModel(): Project
    {
        return new Project();
    }

    public function findByCategory(int $categoryId): Collection
    {
        return $this->model->where('category_id', $categoryId)->active()->get();
    }

    public function getRelated(int $projectId, int $categoryId, int $limit = 3): Collection
    {
        return $this->model
            ->where('id', '!=', $projectId)
            ->where('category_id', $categoryId)
            ->active()
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
            ->active()
            ->get();
    }
}
