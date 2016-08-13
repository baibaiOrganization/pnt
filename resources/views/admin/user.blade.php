@extends('layout.back')

@section('content')

    @if (count($errors) > 0)

        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>

            @endif
            <h2>Editar usuario {{$client->user->name . " " .$client->user['last-name']}}</h2>

            @if(Session::has('success'))
                <div class="success">
                    <p>¡El usuario se ha actualizado!</p>
                </div>
            @endif
            <form action="{{route('updateClient')}}" method="post" enctype="multipart/form-data"
                  class="row UserEdit top">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="user_id" value="{{ $client->user->id }}">
                <div class="col-4  row between">
                    <figure class="col-9 small-12 Form-figure-user remove">
                        <img src="{{asset('uploads/profiles/'. $client->user['image-profile'])}}" alt="">
                        {!!  $errors->first('image-profile', '<p class="error">:message</p>')  !!}
                        <output class="result"></output>
                        <input type="file" name="image-profile" class="images" id="image-profile">
                        <figcaption>¡Haz clic o arrastra la imagen!</figcaption>
                    </figure>

                </div>
                <div class="col-8 small-12">

                    <label for="name" class="row middle">
                        {!!  $errors->first('name', '<p class="error">:message</p>')  !!}
                        <span class="col-5">Nombre(*):</span>
                        <input class="col-7" name="name" id="name" value="{{$client->user->name}}" type="text">
                    </label>
                    <label for="last-name" class="row middle">
                        {!!  $errors->first('last-name', '<p class="error">:message</p>')  !!}
                        <span class="col-5">Apellido(*):</span>
                        <input class="col-7" name="last-name" value="{{ $client->user['last-name'] }}" id="last-name"
                               type="text">
                    </label>
                    <label for="identification-number" class="row middle">
                        {!!  $errors->first('identification-number', '<p class="error">:message</p>')  !!}
                        <span class="col-5">Número de identificación(*):</span>
                        <input class="col-7" name="identification-number"
                               value="{{ $client->user['identification-number'] }}"
                               id="identification-number" type="text">
                    </label>
                    <label for="email" class="row middle">
                        {!!  $errors->first('email', '<p class="error">:message</p>')  !!}
                        <span class="col-5">Email(*):</span>
                        <input class="col-7" name="email" value="{{ $client->user->email }}" id="email" type="email">
                    </label>
                    <label for="password" class="row middle">
                        {!!  $errors->first('password', '<p class="error">:message</p>')  !!}
                        <span class="col-5">Contraseña(*):</span>
                        <input class="col-7" name="password" id="password" type="password">
                    </label>
                    <label for="country" class="row middle">
                        {!!  $errors->first('country', '<p class="error">:message</p>')  !!}
                        <span class="col-5">País(*):</span>
                        <select class="col-7" name="country" id="country">
                            <option value="">Selecciona el país</option>
                            @foreach($countries as $country)
                                <option {{($country->id == $client->country)?'selected':''}}  value={{ $country->id }} {{(old('country')== $country->id )?'selected':''}}>{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </label>
                    <label for="address" class="row middle">
                        {!!  $errors->first('address', '<p class="error">:message</p>')  !!}
                        <span class="col-5">Dirección(*):</span>
                        <input class="col-7" name="address" value="{{ $client->address }}" id="address" type="text">
                    </label>
                    <label for="company" class="row middle">
                        {!!  $errors->first('company', '<p class="error">:message</p>')  !!}
                        <span class="col-5">Empresa(*):</span>
                        <input class="col-7" name="company" value="{{ $client->company }}" id="company" type="text">
                    </label>
                    <label for="sector" class="row middle">
                        {!!  $errors->first('sector', '<p class="error">:message</p>')  !!}
                        <span class="col-5">Sector(*):</span>
                        <select class="col-7" name="sector[]" id="sector" multiple="multiple">
                            <option value="">Selecciona el sector</option>
                            @foreach($sectors as $id => $sector)
                                <option {{(  $client->sectors->lists('id')->contains($id))?'selected':''}}  value="{{$id}}" {{(old('sector')==$sector)?'selected':''}}>{{$sector}}</option>
                            @endforeach
                        </select>
                    </label>
                    <label for="activities" class="row middle">
                        {!!  $errors->first('activities', '<p class="error">:message</p>')  !!}
                        <span class="col-5   top-element">Actividad <em id="caracter"> (400 caracteres)</em>(*):</span>
                <textarea maxlength="400" class="col-7" name="activities"
                          id="activities">{{ $client->activities }}</textarea>
                    </label>
                    <label for="website" class="row middle">
                        <span class="col-5">Sitio web:</span>
                        <input class="col-7" name="website" id="website" value="{{ $client->website }}" type="text">
                    </label>
                    <label for="mobile" class="row middle">
                        @if($errors->has('mobile') || $errors->has('mobile-1'))
                            <p class="error">El Teléfono móvil es obligatorio(*)</p>
                        @endif
                        <span class="col-5 small-12">Teléfono móvil(*):</span>
                        <input class="col-1 small-2" value="{{ $client->mobile[0] }}" maxlength="3" name="mobile"
                               id="mobile"
                               type="text">
                        <div class="col-6 small-10" style="padding-left: 5px">
                            <input value="{{ $client->mobile[1] }}" class="{{($errors->first('mobile'))?'error':''}}"
                                   maxlength="15" name="mobile-1" id="mobile-1" type="text">
                        </div>
                    </label>
                    <label for="phone" class="row middle">
                        <span class="col-5 small-12">Teléfono fijo:</span>
                        <input maxlength="3" class="col-1 small-2" name="phone" id="phone"
                               value="{{ $client->phone[0] }}"
                               type="text">
                        <div class="col-1 small-2" style="padding-left: 5px"><input maxlength="3"
                                                                                    value="{{ $client->phone[1] }}"
                                                                                    name="phone-1" id="phone-1"
                                                                                    type="text">
                        </div>
                        <div class="col-5 small-8" style="padding-left: 5px"><input maxlength="15"
                                                                                    value="{{ $client->phone[2] }}"
                                                                                    name="phone-2" id="phone-2"
                                                                                    type="text">
                        </div>
                    </label>
                </div>


                <div class="row col-12 between middle">
                    <a class="back" href="{{route('admin')}}">VOLVER...</a>
                    <button>ACTUALIZAR...</button>
                </div>
            </form>
@endsection

@section('scripts')
    <script src="{{asset('js/formUsers.js')}}"></script>
    <script src="{{asset('js/images.js')}}"></script>
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