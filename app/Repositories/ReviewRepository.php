<?php
namespace App\Repositories;
use App\Models\Review;

class ReviewRepository
{
    public function get(){
        return Review::all();
    }

    public function details(int $id)
    {
        return Review::findOrFail($id);
    }

    public function store(array $data)
    {
        // Only allow fillable fields to prevent mass assignment
        $review = new Review();
        $review->fill($data);
        $review->save();
        return $review;
    }

    public function update(int $id, array $data)
    {
        $review = $this->details($id);
        $review->fill($data);
        $review->save();
        return $review;
    }

    public function delete(int $id)
    {
        $review = $this->details($id);
        $review->delete();
        return $review;
    }
}