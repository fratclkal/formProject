@extends('app')
@section('head')
    Form Listesi
@endsection
@section('title')

    <div class="page-heading">
        <h3>Form Listesi</h3>
    </div>
@endsection
@section('style')
    <style>
        table,.card{
            overflow: auto;
        }
    </style>
@endsection


@section('content')

    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="select_creator">Oluşturucu</label>
                        <select class="form-select" id="select_creator">
                            <option selected>Oluşturucu</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12">
                        <h5>Oluşturulma Tarihine Göre</h5>
                        <div class="row">
                            <div class="form-group col-lg-6 col-md-12">
                                <label for="date_start">Başlangıç Tarihi</label>
                                <input type="datetime-local" id="date_start" class="form-control">
                            </div>
                            <div class="form-group col-lg-6 col-md-12">
                                <label for="date_end">Bitiş Tarihi</label>
                                <input type="datetime-local" id="date_end" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <h5>Başlangıç Tarihine Göre</h5>
                        <div class="row">
                            <div class="form-group col-lg-6 col-md-12">
                                <label for="start_date_start">Başlangıç Tarihi</label>
                                <input type="datetime-local" id="start_date_start" class="form-control">
                            </div>
                            <div class="form-group col-lg-6 col-md-12">
                                <label for="start_date_end">Bitiş Tarihi</label>
                                <input type="datetime-local" id="start_date_end" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <h5>Bitiş Tarihine Göre</h5>
                        <div class="row">
                            <div class="form-group col-lg-6 col-md-12">
                                <label for="end_date_start">Başlangıç Tarihi</label>
                                <input type="datetime-local" id="end_date_start" class="form-control">
                            </div>
                            <div class="form-group col-lg-6 col-md-12">
                                <label for="end_date_end">Bitiş Tarihi</label>
                                <input type="datetime-local" id="end_date_end" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-3 justify-content-start">
                        <button onclick="filter()" class="btn btn-primary">Filtrele</button>
                    </div>
                    <div class="form-group col-3 justify-content-start">
                        <button onclick="excel()" class="btn btn-primary">Excel Çıkart</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <span class="justify-content-start">Formlar</span>
                <br><br>
                <span class="justify-content-end">Toplam Ücret: <span class="total"></span></span>
            </div>
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                    <tr>
                        <th>Ad Soyad</th>
                        <th>Oluşturan</th>
                        <th>E-Posta</th>
                        <th>Mobil Tel</th>
                        <th>Seçenekler</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>

                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </section>

@endsection
@section('js')


    <script src="{{asset('dist/assets/js/extensions/datatables.js')}}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

        function deletePost(id){
            Swal.fire({
                icon: "warning",
                title:"Emin misiniz?",
                html: "Bu formu silmek istediğinize emin misiniz?",
                showConfirmButton: true,
                showCancelButton: true,
                confirmButtonText: "Onayla",
                cancelButtonText: "İptal",
                cancelButtonColor: "#e30d0d"
            }).then((result)=>{
                if (result.isConfirmed){
                    let url = '{{route('panel.delete.form')}}';
                    let formData = new FormData();
                    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
                    formData.append('id', id);
                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: formData,
                        dataType: "json",
                        contentType: false,
                        cache: false,
                        processData:false,
                        success: function (){
                            Swal.fire({
                                icon: "success",
                                title:"Başarılı",
                                showConfirmButton: true,
                                confirmButtonText: "Tamam"
                            });
                            table.ajax.reload();
                        },
                        error: function (data){
                            Swal.fire({
                                icon: "error",
                                title:"Hata!",
                                html: "<div id=\"validation-errors\"></div>",
                                showConfirmButton: true,
                                confirmButtonText: "Tamam"
                            });
                            $.each(data.responseJSON.errors, function(key,value) {
                                $('#validation-errors').append('<div class="alert alert-danger">'+value+'</div>');
                            });
                        }
                    });
                }
            });
        }

        function filter(){

            let url = '{{route('panel.fetch.forms',[0,0,0,0,0,0,0])}}';

            url = url.replace('/0/0/0/0/0/0/0', '');


            if($('#select_creator').val() != 'Oluşturucu'){
                url = url+'/'+$('#select_creator').val();
            }else{
                url = url+'/0';
            }

            if($('#date_start').val() != ''){
                url = url+'/'+$('#date_start').val();
            }else{
                url = url+'/0';
            }

            if($('#date_end').val() != ''){
                url = url+'/'+$('#date_end').val();
            }else{
                url = url+'/0';
            }

            if($('#start_date_start').val() != ''){
                url = url+'/'+$('#start_date_start').val();
            }else{
                url = url+'/0';
            }

            if($('#start_date_end').val() != ''){
                url = url+'/'+$('#start_date_end').val();
            }else{
                url = url+'/0';
            }

            if($('#end_date_start').val() != ''){
                url = url+'/'+$('#end_date_start').val();
            }else{
                url = url+'/0';
            }

            if($('#end_date_end').val() != ''){
                url = url+'/'+$('#end_date_end').val();
            }else{
                url = url+'/0';
            }

            console.log(url);

            table.ajax.url(url);

            table.ajax.reload();

            let formData = new FormData();
            formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
            $.ajax({
                type: 'POST',
                url: url,
                data: formData,
                dataType: "json",
                contentType: false,
                cache: false,
                processData:false,
                success: function (data){
                    $('.total').html(data.total_price);
                }
            });

        }

        function excel(){

            let url = '{{route('panel.excel.forms',[0,0,0])}}';

            url = url.replace('/0/0/0', '');


            if($('#select_creator').val() != 'Oluşturucu'){
                url = url+'/'+$('#select_creator').val();
            }else{
                url = url+'/0';
            }

            if($('#date_start').val() != ''){
                url = url+'/'+$('#date_start').val();
            }else{
                url = url+'/0';
            }

            if($('#date_end').val() != ''){
                url = url+'/'+$('#date_end').val();
            }else{
                url = url+'/0';
            }

            window.open(url, '_blank');

        }

        let table = null;
        $(document).ready(function() {
            table = $('#table1').DataTable( {
                order: [
                    [0,'DESC']
                ],
                processing: true,
                serverSide: true,
                ajax: '{{route('panel.fetch.forms',[0,0,0,0,0,0,0])}}',
                columns: [
                    {data: 'name'},
                    {data: 'creator'},
                    {data: 'e_mail'},
                    {data: 'phone_num'},
                    {data: 'delete'}
                ],
                "language":{
                    "url": "//cdn.datatables.net/plug-ins/1.11.1/i18n/tr.json"
                }
            } );

            filter();
        } );
    </script>
@endsection
