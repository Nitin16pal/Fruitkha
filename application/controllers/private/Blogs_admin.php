<?php defined('BASEPATH') or exit('No direct script access allowed');
class Blogs_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('uid'))
            redirect('admin');
        $this->load->model('admin/ProductModel');
        $this->load->model('admin/AdminModel');
    }
    // Blogs section
    public function index()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $result['data'] = $this->ProductModel->fetch_data('blogs', 'id');
        $this->load->view('admin/blogs/list_blogs', $result);
        $this->load->view('admin/footer');
    }
    public function add_blog($blgid = '')
    {
        $this->load->model('admin/AdminModel');
        $this->load->helper('common_helper');
        $this->load->library('form_validation');
        // File upload settings
        $config['upload_path'] = './uploads/blogs/';
        $config['allowed_types'] = 'gif|png|jpg';
        $config['max_size'] = '5000';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        $this->form_validation->set_error_delimiters('<span class="invalid-feedback">', '</span>');
        $this->form_validation->set_rules('meta_title', 'Meta Title', 'trim|required');
        $this->form_validation->set_rules('meta_keyword', 'Meta Keyword', 'trim|required');
        $this->form_validation->set_rules('meta_desc', 'Meta Description', 'trim|required');
        $this->form_validation->set_rules('category', 'Category', 'trim|required');
        $this->form_validation->set_rules('sub_category', 'Sub Category', 'trim|required');
        $this->form_validation->set_rules('category_type', 'Product Type', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('author', 'Author', 'trim|required');

        $blogid = $this->input->post('blogid');

        if (empty($blogid)) {
            $this->form_validation->set_rules('main_heading', 'Main Heading', 'trim|required|is_unique[blogs.main_heading]');
            $this->form_validation->set_message('is_unique', 'This Sub-Category is already exists.');
        } else {
            $this->form_validation->set_rules('main_heading', 'Main Heading', 'trim|required');
        }

        if ($this->form_validation->run() == true) {
            // Generate url slug
            $blog_heading = $this->input->post('main_heading');
            $slug_url = url_title($blog_heading, 'dash', true);
            if (isUrlExists('blogs', 'blog_url', $slug_url)) {
                $slug_url = $slug_url . '-' . time();
            }
            // Form Data
            $formArray['cat_id'] = $this->input->post('category');
            $formArray['sub_cat_id'] = $this->input->post('sub_category');
            $formArray['prod_type'] = $this->input->post('category_type');
            $formArray['blog_url'] = $slug_url;
            $formArray['main_heading'] = $this->input->post('main_heading');
            $formArray['main_content'] = $this->input->post('description');
            $formArray['author'] = $this->input->post('author');
            $formArray['meta_title'] = $this->input->post('meta_title');
            $formArray['meta_keyword'] = $this->input->post('meta_keyword');
            $formArray['meta_desc'] = $this->input->post('meta_desc');
            $formArray['month_story'] = $this->input->post('month_story');
            $formArray['month_priority'] = $this->input->post('month_priority');
            $formArray['trending'] = $this->input->post('trending');
            $formArray['trending_priority'] = $this->input->post('trending_priority');
            $formArray['popular'] = $this->input->post('popular');
            $formArray['popular_priority'] = $this->input->post('popular_priority');
            $formArray['hm_banner'] = $this->input->post('hm_banner');
            $formArray['hm_banner_priority'] = $this->input->post('hm_banner_priority');
            $formArray['hm_showcase'] = $this->input->post('hm_showcase');
            $formArray['hm_showcase_priority'] = $this->input->post('hm_showcase_priority');
            // end form data

            if (!empty($_FILES['image']['name'])) {
                if ($this->upload->do_upload('image')) {
                    // image successfully uploaded here
                    $data = $this->upload->data();
                    // create thumbnails
                    resizeImage($config['upload_path'] . $data['file_name'], $config['upload_path'] . 'thumb_front/' . $data['file_name'], 1200, 900);
                    resizeImage($config['upload_path'] . $data['file_name'], $config['upload_path'] . 'thumb_admin/' . $data['file_name'], 300, 250);
                    $formArray['image'] = $data['file_name'];

                    $formArray['added_on'] = date('Y-m-d H:i:s');
                    if (empty($blogid)) {
                        // send data to modal
                        $send = $this->ProductModel->addproducts('blogs',$formArray);
                        if ($send) {
                            $this->session->set_flashdata('success', 'Blog added succefully');
                            redirect(base_url('accounts/blogs'));
                        }
                    } else if (!empty($blogid)) {
                        $send = $this->ProductModel->update_data('blogs', $formArray, $blogid, 'id');
                        if ($send) {
                            $this->session->set_flashdata('success', 'Blog added succefully');
                            redirect(base_url('accounts/blogs'));
                        }
                    }
                } else {
                    // selected image has some errors
                    $errors = $this->upload->display_errors('<span class="invalid-feedback">', '</span>');
                    $result['imageError'] = $errors;
                    $this->load->view('admin/header');
                    $this->load->view('admin/sidebar');
                    $this->load->view('admin/blogs/add_blogs', $result);
                    $this->load->view('admin/footer');
                }
            } else {
                if (empty($blogid)) {
                    $errors = $this->upload->display_errors('<span class="invalid-feedback">Please Enter the Image</span>');
                    $result['imageError'] = $errors;
                    $this->load->view('admin/header');
                    $this->load->view('admin/sidebar');
                    $this->load->view('admin/blogs/add_blogs', $result);
                    $this->load->view('admin/footer');
                } else if (!empty($blogid)) {
                    $send = $this->ProductModel->update_data('blogs', $formArray, $blogid, 'id');
                    if ($send) {
                        $this->session->set_flashdata('success', 'Blog Update succefully');
                        redirect(base_url('accounts/blogs'));
                    }
                }
            }
        } else {
            if (!empty($blgid)) {
                $result = $this->ProductModel->fetch_data('blogs', 'id', $blgid);
                $result['meta_title'] = $result['0']->meta_title;
                $result['meta_keyword'] = $result['0']->meta_keyword;
                $result['meta_desc'] = $result['0']->meta_desc;
                $result['cat_type'] = $result['0']->prod_type;
                $result['cat_id'] = $result['0']->cat_id;
                $result['sub_category'] = $result['0']->sub_cat_id;
                $result['main_heading'] = $result['0']->main_heading;
                $result['description'] = $result['0']->main_content;
                $result['image'] = $result['0']->image;
                $result['author'] = $result['0']->author;
                $result['hm_banner_priority'] = $result['0']->hm_banner_priority;
                $result['hm_banner'] = $result['0']->hm_banner;
                $result['hm_showcase_priority'] = $result['0']->hm_showcase_priority;
                $result['hm_showcase'] = $result['0']->hm_showcase;
                $result['month_priority'] = $result['0']->month_priority;
                $result['month_story'] = $result['0']->month_story;
                $result['popular_priority'] = $result['0']->popular_priority;
                $result['popular'] = $result['0']->popular;
                $result['trending_priority'] = $result['0']->trending_priority;
                $result['trending'] = $result['0']->trending;

                $result['bgid'] = $result['0']->id;
                $result['section'] = 'Edit';
            } else {
                $result['meta_title'] = '';
                $result['meta_keyword'] = '';
                $result['meta_desc'] = '';
                $result['cat_type'] = '';
                $result['cat_id'] = '';
                $result['sub_category'] = '';
                $result['main_heading'] = '';
                $result['description'] = '';
                $result['image'] = '';
                $result['author'] = '';
                $result['hm_banner_priority'] = '';
                $result['hm_banner'] = '';
                $result['hm_showcase_priority'] = '';
                $result['hm_showcase'] = '';
                $result['month_priority'] = '';
                $result['month_story'] = '';
                $result['popular_priority'] = '';
                $result['popular'] = '';
                $result['trending_priority'] = '';
                $result['trending'] = '';

                $result['bgid'] = '';
                $result['section'] = 'Add';
            }
            $this->load->view('admin/header');
            $this->load->view('admin/sidebar');
            $result['gtcat'] = $this->load->AdminModel->get_active_category('product_category', 'cat_id', 'catstatus');
            $this->load->view('admin/blogs/add_blogs', $result);
            $this->load->view('admin/footer');
        }
    }

    public function delete($table, $id, $colidname, $pagename)
    {
        $result = $this->ProductModel->fetch_data($table, $colidname, $id);
        $blgimg = $result['0']->image;
        // echo $blgimg;
        // exit;
        if (!empty($blgimg)) {
            @unlink('./uploads/' . $table . '/thumb_admin/' . $blgimg);
            @unlink('./uploads/' . $table . '/thumb_front/' . $blgimg);
            @unlink('./uploads/' . $table . '/' . $blgimg);
        }

        $this->AdminModel->delete_data($table, $id, $colidname);
        redirect(base_url() . 'accounts/' . $pagename);
    }
}
