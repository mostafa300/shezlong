<?php

namespace App\Http\Requests;

use App\MyProject;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMyProjectRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('my_project_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:my_projects,id',
        ];
    }
}
