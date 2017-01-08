@extends('layout.front')

@section('content')

    <div class="Register-header Colon">
        <h1>USUARIO INSCRITO AL PREMIO TEATRO COlÓN</h1>
    </div>
    <form action="{{ url('admin/usuarios/colon')}}" enctype="multipart/form-data" method="get" class=" Register-form Colon-form"> <!-- //route('colonUpdate', $award->id) -->
        <!--<input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">-->
        <!--<input type="hidden" id="url" value="{{ url('ajaxTempFiles') }}">-->

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
                                <a style="margin-right: 2px" href="{{asset('uploads/colon/' . $file->name)}}" target="_blank" class="Register-openFile">Abrir</a>
                                <!--<span class="Register-addFile">Cambiar</span>-->
                            </span>
                            <span class="Register-tooltip">{{$file->name}}</span>
                            <!--<input type="file" id="type8">-->
                            <input type="hidden" name="type8" value="{{$file->name}}">
                        </div>
                        @if (count($errors) > 0)
                            <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type8')}}</span>
                        @endif
                    </label>
                @elseif($file->file_type_id == 9)
                    <label class="col-5  small-10" for="type9">
                        <span>Certificado cámara de comercio (.pdf)</span>
                        <div class="Register-file">
                            <span class="Register-actions">
                                <a style="margin-right: 2px" href="{{asset('uploads/colon/' . $file->name)}}" target="_blank" class="Register-openFile">Abrir</a>
                                <!--<span class="Register-addFile">Cambiar</span>-->
                            </span>
                            <span class="Register-tooltip">{{$file->name}}</span>
                            <!--<input type="file" id="type9">-->
                            <input type="hidden" name="type9" value="{{$file->name}}">
                        </div>
                        @if (count($errors) > 0)
                            <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type9')}}</span>
                        @endif
                    </label>
                @elseif($file->file_type_id == 5)
                    <label class="col-10 small-10" for="type5">
                        <span>Portafolio del grupo (.pdf)</span>
                        <div class="Register-file">
                            <span class="Register-actions">
                                <a style="margin-right: 2px" href="{{asset('uploads/colon/' . $file->name)}}" target="_blank" class="Register-openFile">Abrir</a>
                                <!--<span class="Register-addFile">Cambiar</span>-->
                            </span>
                            <span class="Register-tooltip">{{$file->name}}</span>
                            <!--<input type="file" id="type5">-->
                            <input type="hidden" name="type5" value="{{$file->name}}">
                        </div>
                        @if (count($errors) > 0)
                            <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type5')}}</span>
                        @endif
                    </label>
                @endif
            @endforeach

            <label for="org_region" class="col-5 small-10">
                <div class="Register-contentSelect">
                    <span>Región</span>
                    <input type="text" value="{{$award->organization->region->name}}">
                    {{--<span class="Register-arrowSelect">▼</span>
                    <select name="org_region" id="org_region">
                        <option value="">Selecciona una región</option>
                        @foreach($regions as $region)
                            <option value="{{$region->id}}" @if((session('Error') && old('org_region') == $region->id) || ($award->organization && $award->organization->city->region->id == $region->id)) selected @endif >{{$region->name}}</option>
                        @endforeach
                    </select>--}}

                </div>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('org_region')}}</span>
                @endif
            </label>

            <label for="org_city" class="col-5  small-10">
                <div class="Register-contentSelect">
                    <span>Ciudad</span>
                    <input type="text" name="org_city" id="org_city" value="{{$award->organization->city}}" >

                    {{--<span class="Register-arrowSelect">▼</span>
                    <select name="org_city" id="org_city">
                        <option data-region="0" value="">Selecciona una ciudad</option>
                        @foreach($cities as $city)
                            <option class="hidden" data-region="{{$city->region->id}}" value="{{$city->id}}" @if((session('Error') && old('org_city') == $city->id) || ($award->organization && $award->organization->city_id == $city->id)) selected @endif >{{$city->name}}</option>
                        @endforeach
                    </select>--}}
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

            <label class="col-12 small-10 row Colon-social" for="group_name">
                <span  class="col-12 ">Redes sociales (facebook, instagram, twitter)</span>
                <input class="col-4" type="text" name="facebook" id="facebook" value="{{explode(',', $award->organization->socials)[0]}}" >
                <input  class="col-4" type="text" name="instagram" id="instagram" value="{{explode(',', $award->organization->socials)[1]}}" >
                <input class="col-4"  type="text" name="twitter" id="twitter" value="{{explode(',', $award->organization->socials)[2]}}" >
            </label>

            @foreach($award->files as $file)
                @if($file->file_type_id == 16)
                    <label class="col-10 small-10" for="type16">
                        <span>Hoja de vida de la agrupación, grupo constituido o de los integrantes de la unión temporal (.pdf)</span>
                        <div class="Register-file">
                            <span class="Register-actions">
                                <a style="margin-right: 2px" href="{{asset('uploads/colon/' . $file->name)}}" target="_blank" class="Register-openFile">Abrir</a>
                                <!--<span class="Register-addFile">Cambiar</span>-->
                            </span>
                            <span class="Register-tooltip">{{$file->name}} </span>
                            <!--<input type="file" id="type16">-->
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

        <h2 class="col-12">DATOS DE LA PRODUCCIÓN ARTÍSTICA</h2>
        <div class=" row Register-contentLabel">
            <label class="col-10 small-10" for="prd_name">
                <span>Nombre del espectáculo</span>
                <input type="text" name="prd_name" id="prd_name" value="{{$award->production->name}}">
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('prd_name')}}</span>
                @endif
            </label>

            <label class="small-10" for="type10">
                <span>Reseña de la propuesta (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        <a style="margin-right: 2px" href="{{asset('uploads/colon/' . $award->file(10)->name)}}" target="_blank" class="Register-openFile">Abrir</a>
                    </span>
                    <span class="Register-tooltip">
                        @if((session('Error') && old('type10')) || (isset($award) && $award->file(10)))
                            @if(session('Error'))
                                {{old('type10')}}
                            @else
                                {{$award->file(10)->name}}
                            @endif
                        @else

                        @endif
                    </span>
                </div>
            </label>

            {{--<label for="prd_genre" class="col-5  small-10">
                <div class="Register-contentSelect">
                    <span>Género:</span>
                    <input type="text" value="{{$award->production->genre}}">
                    <span class="Register-arrowSelect">▼</span>
                    <select name="prd_genre" id="prd_genre">
                        <option value="Teatro">Teatro</option>
                        <option value="Circo - Teatro" @if($award->production->genre == 'Circo - Teatro') selected @endif >Circo - Teatro</option>
                        <option value="Danza - Teatro" @if($award->production->genre == 'Danza - Teatro') selected @endif >Danza - Teatro</option>
                        <option value="Teatro Musical" @if($award->production->genre == 'Teatro Musical') selected @endif >Teatro Musical</option>
                    </select>
                </div>
            </label>--}}

            <label class="col-10 small-10" for="type3">
                <span>Certificado de obra (pdf.)</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        <a style="margin-right: 2px" href="{{asset('uploads/colon/' . $award->file(3)->name)}}" target="_blank" class="Register-openFile">Abrir</a>
                    </span>
                    <span class="Register-tooltip">
                        @if((session('Error') && old('type3')) || (isset($award) && $award->file(3)))
                            @if(session('Error'))
                                {{old('type3')}}
                            @else
                                {{$award->file(3)->name}}
                            @endif
                        @else
                            <!--Si la obra contiene piezas musicales deben ser originales para la producción.-->
                            @endif
                    </span>
                </div>
            </label>

            <!--<h3 class="col-10" style="color:black">PROPUESTA DE PRODUCCIÓN.</h3>
            <p> La obra producto del premio deberá tener una duración mínima de cuarenta y cinco (45) minutos. </p>-->
            <label class="col-10 small-10" for="type1">
                <span>Sinópsis (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        <a style="margin-right: 2px" href="{{asset('uploads/colon/' . $award->file(1)->name)}}" target="_blank" class="Register-openFile">Abrir</a>
                    </span>
                    <span class="Register-tooltip">
                        @if((session('Error') && old('type1')) || (isset($award) && $award->file(1)))
                            @if(session('Error'))
                                {{old('type1')}}
                            @else
                                {{$award->file(1)->name}}
                            @endif
                        @else
                            Máximo 20 lineas
                        @endif
                    </span>

                </div>
            </label>

            <label class="col-10 small-10" for="type2">
                <span>Texto o libreto (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        <a style="margin-right: 2px" href="{{asset('uploads/colon/' . $award->file(2)->name)}}" target="_blank" class="Register-openFile">Abrir</a>
                    </span>
                    <span class="Register-tooltip">
                        @if((session('Error') && old('type2')) || (isset($award) && $award->file(2)))
                            @if(session('Error'))
                                {{old('type2')}}
                            @else
                                {{$award->file(2)->name}}
                            @endif
                        @else
                            Los textos dramáticos presentados deben ser en español. Para teatro musical, incluir las respectivas partituras y autorizaciones de los autores.
                        @endif
                    </span>
                </div>
            </label>

            <label class="col-10 small-10" for="type11">
                <span>Propuesta de dirección (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        <a style="margin-right: 2px" href="{{asset('uploads/colon/' . $award->file(11)->name)}}" target="_blank" class="Register-openFile">Abrir</a>
                    </span>
                    <span class="Register-tooltip">
                        @if((session('Error') && old('type11')) || (isset($award) && $award->file(11)))
                            @if(session('Error'))
                                {{old('type11')}}
                                <@else<
                            {{$award->file(11)->name}}
                            @endif
                        @else
                            Puesta en escena, metodología de trabajo y proceso de creación. 2 pag. Máx.
                        @endif
                    </span>
                </div>
            </label>

            <label class="col-10 small-10" for="type12">
                <span>Propuesta Estética (.pdf) <!--<em>Enlace a condiciones y equipamiento técnico del Teatro Colón</em>--></span>
                <div class="Register-file">
                    <span class="Register-actions">
                        <a style="margin-right: 2px" href="{{asset('uploads/colon/' . $award->file(12)->name)}}" target="_blank" class="Register-openFile">Abrir</a>
                    </span>
                    <span class="Register-tooltip" style="font-size: 11px">
                        @if((session('Error') && old('type12')) || (isset($award) && $award->file(12)))
                            @if(session('Error'))
                                {{old('type12')}}
                            @else
                                {{$award->file(12)->name}}
                            @endif
                        @else
                            <!--Bocetos de escenografía, maquillaje, utilería, vestuario, iluminación, material sonoro o musical, requerimientos de tramoya, iluminación, recursos técnicos-->
                                Bocetos iniciales
                            @endif
                    </span>
                </div>
            </label>

            <label class="col-10 small-10" for="type13">
                <span>Cronograma (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        <a style="margin-right: 2px" href="{{asset('uploads/colon/' . $award->file(13)->name)}}" target="_blank" class="Register-openFile">Abrir</a>
                    </span>
                    <span class="Register-tooltip">
                        @if((session('Error') && old('type13')) || (isset($award) && $award->file(13)))
                            @if(session('Error'))
                                {{old('type13')}}
                            @else
                                {{$award->file(13)->name}}
                            @endif
                        @else
                            Fases de desarrollo de la propuesta, los tiempos estimados para cada una de ellas y sus responsables.
                        @endif
                    </span>
                </div>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type13')}}</span>
                @endif
            </label>

            <label class="col-10 small-10" for="type14">
                <span>Presupuesto (.pdf) <em>Honorarios, servicios a contratar y actividades a realizar.</em></span>
                <div class="Register-file">
                    <span class="Register-actions">
                        <a style="margin-right: 2px" href="{{asset('uploads/colon/' . $award->file(14)->name)}}" target="_blank" class="Register-openFile">Abrir</a>
                    </span>
                    <span class="Register-tooltip" style="font-size: 10px">
                        @if((session('Error') && old('type14')) || (isset($award) && $award->file(14)))
                            @if(session('Error'))
                                {{old('type14')}}
                            @else
                                {{$award->file(14)->name}}
                            @endif
                        @else
                            Para montajes de compañías o uniones que vivan por fuera de Bogotá, incluir los costos de estadía, transporte y viáticos necesarios para montaje de la obra en el Teatro Colón
                        @endif
                    </span>
                </div>
            </label>

            <label class="col-10 small-10" for="type15">
                <span>Propuesta de Financiación (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        <a style="margin-right: 2px" href="{{asset('uploads/colon/' . $award->file(15)->name)}}" target="_blank" class="Register-openFile">Abrir</a>
                    </span>
                    <span class="Register-tooltip" >
                        @if((session('Error') && old('type15')) || (isset($award) && $award->file(15)))
                            @if(session('Error'))
                                {{old('type15')}}
                            @else
                                {{$award->file(15)->name}}
                            @endif
                        @else
                            Si el valor total excede el monto de la cofinanciación explique las otras fuentes de financiación.
                        @endif
                    </span>
                </div>
            </label>

            <label class="col-10 small-10" for="type7">
                <span>Hoja de Vida de c/u de los integrantes (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        <a style="margin-right: 2px" href="{{asset('uploads/colon/' . $award->file(7)->name)}}" target="_blank" class="Register-openFile">Abrir</a>
                    </span>
                    <span class="Register-tooltip" >
                        @if((session('Error') && old('type7')) || (isset($award) && $award->file(7)))
                            @if(session('Error'))
                                {{old('type7')}}
                            @else
                                {{$award->file(7)->name}}
                            @endif
                        @else
                            Actores, diseñadores, escenógrafos, etc.
                        @endif
                    </span>
                </div>
            </label>
        </div>

        <h2 class="col-12">DATOS DEL REPRESENTANTE LEGAL</h2>

        <div class="row Register-contentLabel">
            <label class="col-5 small-10" for="rep_name">
                <span>Nombres</span>
                <input type="text" name="rep_name" id="rep_name" value="{{$award->propietor->name}}">
            </label>
            <label class="col-5 small-10" for="rep_last_name">
                <span>Apellidos</span>
                <input type="text" name="rep_last_name" id="rep_last_name" value="{{$award->propietor->last_name}}">
            </label>
            <label for="rep_doc_typ" class="col-5  small-10">
                <div class="Register-contentSelect">
                    <span>Tipo de Documento de Identidad:</span>
                    <span class="Register-arrowSelect">▼</span>
                    <select name="rep_doc_typ" id="rep_doc_typ">
                        <option value="2">Cédula</option>
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
                <input type="email" name="rep_email" id="rep_email" value="{{$award->propietor->email1}}" >
            </label>

            <label class=" col-5 small-10" for="rep_email2">
                <span>Correo personal</span>
                <input type="email" name="rep_email2" id="rep_email2" value="{{$award->propietor->email2}}" >
            </label>

            <!--<h3 style="color:black;" class="col-10">PROPUESTA DE PRODUCCIÓN.</h3>-->

            <label class="col-10 small-10" for="type18">
                <span>Documento de delegación de representación (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        <a style="margin-right: 2px" href="{{asset('uploads/colon/' . $award->file(18)->name)}}" target="_blank" class="Register-openFile">Abrir</a>
                    </span>
                    <span class="Register-tooltip">
                        @if((session('Error') && old('type18')) || (isset($award) && $award->file(18)))
                            @if(session('Error'))
                                {{old('type18')}}
                            @else
                                {{$award->file(18)->name}}
                            @endif
                        @else
                            Firmado por todos los miembros de la unión temporal, en el que delegan su representación a un integrante del grupo.
                        @endif
                    </span>
                </div>
            </label>

            <label class="col-10 small-10" for="type19">
                <span>Fotocopia de la Cédula Representante Legal (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        <a style="margin-right: 2px" href="{{asset('uploads/colon/' . $award->file(19)->name)}}" target="_blank" class="Register-openFile">Abrir</a>
                    </span>
                    <span class="Register-tooltip">
                        @if(session('Error'))
                            {{old('type19')}}
                        @elseif(isset($award) && $award->file(19))
                            {{$award->file(19)->name}}
                        @endif
                    </span>
                </div>
            </label>
        <!--<div class="center row"><button style="">IR ATRÁS</button></div>-->
    </form>
    <div class="preload yellow hidden">
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