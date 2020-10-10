<?php

namespace App\Http\Requests;

use App\MyProject;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateMyProjectRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('my_project_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'        => [
                'required',
                'unique:my_projects,name,' . request()->route('my_project')->id,
            ],
            'description' => [
                'required',
            ],
        ];
    }
}
