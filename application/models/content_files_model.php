<?php
/**
* Content_Files_model
*/

class Content_Files_Model extends CI_Model {
    public $content_dir = "app_content/";

    public function insert_file($filename)
    {
        $data = array(
            'filename'      => $filename,            
            );
        $this->db->insert('content_files', $data);
        return $this->db->insert_id();
    }

    public function delete_file($file_id)
    {
        $file = $this->get_file($file_id);  
        if(count($file) != 0) {     
            $file_url_to_del = $this->content_dir . $file->filename;
            if (!$this->db->where('id', $file_id)->delete('content_files'))
            {
                return FALSE;
            }
            if(unlink($file_url_to_del)){            
                return TRUE;           
            }
        }
        return FALSE;
        
    }

    public function empty_table()
    {        
     $this->db->empty_table('content_files'); 
 }

 public function get_file($file_id = NULL)
 {
    return $this->db->select()
    ->from('content_files')
    ->where('id', $file_id)
    ->get()
    ->row();
}

public function get_for_dropdown(){
    $results = $this->db->get('content_files')->result_array();
    $empty = array('' => "No file");
    if (count($results) > 0) {                                            
        foreach ($results as $value) {
            $filenames[$value['filename']] = $value['filename'];               
        }                          
        $results = array_merge($empty,$filenames);
    } else {
        $results = $empty;
    }
    return $results;
}

public function get_models_for_dropdown(){
    $results = $this->get_all_models();
    $empty = array('' => "No model");
    if (count($results) > 0) {                                            
        foreach ($results as $value) {
            $filenames[$value['filename']] = $value['filename'];               
        }                          
        $results = array_merge($empty,$filenames);
    } else {
        $results = $empty;
    }
    return $results;
}

public function get_images_for_dropdown(){
    $results = $this->get_all_images();
    $empty = array('' => "No image");
    if (count($results) > 0) {                                            
        foreach ($results as $value) {
            $filenames[$value['filename']] = $value['filename'];               
        }                          
        $results = array_merge($empty,$filenames);
    } else {
        $results = $empty;
    }
    return $results;
}


public function get_all(){ 
    return $this->db->get('content_files')->result_array(); 
}

public function get_all_models(){ 
    $this->db->like('filename', '.js', 'before'); 
    return $this->db->get('content_files')->result_array(); 
}

public function get_all_images(){ 
    $this->db->not_like('filename', '.js', 'before'); 
    return $this->db->get('content_files')->result_array(); 
}

public function get_all_names(){         
   $names = array();
   $result = $this->db->select('filename')->get('content_files')->result_array(); 
   foreach ($result as $name) {
       $names[] = $name['filename'];
   }
   return $names;
}

}

