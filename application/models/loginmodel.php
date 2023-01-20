<?php
class loginmodel extends CI_Model
{

   public  function __construct ()
    {
        parent::__construct();
        $this->load->database();
    }
    public function isvalidate($username , $password){
        
       $q=$this->db->where(['username'=>$username,'password'=>$password,'type'=>0])
                    ->get('users');
        
              

       if($q->num_rows())
       {
           return $q->row()->id;
       }else{
           return false;
       }
    }
    public function Aisvalidate($username , $password){
        
      $q=$this->db->where(['username'=>$username,'password'=>$password,'type'=>1])
                   ->get('users');
       
             

      if($q->num_rows())
      {
          return $q->row()->id;
      }else{
          return false;
      }
   }
  public  function articleList(){

        $this->session->userdata('id');
       $q=$this->db->select()
                   ->from('users')
                   ->where(['status'=>1])
                   ->get();
                   return $q->result();
   }
   
   public function add_user($array){
    return $this->db->insert('users',$array);
  

   }
   public function del($id){
      // return $this->db->delete('users',['id'=>$id]);
     $q=$this->db->set('status','status-1')
                     ->where(['id'=>$id])
                     ->update('users');
                     return $q;

   }
   public function update_article($articleid,Array $user)
  {
    
   $q=$this->db->where('id',$articleid)
                   ->update('users',$user);
                   return $q;

  }
   public function find_article($articleid){
     $q= $this->db->select(['username','firstname','lastname','email','id'])
                    ->where('id',$articleid)
                    ->get('users');

                   return $q->row();
   }

   public function list()
   {
      $q= $this->db->select(['username','firstname','lastname','email','image_path','id'])
                        ->where(['status'=>1])
                  ->get('users');
                  return $q->result();
    

   }
}


?>