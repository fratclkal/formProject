@extends('app')
@section('title')
    <div class="page-heading">
        <h3>Kullanıcı Listesi</h3>
    </div>
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
                        <th>Seçenekler</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>ID</td>
                        <td>firat</td>
                        <td>
                            <button class="btn btn-warning">Güncelle</button>
                            <button class="btn btn-danger">Sil</button>
                        </td>
                    </tr>
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
                <form id="">
                    <div class="modal-body">
                        <label>Kullanıcı Adı: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Kullanıcı Adı" class="form-control">
                        </div>
                        <label>Şifre: </label>
                        <div class="form-group">
                            <input type="password" placeholder="Şifre" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">KAPAT</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">KAYDET</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit User Modal -->

    <div class="modal fade text-left" id="editForm" tabindex="-1" aria-labelledby="myModalLabel34" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Edit Sub Category </h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <form id="">
                    <div class="modal-body">
                        <input type="hidden" name="product_id" id="product_id" value="">
                        <label>Product Name: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Kullanıcı Adı" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Kapat</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Kaydet</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script src="{{asset('dist/assets/js/app.js')}}"></script>

    <script src="{{asset('dist/assets/js/extensions/datatables.js')}}"></script>
@endsection
