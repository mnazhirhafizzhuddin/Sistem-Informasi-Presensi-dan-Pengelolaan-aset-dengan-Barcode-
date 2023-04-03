
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    {{-- <link rel="stylesheet" type="text/css" href="style.css"> --}}

</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
        background-color: #00ac96;
    }

    .content {
        margin: 8%;
        background-color: #fff;
        padding: 4rem 1rem 4rem 1rem;
        box-shadow: 0 0 5px 5px rgba(0, 0, 0, .05);
    }

    .signin-text {
        font-style: normal;
        font-weight: 600 !important;

    }

    .form-control {
        display: block;
        width: 100%;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        border-color: #00ac96 !important;
        border-style: solid !important;
        border-width: 0 0 1px 0 !important;
        padding: 0px !important;
        color: #495057;
        height: auto;
        border-radius: 0;
        background-color: #fff;
        background-clip: padding-box;
    }


    .form-control:focus {

        color: #495057;
        background-color: #fff;
        border-color: #fff;
        outline: 0;
        box-shadow: none;
    }

    .birthday-section {
        padding: 15px;
    }

    .btn-class {
        border-color: #00ac96;
        color: #00ac96;
    }

    .btn-class:hover {
        background-color: #00ac96;
        color: #fff;
    }
</style>

<body>



    <div class="container">
        <div class="row content">
            <div class="col-md-6 mb-3">
                <img src="{{asset('Template/imagelogo.svg')}}" class="img-fluid" alt="image">
            </div>
            <br>
            <div class="col-md-6">
                <h3 class="signin-text mb-3">Silahkan Login </h3>
                @php
                // $ucok = "hafiz123";
                // $yuhu =Hash::make($ucok);
                // dd($yuhu);
                $coba = Session::get('berita');
                $messagewarning=Session::get('peringatan');
                @endphp
                @if(Session::get('peringatan'))
                <div class="alert  alert-danger">
                    {{$messagewarning}}
                </div>
                @endif
                @if (Session::get('berita'))
                <script>
                    coba = '<?php echo $coba?>'
                alert(coba)
                </script>
                @endif
                <form action="/proseslogin" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nik" name="nik"> Nik </label>
                        <br>
                        <input type="text" id="nik" name="nik" class="form-control" placeholder="NIK" required="">
                    </div>
                    <div class="form-group">
                        <label for="password" name="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required="">
                    </div>
                    {{-- <div class="form-group">
                        <label for="Captcha" name="Captcha"> Captcha </label>
                        <br>
                        <strong>Recapctha</strong>
                        {!! NoCaptcha::renderJs() !!}
                        {!! NoCaptcha::display() !!}

                    </div> --}}
                    <div class="form-group">
                        <div class="captcha">
                            <label for="" name="">Captcha</label>
                            <br>

                            <span>{!!captcha_img('math')!!}</span>
                            <a type="button" class="btn btn-danger reload" href="/"> &#x21bb;</a>
                            {{-- <button id="reload" type="button" class="btn btn-danger reload">&#x21bb;</button> --}}


                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" name="password">Isi Captcha</label>
                        <input type="text" name="captcha" class="form-control" placeholder="captcha" required="">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary btn-block">Log In</button>

                </form>

            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footerlogin" style="color: #e1ecea">
        <footer class="text-center text-lg-start bg-gradient-green text-muted">
            <!-- Section: Social media -->

            <!-- Section: Links  -->
            <br>
            <br>
            <br>
            <br>
            <!-- Copyright -->
            <div class="text-center p-4 " style="background-color: rgba(13, 13, 85, 0.984)7);">
               <b><a class="text-reset fw-bold"  style=" color:black ">  © 2021 Copyright: By Nazhir </a></b>
            </div>
            <!-- Copyright -->
        </footer>
    </div>
    <!-- Footer -->
    @push('myscript')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
        $('.reload').click(function(){
            $.ajax({
            type:'GET',
            url:'/reload_captcha',
            success:function(data){
                // alert('success');
            $(".captcha span").html(data.captcha);
            }
        });
            // $.ajax({
            //     type:'GET',
            //     url:'/reload_captcha',
            //     success:function(data){
            //        $(".captcha span").html(data.captcha)
            //     }
            // });
        });
    </script>
    @endpush


</body>
</html>
