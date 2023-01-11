<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResumeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'positsion'=>$this->positsion_id,
            'portfolio'=>$this->portfolio_user_id,
            'experience'=>$this->experience,
            'language'=>$this->language,
            'salary'=>$this->salary,
        ];
    }
}
