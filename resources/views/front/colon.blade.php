@extends('layout.front')

@section('content')

    <div class="Register-header Colon">
        <h1>FORMULARIO DE INSCRIPCIÓN PARA POSTULACIONES AL PREMIO TEATRO COlÓN</h1>
    </div>

    @if(session('Error'))
        <section class="Message">
            <div class="notification error">
                <span class="title">!&nbsp;&nbsp;&nbsp;&nbsp;Error</span> {{session('Error')}}<span class="close">X</span>
            </div>
        </section>
    @endif

    <form action="{{ route('colonPost') }}" enctype="multipart/form-data" method="post" class=" Register-form Colon-form">
        <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" id="url" value="{{ url('ajaxTempFiles') }}">

        <h2 class="col-12">DATOS BÁSICOS DE LA ORGANIZACIÓN</h2>
        <div class=" row Register-contentLabel">
            <label class="col-10 small-10" for="org_name">
                <span>Nombre de la agrupación, grupo constituído o unión temporal</span>
                <input type="text" name="org_name" id="org_name"
                       @if(session('Error'))
                            value="{{old('org_name')}}"
                       @elseif($organization)
                            value="{{$organization->name}}"
                       @endif >

                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('org_name')}}</span>
                @endif
            </label>

            <label for="org_city" class="col-5  small-10">
                <div class="Register-contentSelect">
                    <span>Ciudad</span>
                    <span class="Register-arrowSelect">▼</span>
                    <select name="org_city" id="org_city">
                        <option value="">Selecciona una ciudad</option>
                        <option value="Bogotá" @if(old('org_city') == 'Bogotá') selected @endif >Bógota</option>
                        <option value="Medellín" @if(old('org_city') == 'Medellín') selected @endif >Medellín</option>
                    </select>
                </div>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('org_city')}}</span>
                @endif
            </label>
            <label class="col-5 small-10" for="org_address">
                <span>Dirección física</span>
                <input type="text" name="org_address" id="org_address"
                       @if(session('Error'))
                            value="{{old('org_address')}}"
                       @elseif($organization)
                            value="{{$organization->address}}"
                       @endif >

                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('org_address')}}</span>
                @endif
            </label>
            <label class="col-5 small-10" for="org_phone">
                <span>Teléfono fijo</span>
                <input type="text" name="org_phone" id="org_phone"
                       @if(session('Error'))
                            value="{{old('org_phone')}}"
                       @elseif($organization)
                            value="{{$organization->phone}}"
                       @endif >

                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('org_phone')}}</span>
                @endif
            </label>
            <label class="col-5 small-10" for="org_mobile">
                <span>Teléfono Celular</span>
                <input type="text" name="org_mobile" id="org_mobile"
                       @if(session('Error'))
                            value="{{old('org_mobile')}}"
                       @elseif($organization)
                            value="{{$organization->mobile}}"
                       @endif >

                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('org_mobile')}}</span>
                @endif
            </label>
            <label class="col-5 small-10" for="org_email">
                <span>Correo principal</span>
                <input type="email" name="org_email" id="org_email"
                       @if(session('Error'))
                            value="{{old('org_email')}}"
                       @elseif($organization)
                            value="{{$organization->email}}"
                       @endif >

                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('org_email')}}</span>
                @endif
            </label>
            <label class="col-5 small-10" for="org_website">
                <span>Sitio Web</span>
                <input type="text" name="org_website" id="org_website"
                       @if(session('Error'))
                            value="{{old('org_website')}}"
                       @elseif($organization)
                            value="{{$organization->website}}"
                       @endif >

                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('org_website')}}</span>
                @endif
            </label>

            <label class="col-12 small-10 row Colon-social" for="group_name">
                <span  class="col-12 ">Redes sociales (facebook, instagram, twitter)</span>
                <input class="col-4" type="text" name="facebook" id="facebook"
                       @if(session('Error'))
                            value="{{old('facebook')}}"
                       @elseif($organization)
                            value="{{explode(',', $organization->socials)[0]}}"
                       @endif >
                <input  class="col-4" type="text" name="instagram" id="instagram"
                       @if(session('Error'))
                            value="{{old('instagram')}}"
                       @elseif($organization)
                            value="{{explode(',', $organization->socials)[1]}}"
                       @endif >
                <input class="col-4"  type="text" name="twitter" id="twitter"
                       @if(session('Error'))
                            value="{{old('twitter')}}"
                       @elseif($organization)
                            value="{{explode(',', $organization->socials)[2]}}"
                       @endif >
                @if (count($errors) > 0)
                    <span class="col-4" style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('facebook')}}</span>
                    <span class="col-4" style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('instagram')}}</span>
                    <span class="col-4" style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('twitter')}}</span>
                @endif
            </label>

        </div>
        <h2 class="col-12">DATOS DE LA PRODUCCIÓN ARTÍSTICA</h2>
        <div class=" row Register-contentLabel">

            <label class="col-10 small-10" for="prd_name">
                <span>Nombre del espectáculo</span>
                <input type="text" name="prd_name" id="prd_name"
                       @if(session('Error'))
                            value="{{old('prd_name')}}"
                       @elseif($production)
                            value="{{$production->name}}"
                       @endif >

                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('prd_name')}}</span>
                @endif
            </label>
            <label class="col-5 small-10" for="prd_date">
                <span>Fecha de estreno</span>
                <input type="date" name="prd_date" id="prd_date"
                       @if(session('Error'))
                            value="{{old('prd_date')}}"
                       @elseif($production)
                            value="{{$production->release_date}}"
                       @endif >

                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('prd_date')}}</span>
                @endif
            </label>
            <label for="prd_genre" class="col-5  small-10">
                <div class="Register-contentSelect">
                    <span>Género:</span>
                    <span class="Register-arrowSelect">▼</span>
                    <select name="prd_genre" id="prd_genre">
                        <option value="">Selecciona el género</option>
                        <option value="Teatro" @if(old('prd_genre') == 'Teatro') selected @endif>Teatro</option>
                        <option value="Circo - Teatro" @if(old('prd_genre') == 'Circo - Teatro') selected @endif >Circo - Teatro</option>
                        <option value="Danza - Teatro" @if(old('prd_genre') == 'Danza - Teatro') selected @endif >Danza - Teatro</option>
                        <option value="Teatro Musical" @if(old('prd_genre') == 'Teatro Musical') selected @endif >Teatro Musical</option>
                    </select>
                </div>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('prd_genre')}}</span>
                @endif
            </label>

            <label class="col-5 small-10" for="type1">
                <span>Sinópsis (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        <span class="Register-addFile">Añadir archivo</span>
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
                    <input type="file" id="type1">
                    <input type="hidden" name="type1"
                           @if(session('Error'))
                                value="{{old('type1')}}"
                           @elseif(isset($award) && $award->file(1))
                                value="{{$award->file(1)->name}}"
                           @endif >
                </div>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type1')}}</span>
                @endif
            </label>

            <label class="col-5 small-10" for="type2">
                <span>Texto o libreto (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        <span class="Register-addFile">Añadir archivo</span>
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
                    <input type="file" id="type2">
                    <input type="hidden" name="type2"
                           @if(session('Error'))
                                value="{{old('type2')}}"
                           @elseif(isset($award) && $award->file(2))
                                value="{{$award->file(2)->name}}"
                           @endif >
                </div>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type2')}}</span>
                @endif
            </label>

            <label class="col-5 small-10" for="type3">
                <span>Certificado de registro de Derechos de Autor</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        <span class="Register-addFile">Añadir archivo</span>
                    </span>
                    <span class="Register-tooltip">
                        @if((session('Error') && old('type3')) || (isset($award) && $award->file(3)))
                            @if(session('Error'))
                                {{old('type3')}}
                            @else
                                {{$award->file(3)->name}}
                            @endif
                        @else
                            Autorización de uso de la obra (.pdf)
                        @endif
                    </span>
                    <input type="file" id="type3">
                    <input type="hidden" name="type3"
                           @if(session('Error'))
                                value="{{old('type3')}}"
                           @elseif(isset($award) && $award->file(3))
                                value="{{$award->file(3)->name}}"
                           @endif >
                </div>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type3')}}</span>
                @endif
            </label>

            <label class="col-5 small-10" for="type4">
                <span>Certificación de música original en caso de tenerla</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        <span class="Register-addFile">Añadir archivo</span>
                    </span>
                    <span class="Register-tooltip">
                        @if((session('Error') && old('type4')) || (isset($award) && $award->file(4)))
                            @if(session('Error'))
                                {{old('type4')}}
                            @else
                                {{$award->file(4)->name}}
                            @endif
                        @else
                            autorización de uso de las piezas musicales
                        @endif
                    </span>
                    <input type="file" id="type4">
                    <input type="hidden" name="type4"
                           @if(session('Error'))
                                value="{{old('type4')}}"
                           @elseif(isset($award) && $award->file(4))
                                value="{{$award->file(4)->name}}"
                           @endif >
                </div>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type4')}}</span>
                @endif
            </label>

            <label class="col-5 small-10" for="type5">
                <span>Dossier del espectáculo (.pdf)</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        <span class="Register-addFile">Añadir archivo</span>
                    </span>
                    <span class="Register-tooltip">
                        @if((session('Error') && old('type5')) || (isset($award) && $award->file(5)))
                            @if(session('Error'))
                                {{old('type5')}}
                            @else
                                {{$award->file(5)->name}}
                            @endif
                        @endif
                    </span>
                    <input type="file" id="type5">
                    <input type="hidden" name="type5"
                           @if(session('Error'))
                                value="{{old('type5')}}"
                           @elseif(isset($award) && $award->file(5))
                                value="{{$award->file(5)->name}}"
                           @endif >
                </div>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type5')}}</span>
                @endif
            </label>

            <label class="col-5 small-10" for="type6">
                <span>Soporte de 5 presentaciones realizadas hasta el 30 de Sept</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        <span class="Register-addFile">Añadir archivo</span>
                    </span>
                    <span class="Register-tooltip">
                        @if((session('Error') && old('type6')) || (isset($award) && $award->file(6)))
                            @if(session('Error'))
                                {{old('type6')}}
                            @else
                                {{$award->file(6)->name}}
                            @endif
                        @else
                            Afiches, certificaciones, prensa, programas de mano, etc.) (.pdf)
                        @endif
                    </span>
                    <input type="file" id="type6">
                    <input type="hidden" name="type6"
                           @if(session('Error'))
                                value="{{old('type6')}}"
                           @elseif(isset($award) && $award->file(6))
                                value="{{$award->file(6)->name}}"
                           @endif >
                </div>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type6')}}</span>
                @endif
            </label>

            <label class="col-5 small-10" for="type7">
                <span>Hoja de Vida de c/u de los integrantes</span>
                <div class="Register-file">
                    <span class="Register-actions">
                        <span class="Register-addFile">Añadir archivo</span>
                    </span>
                    <span class="Register-tooltip" >
                        @if((session('Error') && old('type7')) || (isset($award) && $award->file(7)))
                            @if(session('Error'))
                                {{old('type7')}}
                            @else
                                {{$award->file(7)->name}}
                            @endif
                        @else
                            Hoja de vida del equipo artístico y creativo (.pdf)
                        @endif
                    </span>
                    <input type="file" id="type7">
                    <input type="hidden" name="type7"
                           @if(session('Error'))
                                value="{{old('type7')}}"
                           @elseif(isset($award) && $award->file(7))
                                value="{{$award->file(7)->name}}"
                           @endif >
                </div>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('type7')}}</span>
                @endif
            </label>

            <label class="col-10 small-10" for="prd_video">
                <span>Registro audiovisual (vínculo a video del espectáculo)</span>
                <textarea class="col-12" name="prd_video" id="prd_video" placeholder="Grabación completa del espectáculo en buena calidad de imagen (mínimo 1280x720 ) y audio. Deberá ser en plano general y sin edición.">@if(session('Error')){{old('prd_video')}}@elseif($production){{$production->link_video}}@endif</textarea>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('prd_video')}}</span>
                @endif
            </label>
           
        </div>

        <h2 class="col-12">DATOS DEL REPRESENTANTE LEGAL</h2>

        <div class="row Register-contentLabel">
            <label class="col-5 small-10" for="rep_name">
                <span>Nombres</span>
                <input type="text" name="rep_name" id="rep_name"
                       @if(session('Error'))
                            value="{{old('rep_name')}}"
                       @elseif($propietor)
                            value="{{$propietor->name}}"
                       @endif >

                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('rep_name')}}</span>
                @endif
            </label>
            <label class="col-5 small-10" for="rep_last_name">
                <span>Apellidos</span>
                <input type="text" name="rep_last_name" id="rep_last_name"
                       @if(session('Error'))
                            value="{{old('rep_last_name')}}"
                       @elseif($propietor)
                            value="{{$propietor->last_name}}"
                       @endif >

                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('rep_last_name')}}</span>
                @endif
            </label>
            <label for="rep_doc_typ" class="col-5  small-10">
                <div class="Register-contentSelect">
                    <span>Tipo de Documento de Identidad:</span>
                    <span class="Register-arrowSelect">▼</span>
                    <select name="rep_doc_typ" id="rep_doc_typ">
                        <option value="1">Selecciona Documento</option>
                        <option value="2" @if(old('rep_doc_typ') == 2) selected @endif >Cédula</option>
                        <option value="3" @if(old('rep_doc_typ') == 3) selected @endif >Cédula de Extranjería</option>
                        <option value="4" @if(old('rep_doc_typ') == 4) selected @endif >Pasaporte</option>
                    </select>
                </div>
                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('rep_doc_typ')}}</span>
                @endif
            </label>

            <label class="col-5 small-10" for="rep_doc_number">
                <span>Número de documento</span>
                <input type="text" name="rep_doc_number" id="rep_doc_number"
                       @if(session('Error'))
                            value="{{old('rep_doc_number')}}"
                       @elseif($propietor)
                            value="{{$propietor->document_number}}"
                       @endif >

                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('rep_doc_number')}}</span>
                @endif
            </label>

            <label class="col-5 small-10" for="rep_mobile">
                <span>Teléfono celular</span>
                <input type="text" name="rep_mobile" id="rep_mobile"
                       @if(session('Error'))
                            value="{{old('rep_mobile')}}"
                       @elseif($propietor)
                            value="{{$propietor->mobile}}"
                       @endif >

                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('rep_mobile')}}</span>
                @endif
            </label>

            <div class="col-5"></div>

            <label class=" col-5 small-10" for="rep_email1">
                <span>Correo electrónico</span>
                <input type="email" name="rep_email1" id="rep_email1"
                       @if(session('Error'))
                            value="{{old('rep_email1')}}"
                       @elseif($propietor)
                            value="{{$propietor->email1}}"
                       @endif >

                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('rep_email1')}}</span>
                @endif
            </label>

            <label class=" col-5 small-10" for="rep_email2">
                <span>Correo electrónico 2</span>
                <input type="email" name="rep_email2" id="rep_email2"
                       @if(session('Error'))
                            value="{{old('rep_email2')}}"
                       @elseif($propietor)
                            value="{{$propietor->email2}}"
                       @endif >

                @if (count($errors) > 0)
                    <span style="color: #ed6b6b; font-size: .85rem;">{{$errors->first('rep_email2')}}</span>
                @endif
            </label>
            <h2 class="col-12">CATEGORIA(S) DE POSTULACIÓN</h2>
        </div>
        <div class="center row"><button style="margin: 20px 0 0 0;" id="saveForm"> TERMINAR DESPUÉS</button></div>
        <div class="center row"><button style="margin: 10px 0 50px 0; color: black"> ENVIAR</button></div>
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

        $('#saveForm').on('click', function(){
            $(this).append('<input type="hidden" value="" name="isUpdate">');
        });
    </script>
@endsection
@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
@endsection