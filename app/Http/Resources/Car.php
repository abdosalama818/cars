<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Car extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'name'=>$this->name,
            'brand'=>$this->brand->name,
            'desc'=>$this->desc,
            'img'=>asset('uploads') . '/' . $this->img,
            'engin'=>$this->engin,
            'price'=>$this->price,
            'speed'=>$this->speed,
            'kilos'=>$this->kilos,
            'seats'=>$this->seats,
            'type_of_car'=>$this->type,
            'model_number'=>$this->model_number,
            'is_automatic'=>$this->is_automatic,
            'tank'=>$this->fual_tank,

        ];
    }
}
