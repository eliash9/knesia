<?php defined('BASEPATH') or exit('No direct script access allowed');

class Sender extends CI_Controller {

#---------------------------------------    
# construction function
#---------------------------------------    
    public function __construct() {
        parent::__construct();

        $this->load->model('Ads','ads');
        $this->load->model("Settings",'settings');
        $this->load->model('home_model', 'hm');
        $this->load->model('Pb_function', 'pb');
        $this->load->model('All_cata', 'cata');
        $this->load->model('Common_model', 'cm');
        $this->load->model('Write_setting_model', 'wsm');
    }

    function explodedtitle($title) {
        return @trim(@implode('-', @preg_split("/[\s,-\:,()]+/", @$title)), '');
    }

    function string_clean($string) {
        $string = str_replace(' ', '', $string); 
        return $text = preg_replace('/[^A-Za-z0-9\-]/', '', $string); 
    }
    

    public function index(){

        $subscriber = $this->db->select('*')->from('subscription')->get()->result();  

        $email_config = $this->db->select('*')->get('email_config')->row();

            
        if($subscriber!=NULL){

            foreach ($subscriber as $key => $value) {

                $data =  json_decode($value->category); 



                for($i=0; $i<count($data);$i++){

                    if($value->frequency==1){
                        $day1 = time() - (1 * 86400);
                     
                        $news_1 = $this->db->select('*')
                        ->from('news_mst')
                        ->where('page',$data[$i])
                        ->where('time_stamp >=',$day1)
                        ->limit($value->number_of_news)
                        ->get()
                        ->result();


                        $template = "<table width=\"100%\" celspacing=\"0\" border=\"0\">
                                        <thead>
                                            <tr>
                                                <td>Image</td>
                                                <td>Title</td>
                                                <td>Details</td>
                                            </tr>
                                        </thead>";

                        foreach ($news_1 as $key => $today) {

                            $details = $today->news;
                            $exploded = implode(' ', array_slice(explode(' ', $details), 0, 30));
                            $template .= "<tr>
                                            <td><img src='".base_url()."uploads/".$today->image."' width=\"100\" alt=\"\"></td>
                                            <td><a href='".base_url().$today->page."/details/".$today->news_id."/".$this->explodedtitle($today->title)."'>$today->title</a> </td>
                                            <td>$exploded</td>
                                         </tr>";
                        }

                        $template .= "<p>If you leve here, click to <a href='".base_url()."Subscription/unsubscription/".md5($value->subs_id)."'>Unsubscribe</a></p>"; 
                        $template .= "</table>"; 


                    //SMTP & mail configuration
                    $config = array(
                        'protocol'  => $email_config->smtp_protocol,
                        'smtp_host' => $email_config->smtp_host,
                        'smtp_port' => $email_config->smtp_port,
                        'smtp_user' => $email_config->smtp_username,
                        'smtp_pass' => $email_config->smtp_password,
                        'mailtype'  => $email_config->smtp_mailtype,
                        'charset'   => $email_config->smtp_charset,
                        'newline'   => "\r\n"
                    );
                    $this->email->initialize($config);
                    $this->email->set_mailtype("html");
                    $this->email->set_newline("\r\n");

                    //Email content
                    $htmlContent = $template;

                    $this->email->to($value->email);
                    $this->email->from($email_config->smtp_username,base_url());
                    $this->email->subject('News Mail');
                    $this->email->message($htmlContent);

                    $this->email->send();


                    } elseif($value->frequency==7) {

                        $d = "Sun";
                        $ca = date("D");

                        if($d==$ca){

                                $day7 = time() - (7 * 86400);
                                $news_7 = $this->db->select('*')
                                ->from('news_mst')
                                ->where('page',$value->category)
                                ->where('time_stamp >=',$day7)
                                ->limit($value->number_of_news)
                                ->get()
                                ->result();

                                $template = "<table width=\"100%\" celspacing=\"0\" border=\"0\">
                                                <thead>
                                                    <tr>
                                                        <td>Image</td>
                                                        <td>Title</td>
                                                        <td>Details</td>
                                                    </tr>
                                                </thead>";
                                foreach ($news_7 as $key => $last7day) {
                                    $details = $last7day->news;
                                    $exploded = implode(' ', array_slice(explode(' ', $details), 0, 30));
                                    $template .= "<tr>
                                                    <td><img src='".base_url()."uploads/".$last7day->image."' width=\"100\" alt=\"\"></td>
                                                    <td><a href='".base_url().$last7day->page."/details/".$last7day->news_id."/".$this->explodedtitle($last7day->title)."'>$last7day->title</a> </td>
                                                    <td>$exploded</td>
                                                 </tr>";
                                }
                                $template .= "<p>If you leve here, click to <a href='".base_url()."Subscription/unsubscription/".md5($value->subs_id)."'>Unsubscribe</a></p>"; 
                                $template .= "</table>"; 

                       
                                #----------------------------
                                //SMTP & mail configuration
                                $config = array(
                                    'protocol'  => $email_config->smtp_protocol,
                                    'smtp_host' => $email_config->smtp_host,
                                    'smtp_port' => $email_config->smtp_port,
                                    'smtp_user' => $email_config->smtp_username,
                                    'smtp_pass' => $email_config->smtp_password,
                                    'mailtype'  => $email_config->smtp_mailtype,
                                    'charset'   => $email_config->smtp_charset,
                                    'newline'   => "\r\n"
                                );
                                $this->email->initialize($config);
                                $this->email->set_mailtype("html");
                                $this->email->set_newline("\r\n");

                                //Email content
                                $htmlContent = $template;

                                $this->email->to($value->email);
                                $this->email->from($email_config->smtp_username,base_url());
                                $this->email->subject('News Mail');
                                $this->email->message($htmlContent);
                                $this->email->send();                   
                        }

                    } else {
                        $d = 28;
                        $ca = date("d");

                        if($d==$ca){

                            $day30 = time() - (30 * 86400);

                            $news_30 = $this->db->select('*')
                            ->from('news_mst')
                            ->where('page',$value->category)
                            ->where('time_stamp >=',$day30)
                            ->limit($value->number_of_news)
                            ->get()
                            ->result();

                            $template = "<table width=\"100%\" celspacing=\"0\" border=\"0\">
                                            <thead>
                                                <tr>
                                                    <td>Image</td>
                                                    <td>Title</td>
                                                    <td>Details</td>
                                                </tr>
                                            </thead>";

                            foreach ($news_30 as $key => $last30day) {
                                $details = $last30day->news;
                                $exploded = implode(' ', array_slice(explode(' ', $details), 0, 30));
                                $template .= "<tr>
                                                <td><img src='".base_url()."uploads/".$last30day->image."' width=\"100\" alt=\"\"></td>
                                                <td><a href='".base_url().$last30day->page."/details/".$last30day->news_id."/".$this->explodedtitle($last30day->title)."'>$last30day->title</a> </td>
                                                <td>$exploded</td>
                                             </tr>";
                            }

                            $template .= "<p>If you leve here, click to <a href='".base_url()."Subscription/unsubscription/".md5($value->subs_id)."'>Unsubscribe</a></p>"; 
                            $template .= "</table>"; 

                            #----------------------------
                            //SMTP & mail configuration
                            $config = array(
                                'protocol'  => $email_config->smtp_protocol,
                                'smtp_host' => $email_config->smtp_host,
                                'smtp_port' => $email_config->smtp_port,
                                'smtp_user' => $email_config->smtp_username,
                                'smtp_pass' => $email_config->smtp_password,
                                'mailtype'  => $email_config->smtp_mailtype,
                                'charset'   => $email_config->smtp_charset,
                                'newline'   => "\r\n"
                            );
                            $this->email->initialize($config);
                            $this->email->set_mailtype("html");
                            $this->email->set_newline("\r\n");

                            //Email content
                            $htmlContent = $template;

                            $this->email->to($value->email);
                            $this->email->from($email_config->smtp_username,base_url());
                            $this->email->subject('News Mail');
                            $this->email->message($htmlContent);
                            $this->email->send(); 
                        }

                    }

                }
            }
            } 
        }

    }
