<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ingredients_categories extends CORE_Controller
{

    function __construct() {
        parent::__construct('');
        $this->validate_session();
        $this->load->model('Ingredients_categories_model');
    }

    public function index() {
        $data['_def_css_files'] = $this->load->view('template/assets/css_files', '', TRUE);
        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', TRUE);
        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', TRUE);
        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', TRUE);
        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', TRUE);
        $data['title'] = 'Ingredients Category Management';

        $this->load->view('ingredients_categories_view', $data);
    }

    function transaction($txn = null) {
        switch ($txn) {
            case 'list':
                $m_categories = $this->Ingredients_categories_model;
                $response['data'] = $m_categories->get_list('is_deleted=FALSE');
                echo json_encode($response);
                break;

            case 'create':
                $m_categories = $this->Ingredients_categories_model;

                $m_categories->ingredient_category_name = $this->input->post('ingredient_category_name', TRUE);
                $m_categories->save();

                $category_id = $m_categories->last_insert_id();

                $response['title'] = 'Success!';
                $response['stat'] = 'success';
                $response['msg'] = 'Ingredients category information successfully created.';
                $response['row_added'] = $m_categories->get_list($category_id);
                echo json_encode($response);

                break;

            case 'delete':
                $m_categories=$this->Ingredients_categories_model;

                $category_id=$this->input->post('ingredient_category_id',TRUE);

                $m_categories->is_deleted=1;
                if($m_categories->modify($category_id)){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Ingredients category information successfully deleted.';

                    echo json_encode($response);
                }

                break;

            case 'update':
                $m_categories=$this->Ingredients_categories_model;

                $category_id=$this->input->post('ingredient_category_id',TRUE);
                $m_categories->ingredient_category_name = $this->input->post('ingredient_category_name', TRUE);
                $m_categories->modify($category_id);

                $response['title']='Success!';
                $response['stat']='success';
                $response['msg']='Ingredients category information successfully updated.';
                $response['row_updated']=$m_categories->get_list($category_id);
                echo json_encode($response);

                break;
        }
    }
}
