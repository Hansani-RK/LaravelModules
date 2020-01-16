<?php

namespace Modules\Player\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class Player extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
     //   return parent::toArray($request);
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'answers'    => (int) $this->answers,
            'points'     => (int) $this->points,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
