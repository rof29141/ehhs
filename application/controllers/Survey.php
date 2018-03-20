<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Survey extends CI_Controller
{
    function  __construct()
    {
        parent::__construct();
        $this->load->model('M_Survey');
    }

    function index($view="survey/AddSurvey", $msg="", $success="", $warning="", $error="")
    {
        $data['msg']=$msg;
        $data['success']=$success;
        $data['warning']=$warning;
        $data['error']=$error;
        $data['view']=$view;

        if($this->session->userdata('logged_user_ehhs'))
        {
            $session_data = $this->session->userdata('logged_user_ehhs');

            $data['id'] = $session_data['id'];
            $data['user_name'] = $session_data['user_name'];
            $data['bd_FirstName'] = $session_data['bd_FirstName'];
            $data['bd_LastName'] = $session_data['bd_LastName'];
            $data['email'] = $session_data['email'];
            $data['__zkp_Client_Rec'] = $session_data['__zkp_Client_Rec'];

            $data['data']['user']=$this->M_Survey->GetProfileUser($data);

            $this->load->view($view, $data);
        }
        else
        {
            print 1;
        }
    }

    function SaveSurvay()
    {
        if($this->session->userdata('logged_user_ehhs'))
        {
            $data['Eye']=$this->input->post('rbt_eye');
            $data['Tired Eye']=$this->input->post('rbt_tired_eye');
            $data['Eye Lids']=$this->input->post('rbt_eye_lids');
            $data['Wrinkles']=$this->input->post('rbt_wrinkles');
            $data['Forehead']=$this->input->post('rbt_forehead');
            $data['Crows Feet']=$this->input->post('rbt_crows_feet');
            $data['Botox Cosmetic']=$this->input->post('rbt_botox_cosmetic');
            $data['Frown Lines']=$this->input->post('rbt_frown_lines');
            $data['Lip Lines']=$this->input->post('rbt_lip_lines');
            $data['Lips']=$this->input->post('rbt_lips');
            $data['Facial Folds_fillers']=$this->input->post('rbt_facial_folds_fillers');
            $data['Brown Spots']=$this->input->post('rbt_brown_spots');
            $data['Chest Sun Damage']=$this->input->post('rbt_chest_sun_damage');
            $data['Scars']=$this->input->post('rbt_scars');
            $data['Fatial Redness']=$this->input->post('rbt_fatial_redness');
            $data['Nose Shape Size']=$this->input->post('rbt_nose_shape_size');
            $data['Jawline']=$this->input->post('rbt_jawline');
            $data['Jowls']=$this->input->post('rbt_jowls');
            $data['Neck']=$this->input->post('rbt_neck');
            $data['Chin']=$this->input->post('rbt_chin');
            $data['Turkey Gobbler']=$this->input->post('rbt_turkey_gobbler');
            $data['Face Lift']=$this->input->post('rbt_facelift');
            $data['Skin Lesions']=$this->input->post('rbt_skin_lesions');
            $data['Acne Scars']=$this->input->post('rbt_acnescars');
            $data['Hair Removal']=$this->input->post('rbt_hair_removal');
            $data['Hair Loss/Replacement']=$this->input->post('rbt_hair_loss_eplacement');
            $data['Belly']=$this->input->post('rbt_belly');
            $data['Coolsculpting/Non-Surgical Fat Reduction']=$this->input->post('rbt_coolsculpting');
            $data['Weight Loss']=$this->input->post('rbt_weight_loss');
            $data['Liposuction']=$this->input->post('rbt_liposuction');
            $data['Mommy Makeover']=$this->input->post('rbt_mommy_makeover');
            $data['Tummy Tuck']=$this->input->post('rbt_tummy_tuck');
            $data['Drooping Breasts']=$this->input->post('rbt_drooping_breasts');
            $data['Breast Augmentation']=$this->input->post('rbt_breast_augmentation');
            $data['Leg Veins']=$this->input->post('rbt_leg_veins');
            $data['Tattoo Removal']=$this->input->post('rbt_tattoo_removal');
            $data['Hands']=$this->input->post('rbt_hands');
            $data['Cellulite']=$this->input->post('rbt_cellulite');
            $data['Buttocks']=$this->input->post('rbt_buttocks');
            $data['Excessive Sweating/Hyperhidrosis']=$this->input->post('rbt_hyperhidrosis');
            $data['Teeth Whitening/Cosmetic Dentistry']=$this->input->post('rbt_teeth_whitening');
            $data['Image Consulting']=$this->input->post('rbt_image_consulting');
            $data['Personal Makeover']=$this->input->post('rbt_personal_makeover');

            $data['contact_method']=$this->input->post('contact_method');

            $session_data = $this->session->userdata('logged_user_ehhs');
            $data['__zkp_Client_Rec'] = $session_data['__zkp_Client_Rec'];

            $result=$this->M_Survey->Save($data);
            print $result['error_msg'];
        }
        else
        {
            print 1;
        }
    }
}