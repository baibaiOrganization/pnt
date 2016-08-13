@extends('layout.back')

@section('content')
    <section class="Pay">

        <h1 class="col-12 small-12  bottom-element">
             <span class="user">{{Auth::user()->name . ' ' . Auth::user()['last-name']}}</span>
            {{trans('pay.pay')}}
        </h1>
        @if(auth()->user()->role_id == 2)
            @if(!auth()->user()->client->validate)
                <p>
                    {{trans('pay.p6')}}
                </p>
                <form action="http://servicios.corferias.com/inscripcion">
                    <input type="hidden" name="ano" value="2016">
                    <input type="hidden" name="evento" value="W070">
                    <input type="hidden" name="congreso" value="1">
                    <button>{{trans('pay.button6')}}</button>
                </form>
                <form action="http://servicios.corferias.com/inscripcion/">
                    <input type="hidden" name="ano" value="2016">
                    <input type="hidden" name="evento" value="W069">
                    <input type="hidden" name="congreso" value="1">
                    <button>{{trans('pay.button7')}}</button>
                </form>
            @else
                <p> {{trans('pay.p7')}} </p>
            @endif
        @endif
    </section>
@endsection