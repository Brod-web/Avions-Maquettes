<?
class Upload extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function upload_view()
    {
        $this->layout->set_title('Dashboard');
        $this->layout->view('upload_view', array('error' => ' ' ));
    }

    public function do_upload()
    {
        $config = array(
        'upload_path' => "./uploads/",
        'allowed_types' => "gif|jpg|png|jpeg",
        'overwrite' => TRUE,
        'max_size' => 200, 
        'max_height' => 1400,
        'max_width' => 1400
        );

        $this->load->library('upload', $config);

        if($this->upload->do_upload()) {
            //Upload taille origine
            $data = array('upload_data' => $this->upload->data());
            $photo = $data['upload_data']['file_name'];

            //Resize image (affichage 150x150)
            $config = array(
            'image_library' => 'gd2',
            'source_image' => "./uploads/$photo",
            'create_thumb' => TRUE,
            'maintain_ratio' => TRUE,
            'width' => 150,
            'height' => 150
            );
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            //Sauvegarde temporaire nom photo
            $this->session->photo = $photo;
            
            $referred_from = $this->session->userdata('referred_from');
            redirect($referred_from, 'refresh');
            
        } else {
            $error = array('error' => $this->upload->display_errors());
            $this->layout->set_title('Dashboard');
            $this->layout->view('upload_view', $error);
        }
    }
}