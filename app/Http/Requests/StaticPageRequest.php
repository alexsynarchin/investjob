<?php

namespace App\Http\Requests;

class StaticPageRequest extends BaseFormRequest
{
    protected array $rules = [
        'slug' => 'required,unique:pages',
        'name' => 'required,string',
    ];
   public function store(): array
   {
       return $this->rules;
   }
}
