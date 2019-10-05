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

        case 'login_user':
            $login_email = $_POST['login_email'];
            $login_pass = $_POST['login_pass'];
            login_user($login_email,$login_pass);
            break;

        case 'login_admin':
            $login_email = $_POST['login_email'];
            $login_pass = $_POST['login_pass'];
            login_admin($login_email,$login_pass);
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

        case 'user_all':
            $page = $_GET['page'];
            user_all($page);
            break;

        case 'user_search':
            $q = $_GET['q'];
            user_search($q);
            break;

        case 'user_delete':
            $user_id = $_GET['user_id'];
            user_delete($user_id);
            break;

        case 'add_barang_servis':
            $servis_nama = $_POST['servis_nama'];
            $servis_harga = $_POST['servis_harga'];
            $servis_kategori = $_POST['servis_kategori'];
            add_barang_servis($servis_nama,$servis_harga,$servis_kategori);
            break;

        case 'update_barang_servis':
            $servis_id = $_POST['servis_id'];
            $servis_nama = $_POST['servis_nama'];
            $servis_harga = $_POST['servis_harga'];
            $servis_kategori = $_POST['servis_kategori'];
            update_barang_servis($servis_id,$servis_nama,$servis_harga,$servis_kategori);
            break;

        case 'delete_barang_servis':
            $servis_id = $_POST['servis_id'];
            delete_barang_servis($servis_id);
            break;

        case 'daftar_barang_servis':
            $page = $_GET['page'];
            daftar_barang_servis($page);
            break;
            
        case 'daftar_barang_servis_by_jenis':
            $jenis = $_GET['jenis'];
            $page = $_GET['page'];
            daftar_barang_servis_by_jenis($jenis,$page);
            break;
            
        case 'daftar_barang_servis_by_jenis_non_paging':
            $jenis = $_GET['jenis'];
            daftar_barang_servis_by_jenis_non_paging($jenis);
            break;

        case 'search_barang_servis':
            $q = $_GET['q'];
            search_barang_servis($q);
            break;

        case 'start_booking':
            $user_id = $_POST['user_id'];
            $dealer_id = $_POST['dealer_id'];
            $booking_jenis_servis = $_POST['booking_jenis_servis'];
            $booking_model_kendaraan = $_POST['booking_model_kendaraan'];
            $booking_vincode = $_POST['booking_vincode'];
            $booking_km = $_POST['booking_km'];
            $booking_no_polisi = $_POST['booking_no_polisi'];
            $booking_jadwal_servis = $_POST['booking_jadwal_servis'];
            $booking_keterangan = $_POST['booking_keterangan'];
            start_booking($booking_jenis_servis, $booking_model_kendaraan, $booking_vincode, $booking_km, $booking_no_polisi, $booking_jadwal_servis, $user_id, $dealer_id, $booking_keterangan);
            break;

        case 'terima_booking':
            $booking_id = $_POST['booking_id'];
            terima_booking($booking_id);
            break;

        case 'pemilihan_part_booking':
            $booking_id = $_POST['booking_id'];
            $barang_servis_id = $_POST['barang_servis_id'];
            $booking_biaya = $_POST['booking_biaya'];
            pemilihan_part_booking($booking_id, $barang_servis_id, $booking_biaya);
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

        case 'daftar_booking_detail':
            $booking_id = $_GET['booking_id'];
            daftar_booking_detail($booking_id);
            break;

        case 'daftar_booking_all':
            $page = $_GET['page'];
            daftar_booking_all($page);
            break;

        case 'daftar_booking_all_date_filter':
            $page = $_GET['page'];
            $date_b = $_GET['date_b'];
            $date_a = $_GET['date_a'];
            daftar_booking_all_date_filter($page,$date_a,$date_b);
            break;

        case 'search_booking_all':
            $q = $_GET['q'];
            search_booking_all($q);
            break;
            
        case 'riwayat_booking_all':
            $date_b = $_GET['date_b'];
            $date_a = $_GET['date_a'];
            riwayat_booking_all($date_b, $date_a);
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

        case 'save_user_token':
            $user_id = $_POST['user_id'];
            $token = $_POST['token'];
            save_user_token($user_id,$token);
            break;

        case 'remove_user_token':
            $user_id = $_POST['user_id'];
            remove_user_token($user_id);
            break;

        case 'send_notification_to_user':
            $user_id = $_GET['user_id'];
            $message = $_GET['message'];
            send_notification_to_user($user_id,$message);
            break;

        case 'admin_home_report':
            admin_home_report();
            break;

        case 'booking_ditolak':
            $booking_id = $_GET['booking_id'];
            booking_ditolak($booking_id);
            break;

        case 'set_alasan_booking_ditolak':
            $booking_id = $_POST['booking_id'];
            $alasan = $_POST['alasan'];
            set_alasan_booking_ditolak($booking_id,$alasan);
            break;

        case 'daftar_tahun':
            daftar_tahun();
            break;

        case 'laporan':
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            laporan($bulan,$tahun);
            break;
            
        case 'alert_per_enam_bulan':
            alert_per_enam_bulan();
            break;
            
        case 'alert_batas_waktu':
            alert_batas_waktu();
            break;
            
        case 'add_notification':
            $body = $_POST['body'];
            $dealer_id = $_POST['dealer_id'];
            add_notification($body, $dealer_id);
            break;
            
        case 'load_notification':
            $page = $_GET['page'];
            $dealer_id = $_GET['dealer_id'];
            load_notification($page, $dealer_id);
            break;   
            
        case 'add_teknisi':
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            add_teknisi($nama, $email, $password);
            break;
            
        case 'update_teknisi':
            $id = $_POST['id'];
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            update_teknisi($id, $nama, $email);
            break;
            
        case 'update_password_teknisi':
            $id = $_POST['id'];
            $password = $_POST['password'];
            update_password_teknisi($id, $password);
            break;
            
        case 'delete_teknisi':
            $id = $_POST['id'];
            delete_teknisi($id);
            break;
            
        case 'login_teknisi':
            $email = $_POST['email'];
            $password = $_POST['password'];
            login_teknisi($email, $password);
            break;
            
        case 'get_teknisi':
            $id = $_GET['id'];
            get_teknisi($id);
            break;
            
        case 'list_teknisi':
            $page = $_GET['page'];
            list_teknisi($page);
            break;
            
        case 'list_booking_for_teknisi':
            $page = $_GET['page'];
            list_booking_for_teknisi($page);
            break;
            
        case 'set_teknisi':
            $booking_id = $_POST['booking_id'];
            $teknisi_id = $_POST['teknisi_id'];
            set_teknisi($booking_id, $teknisi_id);
            break;
            
        case 'send_notification_topic':
            $topic = $_POST['topic'];
            $message = $_POST['message'];
            send_notification_topic($topic,$message);
            break;
            
        case 'daftar_notifikasi_admin':
            daftar_notifikasi_admin();
            break;
            
        case 'baca_notifikasi_admin':
            baca_notifikasi_admin();
            break;

        default:
            bad_request();
            break;

    }


    // fungsi

    function db(){
        return mysqli_connect('localhost','erthrupr_root','Y5q2uiwvst','erthrupr_pthabgsm');
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

    function login_user($login_email, $login_pass){

        if(empty($login_email) || empty($login_pass)){
            required_field();
        }else{

            $login = mysqli_query(db(),"SELECT * FROM tb_login WHERE login_email='$login_email' AND login_pass='$login_pass' AND login_lvl='USER'");

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

    function login_admin($login_email, $login_pass){

        if(empty($login_email) || empty($login_pass)){
            required_field();
        }else{

            $login = mysqli_query(db(),"SELECT * FROM tb_login WHERE login_email='$login_email' AND login_pass='$login_pass' AND login_lvl='ADMIN'");

            if(mysqli_num_rows($login) > 0){

                $row_login = mysqli_fetch_assoc($login);
                $dealer_id = $row_login['dealer_id'];
                $admin_email = $row_login['login_email'];

                $dealer = mysqli_query(db(),"SELECT * FROM tb_dealer WHERE dealer_id='$dealer_id'");
                $row_dealer = mysqli_fetch_assoc($dealer);
                $dealer_nama = $row_dealer['dealer_nama'];
                $dealer_alamat = $row_dealer['dealer_alamat'];

                $response['error']=false;
                $response['pesan']='Login sukses.';
                $response['dealer']['dealer_id']=$dealer_id;
                $response['dealer']['admin_email']=$admin_email;
                $response['dealer']['dealer_nama']=$dealer_nama;
                $response['dealer']['dealer_alamat']=$dealer_alamat;

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

    function user_delete($user_id){
        if(empty($user_id)){
            required_field();
        }else{
            $delete = mysqli_query(db(),"DELETE FROM tb_user WHERE user_id='$user_id'");
            $response['error']=false;
            $response['pesan']='Pengguna dihapus';
            echo json_encode($response);
        }
    }

    function add_barang_servis($servis_nama, $servis_harga, $servis_kategori){

        if(empty($servis_nama) || $servis_harga == "" || empty($servis_kategori)){
            required_field();
        }else{

            $add = mysqli_query(db(),"INSERT INTO tb_barang_servis (barang_servis_nama,barang_servis_harga,barang_servis_kategori,barang_servis_updated_at) VALUES ('$servis_nama','$servis_harga','$servis_kategori',now())");

            $response['error']=false;
            $response['pesan']='Sparepart servis ditambahkan.';
            echo json_encode($response);

        }

    }

    function update_barang_servis($servis_id, $servis_nama, $servis_harga, $servis_kategori){

        if(empty($servis_id) || empty($servis_nama) || $servis_harga == "" || empty($servis_kategori)){
            required_field();
        }else{

            $update = mysqli_query(db(),"UPDATE tb_barang_servis SET barang_servis_nama='$servis_nama', barang_servis_harga='$servis_harga', barang_servis_kategori='$servis_kategori', barang_servis_updated_at = now() WHERE barang_servis_id='$servis_id'");

            $response['error']=false;
            $response['pesan']='Sparepart servis diperbarui.';
            echo json_encode($response);

        }

    }

    function delete_barang_servis($servis_id){

        if(empty($servis_id)){
            required_field();
        }else{

            $del = mysqli_query(db(),"DELETE FROM tb_barang_servis WHERE barang_servis_id = '$servis_id'");

            $response['error']=false;
            $response['pesan']='Sparepart servis dihapus';
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
            $total = mysqli_fetch_assoc(mysqli_query(db(),"SELECT COUNT(*) AS total FROM tb_barang_servis"))['total'];

            $result = array();

            while($row = mysqli_fetch_assoc($daftar)){
                $result[] = $row;
            }

            $response['error']=false;
            $response['pesan']='Sukses';
            $response['total']=$total;
            $response['daftar_barang_servis']=$result;
            echo json_encode($response);

        }
    }
    
    function daftar_barang_servis_by_jenis($jenis,$page){
        if(empty($page) || empty($jenis)){
            required_field();
        }else{

            $limit = 10;
            $limit_start = ($page - 1) * $limit; 

            $daftar = mysqli_query(db(),"SELECT * FROM tb_barang_servis WHERE barang_servis_kategori = '$jenis' ORDER BY barang_servis_id DESC LIMIT $limit_start,$limit");
            $total = mysqli_fetch_assoc(mysqli_query(db(),"SELECT COUNT(*) AS total FROM tb_barang_servis WHERE barang_servis_kategori = '$jenis'"))['total'];

            $result = array();

            while($row = mysqli_fetch_assoc($daftar)){
                $result[] = $row;
            }

            $response['error']=false;
            $response['pesan']='Sukses';
            $response['total']=$total;
            $response['daftar_barang_servis']=$result;
            echo json_encode($response);

        }
    }
    
    function daftar_barang_servis_by_jenis_non_paging($jenis){
        if(empty($jenis)){
            required_field();
        }else{
            $daftar = mysqli_query(db(),"SELECT * FROM tb_barang_servis WHERE barang_servis_kategori = '$jenis' ORDER BY barang_servis_id DESC");
            $total = mysqli_fetch_assoc(mysqli_query(db(),"SELECT COUNT(*) AS total FROM tb_barang_servis WHERE barang_servis_kategori = '$jenis'"))['total'];

            $result = array();

            while($row = mysqli_fetch_assoc($daftar)){
                $result[] = $row;
            }

            $response['error']=false;
            $response['pesan']='Sukses';
            $response['total']=$total;
            $response['daftar_barang_servis']=$result;
            echo json_encode($response);

        }
    }

    function search_barang_servis($q){
        if(empty($q)){
            required_field();
        }else{

            $limit = 10;

            $daftar = mysqli_query(db(),"SELECT * FROM tb_barang_servis WHERE barang_servis_nama LIKE '%$q%' ORDER BY barang_servis_id DESC LIMIT $limit");

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

    function start_booking($booking_jenis_servis, $booking_model_kendaraan, $booking_vincode, $booking_km, $booking_no_polisi, $booking_jadwal_servis, $user_id, $dealer_id, $booking_keterangan){

        if(empty($user_id) || empty($dealer_id) || empty($booking_jenis_servis) || empty($booking_keterangan) || empty($booking_model_kendaraan) || empty($booking_vincode) || empty($booking_km) || empty($booking_no_polisi) || empty($booking_jadwal_servis)){
            required_field();
        }else{

            $curdate = mysqli_fetch_assoc(mysqli_query(db(), "SELECT CURDATE() as CURRENT_DD"))['CURRENT_DD'];
            
            if ($curdate >= $booking_jadwal_servis){
                
                $response['error']=true;
                $response['pesan']='Tanggal servis minimal besok.';
                echo json_encode($response);
                
            }else{
                $book = mysqli_query(db(), "INSERT INTO tb_booking (booking_jenis_servis,booking_model_kendaraan,booking_vincode,booking_km,booking_no_polisi,booking_jadwal_servis,booking_keterangan,booking_created_at,user_id,dealer_id) VALUES ('$booking_jenis_servis', '$booking_model_kendaraan', '$booking_vincode', '$booking_km', '$booking_no_polisi','$booking_jadwal_servis','$booking_keterangan',now(), '$user_id', '$dealer_id')");

                $book_id = mysqli_fetch_assoc(mysqli_query(db(), "SELECT MAX(booking_id) as booking_id FROM tb_booking"))['booking_id'];
    
                $book_stat = mysqli_query(db(),"INSERT INTO tb_booking_status (booking_status_created_at,booking_id) VALUES (now(),'$book_id')");
                
                mysqli_query(db(),"INSERT INTO tb_notification (notification_body,notification_unread) VALUES ('Pesanan baru dengan no. invoice #$book_id', '1')");
    
                $response['error']=false;
                $response['pesan']='Pesanan dibuat.';
                echo json_encode($response);
            }

        }

    }

    function terima_booking($booking_id){

        if(empty($booking_id)){
            required_field();
        }else{

            $appr = mysqli_query(db(), "INSERT INTO tb_booking_status (booking_status_created_at,booking_status_stat,booking_id) VALUES (now(),'DITERIMA','$booking_id')");

            $user_id = mysqli_fetch_assoc(mysqli_query(db(),"SELECT user_id FROM tb_booking WHERE booking_id='$booking_id' LIMIT 1"))['user_id'];
            send_notification_to_user($user_id, "Booking dengan nomor invoice #$booking_id diterima.");
            send_notification_topic('teknisi', "Terdapat pesanan baru yang telah diterima oleh pihak admin.");

            $response['error']=false;
            $response['pesan']='Pesanan diterima.';
            echo json_encode($response);

        }

    }


    function pemilihan_part_booking($booking_id, $barang_servis_id, $booking_biaya){

        if(empty($booking_id) || empty($barang_servis_id) || $booking_biaya == ""){
            required_field();
        }else{

            $barang_servis_id_arr = explode(',',rtrim($barang_servis_id,','));
            
            for($i=0; $i<count($barang_servis_id_arr); $i++){

                $cur_harga = mysqli_fetch_assoc(mysqli_query(db(),"SELECT barang_servis_harga FROM tb_barang_servis WHERE barang_servis_id = '$barang_servis_id_arr[$i]'"))['barang_servis_harga'];
                $book_item = mysqli_query(db(), "INSERT INTO tb_booking_item (booking_id,barang_servis_id,booking_item_cur_harga) VALUES ('$booking_id','$barang_servis_id_arr[$i]','$cur_harga')");

            }

            $ppb = mysqli_query(db(), "INSERT INTO tb_booking_status (booking_status_created_at,booking_status_stat,booking_id) VALUES (now(),'PEMILIHAN PART','$booking_id')");
            $biaya = mysqli_query(db(), "UPDATE tb_booking SET booking_biaya='$booking_biaya' WHERE booking_id='$booking_id'");

            $user_id = mysqli_fetch_assoc(mysqli_query(db(),"SELECT user_id FROM tb_booking WHERE booking_id='$booking_id' LIMIT 1"))['user_id'];
            send_notification_to_user($user_id, "Booking dengan nomor invoice #$booking_id. Telah ditentukan sparepart/item servis yang akan digunakan.");


            $response['error']=false;
            $response['pesan']='Pemilihan part untuk user diset. Menunggu user memilih part yang akan diservis.';
            echo json_encode($response);

        }

    }


    function menunggu_persetujuan_booking($booking_id, $unselected_booking_item_id){

        if(empty($booking_id)){
            required_field();
        }else{

            if(empty($unselected_booking_item_id)){
                $ppb = mysqli_query(db(), "INSERT INTO tb_booking_status (booking_status_created_at,booking_status_stat,booking_id) VALUES (now(),'MENUNGGU PERSETUJUAN','$booking_id')");
    
                mysqli_query(db(),"INSERT INTO tb_notification (notification_body,notification_unread) VALUES ('Pesanan dengan no. invoice #$book_id telah memilih sparepart yang ingin digunakan, pesanan telah diteruskan ke teknisi', '1')");

                $response['error']=false;
                $response['pesan']='Pemilihan part diset. Menunggu persetujuan dari pihak dealer.';
                echo json_encode($response);
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
                    
                    mysqli_query(db(),"INSERT INTO tb_notification (notification_body,notification_unread) VALUES ('Pesanan dengan no. invoice #$book_id telah memilih sparepart yang ingin digunakan, pesanan telah diteruskan ke teknisi', '1')");

                    send_notification_topic("teknisi", "Pesanan dengan invoice #$booking_id telah memilih sparepart yang ingin digunakan.");
    
                    $response['error']=false;
                    $response['pesan']='Pemilihan part diset. Menunggu persetujuan dari pihak dealer.';
                    echo json_encode($response);
    
    
                }
            }

            

        }

    }

    
    function dalam_pengerjaan_booking($booking_id){

        if(empty($booking_id)){
            required_field();
        }else{

            $ppb = mysqli_query(db(), "INSERT INTO tb_booking_status (booking_status_created_at,booking_status_stat,booking_id) VALUES (now(),'DALAM PENGERJAAN','$booking_id')");

            $user_id = mysqli_fetch_assoc(mysqli_query(db(),"SELECT user_id FROM tb_booking WHERE booking_id='$booking_id' LIMIT 1"))['user_id'];
            send_notification_to_user($user_id, "Booking dengan nomor invoice #$booking_id telah dalam pengerjaan.");

            $response['error']=false;
            $response['pesan']='Pesanan dalam pengerjaan.';
            echo json_encode($response);

        }

    }

    function selesai_booking($booking_id){

        if(empty($booking_id)){
            required_field();
        }else{

            $ppb = mysqli_query(db(), "INSERT INTO tb_booking_status (booking_status_created_at,booking_status_stat,booking_id) VALUES (now(),'SELESAI','$booking_id')");
            $user_id = mysqli_fetch_assoc(mysqli_query(db(),"SELECT user_id FROM tb_booking WHERE booking_id='$booking_id' LIMIT 1"))['user_id'];
            send_notification_to_user($user_id, "Booking dengan nomor invoice #$booking_id telah selesai.");

            $response['error']=false;
            $response['pesan']='Pesanan selesai.';
            echo json_encode($response);

        }

    }

    function ditolak_booking($booking_id){

        if(empty($booking_id)){
            required_field();
        }else{

            $ppb = mysqli_query(db(), "INSERT INTO tb_booking_status (booking_status_created_at,booking_status_stat,booking_id) VALUES (now(),'DITOLAK','$booking_id')");

            $user_id = mysqli_fetch_assoc(mysqli_query(db(), "SELECT user_id FROM tb_booking WHERE booking_id = '$booking_id' LIMIT 1"))['user_id'];
            
            send_notification_to_user($user_id, "Booking pesanan dengan nomor invoice #$booking_id ditolak.");

            $response['error']=false;
            $response['pesan']='Pesanan ditolak.';
            echo json_encode($response);

        }

    }
    
    function ditolak_booking_wresponse($booking_id){

        if(empty($booking_id)){
            required_field();
        }else{

            $ppb = mysqli_query(db(), "INSERT INTO tb_booking_status (booking_status_created_at,booking_status_stat,booking_id) VALUES (now(),'DITOLAK','$booking_id')");

            $user_id = mysqli_fetch_assoc(mysqli_query(db(), "SELECT user_id FROM tb_booking WHERE booking_id = '$booking_id' LIMIT 1"))['user_id'];
            
            send_notification_to_user($user_id, "Booking pesanan dengan nomor invoice #$booking_id ditolak.");

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

    function daftar_booking_detail($booking_id){

        if(empty($booking_id)){
            required_field();
        }else{

            $bu = mysqli_query(db(), "
            SELECT tb_booking.*,
            tb_dealer.*,
            tb_user.*,
            tb_teknisi.*,
            (SELECT booking_status_stat FROM tb_booking_status WHERE booking_status_id = (SELECT MAX(tb_booking_status.booking_status_id) FROM tb_booking_status WHERE booking_id = tb_booking.booking_id)) AS last_status  
            
            FROM tb_booking 
            
            LEFT JOIN tb_dealer ON tb_dealer.dealer_id = tb_booking.dealer_id 
            LEFT JOIN tb_user ON tb_user.user_id = tb_booking.user_id 
            LEFT JOIN tb_teknisi ON tb_teknisi.teknisi_id = tb_booking.teknisi_id
            
            WHERE tb_booking.booking_id = '$booking_id' 
            
            ORDER BY tb_booking.booking_id DESC
            
            ");

            $booking_id = null;
            $booking_jenis_servis = null;
            $booking_model_kendaraan = null;
            $booking_vincode = null;
            $booking_km = null;
            $booking_no_polisi = null;
            $booking_jadwal_servis = null;
            $booking_keterangan = null;
            $booking_biaya = null;
            $booking_created_at = null;
            $user_id = null;
            $dealer_id = null;
            $dealer_nama = null;
            $dealer_alamat = null;
            $user_nama_lengkap = null;
            $user_alamat = null;
            $user_no_hp = null;
            $user_created_at = null;
            $user_updated_at = null;
            $last_status = null;
            $teknisi_id = null;
            $teknisi_nama = null;
            $teknisi_email = null;

            while($row = mysqli_fetch_assoc($bu)){
                $booking_id = $row['booking_id'];
                $booking_jenis_servis = $row['booking_jenis_servis'];
                $booking_model_kendaraan = $row['booking_model_kendaraan'];
                $booking_vincode = $row['booking_vincode'];
                $booking_km = $row['booking_km'];
                $booking_no_polisi = $row['booking_no_polisi'];
                $booking_jadwal_servis = $row['booking_jadwal_servis'];
                $booking_keterangan = $row['booking_keterangan'];
                $booking_biaya = $row['booking_biaya'];
                $booking_created_at = $row['booking_created_at'];
                $user_id = $row['user_id'];
                $dealer_id = $row['dealer_id'];
                $dealer_nama = $row['dealer_nama'];
                $dealer_alamat = $row['dealer_alamat'];
                $user_nama_lengkap = $row['user_nama_lengkap'];
                $user_alamat = $row['user_alamat'];
                $user_no_hp = $row['user_no_hp'];
                $user_created_at = $row['user_created_at'];
                $user_updated_at = $row['user_updated_at'];
                $last_status = $row['last_status'];
                $teknisi_id = $row['teknisi_id'];
                $teknisi_nama = $row['teknisi_nama'];
                $teknisi_email = $row['teknisi_email'];
            }

            $get_user_name = mysqli_fetch_assoc(mysqli_query(db(),"SELECT user_nama_lengkap FROM tb_user WHERE user_id = '$user_id'"))['user_nama_lengkap'];

            $response['error']=false;
            $response['pesan']='Sukses';
            $response['data_booking']['booking_id']=$booking_id;
            $response['data_booking']['booking_jenis_servis']=$booking_jenis_servis;
            $response['data_booking']['booking_model_kendaraan']=$booking_model_kendaraan;
            $response['data_booking']['booking_vincode']=$booking_vincode;
            $response['data_booking']['booking_km']=$booking_km;
            $response['data_booking']['booking_no_polisi']=$booking_no_polisi;
            $response['data_booking']['booking_jadwal_servis']=$booking_jadwal_servis;
            $response['data_booking']['booking_keterangan']=$booking_keterangan;
            $response['data_booking']['booking_biaya']=$booking_biaya;
            $response['data_booking']['booking_created_at']=$booking_created_at;
            $response['data_booking']['user_id']=$user_id;
            $response['data_booking']['dealer_id']=$dealer_id;
            $response['data_booking']['dealer_nama']=$dealer_nama;
            $response['data_booking']['dealer_alamat']=$dealer_alamat;
            $response['data_booking']['user_nama_lengkap']=$user_nama_lengkap;
            $response['data_booking']['user_alamat']=$user_alamat;
            $response['data_booking']['user_no_hp']=$user_no_hp;
            $response['data_booking']['user_created_at']=$user_created_at;
            $response['data_booking']['user_updated_at']=$user_updated_at;
            $response['data_booking']['last_status']=$last_status;
            $response['data_booking']['teknisi_id']=$teknisi_id;
            $response['data_booking']['teknisi_nama']=$teknisi_nama;
            $response['data_booking']['teknisi_email']=$teknisi_email;
            echo json_encode($response);

        }

    }

    function daftar_booking_all($page){

        if(empty($page)){
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
            
            JOIN tb_dealer ON tb_dealer.dealer_id = tb_booking.dealer_id 
            JOIN tb_user ON tb_user.user_id = tb_booking.user_id 
            
            HAVING last_status != 'SELESAI' AND last_status != 'DITOLAK'
                        
            ORDER BY tb_booking.booking_id DESC

            LIMIT $limit_start,$limit
            
            ");

            $total = mysqli_query(db(), "
            SELECT tb_booking.*,
            tb_dealer.*,
            tb_user.*,
            (SELECT booking_status_stat FROM tb_booking_status WHERE booking_status_id = (SELECT MAX(tb_booking_status.booking_status_id) FROM tb_booking_status WHERE booking_id = tb_booking.booking_id)) AS last_status  
            
            FROM tb_booking 
            
            JOIN tb_dealer ON tb_dealer.dealer_id = tb_booking.dealer_id 
            JOIN tb_user ON tb_user.user_id = tb_booking.user_id 
            
            HAVING last_status != 'SELESAI' AND last_status != 'DITOLAK'
                        
            ORDER BY tb_booking.booking_id DESC
            
            ");
            
            $totalwhaving = mysqli_query(db(), "
            SELECT tb_booking.*,
            tb_dealer.*,
            tb_user.*,
            (SELECT booking_status_stat FROM tb_booking_status WHERE booking_status_id = (SELECT MAX(tb_booking_status.booking_status_id) FROM tb_booking_status WHERE booking_id = tb_booking.booking_id)) AS last_status  
            
            FROM tb_booking 
            
            JOIN tb_dealer ON tb_dealer.dealer_id = tb_booking.dealer_id 
            JOIN tb_user ON tb_user.user_id = tb_booking.user_id 
            
            ORDER BY tb_booking.booking_id DESC
            
            ");

            $result = array();

            while($row = mysqli_fetch_assoc($bu)){
                $result[] = $row;
            }

            $response['error']=false;
            $response['pesan']='Sukses';
            $response['total']=mysqli_num_rows($total);
            $response['total_whaving']=mysqli_num_rows($totalwhaving);
            $response['data_booking']=$result;
            echo json_encode($response);

        }

    }

    function search_booking_all($q){

        if(empty($q)){
            required_field();
        }else{

            $limit = 10;

            $bu = mysqli_query(db(), "
            SELECT tb_booking.*,
            tb_dealer.*,
            tb_user.*,
            (SELECT booking_status_stat FROM tb_booking_status WHERE booking_status_id = (SELECT MAX(tb_booking_status.booking_status_id) FROM tb_booking_status WHERE booking_id = tb_booking.booking_id)) AS last_status  
            
            FROM tb_booking 
            
            JOIN tb_dealer ON tb_dealer.dealer_id = tb_booking.dealer_id 
            JOIN tb_user ON tb_user.user_id = tb_booking.user_id 

            WHERE tb_user.user_nama_lengkap LIKE '%$q%' OR tb_booking.booking_id LIKE '%$q%' OR tb_booking.booking_jenis_servis LIKE '%$q%' OR (SELECT booking_status_stat FROM tb_booking_status WHERE booking_status_id = (SELECT MAX(tb_booking_status.booking_status_id) FROM tb_booking_status WHERE booking_id = tb_booking.booking_id)) LIKE '%$q%'
                        
            HAVING last_status != 'SELESAI' AND last_status != 'DITOLAK'
            
            ORDER BY tb_booking.booking_id DESC

            LIMIT $limit
            
            ");

            $result = array();

            while($row = mysqli_fetch_assoc($bu)){
                $result[] = $row;
            }

            $response['error']=false;
            $response['pesan']='Sukses';
            $response['data_booking']=$result;
            echo json_encode($response);

        }

    }

    function daftar_booking_all_date_filter($page,$date_b,$date_a){

        if(empty($page) || empty($date_b) || empty($date_a)){
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
            
            WHERE (DATE(tb_booking.booking_created_at) BETWEEN '$date_b' AND '$date_a') 
            
            HAVING last_status != 'SELESAI' AND last_status != 'DITOLAK'
            
            GROUP BY tb_booking.booking_id 
            
            ORDER BY tb_booking.booking_id DESC 

            LIMIT $limit_start,$limit
            
            ");

            $total = mysqli_query(db(), "
            SELECT tb_booking.*,
            tb_dealer.*,
            tb_user.*,
            (SELECT booking_status_stat FROM tb_booking_status WHERE booking_status_id = (SELECT MAX(tb_booking_status.booking_status_id) FROM tb_booking_status WHERE booking_id = tb_booking.booking_id)) AS last_status  
            
            FROM tb_booking 
            
            LEFT JOIN tb_dealer ON tb_dealer.dealer_id = tb_booking.dealer_id 
            LEFT JOIN tb_user ON tb_user.user_id = tb_booking.user_id 
            
            WHERE (DATE(tb_booking.booking_created_at) BETWEEN '$date_b' AND '$date_a') 
            
            HAVING last_status != 'SELESAI' AND last_status != 'DITOLAK'
            
            ");

            $result = array();

            while($row = mysqli_fetch_assoc($bu)){
                $result[] = $row;
            }

            $response['error']=false;
            $response['pesan']='Sukses';
            $response['total']=mysqli_num_rows($total);
            $response['data_booking']=$result;
            echo json_encode($response);

        }

    }
    
    function riwayat_booking_all($date_b, $date_a){
        
        if(empty($date_b) || empty($date_a)){
            required_field();
        }else{

            $bu = mysqli_query(db(), "
            SELECT tb_booking.*,
            tb_dealer.*,
            tb_user.*,
            (SELECT booking_status_stat FROM tb_booking_status WHERE booking_status_id = (SELECT MAX(tb_booking_status.booking_status_id) FROM tb_booking_status WHERE booking_id = tb_booking.booking_id)) AS last_status  
            
            FROM tb_booking 
            
            JOIN tb_dealer ON tb_dealer.dealer_id = tb_booking.dealer_id 
            JOIN tb_user ON tb_user.user_id = tb_booking.user_id 
            
            WHERE (DATE(tb_booking.booking_created_at) BETWEEN '$date_b' AND '$date_a')
            
            HAVING last_status = 'SELESAI' OR last_status = 'DITOLAK' 
            
            ORDER BY tb_booking.booking_id DESC

            ");


            $result = array();

            while($row = mysqli_fetch_assoc($bu)){
                $result[] = $row;
            }

            $response['error']=false;
            $response['pesan']='Sukses';
            $response['data_booking']=$result;
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
            
            $bi_false = mysqli_query(db(), "
            SELECT tb_booking_item.*,
            tb_barang_servis.* 
            
            FROM tb_booking_item 
            
            LEFT JOIN tb_barang_servis ON tb_barang_servis.barang_servis_id = tb_booking_item.barang_servis_id 
            
            WHERE tb_booking_item.booking_id = '$booking_id' AND tb_booking_item.booking_item_status = 'DITOLAK' 
            
            ORDER BY tb_booking_item.booking_item_id DESC
            
            ");

            $result = array();
            $result_false = array();

            while($row = mysqli_fetch_assoc($bi)){
                $result[] = $row;
            }
            
            while($row = mysqli_fetch_assoc($bi_false)){
                $result_false[] = $row;
            }

            $response['error']=false;
            $response['status']='Sukses';
            $response['booking_item']=$result;
            $response['booking_item_ditolak']=$result_false;
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

            $servis_berjalan = mysqli_num_rows(mysqli_query(db(),"SELECT a.booking_id FROM tb_booking a WHERE a.user_id = '$user_id' AND (SELECT booking_status_stat FROM tb_booking_status WHERE booking_status_id = (SELECT MAX(tb_booking_status.booking_status_id) FROM tb_booking_status WHERE booking_id = a.booking_id)) != 'SELESAI' AND (SELECT booking_status_stat FROM tb_booking_status WHERE booking_status_id = (SELECT MAX(tb_booking_status.booking_status_id) FROM tb_booking_status WHERE booking_id = a.booking_id)) != 'DITOLAK'"));

            $servis_selesai = mysqli_num_rows(mysqli_query(db(),"SELECT a.booking_id FROM tb_booking a WHERE a.user_id = '$user_id' AND (SELECT booking_status_stat FROM tb_booking_status WHERE booking_status_id = (SELECT MAX(tb_booking_status.booking_status_id) FROM tb_booking_status WHERE booking_id = a.booking_id)) = 'SELESAI'"));

            $servis_ditolak = mysqli_num_rows(mysqli_query(db(),"SELECT a.booking_id FROM tb_booking a WHERE a.user_id = '$user_id' AND (SELECT booking_status_stat FROM tb_booking_status WHERE booking_status_id = (SELECT MAX(tb_booking_status.booking_status_id) FROM tb_booking_status WHERE booking_id = a.booking_id)) = 'DITOLAK'"));

            $response['error']=false;
            $response['status']='Sukses';
            $response['report_user']['total_pesanan']=(int)$total_pesanan;
            $response['report_user']['today_pesanan']=(int)$today_pesanan;
            $response['report_user']['servis_berjalan']=$servis_berjalan;
            $response['report_user']['servis_selesai']=$servis_selesai;
            $response['report_user']['servis_ditolak']=$servis_ditolak;
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

    function user_all($page){

        if(empty($page)){
            required_field();
        }else{
            $limit = 10;
            $limit_start = ($page - 1) * $limit;

            $user = mysqli_query(db(),"SELECT tb_user.*, tb_login.* FROM tb_user LEFT JOIN tb_login ON tb_login.user_id = tb_user.user_id ORDER BY tb_user.user_id DESC LIMIT $limit_start, $limit");
            $result = array();

            while($row = mysqli_fetch_assoc($user)){
                $result[] = $row;
            }

            $total = mysqli_fetch_assoc(mysqli_query(db(),"SELECT COUNT(*) AS total FROM tb_user"))['total'];

            $response['error']=false;
            $response['pesan']='Sukses.';
            $response['total']=$total;
            $response['users']=$result;
            echo json_encode($response);
        }

    }

    function user_search($q){

        if(empty($q)){
            required_field();
        }else{

            $user = mysqli_query(db(),"SELECT tb_user.*, tb_login.* FROM tb_user LEFT JOIN tb_login ON tb_login.user_id = tb_user.user_id WHERE tb_user.user_nama_lengkap LIKE '%$q%' OR tb_login.login_email LIKE '%$q%' LIMIT 10");
            $result = array();

            while($row = mysqli_fetch_assoc($user)){
                $result[] = $row;
            }

            $response['error']=false;
            $response['pesan']='Sukses.';
            $response['users']=$result;
            echo json_encode($response);
        }

    }

    function notification_prepare($token,$message){

        $FIREBASE_SERVER = 'AAAACQ_QVi0:APA91bE0AzxMVfyMZgQEZYRxyjB-DA3VRNj9AIrbTqmakw63DDRvB1a4WdcAPkYxiMruVH-kHi_30bAMce1izs8k_RkwHdxbHDzuLy-PeShdSGWSv0cm6B8h4IsqNg1HJi97LVe7AVU8';

        $msg = array(
        'body' 	=> $message,
                'icon'	=> 'myicon',
                'sound' => 'mySound'
        );
        
        $fields = array(
            'to'		=> $token,
            'notification'	=> $msg,
            'data' => array(
                    'body' => $message
                )
        );
        
        $headers = array (
            'Authorization: key = '.$FIREBASE_SERVER,
            'Content-Type: application/json'
        );
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        
        $result = curl_exec($ch );
        curl_close( $ch );

    }
    
    function notification_topic_prepare($topic,$message){

        $FIREBASE_SERVER = 'AAAACQ_QVi0:APA91bE0AzxMVfyMZgQEZYRxyjB-DA3VRNj9AIrbTqmakw63DDRvB1a4WdcAPkYxiMruVH-kHi_30bAMce1izs8k_RkwHdxbHDzuLy-PeShdSGWSv0cm6B8h4IsqNg1HJi97LVe7AVU8';

        $msg = array(
        'body' 	=> $message,
                'icon'	=> 'myicon',
                'sound' => 'mySound'
        );
        
        $fields = array(
            'to'		=> '/topics/'.$topic,
            'notification'	=> $msg,
            'data' => array(
                    'body' => $message
                )
        );
        
        $headers = array (
            'Authorization: key = '.$FIREBASE_SERVER,
            'Content-Type: application/json'
        );
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        
        $result = curl_exec($ch );
        curl_close( $ch );

    }

    function send_notification_to_user($user_id,$message){

        if(empty($user_id) || empty($message)){
            required_field();
        }else{

            $get_token = mysqli_query(db(),"SELECT token FROM tb_user_fcm_token WHERE user_id = '$user_id'");

            if(mysqli_num_rows($get_token) > 0){

                $token = mysqli_fetch_assoc($get_token)['token'];
                notification_prepare($token,$message);

            }
            
        }

    }
    
    function send_notification_topic($topic, $message){
        
        if(empty($topic) || empty($message)){
            required_field();
        }else{
            
            notification_topic_prepare($topic,$message);

        }
        
    }

    function save_user_token($user_id,$token){

        if(empty($user_id) || empty($token)){
            required_field();
        }else{

            $save = mysqli_query(db(),"REPLACE INTO tb_user_fcm_token VALUES('$user_id','$token')");

            $response['error']=false;
            $response['pesan']='Token disimpan';
            echo json_encode($response);

        }

    }

    function remove_user_token($user_id){

        if(empty($user_id)){
            required_field();
        }else{

            $remove = mysqli_query(db(),"DELETE FROM tb_user_fcm_token WHERE user_id = '$user_id'");

            $response['error']=false;
            $response['pesan']='Token dihapus';
            echo json_encode($response);

        }

    }

    function admin_home_report(){

        $today = mysqli_query(db(),"SELECT COUNT(*) AS today_b FROM tb_booking WHERE DATE(booking_created_at) = CURDATE()");
        $week = mysqli_query(db(),"SELECT COUNT(*) AS week_b FROM tb_booking WHERE MONTH(booking_created_at) = MONTH(CURDATE())");
        $month = mysqli_query(db(),"SELECT COUNT(*) AS month_b FROM tb_booking WHERE YEARWEEK(booking_created_at) = YEARWEEK(CURDATE())");
        $year = mysqli_query(db(),"SELECT COUNT(*) AS year_b FROM tb_booking WHERE YEAR(booking_created_at) = YEAR(CURDATE())");

        $response['error']=false;
        $response['booking_hari_ini']=mysqli_fetch_assoc($today)['today_b'];
        $response['booking_minggu_ini']=mysqli_fetch_assoc($week)['week_b'];
        $response['booking_bulan_ini']=mysqli_fetch_assoc($month)['month_b'];
        $response['booking_tahun_ini']=mysqli_fetch_assoc($year)['year_b'];
        echo json_encode($response);

    }

    function booking_ditolak($booking_id){

        if(empty($booking_id)){
            required_field();
        }else{

            $alasan = mysqli_fetch_assoc(mysqli_query(db(),"SELECT booking_ditolak_alasan AS alasan FROM tb_booking_ditolak WHERE booking_id='$booking_id' LIMIT 1"))['alasan'];

            if(!$alasan){
                $response['error']=true;
                $response['pesan']='Booking ini belum ditolak';
                echo json_encode($response);
            }else{
                $response['error']=false;
                $response['pesan']=$alasan;
                echo json_encode($response);
            }

        }

    }
    
    

    function set_alasan_booking_ditolak($booking_id,$alasan){

        if(empty($alasan) || empty($booking_id)){
            required_field();
        }else{

            mysqli_query(db(),"INSERT INTO tb_booking_ditolak (booking_ditolak_alasan,booking_id) VALUES('$alasan','$booking_id')");

            $response['error']=false;
            $response['pesan']='Pesanan ditolak';
            echo json_encode($response);

        }

    }
    
    function set_alasan_booking_ditolak_wresponse($booking_id,$alasan){

        if(empty($alasan) || empty($booking_id)){
            required_field();
        }else{

            mysqli_query(db(),"INSERT INTO tb_booking_ditolak (booking_ditolak_alasan,booking_id) VALUES('$alasan','$booking_id')");

        }

    }

    function daftar_tahun(){

        $result = array();

        $tahun = mysqli_query(db(),"SELECT YEAR(booking_created_at) AS year FROM tb_booking GROUP BY year");

        while($row = mysqli_fetch_assoc($tahun)){
            $result[] = $row;
        }

        $response['error']=false;
        $response['pesan']='Sukses';
        $response['tahun']=$result;
        echo json_encode($response);

    }

    function laporan($bulan, $tahun){
        if(empty($bulan) || empty($tahun)){
            required_field();
        }else{

            $total_pesanan = mysqli_fetch_assoc(mysqli_query(db(),"SELECT COUNT(*) as total_pesanan FROM tb_booking WHERE YEAR(DATE(booking_created_at))=$tahun AND MONTH(DATE(booking_created_at))=$bulan"))['total_pesanan'];

            $pesanan_berjalan = mysqli_fetch_assoc(mysqli_query(db(),"SELECT count(*) AS pesanan_berjalan FROM tb_booking a WHERE YEAR(DATE(a.booking_created_at))=$tahun AND MONTH(DATE(a.booking_created_at))=$bulan AND (SELECT booking_status_stat FROM tb_booking_status WHERE booking_status_id = (SELECT MAX(tb_booking_status.booking_status_id) FROM tb_booking_status WHERE booking_id = a.booking_id)) != 'SELESAI' AND (SELECT booking_status_stat FROM tb_booking_status WHERE booking_status_id = (SELECT MAX(tb_booking_status.booking_status_id) FROM tb_booking_status WHERE booking_id = a.booking_id)) != 'DITOLAK'"))['pesanan_berjalan'];

            $pesanan_selesai = mysqli_fetch_assoc(mysqli_query(db(),"SELECT count(*) AS pesanan_selesai FROM tb_booking a WHERE YEAR(DATE(a.booking_created_at))=$tahun AND MONTH(DATE(a.booking_created_at))=$bulan AND (SELECT booking_status_stat FROM tb_booking_status WHERE booking_status_id = (SELECT MAX(tb_booking_status.booking_status_id) FROM tb_booking_status WHERE booking_id = a.booking_id)) = 'SELESAI'"))['pesanan_selesai'];

            $pesanan_ditolak = mysqli_fetch_assoc(mysqli_query(db(),"SELECT count(*) AS pesanan_ditolak FROM tb_booking a WHERE YEAR(DATE(a.booking_created_at))=$tahun AND MONTH(DATE(a.booking_created_at))=$bulan AND (SELECT booking_status_stat FROM tb_booking_status WHERE booking_status_id = (SELECT MAX(tb_booking_status.booking_status_id) FROM tb_booking_status WHERE booking_id = a.booking_id)) = 'DITOLAK'"))['pesanan_ditolak'];

            $b_all_result = array();

            $b_all = mysqli_query(db(), "
            SELECT tb_booking.*,
            tb_dealer.*,
            tb_user.*,
            (SELECT booking_status_stat FROM tb_booking_status WHERE booking_status_id = (SELECT MAX(tb_booking_status.booking_status_id) FROM tb_booking_status WHERE booking_id = tb_booking.booking_id)) AS last_status  
            
            FROM tb_booking 
            
            JOIN tb_dealer ON tb_dealer.dealer_id = tb_booking.dealer_id 
            JOIN tb_user ON tb_user.user_id = tb_booking.user_id 

            WHERE YEAR(DATE(tb_booking.booking_created_at))=$tahun AND MONTH(DATE(tb_booking.booking_created_at))=$bulan
                        
            ORDER BY tb_booking.booking_id DESC
            
            ");

            while($row = mysqli_fetch_assoc($b_all)){
                $b_all_result[] = $row;
            }

            $response['error']=false;
            $response['total_pesanan']=$total_pesanan;
            $response['pesanan_berjalan']=$pesanan_berjalan;
            $response['pesanan_selesai']=$pesanan_selesai;
            $response['pesanan_ditolak']=$pesanan_ditolak;
            $response['daftar_pesanan']=$b_all_result;
            echo json_encode($response);

        }
    }
    
    function alert_per_enam_bulan(){
        
        $alert_to = array();
        
        $data = mysqli_query(db(), "
        
        SELECT 
        *, 
        (SELECT booking_id FROM tb_booking WHERE user_id = tb_user.user_id AND (booking_jenis_servis = 'SBI' OR booking_jenis_servis = 'SBE') ORDER BY booking_id DESC LIMIT 1) AS booking_id_a, 
        (SELECT booking_status_stat FROM tb_booking_status WHERE booking_id = booking_id_a ORDER BY booking_status_id DESC LIMIT 1) AS last_status,
        (SELECT booking_status_created_at FROM tb_booking_status WHERE booking_id = booking_id_a ORDER BY booking_status_id DESC LIMIT 1) AS last_status_date,
        DATEDIFF(CURDATE(),  (SELECT booking_status_created_at FROM tb_booking_status WHERE booking_id = booking_id_a ORDER BY booking_status_id DESC LIMIT 1)) AS date_diff
        
        FROM 
        tb_user
        
        HAVING
        (last_status = 'SELESAI' OR last_status = 'DITOLAK') AND
        date_diff >= 180 
        
        ");
        
        while($row = mysqli_fetch_assoc($data)){
            $alert_to[] = $row;
        }
        
        for($i=0; $i<count($alert_to); $i++){
            send_notification_to_user($alert_to[$i]["user_id"],"Sudah 6 bulan setelah servis berkala anda di dealer kami. Jangan lupa untuk servis berkala lagi.");
        }
        
        $response['error']=false;
        $response['message']='list users will get notification';
        $response['alert_to']=$alert_to;
        echo json_encode($response);
        
    }
    
    function alert_batas_waktu(){
        
        $alert_to = array();
        
        $data = mysqli_query(db(), 
        "SELECT *, 
        (SELECT booking_status_stat FROM tb_booking_status WHERE booking_status_id = (SELECT MAX(tb_booking_status.booking_status_id) FROM tb_booking_status WHERE booking_id = tb_booking.booking_id)) AS last_status
        
        FROM tb_booking
        
        LEFT JOIN tb_user ON tb_user.user_id = tb_booking.user_id
        
        WHERE booking_jadwal_servis = CURDATE()
        
        HAVING last_status = 'BELUM DIPROSES' OR last_status = 'DITERIMA'
        
        ORDER BY booking_id DESC");
        
        while($row = mysqli_fetch_assoc($data)){
            $alert_to[] = $row;
        }
        
        foreach($alert_to as $to){
            
            ditolak_booking_wresponse($to['booking_id']);
            
            $alasan = "Melebihi batas waktu.";
            
            if($to['last_status'] == 'DITERIMA'){
                $alasan = "Pesanan telah diterima, tapi pelanggan tidak datang ke dealer untuk konfirmasi";
            }
            
            set_alasan_booking_ditolak_wresponse($to['booking_id'],$alasan);
            
        }
        
        $response['error']=false;
        $response['message']='list users will get notification';
        $response['alert_to']=$alert_to;
        echo json_encode($response);
        
    }
    
    function add_notification($body, $dealer_id){
        
       if (empty($body) || empty($dealer_id)){
           required_field();
       }else{
            mysqli_query(db(), "INSERT INTO tb_notification (notification_body, dealer_id) VALUES ('$body','$dealer_id')");
        
            $response['error']=false;
            $response['message']='notification ditambahkan';
            echo json_encode($response);
       }
        
    }
    
    function load_notification($page, $dealer_id){
        
        if (empty($page) || empty($dealer_id)){
            required_field();
        }else{
            $limit = 10;
            $limit_start = ($page - 1) * $limit;
            
            $notifications = array();
            
            $data = mysqli_query(db(), "SELECT * FROM tb_notification WHERE dealer_id = '$dealer_id' ORDER BY notification_id DESC LIMIT $limit_start, $limit");
            
            while($row = mysqli_fetch_assoc($data)){
                $notifications[] = $row;
            }
            
            $response['error']=false;
            $response['message']='berhasil';
            $response['total']=mysqli_num_rows($data);
            $response['notifications']=$notifications;
            echo json_encode($response);
        }
        
    }
    
    function add_teknisi($nama, $email, $password){
        
        if (empty($nama) || empty($email) || empty($password)){
            required_field();
        }else{
            
            $check = mysqli_query(db(), "SELECT teknisi_email FROM tb_teknisi WHERE teknisi_email = '$email'");
            
            if (mysqli_num_rows($check) > 0){
                $response['error']=true;
                $response['message']='email telah terdaftar';
                echo json_encode($response);
            }else{
                mysqli_query(db(), "INSERT INTO tb_teknisi (teknisi_nama,teknisi_email,teknisi_password) VALUES ('$nama','$email','$password')");
                
                $response['error']=false;
                $response['message']='berhasil';
                echo json_encode($response);
            }
            
        }
        
    }
    
    function update_teknisi($id, $nama, $email){
        
        if (empty($nama) || empty($email)){
            required_field();
        }else{
            
            $current_email = mysqli_fetch_assoc(mysqli_query(db(), "SELECT teknisi_email FROM tb_teknisi WHERE teknisi_id = '$id'"))['teknisi_email'];
            
            $check = mysqli_query(db(), "SELECT teknisi_email FROM tb_teknisi WHERE teknisi_email = '$email' AND teknisi_email != '$current_email'");
            
            if (mysqli_num_rows($check) > 0){
                $response['error']=true;
                $response['message']='email telah terdaftar';
                echo json_encode($response);
            }else{
                mysqli_query(db(), "UPDATE tb_teknisi SET teknisi_nama = '$nama', teknisi_email = '$email' WHERE teknisi_id = '$id'");
                
                $response['error']=false;
                $response['message']='berhasil';
                echo json_encode($response);
            }
            
        }
        
    }
    
    function update_password_teknisi($id, $password){
        
        if (empty($id) || empty($password)){
            required_field();
        }else{
            
            mysqli_query(db(), "UPDATE tb_teknisi SET teknisi_password = '$password' WHERE teknisi_id = '$id'");
            
            $response['error']=false;
            $response['message']='berhasil';
            echo json_encode($response);
            
        }
        
    }
    
    function delete_teknisi($id){
        
        if (empty($id)){
            required_field();
        }else{
             
            mysqli_query(db(), "DELETE FROM tb_teknisi WHERE teknisi_id = '$id'");
             
            $response['error']=false;
            $response['message']='berhasil';
            echo json_encode($response);
        }
        
    }
    
    function login_teknisi($email, $password){
        
        if (empty($email) || empty($password)){
            required_field();
        }else{
            
            $login = mysqli_query(db(), "SELECT * FROM tb_teknisi WHERE teknisi_email = '$email' AND teknisi_password = '$password'");
            
            if (mysqli_num_rows($login) > 0){
                $response['error']=false;
                $response['message']='berhasil';
                $response['teknisi_id']=mysqli_fetch_assoc($login)['teknisi_id'];
                echo json_encode($response);
            }else{
                $response['error']=true;
                $response['message']='login gagal, periksa email atau password';
                echo json_encode($response);
            }
            
        }
        
    }
    
    function get_teknisi($id){
        
        if(empty($id)){
            required_field();
        }else{
            
            $teknisi = mysqli_query(db(),"SELECT * FROM tb_teknisi WHERE teknisi_id = '$id'");
            
            $response['error']=false;
            $response['teknisi']=mysqli_fetch_assoc($teknisi);
            echo json_encode($response);
        }
        
    }
    
    function list_teknisi($page){
        
        if (empty($page)){
            required_field();
        }else{
            
            $limit = 10;
            $limit_start = ($page - 1) * $limit;
            
            $teknisis = array();
            
            $data = mysqli_query(db(), "SELECT * FROM tb_teknisi ORDER BY teknisi_id DESC LIMIT $limit_start, $limit");
            while($row = mysqli_fetch_assoc($data)){
                $teknisis[] = $row;
            }
            
            $total = mysqli_query(db(), "SELECT * FROM tb_teknisi");
            
            $response['error']=false;
            $response['total']=mysqli_num_rows($total);
            $response['teknisis']=$teknisis;
            echo json_encode($response);
            
        }
        
    }
    
    function list_booking_for_teknisi($page){
        
        if(empty($page)){
            required_field();
        }else{
            
            $limit = 10;
            $limit_start = ($page - 1) * $limit;
            
            $bookings = array();
            
            $lists = mysqli_query(db(), "SELECT tb_booking.*, tb_user.*, (SELECT booking_status_stat FROM tb_booking_status WHERE booking_status_id = (SELECT MAX(tb_booking_status.booking_status_id) FROM tb_booking_status WHERE booking_id = tb_booking.booking_id)) AS last_status FROM tb_booking LEFT JOIN tb_user ON tb_user.user_id = tb_booking.user_id HAVING last_status != 'BELUM DIPROSES' AND last_status != 'SELESAI' AND last_status != 'DITOLAK' ORDER BY tb_booking.booking_id DESC LIMIT $limit_start, $limit");
            while($row = mysqli_fetch_assoc($lists)){
                $bookings[] = $row;
            }
            
            $total = mysqli_query(db(), "SELECT tb_booking.*, tb_user.*, (SELECT booking_status_stat FROM tb_booking_status WHERE booking_status_id = (SELECT MAX(tb_booking_status.booking_status_id) FROM tb_booking_status WHERE booking_id = tb_booking.booking_id)) AS last_status FROM tb_booking LEFT JOIN tb_user ON tb_user.user_id = tb_booking.user_id HAVING last_status != 'BELUM DIPROSES' AND last_status != 'SELESAI' AND last_status != 'DITOLAK' ORDER BY tb_booking.booking_id DESC");
            
            $response['error']=false;
            $response['total']=mysqli_num_rows($total);
            $response['bookings']=$bookings;
            echo json_encode($response);
        }
        
    }
    
    function set_teknisi($booking_id, $teknisi_id){
        
        if (empty($booking_id || empty($teknisi_id))){
            required_field();
        }else{
            
            mysqli_query(db(),"UPDATE tb_booking SET teknisi_id = '$teknisi_id' WHERE booking_id = '$booking_id'");
            
            $response['error']=false;
            $response['message']='Berhasil memproses servis.';
            echo json_encode($response);
        }
        
    }
    
    function daftar_notifikasi_admin(){
        
        $lists = array();
        
        $data = mysqli_query(db(),"SELECT * FROM tb_notification");
        $unread = mysqli_query(db(), "SELECT COUNT(*) as unread FROM tb_notification WHERE notification_unread = '1'");
        
        while($row = mysqli_fetch_assoc($data)){
            $lists[] = $row;
        }
        
        $response['error']=false;
        $response['message']='berhasil.';
        $response['unread']=mysqli_fetch_assoc($unread)['unread'];
        $response['notifikasi']=$lists;
        echo json_encode($response);
        
    }
    
    function baca_notifikasi_admin(){
        
        mysqli_query(db(),"UPDATE tb_notification SET notification_unread = '0'");
        
        $response['error']=false;
        $response['message']='berhasil';
        echo json_encode($response);
        
    }
?>