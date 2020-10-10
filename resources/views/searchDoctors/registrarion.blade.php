@include('searchDoctors.nav')
@include('searchDoctors.header')

<div class="card">
    <div class="card-header">
       registration 
    </div>

    <div class="card-body">
        <form action="{{url('/booking')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">name*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($user) ? $user->name : '') }}" required>
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">Email*</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}" >
                @if($errors->has('email'))
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                <label for="phone">phone</label>
                <input type="phone" id="phone" name="phone" class="form-control" required>
                @if($errors->has('phone'))
                    <p class="help-block">
                        {{ $errors->first('phone') }}
                    </p>
                @endif
            </div>
            <div class="form-group}}">
                <label for="phone">Doctor Name</label>
                <input type="text" id="doctorName" name="doctorName" class="form-control" value="{{$doctor}}" readonly>
            </div>
            <div class="form-group}}">
                <label for="phone">Time : </label>
                <input type="text" id="date" name="date" class="form-control" value="{{$time}}" readonly>
            </div>
            <input type="hidden" name="doctorId" value="{{$id}}">
            
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@include('searchDoctors.footer')  