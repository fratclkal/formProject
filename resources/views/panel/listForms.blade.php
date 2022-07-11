@extends('app')
@section('title')

    <div class="page-heading">
        <h3>Form Listesi</h3>
    </div>

@endsection
@section('content')

    <section class="section">
        <div class="card">
            <div class="card-header">
                Jquery Datatable
            </div>
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                    <tr>
                        <th>Ad</th>
                        <th>Soyad</th>
                        <th>E-Posta</th>
                        <th>Mobil Tel</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Fırat</td>
                        <td>Çelikal</td>
                        <td>firatcelkal@gmail.com</td>
                        <td>+90 536 693 6886</td>
                        <td>
                            <span class="badge bg-success">Active</span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </section>

@endsection
@section('js')
    <script src="{{asset('dist/assets/js/app.js')}}"></script>

    <script src="{{asset('dist/assets/js/extensions/datatables.js')}}"></script>
@endsection
