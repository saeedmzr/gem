<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SimpleResource extends JsonResource
{
    public static $wrap = null;

    public function toArray($request)
    {
        return [
            'message' => $this['message'],
        ];
    }

    public function toResponse($request)
    {
        return parent::toResponse($request)->setStatusCode($this['status']);
    }
}
