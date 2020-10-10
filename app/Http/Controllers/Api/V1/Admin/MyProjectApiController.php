<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMyProjectRequest;
use App\Http\Requests\UpdateMyProjectRequest;
use App\Http\Resources\Admin\MyProjectResource;
use App\MyProject;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MyProjectApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('my_project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MyProjectResource(MyProject::all());
    }

    public function store(StoreMyProjectRequest $request)
    {
        $myProject = MyProject::create($request->all());

        return (new MyProjectResource($myProject))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MyProject $myProject)
    {
        abort_if(Gate::denies('my_project_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MyProjectResource($myProject);
    }

    public function update(UpdateMyProjectRequest $request, MyProject $myProject)
    {
        $myProject->update($request->all());

        return (new MyProjectResource($myProject))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MyProject $myProject)
    {
        abort_if(Gate::denies('my_project_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $myProject->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
