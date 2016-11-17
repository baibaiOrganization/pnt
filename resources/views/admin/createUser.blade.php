@extends('layout.front')

@section('content')

    <div class="Register-header">
        <h1>CREAR USUARIO</h1>
    </div>
    <form action="{{route('admin.userCreate')}}" enctype="multipart/form-data" method="POST" class=" Register-form">
        <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
        <div class=" row Register-contentLabel">
            <label class="small-10 col-5" for="name">
                <span>Nombres y apellidos</span>
                <input type="text" name="name" id="name" value="{{old('name')}}">
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('name')}}</span>
                @endif
            </label>

            <label class="col-5 small-10" for="email">
                <span>Email</span>
                <input type="email" name="email" id="email" value="{{old('email')}}">
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('email')}}</span>
                @endif
            </label>

            <label class="col-5 small-10" for="password">
                <span>Contraseña</span>
                <input type="password" name="password" id="password" value="{{old('password')}}">
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('password')}}</span>
                @endif
            </label>

            <label for="region_id" class="col-5 small-10">
                <div class="Register-contentSelect">
                    <span>Región</span>
                    <span class="Register-arrowSelect">▼</span>
                    <select name="region_id" id="region_id">
                        @foreach($regions as $region)
                            <option value="{{$region->id}}" @if(old('region_id') == $region->id) selected @endif>{{$region->name}}</option>
                        @endforeach
                    </select>
                </div>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('region_id')}}</span>
                @endif
            </label>

            <label for="role_id" class="col-5 small-10">
                <div class="Register-contentSelect">
                    <span>Rol</span>
                    <span class="Register-arrowSelect">▼</span>
                    <select name="role_id" id="role_id">
                        @foreach($roles as $role)
                            <option value="{{$role->id}}" @if(old('role_id') == $role->id) selected @endif>{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('role_id')}}</span>
                @endif
            </label>
        </div>
        <div class="center row"><button>CREAR USUARIO</button></div>
    </form>
    <div class="preload red hidden">
        <div class="loader">
            <div class="circle-outer"></div>
            <div class="circle-inner"></div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('js/images.js')}}"></script>
    <script src="{{asset('js/tempFiles.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="{{asset('js/form.js')}}"></script>
    <script type="text/javascript">
        $('#sector').select2({
            closeOnSelect: false
        });
    </script>
@endsection
@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
@endsection