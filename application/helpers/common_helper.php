<?php 

function clean($string) {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
 
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
 }

 function resizeImage($source_path,$new_path,$width,$height) {
    $CI =& get_instance();
    $config['image_library'] = 'gd2';
    $config['source_image'] = $source_path;
    $config['new_image'] = $new_path;
    $config['create_thumb'] = TRUE;
    $config['maintain_ratio'] = TRUE;
    $config['width'] = $width;
    $config['height'] = $height;
    $config['thumb_marker'] = '';
    $CI->load->library('image_lib', $config);
    $CI->image_lib->initialize($config);
    $CI->image_lib->resize();
    $CI->image_lib->clear();
}

// Helper function to check whether the url slug already exists
if(!function_exists('isUrlExists')){
    function isUrlExists($tblName,$condition,$value){
        if(!empty($tblName) && !empty($condition) && !empty($value)){
            $ci = & get_instance();
            $ci->db->from($tblName);
            $ci->db->where($condition,$value);
           $rowNum = $ci->db->count_all_results();// $rowNum = $ci->db->get();
            return ($rowNum>0)?true:false;
        }else{
            return true;
        }
    }
}   

?>