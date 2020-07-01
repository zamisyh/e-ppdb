<?php 
    
     //1. Data Post Diri Calon Pendaftar
    $nama_lengkap_siswa = htmlspecialchars($_POST['nama_lengkap_siswa']);
    $jenis_kelamin_siswa = htmlspecialchars($_POST['radio_siswa']);
    $tempat_lahir_siswa = htmlspecialchars($_POST['tempat_lahir']);
    $tanggal_lahir = htmlspecialchars($_POST['tanggal_lahir']);
    $nik = htmlspecialchars($_POST['nik']);
    $no_telp_siswa = htmlspecialchars($_POST['no_telp_siswa']);
    $email_siswa = htmlspecialchars($_POST['email_siswa']);
    $agama = htmlspecialchars($_POST['agama']);
    $kode_pendaftar = $sessionKodePendaftar;

    //2. Data Alamat
    $alamat_siswa = htmlspecialchars($_POST['alamat_siswa']);
    $longitude = htmlspecialchars($_POST['longitude']);
    $latitude = htmlspecialchars($_POST['latitude']);
    $link_url = htmlspecialchars($_POST['link_url']);
    // $kode_pos = htmlspecialchars($_POST['kode_pos']);

    //3. Data Asal Sekolah
    $asal_sekolah = htmlspecialchars($_POST['asal_sekolah']);
    $nama_kepala_sekolah = htmlspecialchars($_POST['nama_kepala_sekolah']);
    $tahun_lulus = htmlspecialchars($_POST['tahun_lulus']);
    $nem = htmlspecialchars($_POST['nem']);
    $alamat_sekolah = htmlspecialchars($_POST['alamat_sekolah']);
    $nis = htmlspecialchars($_POST['nis']);
    $nisn = htmlspecialchars($_POST['nisn']);
    $status_sekolah = htmlspecialchars($_POST['status_sekolah']);

    //4. Data Ortu
    $jurusan1 = htmlspecialchars($_POST['jurusan1']);
    $jurusan2 = htmlspecialchars($_POST['jurusan2']);


    //5. Status Pendaftaran First Register = Proses
    $status = 'pengecekan';


 ?>