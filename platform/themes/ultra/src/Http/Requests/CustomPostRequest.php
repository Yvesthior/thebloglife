<?php

namespace Theme\UltraNews\Http\Requests;

use Botble\Blog\Http\Requests\PostRequest;

class CustomPostRequest extends PostRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return parent::rules() + ['author_id' => 'required'];
    }
}
