@extends('layout')

@section('content')
    <header class="HeaderAuth">
        <div class="HeaderAuth-content row middle ">
            <figure class="col-6">
                <a href="/"><img src="{{ url('images/logo-agrosellers.svg') }}" alt=""></a>
            </figure>
            <a class="col-6 end" href="{{route('login')}}">
                <button class="Button">INICIO SESIÓN</button>
            </a>
        </div>
    </header>


    <form class="row center middle FormAuth Forms" role="form" method="POST" action="{{ route('register') }}">
        <div class="BackContainer FormAuth-container" style="overflow: inherit;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <h2>¡HAZ PARTE DE AGROSELLERS!</h2>
            <label>
                <input class="{{($errors->has('name'))?'error':''}}" type="text" name="name" value="{{ old('name') }}">
                <span>Nombre</span>
                {!!  $errors->first('name', '<p class="error">:message</p>')  !!}
            </label>
            <label>
                <input class="{{($errors->has('email'))?'error':''}}" type="email" name="email"
                       value="{{ old('email') }}">
                <span>E-mail</span>
                {!!  $errors->first('email', '<p class="error">:message</p>')  !!}
            </label>
            <label>
                <select class="{{($errors->has('role_id'))?'error':''}}" name="role_id" id="">
                    <option value="0">¿Mi actividad?</option>
                    <option value="3">Proveedor</option>
                    <option value="4">Comprador</option>
                </select>
                {!!  $errors->first('role_id', '<p class="error">:message</p>')  !!}
            </label>
            <label>
                <input class="{{($errors->has('mobile_phone'))?'error':''}}" type="number" name="mobile_phone"
                       value="{{ old('mobile_phone') }}">
                <span>Número de teléfono</span>
                {!!  $errors->first('mobile_phone', '<p class="error">:message</p>')  !!}
            </label>
            <div class="password">
                <label>
                    <input class="{{($errors->has('password'))?'error':''}}" type="password" id="password"
                           name="password">
                    <span>Contraseña</span>
                    {!!  $errors->first('password', '<p class="error">:message</p>')  !!}
                    <div class="password-validator">
                        <div class="validator-container">
                            <h4 class="validator-title">Reglas de contraseña</h4>
                            <ul class="rules-list">
                                <li>
                                    <span class="icon_valid"><svg>
                                            <path fill="rgb(79, 176, 127)"
                                                  d="M8.7,12.9c-0.1,0-0.2,0-0.3-0.1l-2.4-2.5c-0.1-0.1-0.1-0.4,0-0.5c0.1-0.2,0.4-0.2,0.5,0L8.7,12l4.6-5 c0.1-0.1,0.4-0.1,0.5,0c0.1,0.2,0.1,0.4,0,0.5L9,12.8C9,12.8,8.9,12.9,8.7,12.9C8.8,12.9,8.8,12.9,8.7,12.9z"></path>
                                        </svg></span>
                                    <span class="icon_invalid visible"><svg>
                                            <path fill="#CC6B6B"
                                                  d="M10,0.982c4.973,0,9.018,4.046,9.018,9.018S14.973,19.018,10,19.018S0.982,14.973,0.982,10 S5.027,0.982,10,0.982 M10,0C4.477,0,0,4.477,0,10c0,5.523,4.477,10,10,10s10-4.477,10-10C20,4.477,15.523,0,10,0L10,0z M9,5.703 V5.441h2.5v0.262l-0.66,5.779H9.66L9,5.703z M9.44,12.951h1.621v1.491H9.44V12.951z"
                                                  data-reactid=".0.0.0.0.2.2.4.0.1.0.1.1.0"></path>
                                        </svg></span>
                                    <span class="error_message">Minimo 6 digitos</span>
                                </li>
                                <li>
                                    <span class="icon_valid"><svg>
                                            <path fill="rgb(79, 176, 127)"
                                                  d="M8.7,12.9c-0.1,0-0.2,0-0.3-0.1l-2.4-2.5c-0.1-0.1-0.1-0.4,0-0.5c0.1-0.2,0.4-0.2,0.5,0L8.7,12l4.6-5 c0.1-0.1,0.4-0.1,0.5,0c0.1,0.2,0.1,0.4,0,0.5L9,12.8C9,12.8,8.9,12.9,8.7,12.9C8.8,12.9,8.8,12.9,8.7,12.9z"></path>
                                        </svg></span>
                                    <span class="icon_invalid visible"><svg>
                                            <path fill="#CC6B6B"
                                                  d="M10,0.982c4.973,0,9.018,4.046,9.018,9.018S14.973,19.018,10,19.018S0.982,14.973,0.982,10 S5.027,0.982,10,0.982 M10,0C4.477,0,0,4.477,0,10c0,5.523,4.477,10,10,10s10-4.477,10-10C20,4.477,15.523,0,10,0L10,0z M9,5.703 V5.441h2.5v0.262l-0.66,5.779H9.66L9,5.703z M9.44,12.951h1.621v1.491H9.44V12.951z"
                                                  data-reactid=".0.0.0.0.2.2.4.0.1.0.1.1.0"></path>
                                        </svg></span>
                                    <span class="error_message">Contiene mayusculas</span>
                                </li>
                                <li>
                                    <span class="icon_valid"><svg>
                                            <path fill="rgb(79, 176, 127)"
                                                  d="M8.7,12.9c-0.1,0-0.2,0-0.3-0.1l-2.4-2.5c-0.1-0.1-0.1-0.4,0-0.5c0.1-0.2,0.4-0.2,0.5,0L8.7,12l4.6-5 c0.1-0.1,0.4-0.1,0.5,0c0.1,0.2,0.1,0.4,0,0.5L9,12.8C9,12.8,8.9,12.9,8.7,12.9C8.8,12.9,8.8,12.9,8.7,12.9z"></path>
                                        </svg></span>
                                    <span class="icon_invalid visible"><svg>
                                            <path fill="#CC6B6B"
                                                  d="M10,0.982c4.973,0,9.018,4.046,9.018,9.018S14.973,19.018,10,19.018S0.982,14.973,0.982,10 S5.027,0.982,10,0.982 M10,0C4.477,0,0,4.477,0,10c0,5.523,4.477,10,10,10s10-4.477,10-10C20,4.477,15.523,0,10,0L10,0z M9,5.703 V5.441h2.5v0.262l-0.66,5.779H9.66L9,5.703z M9.44,12.951h1.621v1.491H9.44V12.951z"
                                                  data-reactid=".0.0.0.0.2.2.4.0.1.0.1.1.0"></path>
                                        </svg></span>
                                    <span class="error_message">Contiene minusculas</span>
                                </li>
                                <li>
                                    <span class="icon_valid"><svg>
                                            <path fill="rgb(79, 176, 127)"
                                                  d="M8.7,12.9c-0.1,0-0.2,0-0.3-0.1l-2.4-2.5c-0.1-0.1-0.1-0.4,0-0.5c0.1-0.2,0.4-0.2,0.5,0L8.7,12l4.6-5 c0.1-0.1,0.4-0.1,0.5,0c0.1,0.2,0.1,0.4,0,0.5L9,12.8C9,12.8,8.9,12.9,8.7,12.9C8.8,12.9,8.8,12.9,8.7,12.9z"></path>
                                        </svg></span>
                                    <span class="icon_invalid visible"><svg>
                                            <path fill="#CC6B6B"
                                                  d="M10,0.982c4.973,0,9.018,4.046,9.018,9.018S14.973,19.018,10,19.018S0.982,14.973,0.982,10 S5.027,0.982,10,0.982 M10,0C4.477,0,0,4.477,0,10c0,5.523,4.477,10,10,10s10-4.477,10-10C20,4.477,15.523,0,10,0L10,0z M9,5.703 V5.441h2.5v0.262l-0.66,5.779H9.66L9,5.703z M9.44,12.951h1.621v1.491H9.44V12.951z"
                                                  data-reactid=".0.0.0.0.2.2.4.0.1.0.1.1.0"></path>
                                        </svg></span>
                                    <span class="error_message">Contiene números</span>
                                </li>
                                <li>
                                    <span class="icon_valid"><svg>
                                            <path fill="rgb(79, 176, 127)"
                                                  d="M8.7,12.9c-0.1,0-0.2,0-0.3-0.1l-2.4-2.5c-0.1-0.1-0.1-0.4,0-0.5c0.1-0.2,0.4-0.2,0.5,0L8.7,12l4.6-5 c0.1-0.1,0.4-0.1,0.5,0c0.1,0.2,0.1,0.4,0,0.5L9,12.8C9,12.8,8.9,12.9,8.7,12.9C8.8,12.9,8.8,12.9,8.7,12.9z"></path>
                                        </svg></span>
                                    <span class="icon_invalid visible"><svg>
                                            <path fill="#CC6B6B"
                                                  d="M10,0.982c4.973,0,9.018,4.046,9.018,9.018S14.973,19.018,10,19.018S0.982,14.973,0.982,10 S5.027,0.982,10,0.982 M10,0C4.477,0,0,4.477,0,10c0,5.523,4.477,10,10,10s10-4.477,10-10C20,4.477,15.523,0,10,0L10,0z M9,5.703 V5.441h2.5v0.262l-0.66,5.779H9.66L9,5.703z M9.44,12.951h1.621v1.491H9.44V12.951z"
                                                  data-reactid=".0.0.0.0.2.2.4.0.1.0.1.1.0"></path>
                                        </svg></span>
                                    <span class="error_message">Especiales "- * ! @ # $"</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="Errors-password"></div>
                </label>
            </div>
            <label>
                <input type="password" name="password_confirmation">
                <span>Confirmar Contraseña</span>
            </label>

            <label for="policy" class="Forms-checkout Terms">
                <div >
                    <input type="checkbox" name="policy" id="policy">
                    <sub></sub>

                    Acepto las politicas de uso del sitio Agrosellers. <a
                            href="{{url('pdf/politicas_de_uso_del_sitio.pdf')}}"  target="_blank">Ver</a>
                </div>
                {!!  $errors->first('policy', '<p class="error">:message</p>')  !!}
            </label>
            <label for="terms" class="Forms-checkout Terms">
                <div>
                    <input  type="checkbox" name="terms" id="terms">
                    <sub></sub>
                    Acepto las politicas de privacidad. <a href="{{url('pdf/politicas_privacidad.pdf')}}" target="_blank">Ver</a>
                </div>
                {!!  $errors->first('terms', '<p class="error">:message</p>')  !!}
            </label>

            <button type="submit" class="Button submit"> REGISTRATE</button>
        </div>

    </form>

@endsection
@section('scripts')
    <script src="{{asset('js/forms.js')}}"></script>
    <script src="{{asset('js/password.js')}}"></script>
@endsection