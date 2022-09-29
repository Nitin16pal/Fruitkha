<?php defined('BASEPATH') or exit('No direct script access allowed');

class ProductModel extends CI_Model
{

    public function addproducts($formArray)
    {
        $this->db->insert('products', $formArray);
        return $this->db->insert_id();
    }

    public function getSubCategory($cat_id)
    {

        $q = $this->db->get_where('sub_category', array('pcat_id' => $cat_id));

        if ($q->num_rows() > 0) {

            return $q->result();
        } else {
            return $q->result();
        }
    }

    public function getAdminBlog($id)
    {
        $query = $this->db
                ->select('a.*, b.category_name, b.cat_url')
                ->from('blogs a')
                ->join('category b', 'b.id = a.cat_id')
                ->where('a.id', $id)
                ->get('blogs');
        $blog = $query->row_array();
        return $blog;
    }

    public function getBlog($blog_url)
    {
        $query = $this->db
                ->select('a.*, b.category_name, b.cat_url')
                ->from('blogs a')
                ->join('category b', 'b.id = a.cat_id')
                ->where('a.blog_url', $blog_url)
                ->get('blogs');
        $blog = $query->row_array();
        return $blog;
    }

    public function getAllBlogs()
    {
        $query = $this->db
            ->select('a.*, b.cat_url, b.category_name, c.sub_category, c.slug_url')
            ->from('blogs a')
            ->join('category b', 'b.id = a.cat_id')
            ->join('sub_category c', 'c.id = a.sub_cat_id')
            ->order_by('a.id', 'DESC')
            ->get();

        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return $query->result();
        }
    }

    public function update_data($table, $data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update($table, $data);
    }

    public function delete_data($table, $id)
    {
        $this->db->where('id', $id);
        $this->db->delete($table);
    }

    public function getBlogsCount($param = array())
    {
        if(isset($param['q'])){
            $this->db->or_like('main_heading', trim($param['q']));
            $this->db->or_like('author', trim($param['q']));
        }

        $count = $this->db
                    ->where('cat_id',$param['cat_id'])
                    ->count_all_results('blogs');
        return $count;
    }

    /* 
     * Fetch files data from the database 
     * @param id returns a single record if specified, otherwise all records 
     */ 
    public function getGalleryRows($id){ 
        $this->db->select('*'); 
        $this->db->from('blogs_gallery'); 
        if($id != ''){ 
            $this->db->where('blogs_id',$id); 
            $query = $this->db->get(); 
            $result = $query->result_array();
            
        }else{ 
            $this->db->order_by('added_on','desc'); 
            $query = $this->db->get(); 
            $result = $query->result_array(); 
        } 
        return !empty($result)?$result:false; 
    }
    // Get single gallery image
    public function getGalleryImage($id)
    {
        $query = $this->db
                ->where('id', $id)
                ->get('blogs_gallery');
        $blog = $query->row_array();
        return $blog;
    }
     
    /* 
     * Insert file data into the database 
     * @param array the data for inserting into the table 
     */ 
    public function insertGallery($data = array()){ 
        $insert = $this->db->insert_batch('blogs_gallery',$data); 
        return $insert?true:false; 
    }

    // Get all categories on homepage
    public function get_category()
    {
        $query = $this->db
                ->select('*')
                ->from('category')
                ->where('status','1')
                ->get();
        return $query->result();
    }

    // Front blogs methods
    public function getBlogsFront($param = array()) {
		// if(isset($param['offset']) && isset($param['limit'])){
		// 	$this->db->limit($param['offset'],$param['limit']);
		// }

        if($param != ''){
            $cat_id = $param['cat_id'];
            $sub_cat_id = $param['sub_cat_id'];
        }

        // print_r($param); exit;

        if(!empty($cat_id)){
            $query = $this->db
                ->select('a.*, b.cat_url, b.category_name, c.slug_url, c.sub_category')
                ->from('blogs a')
                ->join('category b', 'b.id = a.cat_id')
                ->join('sub_category c', 'c.id = a.sub_cat_id')
                ->where("a.status='1' AND a.cat_id=$cat_id")
                // ->limit(3)
                ->order_by('a.added_on', 'DESC')
                ->get();
                // echo $this->db->last_query(); exit;
        }
        if(!empty($sub_cat_id)){
            $query = $this->db
                ->select('a.*, b.cat_url, b.category_name, c.slug_url, c.sub_category')
                ->from('blogs a')
                ->join('category b', 'b.id = a.cat_id')
                ->join('sub_category c', 'c.id = a.sub_cat_id')
                ->where("a.status='1' AND a.cat_id=$cat_id AND a.sub_cat_id=$sub_cat_id")
                // ->limit(3)
                ->order_by('a.added_on', 'DESC')
                ->get();
        } 
        else{
            $query = $this->db
                ->select('a.*, b.category_name, b.cat_url, c.sub_category, c.slug_url')
                ->from('blogs a')
                ->join('category b', 'b.id = a.cat_id')
                ->join('sub_category c', 'c.id = a.sub_cat_id')
                ->where("a.status='1' AND a.cat_id=$cat_id")
                ->order_by('a.added_on', 'DESC')
                ->get();
        }
        // if ($query->num_rows > 0) {
        //     return $query->result();
        // } else {
        //     return $query->result();
        // }
		$blogs = $query->result_array();
		return $blogs;
	}

    // related blogs
    public function getRelatedBlogs($relatedSubCatName)
    {
        // $subCatname = str_replace(',', ' ', $relatedSubCatName);

        // echo $relatedSubCatName; exit;

        $query = $this->db
                ->select('a.*, b.cat_url, b.category_name, c.slug_url, c.sub_category')
                ->from('blogs a')
                ->join('category b', 'b.id = a.cat_id')
                ->join('sub_category c', 'c.id = a.sub_cat_id')
                ->where('c.slug_url',$relatedSubCatName)
                ->order_by('a.id', 'DESC')
                ->limit('6')
                ->get();

                // echo $this->db->last_query(); exit;

        // if ($query->num_rows > 0) {
        //     return $query->result();
        // } else {
        //     return $query->result();
        // }
        return $query->result();
    }

    /* ---- HOMEPAGE BLOGS VIEW ---- */
    // Homepage banner blogs methods
    public function getBannerBlogs() {
        $query = $this->db
                ->select('a.*, b.cat_url, b.category_name, c.slug_url, c.sub_category')
                ->from('blogs a')
                ->join('category b', 'b.id = a.cat_id')
                ->join('sub_category c', 'c.id = a.sub_cat_id')
                ->where('a.status','1')
                ->where('a.hm_banner','1')
                ->order_by('a.added_on', 'DESC')
                ->limit(3)
                ->get();

        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return $query->result();
        }
	}

    // Homepage blogs showcase methods
    public function getShowcaseBlogs($category_id) {
        if($category_id != ''){
            $cat_id = $category_id;
        }
        else{
            $cat_id = '';
        }
        $query = $this->db
                ->select('a.*, b.cat_url, b.category_name, c.slug_url, c.sub_category')
                ->from('blogs a')
                ->join('category b', 'b.id = a.cat_id')
                ->join('sub_category c', 'c.id = a.sub_cat_id')
                ->where("a.cat_id=$cat_id AND a.hm_showcase='1' AND a.status='1'")
                ->order_by('a.added_on', 'DESC')
                ->limit(3)
                ->get();
        
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return $query->result();
        }
	}

    // Homepage story of the month methods
    public function getMonthBlogs() {
        $query = $this->db
                ->select('a.*, b.cat_url, b.category_name, c.slug_url, c.sub_category')
                ->from('blogs a')
                ->join('category b', 'b.id = a.cat_id')
                ->join('sub_category c', 'c.id = a.sub_cat_id')
                ->where('a.status','1')
                ->where('a.month_story','1')
                ->order_by('a.added_on', 'DESC')
                ->limit(3)
                ->get();

        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return $query->result();
        }
	}
    // Homepage popular blogs methods
    public function getPopularBlogs() {
        $query = $this->db
                ->select('a.*, b.cat_url, b.category_name, c.slug_url, c.sub_category')
                ->from('blogs a')
                ->join('category b', 'b.id = a.cat_id')
                ->join('sub_category c', 'c.id = a.sub_cat_id')
                ->where('a.status','1')
                ->where('a.popular','1')
                ->order_by('a.added_on DESC, a.popular_priority DESC')
                ->limit(5)
                ->get();

        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return $query->result();
        }
	}
    // Homepage trending blogs methods
    public function getTrendingBlogs() {
        $query = $this->db
                ->select('a.*, b.cat_url, b.category_name, c.slug_url, c.sub_category')
                ->from('blogs a')
                ->join('category b', 'b.id = a.cat_id')
                ->join('sub_category c', 'c.id = a.sub_cat_id')
                ->where('a.status','1')
                ->where('a.trending','1')
                ->order_by('a.added_on DESC, a.trending_priority DESC')
                ->limit(5)
                ->get();

        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return $query->result();
        }
	}
}
