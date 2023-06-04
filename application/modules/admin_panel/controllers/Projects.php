<?php

class Projects extends My_Controller {

    private $user_type = null;

    public function __construct() {
        parent::__construct();

        $this->load->library('grocery_CRUD');

        if($this->session->has_userdata('user_id')) { //if logged-in
            $this->user_type = $this->session->usertype;
        }
    }

    public function index() {
        redirect(base_url('admin/projects'));
    }

    public function projects() {
        if($this->check_permission(array()) == true) {
            $this->load->model('Projects_m');
            $data = $this->Projects_m->projects();
            $this->load->view($data['page'], $data['data']);
        }
    }

    public function ajax_project_table_data() {
        if($this->check_permission() == true) {
            $this->load->model('Projects_m');
            $data = $this->Projects_m->ajax_project_table_data($_GET['show']);
            echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
            exit();
        }
    }

    public function project_detail($project_id) {
        if($this->check_permission(array()) == true) {
            $this->load->model('Projects_m');
            $data = $this->Projects_m->project_detail($project_id);
            $this->load->view($data['page'], $data['data']);
        }
    }
    
    public function ajax_project_details_table_data() {
        if($this->check_permission() == true) {
            $this->load->model('Projects_m');
            $data = $this->Projects_m->ajax_project_details_table_data();
            echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
            exit();
        }
    }
    
    public function ajax_contact_details_table_data() {
        if($this->check_permission() == true) {
            $this->load->model('Projects_m');
            $data = $this->Projects_m->ajax_contact_details_table_data();
            echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
            exit();
        }
    }
    
    public function ajax_requirementgather_details_table_data() {
        if($this->check_permission() == true) {
            $this->load->model('Projects_m');
            $data = $this->Projects_m->ajax_requirementgather_details_table_data();
            echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
            exit();
        }
    }
    
    public function ajax_quotation_details_table_data() {
        if($this->check_permission() == true) {
            $this->load->model('Projects_m');
            $data = $this->Projects_m->ajax_quotation_details_table_data();
            echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
            exit();
        }
    }

    public function check_permission($auth_usertype = array()) {
        //if not logged-in
        if($this->user_type == null) {
            $this->session->set_flashdata('title', 'Log-in!');
            $this->session->set_flashdata('msg', 'Kindly log-in to access that page.');
            redirect(base_url('admin'));
        }

        //if no special permission required (should be logged-in only)
        if(count($auth_usertype) == 0) {
            return true;
        }

        if(in_array($this->user_type, $auth_usertype)) {
            return true;
        } else {
            $this->session->set_flashdata('title', 'Prohibited!');
            $this->session->set_flashdata('msg', 'You do not have permission to access that page, kindly contact Administrator.');
            redirect(base_url('admin/dashboard'));
        }
    }

    public function ajax_update_project_document(){        
        if($this->check_permission(array()) == true) {
            $this->load->model('Projects_m');
            $data = $this->Projects_m->ajax_update_project_document();
            echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
            exit();
        }
    }

    public function form_add_contact(){        
        if($this->check_permission(array()) == true) {
            $this->load->model('Projects_m');
            $data = $this->Projects_m->form_add_contact();
            echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
            exit();
        }
    }

    public function form_gather_requirement(){        
        if($this->check_permission(array()) == true) {
            $this->load->model('Projects_m');
            $data = $this->Projects_m->form_gather_requirement();
            echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
            exit();
        }
    }

    public function form_particular_basic_info_add(){        
        if($this->check_permission(array()) == true) {
            $this->load->model('Projects_m');
            $data = $this->Projects_m->form_particular_basic_info_add();
            echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
            exit();
        }
    }

    public function form_particular_add(){        
        if($this->check_permission(array()) == true) {
            $this->load->model('Projects_m');
            $data = $this->Projects_m->form_particular_add();
            echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
            exit();
        }
    }

    public function form_tax_add(){        
        if($this->check_permission(array()) == true) {
            $this->load->model('Projects_m');
            $data = $this->Projects_m->form_tax_add();
            echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
            exit();
        }
    }

    public function form_commission_add(){        
        if($this->check_permission(array()) == true) {
            $this->load->model('Projects_m');
            $data = $this->Projects_m->form_commission_add();
            echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
            exit();
        }
    }

    public function fetch_contact_details_on_pk() {
        if($this->check_permission(array()) == true) {
            $this->load->model('Projects_m');
            $data = $this->Projects_m->fetch_contact_details_on_pk();
            echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
            exit();
        }
    }

    ////////////////////////////////////////////////// Final Above function ////////////////////////////////////////////////////////

    public function offer_comments() {
        if($this->check_permission(array()) == true) {
            $this->load->model('Projects_m');
            $data = $this->Projects_m->offer_comments();
            $this->load->view($data['page'], $data['data']);
        }
    }

    public function ajax_update_offer_wip() {
        if($this->check_permission() == true) {
            $this->load->model('Projects_m');
            $data = $this->Projects_m->ajax_update_offer_wip();
            echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
            exit();
        }
    }

    public function request_offer(){
        if($this->check_permission() == true) {
            $this->load->model('Projects_m');
            $data = $this->Projects_m->request_offer();
            echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
            exit();
        }   
    }

    public function ajax_show_all_comments(){
        if($this->check_permission() == true) {
            $this->load->model('Projects_m');
            $data = $this->Projects_m->ajax_show_all_comments();
            echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
            exit();
        }   
    }

    public function ajax_update_offer_comments(){
        if($this->check_permission() == true) {
            $this->load->model('Projects_m');
            $data = $this->Projects_m->ajax_update_offer_comments();
            echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
            exit();
        }   
    }

    // ADD OFFER

    public function add_offer() {
        if($this->check_permission(array()) == true) {
            $this->load->model('Projects_m');
            $data = $this->Projects_m->add_offer();
            $this->load->view($data['page'], $data['data']);
        }
    }

    public function ajax_unique_offer_number(){
        if($this->check_permission() == true) {
            $this->load->model('Projects_m');
            $data = $this->Projects_m->ajax_unique_offer_number();
            echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
            exit();
        }
    }

    public function form_add_offer() {
        if($this->check_permission(array()) == true) {
            $this->load->model('Projects_m');
            $data = $this->Projects_m->form_add_offer();
            echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
            exit();
        }
    }

    // EDIT CUSTOMER ORDER 

    public function update_final_marketing_approval_status($offer_id) {
        if($this->check_permission(array()) == true) {
            $this->load->model('Projects_m');
            $data = $this->Projects_m->update_final_marketing_approval_status($offer_id);
            echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
            exit();
        }
    }
    
    public function ajax_get_product_data() {
        if($this->check_permission(array()) == true) {
            $this->load->model('Projects_m');
            $data = $this->Projects_m->ajax_get_product_data();
            echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
            exit();
        }
    }

    public function ajax_unique_offer_number_edit(){
        if($this->check_permission() == true) {
            $this->load->model('Projects_m');
            $data = $this->Projects_m->ajax_unique_offer_number_edit();
            echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
            exit();
        }
    }

    public function form_edit_offer(){
        if($this->check_permission(array()) == true) {
            $this->load->model('Projects_m');
            $data = $this->Projects_m->form_edit_offer();
            echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
            exit();
        }
    }

    public function form_add_offer_details() {
        if($this->check_permission(array()) == true) {
            $this->load->model('Projects_m');
            $data = $this->Projects_m->form_add_offer_details();
            echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
            exit();
        }
    }

    public function ajax_fetch_offer_details_on_pk() {
        if($this->check_permission(array()) == true) {
            $this->load->model('Projects_m');
            $data = $this->Projects_m->ajax_fetch_offer_details_on_pk();
            echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
            exit();
        }
    }

    public function form_edit_offer_details() {
        if($this->check_permission(array()) == true) {
            $this->load->model('Projects_m');
            $data = $this->Projects_m->form_edit_offer_details();
            echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
            exit();
        }
    }

    public function form_export_offer_details() {
        if($this->check_permission(array()) == true) {
            $this->load->model('Projects_m');
            $data = $this->Projects_m->form_export_offer_details();
            echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
            exit();
        }
    }

    public function del_row_offer_details() {
        if($this->check_permission(array()) == true) {
            $this->load->model('Projects_m');
            $data = $this->Projects_m->del_row_offer_details();
            echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
            exit();
        }
    }

    public function fetch_offer_details_on_pk() {
        if($this->check_permission(array()) == true) {
            $this->load->model('Projects_m');
            $data = $this->Projects_m->fetch_offer_details_on_pk();
            echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
            exit();
        }
    }

    public function ajax_fetch_assigned_templates($offer_id){
        
        if($this->check_permission(array()) == true) {
            $this->load->model('Projects_m');
            $data = $this->Projects_m->ajax_fetch_assigned_templates($offer_id);
            echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
            exit();
        }   

    }
    
    public function ajax_fetch_offer_status($offer_id){
        
        if($this->check_permission(array()) == true) {
            $this->load->model('Projects_m');
            $data = $this->Projects_m->ajax_fetch_offer_status($offer_id);
            echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
            exit();
        }   

    }

    // CLONE OFFER

    public function ajax_offer_clone($offer_id) {
        if($this->check_permission(array()) == true) {
            $this->load->model('Projects_m');
            $data = $this->Projects_m->ajax_offer_clone($offer_id);
            echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
            exit();
        }
    }    
    
    // DELETE OFFER

    public function ajax_delete_offer() {
        if($this->check_permission(array()) == true) {
            $this->load->model('Projects_m');
            $data = $this->Projects_m->ajax_delete_offer();
            echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
            exit();
        }
    }
    
    public function delete_offer_files() {
        if($this->check_permission(array()) == true) {
            $this->load->model('Projects_m');
            $data = $this->Projects_m->delete_offer_files();
            echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
            exit();
        }
    }
    
    // VIEW AREA
    
    public function view_offer($offer_id,$com_id) {


        $this->load->model('Projects_m');

        if($this->check_permission(array()) == true) {

            $data['upgrade_rate'] = false;

            if($this->input->post('upgrade_rate')){

                #from marketing


                 // mar_selling_approval_status 0= not approved 1=approved
                // mar_selling_status 0= not sent to approved 1= sent to approved
                
                $mbp = $this->input->post('mar_base_price');
                $msr = $this->input->post('mar_selling_rate');



                if($mbp > $msr){

                    //die('ok');

                    $updateArray = array(
                        'mar_selling_rate' => $this->input->post('mar_selling_rate'),
                        'mar_selling_status' => 1,
                        'mar_selling_approval_status' => 0
                    );

                }else{

                    $updateArray = array(
                        'mar_selling_rate' => $this->input->post('mar_selling_rate'),
                        'mar_selling_status' => 0,
                        'mar_selling_approval_status' => 1
                    );

                }
                //die();

                $sp_id = $this->input->post('mar_sp_id');
                
                // print_r($updateArray); die;

                if($this->Projects_m->upgrade_selling_rate($updateArray, $sp_id) == true){
                    $data['upgrade_rate'] = true;

                    $this->session->set_flashdata('msg','Request send Successfully');
                    redirect(base_url('admin/view-offer/'.$offer_id.'/'.$com_id));
                }

            }

            if($this->input->post('approve_upgrade_rate')){
                // mar_selling_approval_status 0= not approved 1=approved
                // mar_selling_status 0= not sent to approved 1= sent to approved
                #from admin
                $updateArray = array(
                    'mar_selling_status' => 0,
                    'mar_selling_approval_status' => 1
                );
                $sp_id = $this->input->post('admin_sp_id');
                
                // print_r($updateArray); die;

                if($this->Projects_m->upgrade_selling_rate($updateArray, $sp_id)){
                    $data['upgrade_rate'] = true;
                }

            }

            if($this->input->post('decline_upgrade_rate')){
                // mar_selling_approval_status 0= not approved 1=approved
                // mar_selling_status 0= not sent to approved 1= sent to approved
                #from admin
                $updateArray = array(
                    'mar_selling_rate' => 0,
                    'mar_selling_status' => 0,
                    'mar_selling_approval_status' => 0
                );
                $sp_id = $this->input->post('admin_sp_id');
                
                // print_r($updateArray); die;

                if($this->Projects_m->upgrade_selling_rate($updateArray, $sp_id)){
                    $data['upgrade_rate'] = true;

                }

            }

            if($this->input->post('mar_final_btn') && !empty($this->input->post('customer_id[]'))){

                /*echo "<pre>";
                print_r($this->input->post());*/

                $spds = $this->input->post('spd_id[]');
                $sps = $this->input->post('sp_id_mail[]');


                //print_r($sps);
                


                $cids = $this->input->post('customer_id[]');

               // echo "<pre>"; echo (empty($cids))?1:0; die();

                foreach($spds as $key=>$spd){

                    if ($spds[$key] == '') {
                        continue;
                    }
                    // echo $spds[$key]; die();                 
                    $query = "
                    SELECT
                        $cids[$key] AS client_id,
                        (SELECT name FROM `acc_master` WHERE `acc_master`.`am_id` = $cids[$key]) AS client_name,
                        (SELECT email_id FROM `acc_master` WHERE `acc_master`.`am_id` = $cids[$key]) AS client_email,
                        `products`.`product_name`,
                        `incoterms`.`incoterm`,
                        `sell_price_details`.`exchange_rate`,
                        IF(
                            mar_selling_approval_status = 1,
                            mar_selling_rate * exchange_rate,
                            final_selling_price * exchange_rate
                        ) AS final_selling_price,
                        `currencies`.`currency`
                    FROM
                        `selling_price`
                    LEFT JOIN `incoterms` ON `incoterms`.`it_id` = `selling_price`.`selling_incoterm_id`
                    LEFT JOIN `offer_details` ON `offer_details`.`od_id` = `selling_price`.`od_id`
                    LEFT JOIN `products` ON `products`.`pr_id` = `offer_details`.`product_id`
                    LEFT JOIN `sell_price_details` ON `sell_price_details`.`od_id` = `offer_details`.`od_id`
                    LEFT JOIN `currencies` ON `currencies`.`c_id` = `sell_price_details`.`currency_id`
                    WHERE
                        `selling_price`.`sp_id` = $sps[$key] AND `sell_price_details`.`spd_id` = $spds[$key]";
                    

                    $rs[] = $this->db->query($query)->result_array();

                    //echo $this->db->last_query();

                }

                
                // Group if same client found

               /* echo "<pre>";

                print_r($rs);*/

                foreach($rs as $result){



                    foreach ($result as $element) {                        
                        $fresult[$element['client_id']][] = $element;
                    }

                }
               // echo $this->_send_mail($fresult); die();
                if($this->_send_mail($fresult) == true){


                    // die();

                     
                    $insertArray = array(
                        'offer_id' => $offer_id,
                        'final_mail_send_status' => 1,
                    );

                    $this->session->set_flashdata('msg','Mail Send Successfully');

                }else{
                    $insertArray = array(
                        'offer_id' => $offer_id,
                        'final_mail_send_status' => 0,
                    );
                    $this->session->set_flashdata('msg','Oops! somthing went wrong. Mail not send');
                }
                $this->Projects_m->final_mail_status($insertArray);



                //die();

                redirect(base_url('admin/view-offer/'.$offer_id.'/'.$com_id));

            }

            $data['view_offer_data'] = $this->Projects_m->view_offer($offer_id,$com_id);
            $this->load->view('offer/view_offer', $data);

        }
        
    }



    public function report()
    {
        $this->load->model('Projects_m');
        $data = $this->Projects_m->report();

        $data['title'] = "Offer Report";
        
        /*echo "<pre>";
        print_r($data['template_data']);
        die();*/
        $this->load->view('offer/report_v', $data);
    }

    public function report_filter()
    {
        $this->load->model('Projects_m');
        $data = $this->Projects_m->report_filter();

        $data['title'] = "Filter Report";
        
        /*echo "<pre>";
        print_r($data['template_data']);
        die();*/
        $this->load->view('offer/report_filter_v', $data);
    }

    public function report_filter_export()
    {
        $this->load->model('Projects_m');
        $data = $this->Projects_m->report_filter_export();

        $data['title'] = "Filter Report";
        
        /*echo "<pre>";
        print_r($data['template_data']);
        die();*/
        $this->load->view('offer/report_filter_export_v', $data);
    }


    public function report_filter_form()
    {
        $this->load->model('Projects_m');
        $data= array();

        $data['offer_data'] = $this->Projects_m->report_filter_form();

        // echo "<pre>"; print_r($data); die();
        $this->load->view('offer/report_filter_show_v', $data);
    }

    public function report_filter_export_form()
    {
        $this->load->model('Projects_m');
        $data= array();

        $data['offer_data'] = $this->Projects_m->report_filter_export_form();

        // echo "<pre>"; print_r($data); die();
        $this->load->view('offer/report_filter_export_show_v', $data);
    }


    public function generate_offer_report()
    {
        $data = array();
        $this->load->model('Projects_m');
            
        $data['report_data'] = $this->Projects_m->generate_offer_report($this->input->post());

        /*echo "<pre>"; print_r($data['report_data']); die();*/
        $this->load->view('offer/offer_report_generate_v', $data);
    }



    // MARKETING AREA

    public function offers_marketing() {
        if($this->check_permission(array()) == true) {
            $this->load->model('Projects_m');
            $data = $this->Projects_m->offers_marketing();
            $this->load->view($data['page'], $data['data']);
        }
    }

    public function offer_temp()
    {
        if($this->check_permission() == true) {
            $this->load->model('Projects_m');
            $data = $this->Projects_m->offer_temp();
            echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
            exit();
        }
    }

    public function ajax_Projects_marketing_table_data() {
        if($this->check_permission() == true) {
            $this->load->model('Projects_m');
            $data = $this->Projects_m->ajax_Projects_marketing_table_data();
            echo json_encode($data, JSON_HEX_QUOT | JSON_HEX_TAG);
            exit();
        }
    }

    private function _send_mail($array){



        // echo '<pre>'; print_r($array); die();

        $rt_data = '';
        foreach($array as $arr){

            $content = "";

            //;

            foreach($arr as $ar){
                
                $content .= "Product name: " . $ar['product_name'] . '<br />';
                $content .= "Incoterm: " . $ar["incoterm"] . '<br />';
                $content .= "Price: " . number_format($ar["final_selling_price"],2) . '('. $ar["currency"] .')<hr />';
               $to = $ar['client_email'];

            }

            $rt_data = $this->sendmail($to,$content,'STS - Welcome to the family!');

        }
       
        return $rt_data;
    }

    private function sendmail($mail_to,$msg,$mail_sub='',$mail_from='',$mailer_name='',$smtp_host='',$smtp_port='',$smtp_user='',$smtp_pass='') {

        if($mail_from == '') $mail_from=default_mail_from; else $mail_from=$mail_from;

        if($mailer_name == '') $mailer_name=default_mailer_name; else $mailer_name=$mailer_name;

        if($mail_sub == '') $mail_sub=default_mail_sub; else $mail_sub=$mail_sub;

        if($smtp_host == '') $smtp_host=default_smtp_host; else $smtp_host=$smtp_host;

        if($smtp_port == '') $smtp_port=default_smtp_port; else $smtp_port=$smtp_port;

        if($smtp_user == '') $smtp_user=default_smtp_user; else $smtp_user=$smtp_user;

        if($smtp_pass == '') $smtp_pass=default_smtp_pass; else $smtp_pass=$smtp_pass;



        $config = Array(

            'smtp_host' => $smtp_host,

            'smtp_port' => $smtp_port,

            'smtp_user' => $smtp_user,

            'smtp_pass' => $smtp_pass,

            'protocol' => 'smtp',

            'mailtype' => 'html',

            'charset' => 'utf-8',

            'wordwrap' => TRUE

        );

        $this->load->library('email', $config);

        $this->email->from($mail_from, $mailer_name);

        $this->email->to($mail_to);

        $this->email->subject($mail_sub);

        $this->email->message($msg);

        if($this->email->send()){
            return true;
        }else{
            return false;
        }

        

    }

}