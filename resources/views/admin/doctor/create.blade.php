@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Create New Doctor
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.doctors.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">Name</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                
            </div>
            <div class="form-group">
                <label class="required" for="description">Description</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', '') }}" required>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="language">Language</label>
                <input class="form-control {{ $errors->has('language') ? 'is-invalid' : '' }}" type="text" name="language" id="language" value="{{ old('language', '') }}">
                @if($errors->has('language'))
                    <div class="invalid-feedback">
                        {{ $errors->first('language') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="country">country</label>
                <input class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}" type="text" name="country" id="country" value="{{ old('country', '') }}">
                @if($errors->has('country'))
                    <div class="invalid-feedback">
                        {{ $errors->first('country') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="join_at">Join_at</label>
                <input class="form-control datetime {{ $errors->has('join_at') ? 'is-invalid' : '' }}" type="text" name="join_at" id="join_at" value="{{ old('join_at', '') }}">
                @if($errors->has('join_at'))
                    <div class="invalid-feedback">
                        {{ $errors->first('join_at') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="major">Major</label>
                <input class="form-control {{ $errors->has('major') ? 'is-invalid' : '' }}" type="text" name="major" id="major" value="{{ old('major', '') }}" required>
                @if($errors->has('major'))
                    <div class="invalid-feedback">
                        {{ $errors->first('major') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="profile">Profile</label>
                <textarea class="form-control ckeditor {{ $errors->has('profile') ? 'is-invalid' : '' }}" name="profile" id="profile">{!! old('profile') !!}</textarea>
                @if($errors->has('profile'))
                    <div class="invalid-feedback">
                        {{ $errors->first('profile') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label>Rateing</label>
                <select class="form-control {{ $errors->has('rateing') ? 'is-invalid' : '' }}" name="rateing" id="rateing">
                    <option value disabled {{ old('rateing', null) === null ? 'selected' : '' }}>Select</option>
                    @foreach(App\doctors::RATEING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('rateing', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('rateing'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rateing') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="timetables">Time Tables</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">select all</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">deselect all</span>
                </div>
                <select class="form-control select2 {{ $errors->has('timetables') ? 'is-invalid' : '' }}" name="timetables[]" id="timetables" multiple>
                    @foreach($timetables as $id => $timetable)
                        <option value="{{ $id }}" {{ in_array($id, old('timetables', [])) ? 'selected' : '' }}>{{$timetable->time->toDateString()}} -- {{$timetable->time->format('h:i a')}}</option>
                    @endforeach
                </select>
                @if($errors->has('timetables'))
                    <div class="invalid-feedback">
                        {{ $errors->first('timetables') }}
                    </div>
                @endif
            </div> 
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/admin/doctors/ckmedia', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', {{ $doctor->id ?? 0 }});
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  
});
</script>

@endsection