<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>

    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{asset('dist/assets/css/main/app.css')}}">
    <link rel="stylesheet" href="{{asset('dist/assets/css/main/app-dark.css')}}">
    <link rel="shortcut icon" href="{{asset('dist/assets/images/logo/favicon.svg')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('dist/assets/images/logo/favicon.png')}}" type="image/png">

    <link rel="stylesheet" href="{{asset('dist/assets/css/shared/iconly.css')}}">

</head>

<body>
<div id="app">

    <div id="main">
        <div style="width: 100%; display: flex; justify-content: end;">


            <a href="{{route('logout')}}" class="btn btn-danger">Çıkış</a>

        </div>
        <div class="page-heading">
            <h3>Form</h3>
        </div>

        <section id="basic-horizontal-layouts">
            <div class="row match-height">
                <div class="col-md-8 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Form</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form id="create_form" class="form form-horizontal">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Ad</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="first-name" class="form-control" name="name"
                                                       placeholder="Ad">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Soyad</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="email-id" class="form-control" name="sur_name"
                                                       placeholder="Soyad">
                                            </div>
                                            <div class="col-md-4">
                                                <label>T.C. Kimlik Numarası</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="contact-info" class="form-control" name="tc_no"
                                                       placeholder="T.C. Kimlik Numarası">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Profil Görsel</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input class="form-control" name="images[]" multiple type="file" id="formFile" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>E-Posta</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="email" id="first-name" class="form-control" name="e_mail"
                                                       placeholder="E-Posta">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Mobil Tel</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="first-name" class="form-control" name="phone_num"
                                                       placeholder="Mobil Tel">
                                            </div>
                                            <div class="col-md-4">
                                                <label>KVKK Onay</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <ul class="list-unstyled mb-0">
                                                    <li class="d-inline-block me-2 mb-1">
                                                        <div class="form-check">
                                                            <div class="custom-control custom-checkbox">
                                                                <input value="1" type="checkbox" class="form-check-input form-check-success" name="kvkk" id="customColorCheck3">
                                                                <label class="form-check-label" for="customColorCheck3"></label>KVKK bilgisi için tıklayınız.
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Kullanım Şartları</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <ul class="list-unstyled mb-0">
                                                    <li class="d-inline-block me-2 mb-1">
                                                        <div class="form-check">
                                                            <div class="custom-control custom-checkbox">
                                                                <input value="1" type="checkbox" class="form-check-input form-check-success" name="kullanim" id="customColorCheck3">
                                                                <label class="form-check-label" for="customColorCheck3"></label>Kullanım şartlarını kabul ediyorum.
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Başlangıç Zamanı</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="datetime-local" name="start_date" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Başlangıç Zamanı</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="datetime-local" name="end_date" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Ücret</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="first-name" class="form-control" name="price"
                                                       placeholder="Ücret">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Ödeme Türü</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" value="0" type="radio" name="payment_type" id="flexRadioDefault1">
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Kredi Kartı
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" value="1" type="radio" name="payment_type" id="flexRadioDefault2" checked>
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        Nakit
                                                    </label>
                                                </div>
                                            </div>


                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <span onclick="create()" class="btn btn-primary me-1 mb-1">Kaydet</span>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="row" id="table-hover-row">
                <div class="col-md-8 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Formlar</h4>
                        </div>
                        <div class="card-content">
                            <!-- table hover -->
                            <div class="table-responsive">
                                <table id="table1" class="table table-hover mb-0">
                                    <thead>
                                    <tr>
                                        <th>Ad Soyad</th>
                                        <th>Oluşturucu</th>
                                        <th>Mobil Tel</th>
                                        <th>E-posta</th>
                                        <th>Detay</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>
<script src="{{asset('dist/assets/js/app.js')}}"></script>

<script src="{{asset('dist/assets/js/pages/dashboard.js')}}"></script>

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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function create(){
        Swal.fire({
            icon: "warning",
            title:"Emin misiniz?",
            html: "Formu göndermek istediğinize emin misiniz?",
            showConfirmButton: true,
            showCancelButton: true,
            confirmButtonText: "Onayla",
            cancelButtonText: "İptal",
            cancelButtonColor: "#e30d0d"
        }).then((result)=>{
            if (result.isConfirmed){
                let url = '{{route('create.form')}}';
                let formData = new FormData(document.getElementById('create_form'));
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
                        $('#createModal').modal('toggle');
                        table.ajax.reload();
                    },
                    error: function (data){
                        Swal.fire({
                            icon: "error",
                            title:"Boş girdi bırakmayınız!",
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

    let table = null;
    $(document).ready(function() {
        table = $('#table1').DataTable( {
            order: [
                [0,'DESC']
            ],
            processing: true,
            serverSide: true,
            ajax: '{{route('front.fetch.forms',[0,0,0])}}',
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
    } );

</script>

</body>

</html>
