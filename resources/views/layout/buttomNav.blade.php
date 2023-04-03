

    <div class="appBottomMenu" style=" width: 100% !important;">
        <a href="/dashboard" class="item {{request()->is ('dashboard') ?'active' : ''}}">
            <div class="col">
                <ion-icon name="home-outline"></ion-icon>
                <strong>Dashboard</strong>
            </div>
        </a>
        <a href="/presensi/histori" class="item {{request()->is ('presensi/histori') ?'active' : ''}}">
            <div class="col">
                <ion-icon name="calendar-outline" role="img" class="md hydrated"
                    aria-label="calendar outline"></ion-icon>
                <strong>Histori</strong>
            </div>
        </a>
        {{-- <a href="#" class="item">
            <div class="col">
                <ion-icon name="notifications-outline"></ion-icon>
                <strong>Informasi Karyawan </strong>
            </div>
        </a> --}}
        <a href="/prosespresensi/create" class="item">
            <div class="col">
                <div class="action-button large">
                    <ion-icon name="camera" role="img" class="md hydrated" aria-label="add outline"></ion-icon>
                </div>
            </div>
        </a>
        <a href="/presensi/izin" class="item{{request()->is ('presensi/izin') ?'active' : ''}}">
            <div class="col">
                <ion-icon name="document-text-outline" role="img" class="md hydrated"
                    aria-label="document text outline"></ion-icon>
                <strong>Pengajuan Cuti</strong>
            </div>
        </a>
        <a href="/editprofil" class="item {{request()->is ('editprofil') ?'active' : ''}}">
            <div class="col">
                <ion-icon name="people-outline" role="img" class="md hydrated" aria-label="people outline"></ion-icon>
                <strong>Profile</strong>
            </div>
        </a>
    </div>


