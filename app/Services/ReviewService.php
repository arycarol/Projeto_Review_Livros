<?php

namespace App\Services;

use App\Repositories\ReviewRepository;

class ReviewService
{
    private ReviewRepository $reviewRepository;

    public function __construct(ReviewRepository $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    /**
     * Retorna todas as reviews.
     */
    public function get()
    {
        return $this->reviewRepository->get();
    }

    /**
     * Retorna detalhes de uma review específica.
     */
    public function details(int $id)
    {
        return $this->reviewRepository->details($id);
    }

    /**
     * Cria uma nova review.
     */
    public function store(array $data)
    {
        return $this->reviewRepository->store($data);
    }

    /**
     * Atualiza uma review existente.
     */
    public function update(int $id, array $data)
    {
        return $this->reviewRepository->update($id, $data);
    }

    /**
     * Remove uma review.
     */
    public function delete(int $id)
    {
        return $this->reviewRepository->delete($id);
    }
}