@extends('layouts.adminLayout')

{{-- Soft delete--}}
@section('trashed')
    <section id="obrisaniProjekti">
        <div class="card col-lg-9">
            <div class="card-header">
                <div class="col-12">
                    <h4>{{$naslov}}</h4>
                </div>
            </div>
            <div class="card-body">
                <!-- Tabela -->
                <table class="tabela-admin table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Slika</th>
                        <th scope="col">Naslov</th>
                        <th scope="col">Restore</th>
                        <th scope="col">Obrisi trajno</th>
                    </tr>
                    </thead>
                    <tbody >
                    <tr >
                        <td><img src="img/slike/card/Php-1.png" alt="img/slike/card/default.png" width="90px" height="60px"></td>
                        <td>Neki naslov</td>
                        <td><input class="btn btn-warning btn-xs" type="submit" value="Restore"></td>
                        <td><input class="btn btn-danger btn-xs" type="submit" value="Obrisi"></td>
                    </tr>
                    <tr >
                        <td><img src="img/slike/card/Php-1.png" alt="img/slike/card/default.png" width="90px" height="60px"></td>
                        <td>Neki naslov</td>
                        <td><input class="btn btn-warning btn-xs" type="submit" value="Restore"></td>
                        <td><input class="btn btn-danger btn-xs" type="submit" value="Obrisi"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection