<?php

    $mod = $_GET['mod'];


    // mode

    switch($mod){

        case 'pre_registrasi':
            $login_email = $_POST['login_email'];
            pre_registrasi($login_email);
            break;

        case 'registrasi':
            $login_email = $_POST['login_email'];
            $user_nama_lengkap = $_POST['user_nama_lengkap'];
            $user_no_hp = $_POST['user_no_hp'];
            $login_pass = $_POST['login_pass'];
            $user_alamat = $_POST['user_alamat'];
            registrasi($login_email,$user_nama_lengkap,$user_no_hp,$user_alamat,$login_pass);
            break;

        case 'update_profil':
            $user_id = $_POST['user_id'];
            $user_nama_lengkap = $_POST['user_nama_lengkap'];
            $user_alamat = $_POST['user_alamat'];
            $user_no_hp = $_POST['user_no_hp'];
            update_profile($user_id, $user_nama_lengkap, $user_alamat, $no_hp);
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

        case 'start_booking':
            $user_id = $_POST['user_id'];
            $dealer_id = $_POST['dealer_id'];
            $booking_jenis_servis = $_POST['booking_jenis_servis'];
            start_booking($booking_jenis_servis, $user_id, $dealer_id);
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

    function pre_registrasi($login_email){
        
        if(empty($login_email)){          
            required_field();
        }else{

            $cek = mysqli_query(db(),"SELECT login_email FROM tb_login WHERE login_email='$login_email'");

            if(mysqli_num_rows($cek) > 0){
                $response['error']=true;
                $response['pesan']='Email telah terdaftar.';
                echo json_encode($response);
            }else{
                $response['error']=false;
                $response['pesan']='Email diterima';
                echo json_encode($response);
            }

        }

    }

    function registrasi($login_email,$user_nama_lengkap,$user_no_hp,$user_alamat,$login_pass){

        if(empty($login_email) || empty($user_nama_lengkap) || empty($user_no_hp) || empty($login_pass) || empty($user_alamat)){
            required_field();
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

    function start_booking($booking_jenis_servis, $user_id, $dealer_id){

        if(empty($user_id) || empty($dealer_id)){
            required_field();
        }else{

            $book = mysqli_query(db(), "INSERT INTO tb_booking (booking_jenis_servis,booking_created_at,user_id,dealer_id) VALUES ($booking_jenis_servis, now(), '$user_id', '$dealer_id')");

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

            if(!empty($unselected_booking_item_id)){

                $unselected_booking_item_id_arr = explode(',',rtrim($unselected_booking_item_id,','));
            
                for($i=0; $i<count($unselected_booking_item_id_arr); $i++){

                    $set_item = mysqli_query(db(), "UPDATE tb_booking_item SET booking_item_status='DITOLAK' WHERE booking_item_id = '$unselected_booking_item_id_arr[$i]'");

                }

            }

            $ppb = mysqli_query(db(), "INSERT INTO tb_booking_status (booking_status_created_at,booking_status_stat,booking_id) VALUES (now(),'MENUNGGU PERSETUJUAN','$booking_id')");

            $response['error']=false;
            $response['pesan']='Pemilihan part diset. Menunggu persetujuan dari pihak dealer.';
            echo json_encode($response);

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
            $response['pesan']='Booking selesai.';
            echo json_encode($response);

        }

    }

?>