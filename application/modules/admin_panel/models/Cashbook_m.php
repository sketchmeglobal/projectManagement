<?php
class cashbook_m extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function cashbook_managemnt() {
        $data['title'] = 'cashbook Management';
        $data['menu'] = 'cashbook';
        return array('page'=>'cashbook/cashbook_list_v', 'data'=>$data);
    }

    public function ajax_cashbook_table_data() {
        $usertype = $this->session->usertype;
        $user_id = $this->session->user_id;
        $data = array();
        $nestedData = array();

        $p_data = $this->db->get('cashbook')->result();

        if(sizeof($p_data) > 0){
            $slNo = 1;
            foreach($p_data as $index => $val){
                $cb_id = $val->cb_id;
                $cb_entry_date = $val->cb_entry_date;
                $receive_payment = $val->receive_payment;
                $cb_amount = $val->cb_amount;
                $cb_narration = $val->cb_narration;

                $cb_received = '';
                $cb_payment = '';
                if($receive_payment == 1){
                    $cb_received = $cb_narration;
                }else if($receive_payment == 2){
                    $cb_payment = $cb_narration;
                }else{}

                $nestedData['slNo'] = $slNo;
                $nestedData['cb_entry_date'] = $cb_entry_date;
                $nestedData['cb_received'] = $cb_received;
                $nestedData['cb_payment'] = $cb_payment;
                $nestedData['cb_amount'] = number_format($cb_amount);
                $nestedData['action'] = '<a href="'. base_url('admin/edit-cashbook/'.$cb_id).'" class="btn btn-info"><i class="fa fa-pencil"></i> Edit</a>
                <a href="javascript:void(0)" data-cb_id="'.$cb_id.'" class="btn btn-danger delete"><i class="fa fa-times"></i> Delete</a>';
                            
                array_push($data, $nestedData);
                $slNo++;
            }//end foreach
        }
        

        $json_data = array(
            "draw"            => intval($this->input->post('draw')),
            "recordsTotal"    => sizeof($data),
            "recordsFiltered" => sizeof($data),
            "data"            => $data
        );

        return $json_data;
    } //end


    private function _user_common_query($usertype, $user_id){

        if($usertype == 1){

            #for admin

            $rs = $this->db
                ->select('users.*, CONCAT(firstname, " ", lastname) AS name')
                ->join('user_details', 'users.user_id = user_details.user_id', 'left')
                ->get('users')
                ->result();            
            
            // echo $this->db->get_compiled_select('users');
            // exit();
        }

        return $rs;
        
    }

    private function _user_common_actions($usertype, $user_id){

        if($usertype == 1){
            # resource is still working
            $nestedData = '
            <a href="'. base_url('admin/edit-user/'.$user_id) .'" class="btn btn-info"><i class="fa fa-pencil"></i> Edit</a>';
        }else{
            $nestedData = '
            <a href="'. base_url('admin/edit-user/'.$user_id) .'" class="btn btn-info"><i class="fa fa-pencil"></i> Edit</a>
            <a data-user_id="'.$user_id.'" href="javascript:void(0)" class="btn btn-danger delete"><i class="fa fa-times"></i> Delete</a>';
        }
        return $nestedData;

    }

    public function add_cashbook(){        
        $data['title'] = 'cashbook Management';
        $data['menu'] = 'Add cashbook';

        return array('page'=>'cashbook/cashbook_add_v', 'data'=>$data);
    }

    public function ajax_unique_username(){
        
        $username = $this->input->post('username');
        $rs = $this->db->get_where('users', array('username' => $username))->num_rows();
        // echo $this->db->last_query();die;
        
        if($rs != '0') {
            $data = 'Username already exists.';
        }else{
            $data='true';
        }

        return $data;

    }

    public function acc_master_on_usertype(){
        
        $usertype = $this->input->post('usertype');

        if($usertype == 1){
            # admin - all

            $rs = $this->db->get_where('acc_master', array('status' => 1))->result();

        }else if($usertype == 2){
            
            # resource develper -> Supplier
            $rs = $this->db->get_where('acc_master', array('status' => 1, 'supplier_buyer' => 0))->result();

        }else if($usertype == 3){
            
            # marketing -> Buyer
            $rs = $this->db->get_where('acc_master', array('status' => 1, 'supplier_buyer' => 1))->result();

        }if($usertype == 4){
            
            # exporter -> Offers
            $rs = $this->db->get_where('offers', array('status' => 1))->result();
            
        }

        return $rs;

    }

    public function form_add_cashbook(){  
        $insertArray = array(
            'cb_entry_date' => $this->input->post('cb_entry_date'),
            'receive_payment' => $this->input->post('receive_payment'),
            'cb_amount' => $this->input->post('cb_amount'),
            'cb_narration' => $this->input->post('cb_narration')
        );   

        if($this->db->insert('cashbook', $insertArray)){
            $cb_id = $this->db->insert_id();
            $data['insert_id'] = $cb_id;

            $data['type'] = 'success';
            $data['msg'] = 'cashbook added successfully.'; 
        }else{
            $data['type'] = 'error';
            $data['msg'] = 'Database Insert Error';
        }

        return $data;
    }

    public function edit_cashbook($cb_id = ''){        
        $data['title'] = 'cashbook Management';
        $data['menu'] = 'Users';

        $data['cashbook_details'] = $this->db->get_where('cashbook', array('cb_id' => $cb_id))->result();

        return array('page' => 'cashbook/cashbook_edit_v', 'data' => $data);

    }

    public function ajax_unique_username_edit(){
        
        $username = $this->input->post('username');
        $user_id = $this->input->post('user_id');

        $rs = $this->db->where('user_id !=', $user_id)->get_where('users', array('username' => $username))->num_rows();

        
        if($rs != '0') {
            $data = 'Username already exists.';
        }else{
            $data='true';
        }

        return $data;

    }

    public function form_edit_cashbook(){   
        $cb_id = $this->input->post('cb_id');  

        $updateArray1 = array(
            'cb_entry_date' => $this->input->post('cb_entry_date'),
            'receive_payment' => $this->input->post('receive_payment'),
            'cb_amount' => $this->input->post('cb_amount'),
            'cb_narration' => $this->input->post('cb_narration')
        );

        $val = $this->db->update('cashbook', $updateArray1, array('cb_id' => $cb_id));
        //echo $this->db->last_query();die;
        
        if($val){
            $data['type'] = 'success';
            $data['msg'] = 'Data updated successfully.';          
        }else{
            $data['type'] = 'error';
            $data['msg'] = 'Database Update Error';
        }

        return $data;
    }

    public function ajax_delete_cashbook(){
        $cb_id = $this->input->post('cb_id');
        $delClause = array(
            'cb_id' => $cb_id
        );
        
        $this->db->where($delClause)->delete('cashbook');

        $data['type'] = 'success';
        $data['title'] = 'Deletion!';
        $data['msg'] = 'cashbook deleted successfully'; 

        return $data;        
    }

    

// User ENDS 

}