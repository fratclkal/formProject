<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="stylesheet" href="{{asset('dist/assets/css/main/app.css')}}">
    <link rel="stylesheet" href="{{asset('dist/assets/css/main/app-dark.css')}}">
    <link rel="shortcut icon" href="{{asset('dist/assets/images/logo/favicon.svg')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('dist/assets/images/logo/favicon.png')}}" type="image/png">

    <link rel="stylesheet" href="{{asset('dist/assets/css/shared/iconly.css')}}">

</head>

<body>
<div id="app">

    <div id="main">
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
                                <form class="form form-horizontal">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Ad</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="first-name" class="form-control" name="fname"
                                                       placeholder="Ad">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Soyad</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="email-id" class="form-control" name="fname"
                                                       placeholder="Soyad">
                                            </div>
                                            <div class="col-md-4">
                                                <label>T.C. Kimlik Numarası</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="contact-info" class="form-control" name="fname"
                                                       placeholder="T.C. Kimlik Numarası">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Profil Görsel</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input class="form-control" type="file" id="formFile">
                                            </div>
                                            <div class="col-md-4">
                                                <label>E-Posta</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="email" id="first-name" class="form-control" name="fname"
                                                       placeholder="E-Posta">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Mobil Tel</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="first-name" class="form-control" name="fname"
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
                                                                <input type="checkbox" class="form-check-input form-check-success" checked="" name="customCheck" id="customColorCheck3">
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
                                                                <input type="checkbox" class="form-check-input form-check-success" checked="" name="customCheck" id="customColorCheck3">
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
                                                <input type="datetime-local" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Başlangıç Zamanı</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="datetime-local" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Ücret</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" id="first-name" class="form-control" name="fname"
                                                       placeholder="Ücret">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Ödeme Türü</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Kredi Kartı
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                                                           checked>
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        Nakit
                                                    </label>
                                                </div>
                                            </div>


                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Kaydet</button>
                                                <button type="reset"
                                                        class="btn btn-light-secondary me-1 mb-1">Reset</button>
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
                                <table class="table table-hover mb-0">
                                    <thead>
                                    <tr>
                                        <th>Ad</th>
                                        <th>Soyad</th>
                                        <th>Mobil Tel</th>
                                        <th>E-posta</th>
                                        <th>Ödeme Türü</th>
                                        <th>Detay</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-bold-500">Nusret</td>
                                        <td>Kurar</td>
                                        <td class="text-bold-500">+90 543 885 85 33</td>
                                        <td>nkurar@gmail.com</td>
                                        <td>Nakit</td>
                                        <td><a href="#"><i
                                                    class="badge-circle badge-circle-light-secondary font-medium-1"
                                                    data-feather="mail"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold-500">Fırat</td>
                                        <td>ÇELİKAL</td>
                                        <td class="text-bold-500">+90 536 693 68 86</td>
                                        <td>firatcelkal@gmail.com</td>
                                        <td>Kredi Kartı</td>
                                        <td><a href="#"><i
                                                    class="badge-circle badge-circle-light-secondary font-medium-1"
                                                    data-feather="mail"></i></a></td>
                                    </tr>
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

</body>

</html>
