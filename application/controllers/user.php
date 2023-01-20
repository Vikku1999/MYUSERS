<?php
class User extends MY_Controller
{
    public function index(){
        $this->load->model('loginmodel','ar');
      $users=$this->ar->list();
     //echo "<pre>";print_r($users); die;
     
        $this->load->view('admin/fpage',['users'=>$users]);


        // $this->load->model('loginmodel','ar');
        // $articles=$this->ar->list();
        // print_r($articles);
        // $this->load->view('admin/dashboard',['articles'=>$articles]);

    }
}
?>