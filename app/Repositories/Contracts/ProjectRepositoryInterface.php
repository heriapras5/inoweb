<?php

namespace App\Repositories\Contracts;

interface ProjectRepositoryInterface extends RepositoryInterface
{
    public function findByCategory(int $categoryId);
    public function getRelated(int $projectId, int $categoryId, int $limit = 3);
    public function search(string $term);
}
