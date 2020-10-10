@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.myProject.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.myProject.fields.id') }}
                        </th>
                        <td>
                            {{ $myProject->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.myProject.fields.name') }}
                        </th>
                        <td>
                            {{ $myProject->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.myProject.fields.description') }}
                        </th>
                        <td>
                            {!! $myProject->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.myProject.fields.photo') }}
                        </th>
                        <td>
                            @foreach($myProject->photo as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    <img src="{{ $media->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.myProject.fields.video') }}
                        </th>
                        <td>
                            {{ $myProject->video }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.myProject.fields.documents') }}
                        </th>
                        <td>
                            {{ $myProject->documents }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
    </div>
</div>
@endsection