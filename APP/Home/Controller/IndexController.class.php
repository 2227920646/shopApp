<?php
namespace Home\Controller;


use Think\Controller;
class IndexController extends Controller
{
    public function login(){
        if (isset($_POST["username"])&isset($_POST["userpwd"])) {
            $model = M("guanliyuan");
            $res = $model->where("username='%s' and password='%s'", array(I("post.username"), I("post.userpwd")))->select();
            if ($res) {
                cookie('username',I("post.username"),time()+3600);
                $this->redirect("index");
            }
        }
        $this->display();
    }
    public function register(){
        $model=M("guanliyuan");
        $data=array("username"=>I("post.username"),"password"=>I("post.userpwd"));
        $re=$model->where("username='%s' and password='%s'",array(I("post.username"),I("post.userpwd")))->select();
        if (I("post.username")!="" and I("post.userpwd")!="" and !$re) {
            $res = $model->add($data);
            $this->redirect("login");
        }else{
            $this->display();
        }

    }
    public function update_category(){

        $this->display();
    }
    
    public function update_flink(){
        $this->display();
    }
    
    public function update_article(){
        $this->display();
    }
    
    public function setting(){
        $this->display();
    }
    
    public function readset(){
        $this->display();
    }
    
    public function manage_user(){
        $this->display();
    }
    public function loginout(){
        cookie('username',null);
        $this->redirect("login");
    }
    public function loginlog(){
         $this->display();
    }
    
    public function comment(){
        $this->display();
    }
    
    public function index(){
        $value = cookie('username');
       $this->assign('username', $value);
       $this->display();
    }
    
    public function category(){
        $model=M("lanmu");
        $data=array("mingcheng"=>I("post.name"),"bieming"=>I("post.alias"),"fjd"=>I("post.fid"),"gjz"=>I("post.keywords"),"miaosu"=>I("post.describe"));
        $re=$model->where("mingcheng='%s'",I("post.name"))->select();
        if (!$re) {
            $res = $model->add($data);
        }else{
            $this->display();
        }
        $this->display();
    }
    
    public function add_notice(){
        $this->display();
    }
    
    public function flink(){
        $this->display();
    }
    
    public function article(){
        $this->display();
    }
    
    public function notice(){
        $this->display();
    }
    
    public function add_article(){
        $this->display();
    }
    
    public function add_flink(){
        $this->display();
    }
}

?>