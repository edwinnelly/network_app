<?php
include_once('cores.php');
include_once('db-config.php');
include_once('session.php');
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

/**
 *
 */
class controller extends dbc
{
    /** function to logout a user **/
    public function logout()
    {
        // remove all session variables
        session_unset();
        // destroy the session
        session_destroy();
    }

    /** function to check if a user is logged in **/
    public function checkLogin()
    {
        if (isset($_SESSION['login_user'])) {
            return 'logged';
        } else {
            return 'nau';
        }
    }

    //user login
    public function auth_users($email, $password)
    {
        $query = "select * from members where email_addr='$email' AND password='$password'";
        $run_query = $this->run_query($query);
        if ($this->get_number_of_row($run_query) == 1) {
            $data = $this->get_result($run_query);
            session_regenerate_id();
            $_SESSION['login_user'] = $data['id']; // Initializing Session
            $_SESSION['email'] = $data['email']; // Initializing Session
            return "success";
        } else {
            return "Invalid";
        }
    }


    //get the user information
    public function get_user_data($id)
    {
        $query = "select * from members where id='$id'";
        $row = $this->get_result($this->run_query($query));
        $obj = new stdClass();
        $obj->id = $row['id'];
        $obj->first_name = $row['first_name'];
        $obj->account_act = $row['account_act'];

        return $obj;
    }


    public function new_members($fn,$ln,$email,$password,$ref_code,$gencode)
    {
        $dated = date('d-m-Y');
        $query = "INSERT INTO `members` (`id`, `first_name`, `last_name`, `email_addr`, `password`, `ref_code`,`my_ref_code`, `act_code`, `account_act`, `created_date`, `ref_bonus`, `purchase_bonus`, `upgrade_bonus`, `pairing_bonus`, `stockish_comm`, `pv`, `phone_number`, `username`, `plans_id`) VALUES (NULL, '$fn', '$ln', '$email', '$password', '$ref_code', '$gencode','', '0', '', '', '', '', '', '', '', '', '', '')";
        $run_qry = $this->run_query($query);
        if ($run_qry == true) {
            return "success";
        } else {
            return "Invalid Command";
        }
    }

    public function edit_vendor($vcode, $vname, $key_grant, $streets, $city, $state, $zip, $phone, $aphone, $vendor_note, $emails, $website, $fib)
    {
        $dated = date('d-m-Y');
        $query = "update supplier_lentose set vendor_name='$vname',address='$streets',city='$city',state='$state',zip='$zip',phone='$phone',phone2='$aphone',note='$vendor_note',email='$emails',website='$website' where id='$fib' and key_grant='$key_grant'";
        $run_qry = $this->run_query($query);
        if ($run_qry == true) {
            return "success";
        } else {
            return "Invalid Command";
        }
    }



    public function delete_category_ecom($pid, $key_grant)
    {
        $query = "delete from category_one where id='$pid' and store_key='$key_grant'";
        return $this->runner($query);
    }


    /** function to get shop suppliers **/
    public function getsuppliers($user_key)
    {
        $query = "SELECT * FROM supplier_lentose WHERE key_grant='$user_key'";
        $query = $this->run_query($query);
        $categories = array();
        while ($row = $this->get_result($query)) {
            $obj = new stdClass();
            $obj->id = $row['id'];
            $obj->key_grant = $row['key_grant'];
            $obj->vendor_code = $row['vendor_code'];
            $obj->vendor_name = $row['vendor_name'];
            $obj->address = $row['address'];
            $obj->city = $row['city'];
            $obj->state = $row['state'];
            $obj->zip = $row['zip'];
            $obj->phone = $row['phone'];
            $obj->phone2 = $row['phone2'];
            $obj->status = $row['status'];
            $obj->note = $row['note'];
            $obj->email = $row['email'];
            $obj->website = $row['website'];
            $categories[] = $obj;
        }
        return $categories;
    }


    public function getall_today()
    {
        $get_date = date('Y/m/d');
        $query = "SELECT DAY('$get_date') as todays";
        $row = $this->get_result($this->run_query($query));
        $obj = new stdClass();
        $obj->todays = $row['todays'];
        $user_list[] = $obj;
        return $obj;

    }

    //count number of staff in school
    public function count_staff()
    {
        $query = "select * from staffs";
        $run_query = $this->run_query($query);
        return $this->get_number_of_row($run_query);
    }


    // teacher list in school
    public function staffs_list()
    {
        $query = "SELECT * FROM staffs order by fullname asc";
        $q = $this->run_query($query);
        $user_list = array();
        while ($row = $this->get_result($q)) {
            $obj = new stdClass();
            $obj->id = $row['id'];
            $obj->fullname = $row['fullname'];
            $obj->nationality = $row['nationality'];
            $obj->state = $row['state'];
            $obj->city = $row['city'];
            $obj->qualification = $row['qualification'];
            $obj->gender = $row['gender'];
            $obj->marital = $row['marital'];
            $obj->address = $row['address'];
            $obj->phone = $row['phone'];
            $obj->email = $row['email'];
            $obj->photo_st = $row['photo_st'];
            $user_list[] = $obj;
        }
        return $user_list;
    }


    //update password staff end
    public function update_staff_password($get_user_id, $main_pass)
    {
        $query = "update staffs set password='$main_pass' where id='$get_user_id'";
        $run_qry = $this->run_query($query);
        if ($run_qry == true) {
            return "success";
        } else {
            return "Invalid Command";
        }
    }

    //update password student end
    public function update_student_password($get_user_id, $main_pass)
    {
        $query = "update student set password='$main_pass' where id='$get_user_id'";
        $run_qry = $this->run_query($query);
        if ($run_qry == true) {
            return "success";
        } else {
            return "Invalid Command";
        }
    }

    //update staff pic
    public function upload_staff_profile_pics($path, $get_user_id)
    {
        $query = "update staffs set photo_st='$path' where id='$get_user_id'";
        $run_qry = $this->run_query($query);
        if ($run_qry == true) {
            return "success";
        } else {
            return "Invalid Command";
        }
    }

    //update student pic
    public function upload_student_profile_pics($path, $get_user_id)
    {
        $query = "update student set photo='$path' where id='$get_user_id'";
        $run_qry = $this->run_query($query);
        if ($run_qry == true) {
            return "success";
        } else {
            return "Invalid Command";
        }
    }


}

