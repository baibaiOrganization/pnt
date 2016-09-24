@extends('layout.front')

@section('content')

    <div class="Register-header">
        <h1>USUARIO INSCRITO AL PREMIO SEMANA</h1>
    </div>
    <form action="{{ route('semanaUpdate', $award->id) }}" enctype="multipart/form-data" method="POST" class=" Register-form">
        <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="url" id="url" value="{{ url('ajaxTempFiles') }}">

        <h2 class="col-12">DATOS BÁSICOS DE LA ORGANIZACIÓN</h2>
        <div class=" row Register-contentLabel">
            <label class="col-10 small-10" for="org_name">
                <span>Nombre de la agrupación, grupo constituído o unión temporal</span>
                <input type="text" name="org_name" id="org_name" value="{{$award->organization->name}}">
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('org_name')}}</span>
                @endif
            </label>
            @foreach($award->files as $file)
                @if($file->file_type_id == 8)
                    <label class="col-5 small-10" for="type8">
                        <span>Logo, foto o imagen identificativa</span>
                        <div class="Register-file">
                            <span class="Register-actions">
                                <a style="margin-right: 2px" href="{{asset('uploads/semana/' . $file->name)}}" target="_blank" class="Register-openFile">Abrir</a>
                                <span class="Register-addFile">Cambiar</span>
                            </span>
                            <span class="Register-tooltip">{{$file->name}}</span>
                            <input type="file" id="type8">
                            <input type="hidden" name="type8" value="{{$file->name}}">
                        </div>
                        @if (count($errors) > 0)
                            <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type8')}}</span>
                        @endif
                    </label>
                @elseif($file->file_type_id == 9)
                    <label class="col-5  small-10" for="type9">
                        <span>Cámara de comercio (.pdf)</span>
                        <div class="Register-file">
                            <span class="Register-actions">
                                <a style="margin-right: 2px" href="{{asset('uploads/semana/' . $file->name)}}" target="_blank" class="Register-openFile">Abrir</a>
                                <span class="Register-addFile">Cambiar</span>
                            </span>
                            <span class="Register-tooltip">{{$file->name}}</span>
                            <input type="file" id="type9">
                            <input type="hidden" name="type9" value="{{$file->name}}">
                        </div>
                        @if (count($errors) > 0)
                            <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type9')}}</span>
                        @endif
                    </label>
                @elseif($file->file_type_id == 5)
                    <label class="col-10 small-10" for="type5">
                        <span>Dossier del grupo o compañía (.pdf)</span>
                        <div class="Register-file">
                            <span class="Register-actions">
                                <a style="margin-right: 2px" href="{{asset('uploads/semana/' . $file->name)}}" target="_blank" class="Register-openFile">Abrir</a>
                                <span class="Register-addFile">Cambiar</span>
                            </span>
                            <span class="Register-tooltip">{{$file->name}}</span>
                            <input type="file" id="type5">
                            <input type="hidden" name="type5" value="{{$file->name}}">
                        </div>
                        @if (count($errors) > 0)
                            <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type5')}}</span>
                        @endif
                    </label>
                @endif
            @endforeach

            <label for="org_city" class="col-5  small-10">
                <div class="Register-contentSelect">
                    <span>Ciudad</span>
                    <span class="Register-arrowSelect">▼</span>
                    <select name="org_city" id="org_city">
                        <option value="Bogotá">Bógota</option>
                        <option value="Medellín" @if($award->organization->city == "Medellín") selected @endif>Medellín</option>
                    </select>
                </div>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('org_city')}}</span>
                @endif
            </label>
            <label class="col-5 small-10" for="org_address">
                <span>Dirección física</span>
                <input type="text" name="org_address" id="org_address" value="{{$award->organization->address}}">
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('org_address')}}</span>
                @endif
            </label>
            <label class="col-5 small-10" for="org_phone">
                <span>Teléfono fijo</span>
                <input type="text" name="org_phone" id="org_phone" value="{{$award->organization->phone}}">
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('org_phone')}}</span>
                @endif
            </label>
            <label class="col-5 small-10" for="org_mobile">
                <span>Teléfono Celular</span>
                <input type="text" name="org_mobile" id="org_mobile" value="{{$award->organization->mobile}}">
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('org_mobile')}}</span>
                @endif
            </label>
            <label class="col-5 small-10" for="org_email">
                <span>Correo principal</span>
                <input type="email" name="org_email" id="org_email" value="{{$award->organization->email}}">
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('org_email')}}</span>
                @endif
            </label>
            <label class="col-5 small-10" for="org_website">
                <span>Sitio Web</span>
                <input type="text" name="org_website" id="org_website" value="{{$award->organization->website}}">
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('org_website')}}</span>
                @endif
            </label>

            @foreach($award->files as $file)
                @if($file->file_type_id == 16)
                    <label class="col-10 small-10" for="type16">
                        <span>Hoja de vida de la agrupación, grupo constituido o de los integrantes de la unión temporal (.pdf)</span>
                        <div class="Register-file">
                            <span class="Register-actions">
                                <a style="margin-right: 2px" href="{{asset('uploads/semana/' . $file->name)}}" target="_blank" class="Register-openFile">Abrir</a>
                                <span class="Register-addFile">Cambiar</span>
                            </span>
                            <span class="Register-tooltip">{{$file->name}} </span>
                            <input type="file" id="type16">
                            <input type="hidden" name="type16" value="{{$file->name}}">
                        </div>
                        @if (count($errors) > 0)
                            <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type16')}}</span>
                        @endif
                    </label>
                    @break
                @endif
            @endforeach
        </div>

        <h2 class="col-12">DATOS BÁSICOS DEL ESPECTÁCULO</h2>
        <div class=" row Register-contentLabel">
            <label class="col-10 small-10" for="prd_name">
                <span>Nombre del espectáculo</span>
                <input type="text" name="prd_name" id="prd_name" value="{{$award->production->name}}">
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('prd_name')}}</span>
                @endif
            </label>
            @foreach($award->files as $file)
                @if($file->file_type_id == 10)
                    <label class="col-5 small-10" for="type10">
                        <span>Reseña Corta en Español (.pdf)</span>
                        <div class="Register-file">
                            <span class="Register-actions">
                                <a style="margin-right: 2px" href="{{asset('uploads/semana/' . $file->name)}}" target="_blank" class="Register-openFile">Abrir</a>
                                <span class="Register-addFile">Cambiar</span>
                            </span>
                            <span class="Register-tooltip">{{$file->name}}</span>
                            <input type="file" id="type10">
                            <input type="hidden" name="type10" value="{{$file->name}}">
                            @if (count($errors) > 0)
                                <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type10')}}</span>
                            @endif
                        </div>
                    </label>
                    @break
                @endif
            @endforeach
            <label for="prd_genre" class="col-5  small-10">
                <div class="Register-contentSelect">
                    <span>Género:</span>
                    <span class="Register-arrowSelect">▼</span>
                    <select name="prd_genre" id="prd_genre">
                        <option value="Teatro">Teatro</option>
                        <option value="Circo - Teatro" @if($award->production->genre == 'Circo - Teatro') selected @endif >Circo - Teatro</option>
                        <option value="Danza - Teatro" @if($award->production->genre == 'Danza - Teatro') selected @endif >Danza - Teatro</option>
                        <option value="Teatro Musical" @if($award->production->genre == 'Teatro Musical') selected @endif >Teatro Musical</option>
                    </select>
                </div>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('prd_genre')}}</span>
                @endif
            </label>
            @foreach($award->files as $file)
                @if($file->file_type_id == 3)
                    <label class="col-10 small-10" for="type3">
                        <span>Certificado de Registro de derechos de Autor o Autorización de uso de la obra (pdf.)</span>
                        <div class="Register-file">
                            <span class="Register-actions">
                                <a style="margin-right: 2px" href="{{asset('uploads/semana/' . $file->name)}}" target="_blank" class="Register-openFile">Abrir</a>
                                <span class="Register-addFile">Cambiar</span>
                            </span>
                            <span class="Register-tooltip">{{$file->name}}</span>
                            <input type="file" id="type3">
                            <input type="hidden" name="type3" value="{{$file->name}}">
                        </div>
                        @if (count($errors) > 0)
                            <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type3')}}</span>
                        @endif
                    </label>
                    @break
                @endif
            @endforeach
            <h3 class="col-10">PROPUESTA DE PRODUCCIÓN.</h3>
            <p> La obra producto del premio deberá tener una duración mínima de cuarenta y cinco (45) minutos. </p>
            @foreach($award->files as $file)
                @if($file->file_type_id == 1)
                    <label class="col-10 small-10" for="type1">
                        <span>Sinópsis (.pdf)</span>
                        <div class="Register-file">
                            <span class="Register-actions">
                                <a style="margin-right: 2px" href="{{asset('uploads/semana/' . $file->name)}}" target="_blank" class="Register-openFile">Abrir</a>
                                <span class="Register-addFile">Cambiar</span>
                            </span>
                            <span class="Register-tooltip"> {{$file->name}}</span>
                            <input type="file" id="type1">
                            <input type="hidden" name="type1" value="{{$file->name}}">
                        </div>
                        @if (count($errors) > 0)
                            <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type1')}}</span>
                        @endif
                    </label>
                    @elseif($file->file_type_id == 2)
                    <label class="col-10 small-10" for="type2">
                        <span>Texto o libreto (.pdf)</span>
                        <div class="Register-file">
                            <span class="Register-actions">
                                <a style="margin-right: 2px" href="{{asset('uploads/semana/' . $file->name)}}" target="_blank" class="Register-openFile">Abrir</a>
                                <span class="Register-addFile">Cambiar</span>
                            </span>
                            <span class="Register-tooltip">{{$file->name}}</span>
                            <input type="file" id="type2">
                            <input type="hidden" name="type2" value="{{$file->name}}">
                        </div>
                        @if (count($errors) > 0)
                            <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type2')}}</span>
                        @endif
                    </label>
                    @elseif($file->file_type_id == 11)
                    <label class="col-10 small-10" for="type11">
                        <span>Propuesta de dirección (.pdf)</span>
                        <div class="Register-file">
                            <span class="Register-actions">
                                <a style="margin-right: 2px" href="{{asset('uploads/semana/' . $file->name)}}" target="_blank" class="Register-openFile">Abrir</a>
                                <span class="Register-addFile">Cambiar</span>
                            </span>
                            <span class="Register-tooltip">{{$file->name}}</span>
                            <input type="file" id="type11">
                            <input type="hidden" name="type11" value="{{$file->name}}">
                        </div>
                        @if (count($errors) > 0)
                            <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type11')}}</span>
                        @endif
                    </label>
                    @elseif($file->file_type_id == 12)
                    <label class="col-10 small-10" for="type12">
                        <span>Propuesta Estética (.pdf) <em>Enlace a condiciones y equipamiento técnico del Teatro Colón</em></span>
                        <div class="Register-file">
                            <span class="Register-actions">
                                <a style="margin-right: 2px" href="{{asset('uploads/semana/' . $file->name)}}" target="_blank" class="Register-openFile">Abrir</a>
                                <span class="Register-addFile">Cambiar</span>
                            </span>
                            <span class="Register-tooltip" style="font-size: 11px">{{$file->name}}</span>
                            <input type="file" id="type12">
                            <input type="hidden" name="type12" value="{{$file->name}}">
                        </div>
                        @if (count($errors) > 0)
                            <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type12')}}</span>
                        @endif
                    </label>
                    @elseif($file->file_type_id == 13)
                    <label class="col-10 small-10" for="type13">
                        <span>Cronograma (.pdf)</span>
                        <div class="Register-file">
                            <span class="Register-actions">
                                <a style="margin-right: 2px" href="{{asset('uploads/semana/' . $file->name)}}" target="_blank" class="Register-openFile">Abrir</a>
                                <span class="Register-addFile">Cambiar</span>
                            </span>
                            <span class="Register-tooltip">{{$file->name}}</span>
                            <input type="file" id="type13">
                            <input type="hidden" name="type13" value="{{$file->name}}">
                        </div>
                        @if (count($errors) > 0)
                            <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type13')}}</span>
                        @endif
                    </label>
                    @elseif($file->file_type_id == 14)
                    <label class="col-10 small-10" for="type14">
                        <span>Presupuesto (.pdf) <em>Honorarios, servicios a contratar y actividades a realizar.</em></span>
                        <div class="Register-file">
                            <span class="Register-actions">
                                <a style="margin-right: 2px" href="{{asset('uploads/semana/' . $file->name)}}" target="_blank" class="Register-openFile">Abrir</a>
                                <span class="Register-addFile">Cambiar</span>
                            </span>
                            <span class="Register-tooltip" style="font-size: 10px">{{$file->name}}</span>
                            <input type="file" id="type14">
                            <input type="hidden" name="type14" value="{{$file->name}}">
                        </div>
                        @if (count($errors) > 0)
                            <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type14')}}</span>
                        @endif
                    </label>
                    @elseif($file->file_type_id == 15)
                    <label class="col-10 small-10" for="type15">
                        <span>Propuesta de Financiación (.pdf)</span>
                        <div class="Register-file">
                            <span class="Register-actions">
                                <a style="margin-right: 2px" href="{{asset('uploads/semana/' . $file->name)}}" target="_blank" class="Register-openFile">Abrir</a>
                                <span class="Register-addFile">Cambiar</span>
                            </span>
                            <span class="Register-tooltip">{{$file->name}}</span>
                            <input type="file" id="type15">
                            <input type="hidden" name="type15" value="{{$file->name}}">
                        </div>
                        @if (count($errors) > 0)
                            <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type15')}}</span>
                        @endif
                    </label>
                    @elseif($file->file_type_id == 7)
                    <label class="col-10 small-10" for="type7">
                        <span>Hoja de Vida de c/u de los integrantes (.pdf)</span>
                        <div class="Register-file">
                            <span class="Register-actions">
                                <a style="margin-right: 2px" href="{{asset('uploads/semana/' . $file->name)}}" target="_blank" class="Register-openFile">Abrir</a>
                                <span class="Register-addFile">Cambiar</span>
                            </span>
                            <span class="Register-tooltip" >{{$file->name}}</span>
                            <input type="file" id="type7">
                            <input type="hidden" name="type7" value="{{$file->name}}">
                        </div>
                        @if (count($errors) > 0)
                            <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type7')}}</span>
                        @endif
                    </label>
                    @endif
                @endforeach
            </div>

            <h2 class="col-12">DATOS DEL REPRESENTANTE LEGAL</h2>
            <div class="row Register-contentLabel">
                <label class="col-5 small-10" for="rep_name">
                    <span>Nombres</span>
                    <input type="text" name="rep_name" id="rep_name" value="{{$award->propietor->name}}">
                    @if (count($errors) > 0)
                        <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('rep_name')}}</span>
                    @endif
                </label>
                <label class="col-5 small-10" for="rep_last_name">
                    <span>Apellidos</span>
                    <input type="text" name="rep_last_name" id="rep_last_name" value="{{$award->propietor->last_name}}">
                    @if (count($errors) > 0)
                        <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('rep_last_name')}}</span>
                    @endif
                </label>
                <label for="city" class="col-5  small-10">
                    <div class="Register-contentSelect">
                        <span>Tipo de Documento de Identidad:</span>
                        <span class="Register-arrowSelect">▼</span>
                        <select name="rep_doc_typ" id="rep_doc_typ">
                            <option value="2" @if($award->propietor->document_type_id == 1) selected @endif >Cédula</option>
                            <option value="3" @if($award->propietor->document_type_id == 2) selected @endif >Cédula de Extranjería</option>
                            <option value="4" @if($award->propietor->document_type_id == 3) selected @endif >Pasaporte</option>
                        </select>
                    </div>
                    @if (count($errors) > 0)
                        <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('rep_doc_typ')}}</span>
                    @endif
                </label>
                <label class="col-5 small-10" for="rep_doc_number">
                    <span>Número de documento</span>
                    <input type="text" name="rep_doc_number" id="rep_doc_number" value="{{$award->propietor->document_number}}">
                    @if (count($errors) > 0)
                        <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('rep_doc_number')}}</span>
                    @endif
                </label>
                <label class="col-5 small-10" for="rep_mobile">
                    <span>Teléfono celular</span>
                    <input type="text" name="rep_mobile" id="rep_mobile" value="{{$award->propietor->mobile}}">
                    @if (count($errors) > 0)
                        <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('rep_mobile')}}</span>
                    @endif
                </label>
                <div class="col-5"></div>
                <label class=" col-5 small-10" for="rep_email">
                    <span>Correo institucional</span>
                    <input type="email" name="rep_email" id="rep_email" value="{{$award->propietor->email1}}">
                    @if (count($errors) > 0)
                        <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('rep_email')}}</span>
                    @endif
                </label>
                <label class=" col-5 small-10" for="rep_email2">
                    <span>Correo personal</span>
                    <input type="email" name="rep_email2" id="rep_email2" value="{{$award->propietor->email2}}">
                    @if (count($errors) > 0)
                        <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('rep_email2')}}</span>
                    @endif
                </label>
                <h3 class="col-10">PROPUESTA DE PRODUCCIÓN.</h3>
                @foreach($award->files as $file)
                    @if($file->file_type_id == 18)
                    <label class="col-10 small-10" for="type18">
                        <span>Documento de delegación de representación (.pdf)</span>
                        <div class="Register-file">
                            <span class="Register-actions">
                                <a style="margin-right: 2px" href="{{asset('uploads/semana/' . $file->name)}}" target="_blank" class="Register-openFile">Abrir</a>
                                <span class="Register-addFile">Cambiar</span>
                            </span>
                            <span class="Register-tooltip"> {{$file->name}} </span>
                            <input type="file" id="type18">
                            <input type="hidden" name="type18" id="type18" value="{{$file->name}}">
                        </div>
                        @if (count($errors) > 0)
                            <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type18')}}</span>
                        @endif
                    </label>
                    @elseif($file->file_type_id == 17)
                    <label class="col-10 small-10" for="type17">
                        <span>Carta de Compromiso</span>
                        <div class="Register-file">
                            <span class="Register-actions">
                                <a style="margin-right: 2px" href="{{asset('uploads/semana/' . $file->name)}}" target="_blank" class="Register-openFile">Abrir</a>
                                <span class="Register-addFile">Cambiar</span>
                            </span>
                            <span class="Register-tooltip">{{$file->name}}</span>
                            <input type="file" id="type17">
                            <input type="hidden" name="type17" value="{{$file->name}}">
                        </div>
                        @if (count($errors) > 0)
                            <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type17')}}</span>
                        @endif
                    </label>
                    @elseif($file->file_type_id == 19)
                    <label class="col-10 small-10" for="type19">
                        <span>Fotocopia de la Cédula Representante Legal (.pdf)</span>
                        <div class="Register-file">
                            <span class="Register-actions">
                                <a style="margin-right: 2px" href="{{asset('uploads/semana/' . $file->name)}}" target="_blank" class="Register-openFile">Abrir</a>
                                <span class="Register-addFile">Cambiar</span>
                            </span>
                            <span class="Register-tooltip">{{$file->name}}</span>
                            <input type="file" id="type19">
                            <input type="hidden" name="type19" value="{{$file->name}}">
                        </div>
                        @if (count($errors) > 0)
                            <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type19')}}</span>
                        @endif
                    </label>
                    @endif
                @endforeach
            </div>
        <div class="center row"><button> ACTUALIZAR</button></div>
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