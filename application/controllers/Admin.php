<?php

class Admin extends MY_Controller{

    
    public function welcome(){
      if(!$this->session->userdata('id'))
      return redirect('admin/login');
      $this->load->model('loginmodel','ar');
      $articles=$this->ar->articleList();
      // print_r($articles);
      $this->load->view('admin/dashboard',['articles'=>$articles]);

    }

    public function awelcome(){
      if(!$this->session->userdata('id'))
      return redirect('admin/alogin');
      $this->load->model('loginmodel','ar');
      $articles=$this->ar->articleList();
      // print_r($articles);
      $this->load->view('admin/adashboard',['articles'=>$articles]);

    }

    public function userValidation(){
      if($this->form_validation->run('add_article_rules')){
        $post=$this->input->post();
        $this->load->model('loginmodel','useradd');
        if($this->useradd->add_article($post)){
          
            $this->session->set_flashdata('msg','Articles update successfully');
             $this->session->set_flashdata('msg_class','alert-success');
         }
         else
         {
            $this->session->set_flashdata('msg','Articles not update Please try again!!');
            $this->session->set_flashdata('msg_class','alert-danger');
         }
         return redirect('admin/welcome');
      }else{
        $this->load->view('admin/add_article');
      }
    }
    public function adduser(){
      $this->load->view('admin/add_article');

    }
    public function edituser($id){
      $this->load->model('loginmodel');
      $user=$this->loginmodel->find_article($id);
     print_r($user);
      $this->load->view('admin/edit_article',['user'=>$user]);
      
    }
    public function updatearticle($user_id)
    {
   if($this->form_validation->run('add_user_rules'))
     {
         $post=$this->input->post(); 
        //  print_r($post);
        //  $articleid=$post['user_id'];
        //  unset($articleid);
         $this->load->model('loginmodel','editupdate');
         if($this->editupdate->update_article($user_id,$post))
         {
            $this->session->set_flashdata('msg','user Update successfully');
             $this->session->set_flashdata('msg_class','alert-success');
         }
         else
         {
            $this->session->set_flashdata('msg','user not update Please try again!!');
            $this->session->set_flashdata('msg_class','alert-danger');
         }
         return redirect('admin/welcome');
        }
     else
     {
       $this->edituser($user_id);
     }
   
    }
    // public function edit(){
    //   $data = [];
    //   $data['validation']=null;
    //   $data['userdata']=$this->model->
    //   return view('admin/edit_article',$data);
    // }
    public function delarticles(){
      $id=$this->input->post('id');
  
      $this->load->model('loginmodel','delarticle');
        if($this->delarticle->del($id))
        {
            $this->session->set_flashdata('msg','Delete Successfully');
            $this->session->set_flashdata('msg_class','alert-success');
        }
        else
        {
           $this->session->set_flashdata('msg','Please try again..not delete');
           $this->session->set_flashdata('msg_class','alert-danger');
        }
        return redirect('admin/welcome');
      
    }
    public function register()
    {
      $this->load->view('admin/register');
    }
    public function logout(){
     
      $this->session->unset_userdata('id');
      return redirect('login');
    }
        
        
    public function sendemail()
 {
  $config=[
    'upload_path'=>'upload',
    'allowed_types'=>'gif|jpg|png',
  ];
  
  $this->load->library('upload',$config);
  $this->form_validation->set_rules('username','User Name','required|alpha');
  $this->form_validation->set_rules('password','Password','required|max_length[12]');
  $this->form_validation->set_rules('firstname','First Name','required|alpha');
  $this->form_validation->set_rules('lastname','last Name','required|alpha');
  $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]');
$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
  if($this->form_validation->run()&& $this->upload->do_upload())

  {
    $post=$this->input->post();
    $data=$this->upload->data();
    $image_path="upload/".$data['raw_name'].$data['file_ext'];
        $post['image_path']=$image_path;
    $this->load->model('loginmodel','user_add');
        if($this->user_add->add_user($post)){
          $this->session->set_flashdata('msg','user added successfully');
         }else{
          $this->session->set_flashdata('msg','User not added ');
         }
         return redirect('admin/register');
        }
  else
  {
    $upload_error=$this->upload->display_errors();
   $this->load->view('Admin/register',compact('upload_error'));
  }
}

}


?>