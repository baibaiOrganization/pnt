@extends('layout.front')

@section('content')

    <div class="Register-header Semana">
        <h1>USUARIO INSCRITO AL PREMIO TEATRO COlÓN</h1>
    </div>
    <form action="{{ url('admin/usuarios/colon')}}" enctype="multipart/form-data" method="get" class=" Register-form Semana-form"> <!-- //route('colonUpdate', $award->id) -->
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
                                <a style="margin-right: 2px" href="{{asset('uploads/semana/' . $file->name)}}" target="_blank" class="Register-openFile">Abrir</a>
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
                                <a style="margin-right: 2px" href="{{asset('uploads/semana/' . $file->name)}}" target="_blank" class="Register-openFile">Abrir</a>
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
                                <a style="margin-right: 2px" href="{{asset('uploads/semana/' . $file->name)}}" target="_blank" class="Register-openFile">Abrir</a>
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
                    @foreach($regions as $region)
                        @if($region->id == $award->organization->city->region->id)
                            <input type="text" name="org_city" id="org_city" value="{{$region->name}}" >
                        @endif
                    @endforeach
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
                    @foreach($cities as $city)
                        @if($city->id == $award->organization->city_id)
                            <input type="text" name="org_city" id="org_city" value="{{$city->name}}" >
                        @endif
                    @endforeach

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
                <span>Correo electrónico</span>
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

            <label class="col-5 small-10" for="prd_date">
                <span>Fecha de estreno</span>
                <input type="date" name="prd_date" id="prd_date" value="{{$award->production->release_date}}">
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('prd_date')}}</span>
                @endif
            </label>

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
                @if($file->file_type_id == 1)
                    <label class="col-5 small-10" for="type1">
                        <span>Sinópsis (.pdf)</span>
                        <div class="Register-file">
                            <span class="Register-actions">
                                <a style="margin-right: 2px" href="{{asset('uploads/colon/' . $file->name)}}" target="_blank" class="Register-openFile">Abrir</a>
                                <!--<span class="Register-addFile">Cambiar</span>-->
                            </span>
                            <span class="Register-tooltip">{{$file->name}}</span>
                            <!--<input type="file" id="type1">-->
                            <input type="hidden" name="type1" value="{{$file->name}}">
                        </div>
                        @if (count($errors) > 0)
                            <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type1')}}</span>
                        @endif
                    </label>
                        @continue
                    @elseif($file->file_type_id == 2)
                    <label class="col-5 small-10" for="type2">
                        <span>Texto o libreto (.pdf)</span>
                        <div class="Register-file">
                            <span class="Register-actions">
                                <a style="margin-right: 2px" href="{{asset('uploads/colon/' . $file->name)}}" target="_blank" class="Register-openFile">Abrir</a>
                                <!--<span class="Register-addFile">Cambiar</span>-->
                            </span>
                            <span class="Register-tooltip">{{$file->name}}</span>
                            <!--<input type="file" id="type2">--
                            <input type="hidden" name="type2" value="{{$file->name}}">
                        </div>
                        @if (count($errors) > 0)
                            <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type2')}}</span>
                        @endif
                    </label>
                        @continue
                    @elseif($file->file_type_id == 3)
                        <label class="col-5 small-10" for="type3">
                            <span>Certificado de registro de Derechos de Autor</span>
                            <div class="Register-file">
                                <span class="Register-actions">
                                    <a style="margin-right: 2px" href="{{asset('uploads/colon/' . $file->name)}}" target="_blank" class="Register-openFile">Abrir</a>
                                    <!--<span class="Register-addFile">Cambiar</span>
                                </span>
                                <span class="Register-tooltip"> {{$file->name}}</span>-->
                                <!--<input type="file" id="type3">-->
                                <input type="hidden" name="type3" value="{{$file->name}}">
                            </div>
                            @if (count($errors) > 0)
                                <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type3')}}</span>
                            @endif
                        </label>
                        @continue
                    @elseif($file->file_type_id == 4)
                        <label class="col-5 small-10" for="type4">
                            <span>Certificación de música original en caso de tenerla</span>
                            <div class="Register-file">
                                <span class="Register-actions">
                                    <a style="margin-right: 2px" href="{{asset('uploads/colon/' . $file->name)}}" target="_blank" class="Register-openFile">Abrir</a>
                                    <!--<span class="Register-addFile">Cambiar</span>-->
                                </span>
                                <span class="Register-tooltip">{{$file->name}}</span>
                                <!--<input type="file" id="type4">-->
                                <input type="hidden" name="type4" value="{{$file->name}}">
                            </div>
                            @if (count($errors) > 0)
                                <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type4')}}</span>
                            @endif
                        </label>
                        @continue
                    @elseif($file->file_type_id == 5)
                        <label class="col-5 small-10" for="type5">
                            <span>Portafolio del grupo(.pdf)</span>
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
                        @continue
                    @elseif($file->file_type_id == 6)
                        <label class="col-5 small-10" for="type6">
                            <span>Soporte de 5 presentaciones realizadas hasta el 30 de Sept</span>
                            <div class="Register-file">
                                <span class="Register-actions">
                                    <a style="margin-right: 2px" href="{{asset('uploads/colon/' . $file->name)}}" target="_blank" class="Register-openFile">Abrir</a>
                                    <!--<span class="Register-addFile">Cambiar</span>-->
                                </span>
                                <span class="Register-tooltip">{{$file->name}}</span>
                                <!--<input type="file" id="type6">-->
                                <input type="hidden" name="type6" value="{{$file->name}}">
                            </div>
                            @if (count($errors) > 0)
                                <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type6')}}</span>
                            @endif
                        </label>
                        @continue
                    @elseif($file->file_type_id == 7)
                        <label class="col-5 small-10" for="type7">
                            <span>Hoja de Vida de c/u de los integrantes</span>
                            <div class="Register-file">
                                <span class="Register-actions">
                                    <a style="margin-right: 2px" href="{{asset('uploads/colon/' . $file->name)}}" target="_blank" class="Register-openFile">Abrir</a>
                                    <!--<span class="Register-addFile">Cambiar</span>-->
                                </span>
                                <span class="Register-tooltip" >{{$file->name}} </span>
                                <!--<input type="file" id="type7">-->
                                <input type="hidden" name="type7" value="{{$file->name}}">
                            </div>
                            @if (count($errors) > 0)
                                <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type7')}}</span>
                            @endif
                        </label>
                        @continue
                    @endif
                @endforeach

                <label class="col-10 small-10" for="prd_video">
                    <span>Registro audiovisual (vínculo a video del espectáculo)</span>
                    <textarea class="col-12" name="prd_video" id="prd_video" placeholder="Grabación completa del espectáculo en buena calidad de imagen (mínimo 1280x720 ) y audio. Deberá ser en plano general y sin edición.">{{$award->production->link_video}}</textarea>
                    @if (count($errors) > 0)
                        <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('prd_video')}}</span>
                    @endif
                </label>
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

            <label class=" col-5 small-10" for="rep_email1">
                <span>Correo electrónico</span>
                <input type="email" name="rep_email1" id="rep_email1" value="{{$award->propietor->email1}}">
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('rep_email1')}}</span>
                @endif
            </label>

            <label class=" col-5 small-10" for="rep_email2">
                <span>Correo electrónico 2</span>
                <input type="email" name="rep_email2" id="rep_email2" value="{{$award->propietor->email2}}">
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('rep_email2')}}</span>
                @endif
            </label>
        </div>
        <div class="center row"><button style="">IR ATRÁS</button></div>
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