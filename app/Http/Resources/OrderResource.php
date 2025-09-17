<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'userId'=>(int)$this->userId,
            'fullName'=>$this->fullName,
            'detailedAddress'=>$this->detailedAddress,
            'totalPrice'=>(float)$this->totalPrice,
            'totalProductSum'=>(float)$this->totalProductSum,
            'phoneNumber'=>$this->phoneNumber,
            'date'=>Carbon::parse($this->created_at)->format('Y-m-d'),
            'time'=>Carbon::parse($this->created_at)->format('h:i a'),
        ];
    }
}
