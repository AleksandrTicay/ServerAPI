<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\V1\GenreResource;
use App\Http\Resources\V1\AuthorResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'publishedYear' => $this->published_year,
            'amount' => $this->amount,  
            'genres' => GenreResource::collection($this->genres),
            'authors' => AuthorResource::collection($this->authors)
        ];
    }
}
