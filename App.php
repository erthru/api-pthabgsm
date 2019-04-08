<?php

    $mod = $_GET['mod'];


    // mode

    switch($mod){

        case 'registrasi':
            $login_email = $_POST['login_email'];
            $user_nama_lengkap = $_POST['user_nama_lengkap'];
            $user_no_hp = $_POST['user_no_hp'];
            $login_pass = $_POST['login_pass'];
            $user_alamat = $_POST['user_alamat'];
            registrasi($login_email,$user_nama_lengkap,$user_no_hp,$user_alamat,$login_pass);
            break;

        case 'login':
            $login_email = $_POST['login_email'];
            $login_pass = $_POST['login_pass'];
            login($login_email,$login_pass);
            break;

        case 'update_profile':
            $user_id = $_POST['user_id'];
            $user_nama_lengkap = $_POST['user_nama_lengkap'];
            $user_alamat = $_POST['user_alamat'];
            $user_no_hp = $_POST['user_no_hp'];
            update_profile($user_id, $user_nama_lengkap, $user_alamat, $user_no_hp);
            break;

        case 'user_detail':
            $user_id = $_GET['user_id'];
            user_detail($user_id);
            break;

        case 'add_barang_servis':
            $servis_nama = $_POST['servis_nama'];
            $servis_harga = $_POST['servis_harga'];
            add_barang_servis($servis_nama,$servis_harga);
            break;

        case 'update_barang_servis':
            $servis_id = $_POST['servis_id'];
            $servis_nama = $_POST['servis_nama'];
            $servis_harga = $_POST['servis_harga'];
            update_barang_servis($servis_id,$servis_nama,$servis_harga);
            break;

        case 'delete_barang_servis':
            $servis_id = $_POST['servis_id'];
            delete_barang_servis($servis_id);
            break;

        case 'daftar_barang_servis':
            $page = $_GET['page'];
            daftar_barang_servis($page);
            break;

        case 'start_booking':
            $user_id = $_POST['user_id'];
            $dealer_id = $_POST['dealer_id'];
            $booking_jenis_servis = $_POST['booking_jenis_servis'];
            $booking_keterangan = $_POST['booking_keterangan'];
            start_booking($booking_jenis_servis, $user_id, $dealer_id, $booking_keterangan);
            break;

        case 'terima_booking':
            $booking_id = $_POST['booking_id'];
            terima_booking($booking_id);
            break;

        case 'pemilihan_part_booking':
            $booking_id = $_POST['booking_id'];
            $barang_servis_id = $_POST['barang_servis_id'];
            pemilihan_part_booking($booking_id, $barang_servis_id);
            break;

        case 'menunggu_persetujuan_booking':
            $booking_id = $_POST['booking_id'];
            $unselected_booking_item_id = $_POST['unselected_booking_item_id'];
            menunggu_persetujuan_booking($booking_id, $unselected_booking_item_id);
            break;

        case 'dalam_pengerjaan_booking':
            $booking_id = $_POST['booking_id'];
            dalam_pengerjaan_booking($booking_id);
            break;

        case 'selesai_booking':
            $booking_id = $_POST['booking_id'];
            selesai_booking($booking_id);
            break;

        case 'ditolak_booking':
            $booking_id = $_POST['booking_id'];
            ditolak_booking($booking_id);
            break;

        case 'daftar_booking_user':
            $user_id = $_GET['user_id'];
            $page = $_GET['page'];
            daftar_booking_user($user_id,$page);
            break;

        case 'riwayat_booking_user':
            $user_id = $_GET['user_id'];
            $page = $_GET['page'];
            riwayat_booking_user($user_id,$page);
            break;

        case 'riwayat_booking_user_date_filter':
            $user_id = $_GET['user_id'];
            $page = $_GET['page'];
            $date_b = $_GET['date_b'];
            $date_a = $_GET['date_a'];
            riwayat_booking_user_date_filter($user_id,$page,$date_b,$date_a);
            break;

        case 'daftar_booking_item':
            $booking_id = $_GET['booking_id'];
            daftar_booking_item($booking_id);
            break;

        case 'daftar_booking_status':
            $booking_id = $_GET['booking_id'];
            daftar_booking_status($booking_id);
            break;

        case 'report_user':
            $user_id = $_GET['user_id'];
            report_user($user_id);
            break;

        default:
            bad_request();
            break;

    }


    // fungsi

    function db(){
        return mysqli_connect('localhost','root','','db_pthabgsm');
    }

    function required_field(){
        $response['error']=true;
        $response['pesan']='Field tidak boleh kosong.';
        echo json_encode($response);
    }

    function bad_request(){
        $response['error']=true;
        $response['pesan']='Request bermasalah.';
        echo json_encode($response);
    }


    function registrasi($login_email,$user_nama_lengkap,$user_no_hp,$user_alamat,$login_pass){

        if(empty($login_email) || empty($user_nama_lengkap) || empty($user_no_hp) || empty($login_pass) || empty($user_alamat)){
            required_field();
        }else{

            $cek = mysqli_query(db(),"SELECT login_email FROM tb_login WHERE login_email='$login_email'");

            if(mysqli_num_rows($cek) > 0){
                $response['error']=true;
                $response['pesan']='Email telah terdaftar.';
                echo json_encode($response);
            }else{
                $reg0 = mysqli_query(db(),"INSERT INTO tb_user (user_nama_lengkap,user_alamat,user_no_hp,user_updated_at) VALUES ('$user_nama_lengkap','$user_alamat','$user_no_hp',now())");

                $get_id = mysqli_query(db(),"SELECT MAX(user_id) as user_id FROM tb_user");

                $user_id = mysqli_fetch_assoc($get_id)['user_id'];

                $reg1 = mysqli_query(db(),"INSERT INTO tb_login (login_email,login_pass,login_lvl,user_id) VALUES ('$login_email','$login_pass','USER','$user_id')");

                $response['error']=false;
                $response['pesan']='Registrasi berhasil.';
                echo json_encode($response);
            }

        }

    }

    function login($login_email, $login_pass){

        if(empty($login_email) || empty($login_pass)){
            required_field();
        }else{

            $login = mysqli_query(db(),"SELECT * FROM tb_login WHERE login_email='$login_email' AND login_pass='$login_pass'");

            if(mysqli_num_rows($login) > 0){

                $row_login = mysqli_fetch_assoc($login);
                $user_id = $row_login['user_id'];
                $user_email = $row_login['login_email'];

                $user = mysqli_query(db(),"SELECT * FROM tb_user WHERE user_id='$user_id'");
                $row_user = mysqli_fetch_assoc($user);
                $user_nama_lengkap = $row_user['user_nama_lengkap'];
                $user_alamat = $row_user['user_alamat'];
                $user_no_hp = $row_user['user_no_hp'];

                $response['error']=false;
                $response['pesan']='Login sukses.';
                $response['user']['user_id']=$user_id;
                $response['user']['user_email']=$user_email;
                $response['user']['user_nama_lengkap']=$user_nama_lengkap;
                $response['user']['user_alamat']=$user_alamat;
                $response['user']['user_no_hp']=$user_no_hp;

                echo json_encode($response);

            }else{
                $response['error']=true;
                $response['pesan']='Login gagal, Email atau Password salah.';
                echo json_encode($response);
            }

        }

    }

    function update_profile($user_id, $user_nama_lengkap, $user_alamat, $user_no_hp){

        if(empty($user_nama_lengkap) || empty($user_alamat) || empty($user_no_hp) || empty($user_id)){
            required_field();
        }else{

            $update = mysqli_query(db(),"UPDATE tb_user SET user_nama_lengkap = '$user_nama_lengkap', user_alamat='$user_alamat', user_no_hp = '$user_no_hp', user_updated_at = now() WHERE user_id = '$user_id'");

            $response['error']=false;
            $response['pesan']='Profil diperbarui';
            echo json_encode($response);

        }

    }

    function add_barang_servis($servis_nama, $servis_harga){

        if(empty($servis_nama) || empty($servis_harga)){
            required_field();
        }else{

            $add = mysqli_query(db(),"INSERT INTO tb_barang_servis (barang_servis_nama,barang_servis_harga,barang_servis_updated_at) VALUES ('$servis_nama','$servis_harga',now())");

            $response['error']=false;
            $response['pesan']='Barang servis ditambahkan.';
            echo json_encode($response);

        }

    }

    function update_barang_servis($servis_id, $servis_nama, $servis_harga){

        if(empty($servis_id) || empty($servis_nama) || empty($servis_harga)){
            required_field();
        }else{

            $update = mysqli_query(db(),"UPDATE tb_barang_servis SET barang_servis_nama='$servis_nama', barang_servis_harga='$servis_harga', barang_servis_updated_at = now() WHERE barang_servis_id='$servis_id'");

            $response['error']=false;
            $response['pesan']='Barang servis diperbarui.';
            echo json_encode($response);

        }

    }

    function delete_barang_servis($servis_id){

        if(empty($servis_id)){
            required_field();
        }else{

            $del = mysqli_query(db(),"DELETE FROM tb_barang_servis WHERE barang_servis_id = '$servis_id'");

            $response['error']=false;
            $response['pesan']='Barang servis dihapus';
            echo json_encode($response);

        }

    }

    function daftar_barang_servis($page){
        if(empty($page)){
            required_field();
        }else{

            $limit = 10;
            $limit_start = ($page - 1) * $limit; 

            $daftar = mysqli_query(db(),"SELECT * FROM tb_barang_servis ORDER BY barang_servis_id DESC LIMIT $limit_start,$limit");

            $result = array();

            while($row = mysqli_fetch_assoc($daftar)){
                $result[] = $row;
            }

            $response['error']=false;
            $response['pesan']='Sukses';
            $response['daftar_barang_servis']=$result;
            echo json_encode($response);

        }
    }

    function start_booking($booking_jenis_servis, $user_id, $dealer_id, $booking_keterangan){

        if(empty($user_id) || empty($dealer_id) || empty($booking_jenis_servis) || empty($booking_keterangan)){
            required_field();
        }else{

            $book = mysqli_query(db(), "INSERT INTO tb_booking (booking_jenis_servis,booking_keterangan,booking_created_at,user_id,dealer_id) VALUES ('$booking_jenis_servis', '$booking_keterangan',now(), '$user_id', '$dealer_id')");

            $book_id = mysqli_fetch_assoc(mysqli_query(db(), "SELECT MAX(booking_id) as booking_id FROM tb_booking"))['booking_id'];

            $book_stat = mysqli_query(db(),"INSERT INTO tb_booking_status (booking_status_created_at,booking_id) VALUES (now(),'$book_id')");

            $response['error']=false;
            $response['pesan']='Booking dibuat.';
            echo json_encode($response);

        }

    }

    function terima_booking($booking_id){

        if(empty($booking_id)){
            required_field();
        }else{

            $appr = mysqli_query(db(), "INSERT INTO tb_booking_status (booking_status_created_at,booking_status_stat,booking_id) VALUES (now(),'DITERIMA','$booking_id')");

            $response['error']=false;
            $response['pesan']='Booking diterima.';
            echo json_encode($response);

        }

    }


    function pemilihan_part_booking($booking_id, $barang_servis_id){

        if(empty($booking_id) || empty($barang_servis_id)){
            required_field();
        }else{

            $barang_servis_id_arr = explode(',',rtrim($barang_servis_id,','));
            
            for($i=0; $i<count($barang_servis_id_arr); $i++){

                $book_item = mysqli_query(db(), "INSERT INTO tb_booking_item (booking_id,barang_servis_id) VALUES ('$booking_id','$barang_servis_id_arr[$i]')");

            }

            $ppb = mysqli_query(db(), "INSERT INTO tb_booking_status (booking_status_created_at,booking_status_stat,booking_id) VALUES (now(),'PEMILIHAN PART','$booking_id')");

            $response['error']=false;
            $response['pesan']='Pemilihan part untuk user diset. Menunggu user memilih part yang akan diservis.';
            echo json_encode($response);

        }

    }


    function menunggu_persetujuan_booking($booking_id, $unselected_booking_item_id){

        if(empty($booking_id)){
            required_field();
        }else{

            $unselected_booking_item_id_arr = explode(',',rtrim($unselected_booking_item_id,','));
            
            $get_item_lenght = mysqli_query(db(), "SELECT COUNT(*) AS lenght FROM tb_booking_item WHERE booking_id = '$booking_id'");
            $item_lenght = mysqli_fetch_assoc($get_item_lenght)['lenght'];

            if(count($unselected_booking_item_id_arr) >= (int)$item_lenght){
                $response['error']=true;
                $response['pesan']='Pemilihan salah.';
                echo json_encode($response);
            }else{

                for($i=0; $i<count($unselected_booking_item_id_arr); $i++){

                    $set_item = mysqli_query(db(), "UPDATE tb_booking_item SET booking_item_status='DITOLAK' WHERE booking_item_id = '$unselected_booking_item_id_arr[$i]'");

                }

                $ppb = mysqli_query(db(), "INSERT INTO tb_booking_status (booking_status_created_at,booking_status_stat,booking_id) VALUES (now(),'MENUNGGU PERSETUJUAN','$booking_id')");

                $response['error']=false;
                $response['pesan']='Pemilihan part diset. Menunggu persetujuan dari pihak dealer.';
                echo json_encode($response);


            }

        }

    }

    
    function dalam_pengerjaan_booking($booking_id){

        if(empty($booking_id)){
            required_field();
        }else{

            $ppb = mysqli_query(db(), "INSERT INTO tb_booking_status (booking_status_created_at,booking_status_stat,booking_id) VALUES (now(),'DALAM PENGERJAAN','$booking_id')");

            $response['error']=false;
            $response['pesan']='Booking dalam pengerjaan.';
            echo json_encode($response);

        }

    }

    function selesai_booking($booking_id){

        if(empty($booking_id)){
            required_field();
        }else{

            $ppb = mysqli_query(db(), "INSERT INTO tb_booking_status (booking_status_created_at,booking_status_stat,booking_id) VALUES (now(),'SELESAI','$booking_id')");

            $response['error']=false;
            $response['pesan']='Booking selesai.';
            echo json_encode($response);

        }

    }

    function ditolak_booking($booking_id){

        if(empty($booking_id)){
            required_field();
        }else{

            $ppb = mysqli_query(db(), "INSERT INTO tb_booking_status (booking_status_created_at,booking_status_stat,booking_id) VALUES (now(),'DITOLAK','$booking_id')");

            $response['error']=false;
            $response['pesan']='Booking ditolak.';
            echo json_encode($response);

        }

    }

    function daftar_booking_user($user_id,$page){

        if(empty($user_id)){
            required_field();
        }else{

            $limit = 10;
            $limit_start = ($page - 1) * $limit; 

            $bu = mysqli_query(db(), "
            SELECT tb_booking.*,
            tb_dealer.*,
            tb_user.*,
            (SELECT booking_status_stat FROM tb_booking_status WHERE booking_status_id = (SELECT MAX(tb_booking_status.booking_status_id) FROM tb_booking_status WHERE booking_id = tb_booking.booking_id)) AS last_status  
            
            FROM tb_booking 
            
            LEFT JOIN tb_dealer ON tb_dealer.dealer_id = tb_booking.dealer_id 
            LEFT JOIN tb_user ON tb_user.user_id = tb_booking.user_id 
            
            WHERE tb_booking.user_id = '$user_id' AND (SELECT booking_status_stat FROM tb_booking_status WHERE booking_status_id = (SELECT MAX(tb_booking_status.booking_status_id) FROM tb_booking_status WHERE booking_id = tb_booking.booking_id)) != 'SELESAI' AND (SELECT booking_status_stat FROM tb_booking_status WHERE booking_status_id = (SELECT MAX(tb_booking_status.booking_status_id) FROM tb_booking_status WHERE booking_id = tb_booking.booking_id)) != 'DITOLAK'
            
            ORDER BY tb_booking.booking_id DESC

            LIMIT $limit_start,$limit
            
            ");

            $result = array();

            while($row = mysqli_fetch_assoc($bu)){
                $result[] = $row;
            }

            $get_user_name = mysqli_fetch_assoc(mysqli_query(db(),"SELECT user_nama_lengkap FROM tb_user WHERE user_id = '$user_id'"))['user_nama_lengkap'];

            $response['error']=false;
            $response['pesan']='Data booking user '.$get_user_name;
            $response['data_booking_user']=$result;
            echo json_encode($response);

        }

    }

    function riwayat_booking_user($user_id,$page){

        if(empty($user_id)){
            required_field();
        }else{

            $limit = 10;
            $limit_start = ($page - 1) * $limit; 

            $bu = mysqli_query(db(), "
            SELECT tb_booking.*,
            tb_dealer.*,
            tb_user.*, 
            (SELECT booking_status_stat FROM tb_booking_status WHERE booking_status_id = (SELECT MAX(tb_booking_status.booking_status_id) FROM tb_booking_status WHERE booking_id = tb_booking.booking_id)) AS last_status 
            
            FROM tb_booking 
            
            LEFT JOIN tb_dealer ON tb_dealer.dealer_id = tb_booking.dealer_id 
            LEFT JOIN tb_user ON tb_user.user_id = tb_booking.user_id 
            LEFT JOIN tb_booking_status ON tb_booking_status.booking_id = tb_booking.booking_id 
            
            WHERE tb_booking.user_id = '$user_id' AND ((SELECT booking_status_stat FROM tb_booking_status WHERE booking_status_id = (SELECT MAX(tb_booking_status.booking_status_id) FROM tb_booking_status WHERE booking_id = tb_booking.booking_id)) = 'SELESAI' OR (SELECT booking_status_stat FROM tb_booking_status WHERE booking_status_id = (SELECT MAX(tb_booking_status.booking_status_id) FROM tb_booking_status WHERE booking_id = tb_booking.booking_id)) = 'DITOLAK')  
            
            GROUP BY tb_booking.booking_id 
            
            ORDER BY tb_booking.booking_id DESC 

            LIMIT $limit_start,$limit
            
            ");

            $result = array();

            while($row = mysqli_fetch_assoc($bu)){
                $result[] = $row;
            }

            $get_user_name = mysqli_fetch_assoc(mysqli_query(db(),"SELECT user_nama_lengkap FROM tb_user WHERE user_id = '$user_id'"))['user_nama_lengkap'];

            $response['error']=false;
            $response['pesan']='Riwayat booking user '.$get_user_name;
            $response['riwayat_booking_user']=$result;
            echo json_encode($response);

        }

    }

    function riwayat_booking_user_date_filter($user_id,$page,$date_b,$date_a){

        if(empty($user_id)){
            required_field();
        }else{

            $limit = 10;
            $limit_start = ($page - 1) * $limit; 

            $bu = mysqli_query(db(), "
            SELECT tb_booking.*,
            tb_dealer.*,
            tb_user.*, 
            (SELECT booking_status_stat FROM tb_booking_status WHERE booking_status_id = (SELECT MAX(tb_booking_status.booking_status_id) FROM tb_booking_status WHERE booking_id = tb_booking.booking_id)) AS last_status 
            
            FROM tb_booking 
            
            LEFT JOIN tb_dealer ON tb_dealer.dealer_id = tb_booking.dealer_id 
            LEFT JOIN tb_user ON tb_user.user_id = tb_booking.user_id 
            LEFT JOIN tb_booking_status ON tb_booking_status.booking_id = tb_booking.booking_id 
            
            WHERE tb_booking.user_id = '$user_id' 
            AND ((SELECT booking_status_stat FROM tb_booking_status WHERE booking_status_id = (SELECT MAX(tb_booking_status.booking_status_id) FROM tb_booking_status WHERE booking_id = tb_booking.booking_id)) = 'SELESAI' OR (SELECT booking_status_stat FROM tb_booking_status WHERE booking_status_id = (SELECT MAX(tb_booking_status.booking_status_id) FROM tb_booking_status WHERE booking_id = tb_booking.booking_id)) = 'DITOLAK') 
            AND (DATE(tb_booking.booking_created_at) BETWEEN '$date_b' AND '$date_a')  
            
            GROUP BY tb_booking.booking_id 
            
            ORDER BY tb_booking.booking_id DESC 

            LIMIT $limit_start,$limit
            
            ");

            $result = array();

            while($row = mysqli_fetch_assoc($bu)){
                $result[] = $row;
            }

            $get_user_name = mysqli_fetch_assoc(mysqli_query(db(),"SELECT user_nama_lengkap FROM tb_user WHERE user_id = '$user_id'"))['user_nama_lengkap'];

            $response['error']=false;
            $response['pesan']='Riwayat booking user '.$get_user_name;
            $response['riwayat_booking_user']=$result;
            echo json_encode($response);

        }

    }

    function daftar_booking_item($booking_id){

        if(empty($booking_id)){
            required_field();
        }else{

            $bi = mysqli_query(db(), "
            SELECT tb_booking_item.*,
            tb_barang_servis.* 
            
            FROM tb_booking_item 
            
            LEFT JOIN tb_barang_servis ON tb_barang_servis.barang_servis_id = tb_booking_item.barang_servis_id 
            
            WHERE tb_booking_item.booking_id = '$booking_id' AND tb_booking_item.booking_item_status = 'DIPILIH' 
            
            ORDER BY tb_booking_item.booking_item_id DESC
            
            ");

            $result = array();

            while($row = mysqli_fetch_assoc($bi)){
                $result[] = $row;
            }

            $response['error']=false;
            $response['status']='Sukses';
            $response['booking_item']=$result;
            echo json_encode($response);

        }

    }

    function daftar_booking_status($booking_id){

        if(empty($booking_id)){
            required_field();
        }else{

            $bs = mysqli_query(db(), "SELECT * FROM tb_booking_status WHERE booking_id = '$booking_id' ORDER BY booking_status_id DESC");

            $result = array();

            while($row = mysqli_fetch_assoc($bs)){
                $result[] = $row;
            }

            $response['error']=false;
            $response['status']='Sukses';
            $response['booking_status']=$result;
            echo json_encode($response);

        }

    }

    function report_user($user_id){

        if(empty($user_id)){
            required_field();
        }else{

            $total_pesanan = mysqli_fetch_assoc(mysqli_query(db(),"SELECT COUNT(*) as total_pesanan FROM tb_booking WHERE user_id='$user_id'"))['total_pesanan'];

            $today_pesanan = mysqli_fetch_assoc(mysqli_query(db(),"SELECT COUNT(*) as today_pesanan FROM tb_booking WHERE DATE(booking_created_at) = CURDATE() AND user_id='$user_id'"))['today_pesanan'];

            $servis_berjalan = mysqli_num_rows(mysqli_query(db(),"SELECT a.booking_id FROM tb_booking a WHERE a.user_id = '$user_id' AND (SELECT MAX(booking_status_stat) FROM tb_booking_status WHERE booking_id = a.booking_id) != 'SELESAI'"));

            $servis_selesai = mysqli_num_rows(mysqli_query(db(),"SELECT a.booking_id FROM tb_booking a WHERE a.user_id = '$user_id' AND (SELECT MAX(booking_status_stat) FROM tb_booking_status WHERE booking_id = a.booking_id) = 'SELESAI'"));

            $response['error']=false;
            $response['status']='Sukses';
            $response['report_user']['total_pesanan']=(int)$total_pesanan;
            $response['report_user']['today_pesanan']=(int)$today_pesanan;
            $response['report_user']['servis_berjalan']=$servis_berjalan;
            $response['report_user']['servis_selesai']=$servis_selesai;
            echo json_encode($response);

        }

    }

    function user_detail($user_id){

        if(empty($user_id)){
            required_field();
        }else{

            $user = mysqli_query(db(),"SELECT tb_user.*, tb_login.* FROM tb_user LEFT JOIN tb_login ON tb_login.user_id = tb_user.user_id WHERE tb_user.user_id='$user_id'");
            $row = mysqli_fetch_assoc($user);

            $id = $row['user_id'];
            $nama_lengkap = $row['user_nama_lengkap'];
            $alamat = $row['user_alamat'];
            $nohp = $row['user_no_hp'];
            $created_at = $row['user_created_at'];
            $updated_at = $row['user_updated_at'];
            $email = $row['login_email'];

            $response['error']=false;
            $response['pesan']='Sukses';
            $response['user']['user_id']=$id;
            $response['user']['user_nama_lengkap'] = $nama_lengkap;
            $response['user']['user_alamat'] = $alamat;
            $response['user']['user_no_hp'] = $nohp;
            $response['user']['user_created_at'] = $created_at;
            $response['user']['user_updated_at'] = $updated_at;
            $response['user']['login_email'] = $email;
            echo json_encode($response);

        }

    }

?>