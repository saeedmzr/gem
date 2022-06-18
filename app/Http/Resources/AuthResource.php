<?php

namespace App\Http\Resources;

use App\Http\Resource\Admin\Admin\AdminResource;
use App\Http\Resource\Admin\Member\MemberResource;
use App\Http\Resource\Admin\Organization\OrganizationResource;
use App\Http\Resource\Admin\Teacher\TeacherResource;
use App\Http\Resource\User\Asset\AvatarResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
{
    public static $wrap = null;

    public function toArray($request)
    {
        return [
            'token' => $this->token,
            'user' => new UserResource($this->user)

        ];
    }

}
