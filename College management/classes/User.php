<?php

class User{
    private $_db,$_data,$_sessionName,$_cookieName,$_isLoggedIn;


    public function __construct($user=null)
    {
        $this->_db=DB::getInstance();
        $this->_sessionName=Config::get('session/session_name');
        $this->_cookieName=Config::get('remember/cookie_name');
        if(!$user){
            if(Session::exists($this->_sessionName)){
                $user=Session::get($this->_sessionName);
                if($this->find($user)){
                    $this->_isLoggedIn=true;
                }else{
                    //logout
                }
            }
        } else{
                $this->find($user);
            }

    }

    public function create($fields=array()){
        if(!$this->_db->insert('users',$fields)) {
            throw new Exception('There was a problem in creating account');

        }
    }

    public function addClg($fields=array()){
        if(!$this->_db->insertClg('college',$fields)){
            throw new Exception('There was a problem adding college');
        }
    }

    public function addStaff($fields=array()){
        if(!$this->_db->insert('staff',$fields)){
            throw new Exception('There was a problem adding college');
        }
    }



    public function find($user=null){
        if($user){
            $field=(is_numeric(($user)))? 'id':'email' ;
            $data= $this->_db->get('users',array($field,'=',$user));

            if($data->count()){
                $this->_data=$data->first();
                return true;
            }

        }
        return false;
    }

    public function Login($email=null,$password=null,$remember=false)
    {


        if (!$email && !$password && $this->exists()) {
            Session::put($this->_sessionName, $this->data()->id);
        } else {
            $user = $this->find($email);


            if ($user) {
                if ($this->data()->password === Hash::make($password, $this->data()->salt)) {
                    Session::put($this->_sessionName, $this->data()->id);

                    if ($remember) {
                        $hash = Hash::unique();
                        $hashCheck = $this->_db->get('users_session', array('user_id', '=', $this->data()->id));
                        if (!$hashCheck->count()) {
                            $this->_db->insert('users_session', array(
                                'user_id' => $this->data()->id,
                                'hash' => $hash
                            ));
                        } else {
                            $hash = $hashCheck->first()->hash;
                        }
                        Cookie::put($this->_cookieName, $hash, Config::get('remember/cookie_expiry'));
                    }


                    return true;
                }
            }
        }
            return false;
    }


    public function exists(){
        return (!empty($this->_data)) ?true:false;
    }


    public function logout(){

        $this->_db->delete('users_session',array('user_id','=',$this->data()->id));
        Session::delete($this->_sessionName);
        Cookie::delete($this->_cookieName);
    }

    public function data(){
        return $this->_data;
    }


    public function isLoggedIn(){
        return $this->_isLoggedIn;
    }



    public function update($fields=array(),$id=null){

        if (!$id && $this->isLoggedIn()){
            $id=$this->data()->id;
        }

        if(!$this->_db->update('users',$id,$fields)){
            throw new Exception('there was a problem in updating');
        }
    }


    public function updateClg($fields=array(),$clg_id){
        if (!$clg_id && $this->isLoggedIn()){
            $clg_id=$this->data()->clg_id;
        }

        if (!$this->_db->updateClg('college',$clg_id,$fields)){
            throw new Exception('there was a problem updating');
        }
    }
    public function updateEmp($fields=array(),$emp_id){
        if (!$emp_id && $this->isLoggedIn()){
            $emp_id=$this->data()->emp_id;
        }

        if (!$this->_db->updateEmp('staff',$emp_id,$fields)){
            throw new Exception('there was a problem updating');
        }
    }



    public function hasPermission($key){
        $group=$this->_db->get('groups',array('id','=',$this->data()->group));
        $permission=json_decode($group->first()->permissions,true);
        if ($permission[$key]==true){
            return true;
        }
        return false;

    }

    public function findClg($college=null){
        if($college){
            $field=(is_numeric(($college)))? 'id':'email' ;
            $data= $this->_db->get('college',array('clg_id','=',5));

            if($data->count()){
                $this->_data=$data->first();
                return true;
            }

        }
        return false;
    }



















}