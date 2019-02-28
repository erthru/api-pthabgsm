<?php

    $mod = $_GET['mod'];

    // mode

    switch($mod){

        case 'pre_registrasi':
            $email = $_POST['email'];
            pre_registrasi($email);
            break;

        case 'registrasi':
            $email = $_POST['email'];
            $nama_lengkap = $_POST['nama_lengkap'];
            $no_hp = $_POST['no_hp'];
            $pass = $_POST['pass'];
            registrasi($email,$nama_lengkap,$no_hp,$pass);
            break;

        case 'update_profil':
            break;

        default:
            bad_request();
            break;

    }

    // fungsi

    function db(){
        return $db = mysqli_connect('localhost','root','','db_pthabgsm');
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

    function pre_registrasi($email){
        
        if(empty($email)){          
            required_field();
        }else{

            $cek = mysqli_query(db(),"SELECT login_email FROM tb_login WHERE login_email='$email'");

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

    function registrasi($email,$nama_lengkap,$no_hp,$pass){

        if(empty($email) || empty($nama_lengkap) || empty($no_hp) || empty($pass)){
            required_field();
        }else{

            $reg0 = mysqli_query(db(),"INSERT INTO tb_user (user_nama_lengkap,user_no_hp) VALUES ('$nama_lengkap','$no_hp')");

            $get_id = mysqli_query(db(),"SELECT MAX(user_id) as user_id FROM tb_user");

            $user_id = mysqli_fetch_assoc($get_id)['user_id'];

            $reg1 = mysqli_query(db(),"INSERT INTO tb_login (login_email,login_pass,login_lvl,user_id) VALUES ('$email','$pass','USER','$user_id')");

            $response['error']=false;
            $response['pesan']='Registrasi berhasil.';
            echo json_encode($response);

        }

    }

?>