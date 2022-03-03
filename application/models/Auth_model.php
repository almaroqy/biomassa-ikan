<?php

class Auth_model extends CI_Model
{
    public function login($email, $password)
    {
        $email = $this->db->escape($email);

        $password = $this->db->escape(md5($password));

        $user_id = $this->db->query('SELECT username, user_id FROM user WHERE username='. $email. ' AND password=' .$password);

        $result = $user_id->result_array();

        if (count($result) > 0){
            $tokenData = array();
            $tokenData['id'] = $email . $password;

            $output[0]['token'] = AUTHORIZATION::generateToken($tokenData);
            $output[0]['username'] = $result[0]['username'];
            $output[0]['user_id'] = $result[0]['user_id'];

            return $output;
        } else {
            return [];
        }

    }
}