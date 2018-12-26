@extends('layouts.adminLayout')

<!-- Svi postovi -->
@section('index')
    <section id="sviProjekti">
        <div class="card col-lg-12">
            {{--Header kartice--}}
            <div class="card-header row justify-content-between">
                @component('CRUD.komponente.createGrupa',
            ['naslov'=>$naslov,
            'route'=>$route,
            ])
                @endcomponent

            </div>
            <div class="card-body">
                <table class="tabela-admin table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Slika</th>
                        <th scope="col">Ime</th>
                        {{--Ako je admin prikazi--}}
                    @if(Auth::user()->admin)
                        <th scope="col">Ovlascenja</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    @endif
                    </tr>
                    </thead>
                    <tbody >
                    @foreach($var as $obj)
                    <tr >
                        @if($obj->profile['avatar'])
                        <td><img src="{{asset($obj->profile['avatar'])}}" class="avatar-img" alt="avatar usera" width="90px" height="60px"></td>
                            @else
                        <td><img src="{{asset('uploads/users/default.png')}}" class="avatar-img" alt="avatar usera" width="90px" height="60px"></td>
                        @endif
                        <td class="align-middle">{{$obj->name}}</td>
                        <td class="align-middle">
                    {{--Ako nije admin ne prikazuj sledece kolone--}}
                    @if(Auth::user()->admin)
                        @if($obj->admin)
                            <a href="{{ route('user.notAdmin', ['id' => $obj->id]) }}"><button type="button" class="btn btn-light">Ukloni ovlascenje</button></a>

                        @else
                            <a href="{{ route('user.admin', ['id' => $obj->id]) }}"><button type="button" class="btn btn-dark"> Dodaj ovlascenje </button></a>
                        @endif
                        </td>
                        <td scope="col" class="text-right align-items-center">
                            {{-- editDeleteGrupa--}}
                            @component('CRUD.komponente.editDeleteGrupa',
                            [
                            'obj'=>$obj,
                            'route'=>$route
                            ])
                            @endcomponent
                        </td>
                    @endif
                    {{--End za admina--}}
                    </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </section>
@endsection
<!-- Svi projekti -->