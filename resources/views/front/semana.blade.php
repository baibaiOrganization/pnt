@extends('layout.front')

@section('content')

    <div class="Register-header">
        <h1>FORMULARIO DE INSCRIPCIÓN PARA POSTULACIONES AL PREMIO</h1>
    </div>
    <form action="{{ route('semanaPost') }}" enctype="multipart/form-data" method="POST" class=" Register-form">
        <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="url" id="url" value="{{ url('ajaxTempFiles') }}">

        <h2 class="col-12">DATOS BÁSICOS DE LA ORGANIZACIÓN</h2>
        <div class=" row Register-contentLabel">
            <label class="col-10 small-10" for="org_name">
                <span>Nombre de la agrupación, grupo constituído o unión temporal</span>
                <input type="text" name="org_name" id="org_name" value="{{old('org_name')}}">
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('org_name')}}</span>
                @endif
            </label>

            <label class="col-5 small-10" for="type8">
                <span>Logo, foto o imagen identificativa</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        <span class="Register-addFile">Añadir archivo</span>
                    </span>
                    <span class="Register-tooltip">@if(old('type8')) {{old('type8')}} @else '(.jpg, .jpeg, .png) @endif</span>
                    <input type="file" id="type8">
                    <input type="hidden" name="type8" value="{{old('type8')}}">
                </div>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type8')}}</span>
                @endif
            </label>
            <label class="col-5  small-10" for="type9">
                <span>Cámara de comercio (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        <span class="Register-addFile">Añadir archivo</span>
                    </span>
                    <span class="Register-tooltip">@if(old('type9')) {{old('type9')}} @else Solo para grupos constituídos @endif </span>
                    <input type="file" id="type9">
                    <input type="hidden" name="type9" value="{{old('type9')}}">
                </div>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type9')}}</span>
                @endif
            </label>
            <label class="col-10 small-10" for="type5">
                <span>Dossier del grupo o compañía (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        <span class="Register-addFile">Añadir archivo</span>
                    </span>
                    <span class="Register-tooltip"> @if(old('type5')) {{old('type5')}} @else Trayectoria de la compañía, reseña de su director, integrantes y repertorio @endif </span>
                    <input type="file" id="type5">
                    <input type="hidden" name="type5" value="{{old('type5')}}">
                </div>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type5')}}</span>
                @endif
            </label>
            <label for="org_city" class="col-5  small-10">
                <div class="Register-contentSelect">
                    <span>Ciudad</span>
                    <span class="Register-arrowSelect">▼</span>
                    <select name="org_city" id="org_city">
                        <option value="">Selecciona una ciudad</option>
                        <option value="Bogotá">Bógota</option>
                        <option value="Medellín">Medellín</option>                    </select>
                </div>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('org_city')}}</span>
                @endif
            </label>
            <label class="col-5 small-10" for="org_address">
                <span>Dirección física</span>
                <input type="text" name="org_address" id="org_address" value="{{old('org_address')}}">
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('org_address')}}</span>
                @endif
            </label>

            <label class="col-5 small-10" for="org_phone">
                <span>Teléfono fijo</span>
                <input type="text" name="org_phone" id="org_phone" value="{{old('org_phone')}}">
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('org_phone')}}</span>
                @endif
            </label>
            <label class="col-5 small-10" for="org_mobile">
                <span>Teléfono Celular</span>
                <input type="text" name="org_mobile" id="org_mobile" value="{{old('org_mobile')}}">
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('org_mobile')}}</span>
                @endif
            </label>

            <label class="col-5 small-10" for="org_email">
                <span>Correo principal</span>
                <input type="email" name="org_email" id="org_email" value="{{old('org_email')}}">
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('org_email')}}</span>
                @endif
            </label>

            <label class="col-5 small-10" for="org_website">
                <span>Sitio Web</span>
                <input type="text" name="org_website" id="org_website" value="{{old('org_website')}}">
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('org_website')}}</span>
                @endif
            </label>

            <label class="col-10 small-10" for="type16">
                <span>Hoja de vida de la agrupación, grupo constituido o de los integrantes de la unión temporal (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        <span class="Register-addFile">Añadir archivo</span>
                    </span>
                    <span class="Register-tooltip"> @if(old('type16')) {{old('type16')}} @else Mínimo 3 años de experiencia verificable. @endif </span>
                    <input type="file" id="type16">
                    <input type="hidden" name="type16" value="{{old('type16')}}">
                </div>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type16')}}</span>
                @endif
            </label>
        </div>
        <h2 class="col-12">DATOS BÁSICOS DEL ESPECTÁCULO</h2>
        <div class=" row Register-contentLabel">

            <label class="col-10 small-10" for="prd_name">
                <span>Nombre del espectáculo</span>
                <input type="text" name="prd_name" id="prd_name" value="{{old('prd_name')}}">
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('prd_name')}}</span>
                @endif
            </label>
            <label class="col-5 small-10" for="type10">
                <span>Reseña Corta en Español (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        <span class="Register-addFile">Añadir archivo</span>
                    </span>
                    <span class="Register-tooltip">@if(old('type10')) {{old('type10')}} @else 400 caracteres máx @endif </span>
                    <input type="file" id="type10">
                    <input type="hidden" name="type10" value="{{old('type10')}}">
                    @if (count($errors) > 0)
                        <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type10')}}</span>
                    @endif
                </div>
            </label>
            <label for="prd_genre" class="col-5  small-10">
                <div class="Register-contentSelect">
                    <span>Género:</span>
                    <span class="Register-arrowSelect">▼</span>
                    <select name="prd_genre" id="prd_genre">
                        <option value="">Selecciona el género</option>
                        <option value="Teatro">Teatro</option>
                        <option value="Circo - Teatro">Circo - Teatro</option>
                        <option value="Danza - Teatro">Danza - Teatro</option>
                        <option value="Teatro Musical">Teatro Musical</option>
                    </select>
                </div>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('prd_genre')}}</span>
                @endif
            </label>

            <label class="col-10 small-10" for="type3">
                <span>Certificado de Registro de derechos de Autor o Autorización de uso de la obra (pdf.)</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        <span class="Register-addFile">Añadir archivo</span>
                    </span>
                    <span class="Register-tooltip"> @if(old('type3')) {{old('type3')}} @else Si la obra contiene piezas musicales deben ser originales para la producción. @endif </span>
                    <input type="file" id="type3">
                    <input type="hidden" name="type3" value="{{old('type3')}}">
                </div>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type3')}}</span>
                @endif
            </label>

            <h3 class="col-10">PROPUESTA DE PRODUCCIÓN.</h3>
            <p> La obra producto del premio deberá tener una duración mínima de cuarenta y cinco (45) minutos. </p>
            <label class="col-10 small-10" for="type1">
                <span>Sinópsis (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        <span class="Register-addFile">Añadir archivo</span>
                    </span>
                    <span class="Register-tooltip"> @if(old('type1')) {{old('type1')}} @else Máximo 20 lineas @endif </span>
                    <input type="file" id="type1">
                    <input type="hidden" name="type1" value="{{old('type1')}}">
                </div>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type1')}}</span>
                @endif
            </label>

            <label class="col-10 small-10" for="type2">
                <span>Texto o libreto (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        <span class="Register-addFile">Añadir archivo</span>
                    </span>
                    <span class="Register-tooltip"> @if(old('type2')) {{old('type2')}} @else Los textos dramáticos presentados deben ser en español. Para teatro musical, incluir las respectivas partituras y autorizaciones de los autores. @endif </span>
                    <input type="file" id="type2">
                    <input type="hidden" name="type2" value="{{old('type2')}}">
                </div>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type2')}}</span>
                @endif
            </label>

            <label class="col-10 small-10" for="type11">
                <span>Propuesta de dirección (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        <span class="Register-addFile">Añadir archivo</span>
                    </span>
                    <span class="Register-tooltip"> @if(old('type11')) {{old('type11')}} @else Puesta en escena, metodología de trabajo y proceso de creación. 2 pag. Máx. @endif </span>
                    <input type="file" id="type11">
                    <input type="hidden" name="type11" value="{{old('type11')}}">
                </div>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type11')}}</span>
                @endif
            </label>

            <label class="col-10 small-10" for="type12">
                <span>Propuesta Estética (.pdf) <em>Enlace a condiciones y equipamiento técnico del Teatro Colón</em></span>
                <div class="Register-file">
                    <span class="Register-actions">
                        <span class="Register-addFile">Añadir archivo</span>
                    </span>
                    <span class="Register-tooltip" style="font-size: 11px"> @if(old('type12')) {{old('type12')}} @else Bocetos de escenografía, maquillaje, utilería, vestuario, iluminación, material sonoro o musical, requerimientos de tramoya, iluminación, recursos técnicos @endif </span>
                    <input type="file" id="type12">
                    <input type="hidden" name="type12" value="{{old('type12')}}">
                </div>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type12')}}</span>
                @endif
            </label>

            <label class="col-10 small-10" for="type13">
                <span>Cronograma (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        <span class="Register-addFile">Añadir archivo</span>
                    </span>
                    <span class="Register-tooltip"> @if(old('type13')) {{old('type13')}} @else Fases de desarrollo de la propuesta, los tiempos estimados para cada una de ellas y sus responsables. @endif </span>
                    <input type="file" id="type13">
                    <input type="hidden" name="type13" value="{{old('type13')}}">
                </div>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type13')}}</span>
                @endif
            </label>

            <label class="col-10 small-10" for="type14">
                <span>Presupuesto (.pdf) <em>Honorarios, servicios a contratar y actividades a realizar.</em></span>
                <div class="Register-file">
                    <span class="Register-actions">
                        <span class="Register-addFile">Añadir archivo</span>
                    </span>
                    <span class="Register-tooltip" style="font-size: 10px"> @if(old('type14')) {{old('type14')}} @else Para montajes de compañías o uniones que vivan por fuera de Bogotá, incluir los costos de estadía, transporte y viáticos necesarios para montaje de la obra en el Teatro Colón @endif </span>
                    <input type="file" id="type14">
                    <input type="hidden" name="type14" value="{{old('type14')}}">
                </div>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type14')}}</span>
                @endif
            </label>

            <label class="col-10 small-10" for="type15">
                <span>Propuesta de Financiación (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        <span class="Register-addFile">Añadir archivo</span>
                    </span>
                    <span class="Register-tooltip" > @if(old('type15')) {{old('type15')}} @else Si el valor total excede el monto de la cofinanciación explique las otras fuentes de financiación. @endif </span>
                    <input type="file" id="type15">
                    <input type="hidden" name="type15" value="{{old('type15')}}">
                </div>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type15')}}</span>
                @endif
            </label>

            <label class="col-10 small-10" for="type7">
                <span>Hoja de Vida de c/u de los integrantes (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        <span class="Register-addFile">Añadir archivo</span>
                    </span>
                    <span class="Register-tooltip" > @if(old('type7')) {{old('type7')}} @else Actores, diseñadores, escenógrafos, etc. @endif</span>
                    <input type="file" id="type7">
                    <input type="hidden" name="type7" value="{{old('type7')}}">
                </div>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type7')}}</span>
                @endif
            </label>
        </div>

        <h2 class="col-12">DATOS DEL REPRESENTANTE LEGAL</h2>

        <div class="row Register-contentLabel">
            <label class="col-5 small-10" for="rep_name">
                <span>Nombres</span>
                <input type="text" name="rep_name" id="rep_name" value="{{old('rep_name')}}">
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('rep_name')}}</span>
                @endif
            </label>
            <label class="col-5 small-10" for="rep_last_name">
                <span>Apellidos</span>
                <input type="text" name="rep_last_name" id="rep_last_name" value="{{old('rep_last_name')}}">
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('rep_last_name')}}</span>
                @endif
            </label>
            <label for="city" class="col-5  small-10">
                <div class="Register-contentSelect">
                    <span>Tipo de Documento de Identidad:</span>
                    <span class="Register-arrowSelect">▼</span>
                    <select name="rep_doc_typ" id="rep_doc_typ">
                        <option value="1">Selecciona Documento</option>
                        <option value="2">Cédula</option>
                        <option value="3">Cédula de Extranjería</option>
                        <option value="4">Pasaporte</option>
                    </select>
                </div>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('rep_doc_typ')}}</span>
                @endif
            </label>

            <label class="col-5 small-10" for="rep_doc_number">
                <span>Número de documento</span>
                <input type="text" name="rep_doc_number" id="rep_doc_number" value="{{old('rep_doc_number')}}">
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('rep_doc_number')}}</span>
                @endif
            </label>

            <label class="col-5 small-10" for="rep_mobile">
                <span>Teléfono celular</span>
                <input type="text" name="rep_mobile" id="rep_mobile" value="{{old('rep_mobile')}}">
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('rep_mobile')}}</span>
                @endif
            </label>

            <div class="col-5"></div>

            <label class=" col-5 small-10" for="rep_email">
                <span>Correo institucional</span>
                <input type="email" name="rep_email" id="rep_email" value="{{old('rep_email')}}">
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('rep_email')}}</span>
                @endif
            </label>

            <label class=" col-5 small-10" for="rep_email2">
                <span>Correo personal</span>
                <input type="email" name="rep_email2" id="rep_email2" value="{{old('rep_email2')}}">
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('rep_email2')}}</span>
                @endif
            </label>

            <h3 class="col-10">PROPUESTA DE PRODUCCIÓN.</h3>

            <label class="col-10 small-10" for="type18">
                <span>Documento de delegación de representación (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        <span class="Register-addFile">Añadir archivo</span>
                    </span>
                    <span class="Register-tooltip"> @if(old('type18')) {{old('type18')}} @else Firmado por todos los miembros de la unión temporal, en el que delegan su representación a un integrante del grupo. @endif </span>
                    <input type="file" id="type18">
                    <input type="hidden" name="type18" id="type18" value="{{old('type18')}}">
                </div>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type18')}}</span>
                @endif
            </label>

            <label class="col-10 small-10" for="type17">
                <span>Carta de Compromiso</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        <span class="Register-addFile">Añadir archivo</span>
                    </span>
                    <span class="Register-tooltip"> @if(old('type17')) {{old('type17')}} @else Aceptación de las reglas del contrato de coproducción con El Teatro Colón. @endif </span>
                    <input type="file" id="type17">
                    <input type="hidden" name="type17" value="{{old('type17')}}">
                </div>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type17')}}</span>
                @endif
            </label>
            <label class="col-10 small-10" for="type19">
                <span>Fotocopia de la Cédula Representante Legal (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        <span class="Register-addFile">Añadir archivo</span>
                    </span>
                    <span class="Register-tooltip">{{old('type19')}}</span>
                    <input type="file" id="type19">
                    <input type="hidden" name="type19" value="{{old('type19')}}">
                </div>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type19')}}</span>
                @endif
            </label>
        </div>

        <div class="center row"><button style="margin: 20px 0 0 0;" id="saveForm"> GUARDAR</button></div>
        <div class="center row"><button style="margin: 10px 0 50px 0;"> ENVIAR</button></div>

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

        $('#saveForm').on('click', function(){
            $(this).append('<input type="hidden" value="1" name="isUpdate">');
        });
    </script>
@endsection
@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
@endsection