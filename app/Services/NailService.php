<?php

namespace App\Services;

use App\Repositories\NailRepository;

class NailService
{
    protected $repository;

    public function __construct(NailRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getTopUser()
    {
        $nails = $this->repository->getAllWithUsers();

        if ($nails->isEmpty()) {
            return [null, 0];
        }

        $counts = $nails->groupBy('user_id')->map(fn($items) => $items->count());

        $topUserId = $counts->sortDesc()->keys()->first();
        $topUserCount = $counts->max();

        $topUserData = $nails->firstWhere('user_id', $topUserId)?->user;

        return [$topUserData, $topUserCount];
    }
}
