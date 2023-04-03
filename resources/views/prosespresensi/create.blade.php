@extends('layout.presensi')

@section('header')
<div class="appHeader bg-success text-light">
    <div class="left">

    </div>
    <div class="pageTitle">Halaman Presensi</div>
    <div class="right"></div>
</div>
<style>
    .webcam-capture,
    .webcam-capture video {

        display: inline-block;
        width: 100% !important;
        margin: auto !important;
        height: auto !important;
        border-radius: 15px;
    }

    #map {
        height: 150px;

    }

    #takeabsen {}
</style>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
@endsection

@section('content')

<div class="row" style="margin-top: 90px">
    <div class="col">
        <input type="hidden" id="lokasi">
                <div class="webcam-capture"></div>




    </div>
</div>
<div class="row">
    <div class="col">
        <br>
        @if ($cek>0)
             @if (!$cekpresensi)
                <button id="takeabsen" class="btn btn-danger btn-block">
                    <ion-icon name="camera-outline"></ion-icon>
                    Presensi Pulang
                </button>
             @else

             @endif

        @else
             {{-- @if($presensihariini != null )
             <input id="masuk" type="time" value="{{$presensihariini->jam_in}}">
             @endif --}}
        {{-- <input id="waktumasuk" hidden type="time" > --}}

        <button id="takeabsen" class="btn btn-primary btn-block">
            <ion-icon name="camera-outline"></ion-icon>
            Presensi Masuk
        </button>
        @endif

    </div>
</div>
<div class="row">
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col">
                <div id="map"></div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>

<audio id="notifikasi">
    <source src="{{asset('assets/sound/Notifikasi.mp3')}}" type="audio/mpeg">
</audio>
<audio id="notifikasipulang">
    <source src="{{asset('assets/sound/Notifpulang.mp3')}}" type="audio/mpeg">
</audio>
<script>
    var today = new Date();
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    document.getElementById('selisih').innerHTML=time;
     document.getElementById('waktumasuk').innerHTML=time;
</script>
@endsection

@push('myscript')
<script>

    var notifikasimasuk = document.getElementById('notifikasi');
    var notifikasipulang = document.getElementById('notifikasipulang');
    Webcam.set({
        width: 690,
        height: 480,
        image_format: 'jpeg',
        jpeg_quality: 80
    });

    Webcam.attach( '.webcam-capture' );
var lokasi = document.getElementById('lokasi');

if (navigator.geolocation) {
    navigator.geolocation.watchPosition(successCallback, errorCallback,{maximumAge:60000, timeout:5000, enableHighAccuracy:true});
} else {
    alert('aplikasi browser anda tidak cocok dengan sisten kami');
}
function successCallback(position) {
    lokasi.value = position.coords.latitude+","+position.coords.longitude;
    var map = L.map('map').setView([position.coords.latitude, position.coords.longitude], 16);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 18,
    attribution: ''
}).addTo(map);
var marker = L.marker([position.coords.latitude, position.coords.longitude]).addTo(map);
var circle = L.circle([-6.748188618135057, 111.03281524817187], {
    color: 'blue',
    fillColor: 'blue',
    fillOpacity: 0.5,
    radius: 500
}).addTo(map);
// var lat = position.coords.latitude;
    // var long = position.coords.longitude;
    // console.log('Your latitude is :'+lat+' and longitude is '+long);
}
function errorCallback() {

}

$("#takeabsen").click(function(e) {
Webcam.snap(function (uri) {
   image = uri;

});
// alert(image);
var lokasi = $("#lokasi").val();
$.ajax({
type:'POST',
url:'/presensi/store',
data:{
    _token:"{{csrf_token()}}",
    image: image,
    lokasi: lokasi,
},
    cache:false,
    success:function(respond){
        var status = respond.split("|");
        if (status[0]=="success") {
           if (status[2]=="in") {
            notifikasimasuk.play();
            Swal.fire({
            title: 'Succes!',
            text: status[1],
            icon: 'success',
            })
            setTimeout("location.href='/dashboard'",5000);
           }
           if (status[2]=="out") {
            notifikasipulang.play();
            Swal.fire({
            title: 'Succes!',
            text: status[1],
            icon: 'success',
            })
            setTimeout("location.href='/dashboard'",2000);
           }

        }
        else{
            Swal.fire({
            title: 'Error',
            text: 'Maaf Gagal Presensi, Silahkan Hubungi Admin',
            icon: 'error',

                    })

        }
    }
    });
});
// function take_snapshot() {
//     Webcam.snap( function(data_uri) {
//         $(".image-tag").val(data_uri);
//         document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
//     } );
// }
</script>
@endpush

