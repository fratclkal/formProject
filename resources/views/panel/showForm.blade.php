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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous">

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
                            <a href="{{route('listForms')}}" class="btn btn-primary d-inline"><i class="fa fa-angle-left"></i></a>
                            <h4 class="card-title d-inline">Form</h4>
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
                                                <input disabled type="text" value="{{$form->name}}" id="first-name" class="form-control" name="fname"
                                                       placeholder="Ad">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Soyad</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input disabled value="{{$form->sur_name}}" type="text" id="email-id" class="form-control" name="fname"
                                                       placeholder="Soyad">
                                            </div>
                                            <div class="col-md-4">
                                                <label>T.C. Kimlik Numarası</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" disabled value="{{$form->tc_no}}" id="contact-info" class="form-control" name="fname"
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
                                                <input disabled value="{{$form->e_mail}}" type="email" id="first-name" class="form-control" name="fname"
                                                       placeholder="E-Posta">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Mobil Tel</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input disabled value="{{$form->phone_num}}" type="text" id="first-name" class="form-control" name="fname"
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
                                                                <input disabled @if($form->kvkk == 1) checked @endif type="checkbox" class="form-check-input form-check-success" name="customCheck" id="customColorCheck3">
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
                                                                <input disabled @if($form->kullanim == 1) checked @endif type="checkbox" class="form-check-input form-check-success" name="customCheck" id="customColorCheck3">
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
                                                <input disabled value="{{substr($form->start_date, 0,10)}}T{{substr($form->start_date, 11,5)}}" type="datetime-local" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Başlangıç Zamanı</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input disabled value="{{substr($form->end_date, 0,10)}}T{{substr($form->end_date, 11,5)}}" type="datetime-local" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Ücret</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input disabled value="{{$form->price}}" type="text" id="first-name" class="form-control" name="fname"
                                                       placeholder="Ücret">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Ödeme Türü</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <div class="form-check">
                                                    <input @if($form->payment_type != 1) checked @endif class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Kredi Kartı
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input @if($form->payment_type == 1) checked @endif class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        Nakit
                                                    </label>
                                                </div>
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

    </div>
</div>
<script src="{{asset('dist/assets/js/app.js')}}"></script>

<script src="{{asset('dist/assets/js/pages/dashboard.js')}}"></script>

</body>

</html>
