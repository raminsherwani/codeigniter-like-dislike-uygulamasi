<?php
/**
 * Created by gkandemir
 * User: gkandemir
 */

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function login_form(){

        $this->load->view("login_form_v");

    }

    public function login(){

        $this->load->library("form_validation");

        $this->form_validation->set_rules("username","Kullanıcı adı","required|trim");
        $this->form_validation->set_rules("password","Şifre","required|trim");

        $error_messages = array(
            "required"  => "<strong>{field}</strong> alanını boş bırakamazsınız"
        );

        $this->form_validation->set_message($error_messages);

        if($this->form_validation->run() === FALSE){

            $this->session->set_flashdata("error", validation_errors());

            $this->login_form();

        } else {

            echo "Ok";
        }

    }



}
