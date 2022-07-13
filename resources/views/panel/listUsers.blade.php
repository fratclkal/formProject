@extends('app')
@section('head')
    Kullanıcı Listesi
@endsection
@section('title')
    <div class="page-heading">
        <h3>Kullanıcı Listesi</h3>
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

    <!-- List Users -->

    <section class="section">
        <div class="card">
            <div class="card-header" style="display: flex;flex-direction: row; justify-content: space-between">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#inlineForm">Kullanıcı Ekle</button>
            </div>
            <div class="card-header">
                Kullanıcı Listesi
            </div>
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Kullanıcı Adı</th>
                        <th>E-mail</th>
                        <th>Seçenekler</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                        </tr>
                    <tr></tr>
                    <tr></tr>
                    <tr></tr>
                    </tbody>
                </table>
            </div>
        </div>

    </section>

    <!-- Add User Modal -->

    <div class="modal fade text-left" id="inlineForm" tabindex="-1" aria-labelledby="myModalLabel33" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Kullanıcı Ekle </h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <form id="create_form" >
                    <div class="modal-body">
                        <label>İsim: </label>
                        <div class="form-group">
                            <input type="text" name="name" placeholder="İsim" class="form-control">
                        </div>
                        <label>Email: </label>
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Email" class="form-control">
                        </div>
                        <label>Şifre: </label>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Şifre" class="form-control">
                        </div>
                        <label>Tekrar Şifre: </label>
                        <div class="form-group">
                            <input type="password" name="password_confirmation" placeholder="Şifre" class="form-control">
                        </div>
                    </div>
                </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            Kapat
                        </button>
                        <button onclick="create()" type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                            Kaydet
                        </button>
                    </div>

            </div>
        </div>
    </div>

    <!-- Edit User Modal -->

    <div class="modal fade text-left" id="editForm" tabindex="-1" aria-labelledby="myModalLabel34" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Kullanıcı Güncelle </h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <form id="updateForm" action="{{route('panel.update_user')}}">
                    <div class="modal-body">
                        <input type="hidden" name="user_id" id="updateId" value="">
                            <label>İsim: </label>
                            <div class="form-group">
                                <input type="text" name="name" id="name" placeholder="İsim" class="form-control">
                            </div>
                            <label>Email: </label>
                            <div class="form-group">
                                <input type="email" name="email" id="email" placeholder="Email" class="form-control">
                            </div>
                            <label>Şifre: </label>
                            <div class="form-group">
                                <input type="password" name="password" placeholder="Şifre" class="form-control">
                            </div>
                            <label>Tekrar Şifre: </label>
                            <div class="form-group">
                                <input type="password" name="password_confirmation" placeholder="Şifre" class="form-control">
                            </div>
                    </div>
                </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            Kapat
                        </button>
                        <button onclick="updatePost()" type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                            Kaydet
                        </button>
                    </div>

            </div>
        </div>
    </div>

@endsection
@section('js')
    <script src="{{asset('dist/assets/js/app.js')}}"></script>

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

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function create(){
            Swal.fire({
                icon: "warning",
                title:"Emin misiniz?",
                html: "Yeni bir kullanıcı oluşturmak istediğinize emin misiniz?",
                showConfirmButton: true,
                showCancelButton: true,
                confirmButtonText: "Onayla",
                cancelButtonText: "İptal",
                cancelButtonColor: "#e30d0d"
            }).then((result)=>{
                if (result.isConfirmed){
                    let url = '{{route('panel.create_user')}}';
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

        function update(id){
            let url = '{{route('panel.get_user')}}';
            let formData = new FormData();
            formData.append('id', id);
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
                    $('#updateId').val(data.id);
                    $('#name').val(data.name);
                    $('#email').val(data.email);
                    $('#editForm').modal('toggle');
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

        function updatePost(){
            Swal.fire({
                icon: "warning",
                title:"Emin misiniz?",
                html: "Bu kullanıcıyı güncellemek istediğinize emin misiniz?",
                showConfirmButton: true,
                showCancelButton: true,
                confirmButtonText: "Onayla",
                cancelButtonText: "İptal",
                cancelButtonColor: "#e30d0d"
            }).then((result)=>{
                if (result.isConfirmed){
                    let url = $('#updateForm').attr('action');
                    let formData = new FormData(document.getElementById('updateForm'));
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
                            $('#updateModal').modal('toggle');
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



        function deletePost(id){
            Swal.fire({
                icon: "warning",
                title:"Emin misiniz?",
                html: "Bu kullanıcıyı silmek istediğinize emin misiniz?",
                showConfirmButton: true,
                showCancelButton: true,
                confirmButtonText: "Onayla",
                cancelButtonText: "İptal",
                cancelButtonColor: "#e30d0d"
            }).then((result)=>{
                if (result.isConfirmed){
                    let url = '{{route('panel.delete_user')}}';
                    let formData = new FormData(document.getElementById('updateForm'));
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

        let table = null;
        $(document).ready(function() {
            table = $('#table1').DataTable( {
                order: [
                    [0,'DESC']
                ],
                processing: true,
                serverSide: true,
                ajax: '{{route('panel.fetch.users')}}',
                columns: [
                    {data: 'id'},
                    {data: 'name'},
                    {data: 'email'},
                    {data: 'delete'}
                ],
                "language":{
                    "url": "//cdn.datatables.net/plug-ins/1.11.1/i18n/tr.json"
                }
            } );
        } );


    </script>
@endsection
