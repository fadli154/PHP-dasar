<?php 
    // melakukan koneksi dengan mysql
    $conn = mysqli_connect("localhost", "root", "", "datadik1");

    function query($query){
        global $conn;
        // melakukan query menampilkan 
        $result = mysqli_query($conn, $query);

        $rows = [];
        while( $data = mysqli_fetch_assoc($result) ){
            $rows[] = $data;
        }

        return $rows;
    }

    function tambah($data){
        global $conn;

        $nisn = htmlspecialchars($data["nisn"]);
        $nm_siswa = htmlspecialchars($data["nm_siswa"]);
        $kelas = htmlspecialchars($data["kelas"]) ;
        $jurusan = htmlspecialchars($data["Jurusan"]) ;

        $query = "INSERT INTO data_peserta_didik VALUES('', '$nisn', '$nm_siswa', '$kelas', '$jurusan')";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }
    
    function Ubah($data){
        global $conn;

        $nisn = htmlspecialchars($data["nisn"]);
        $nm_siswa = htmlspecialchars($data["nm_siswa"]);
        $kelas = htmlspecialchars($data["kelas"]) ;
        $jurusan = htmlspecialchars($data["Jurusan"]) ;

        $query = "UPDATE data_peserta_didik SET nm_siswa = '$nm_siswa', kelas = '$kelas', Jurusan = '$jurusan' WHERE  nisn = '$nisn'";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function cari($keyword){
        $query = "SELECT * FROM data_peserta_didik
            WHERE 
        nm_siswa LIKE '%$keyword%' OR
        nisn LIKE '%$keyword%' OR
        kelas LIKE '%$keyword%' OR
        Jurusan LIKE '%$keyword%' 
        ";

        return query($query);
    }

    function registrasi($data){
        global $conn;

        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $password2 = mysqli_real_escape_string($conn, $data["password2"]);

        // cek username sudah ada atau belum
        $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

        if( mysqli_fetch_assoc($result) ){
            echo "<script>
                    alert('username sudah terdaftar !');
                    </script>
            ";

            return false;
        }

        // cek koonfirmasi password
        if( $password !== $password2 ){
            echo "<script>
                    alert('Password koonfirmasi salah!');
                </script>";

            return false;
        }

        // enkripsi password agar mengacak password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // tambahkan userbaru ke database
        mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

        return mysqli_affected_rows($conn);
    }
?>