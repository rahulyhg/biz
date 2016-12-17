<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
abstract class App_model extends CI_Model
{
    protected $db;

    protected $_CI;
    protected $_table;

    protected $_debug = FALSE;

    protected $escape = TRUE; //Set this as TRUE if tilt symbol needs to be added with table fields.
    
    public function __construct()
    {
        parent::__construct();
        $this->_CI = get_instance();        
        $this->db = $this->_CI->db;
    }

    public function get_where($where = array(), $fields = '*',$table = NULL, $order_by = NULL)
    {
    	if(!is_array($where)) return FALSE;
    	
    	$this->db->select($fields);
    	
    	foreach ($where as $f => $v)
        {
        	if(is_array($v))
        		$this->db->where_in($f, $v);
        	else
        		$this->db->where($f, $v);
        }
   		
        if( !is_null($order_by) )
            $this->db->order_by($order_by); 
        
        $table = ($table)?$table:$this->_table;
    	
        return $this->db->get($table);
    }
    
    public function get_records_count($where = array(), $field = '*')
    {
    	if(!is_array($where)) return FALSE;
    	 
    	$this->db->select("count($field) as count");
    	 
    	$this->db->where($where);
    	 
    	return $this->db->get($this->_table)->row()->count;
    }
    
    public function insert($data,$table = NULL)
    { 
        $table = ($table)?$table:$this->_table;
        
    	$this->db->insert($table, $data);
    
    	if ($this->_debug){
    		log_message('debug', $this->db->last_query());
    	}
    
    	return $this->get_last_id();
    }
    
    public function update($where = array(), $data,$table = NULL)
    {
    	if(!is_array($where)) return FALSE;
        
    	$table = ($table)?$table:$this->_table;
        
        foreach ($where as $f => $v)
        {
        	if(is_array($v))
        		$this->db->where_in($f, $v);
        	else
        		$this->db->where($f, $v);
        }
    	
    
    	$this->db->update($table, $data);
    
    	if ($this->_debug){
    		log_message('debug', $this->db->last_query());
    	}
    
    	return $this->db->affected_rows();
    }
    
    
    public function delete($where = array(),$table = NULL)
    {
    	if(!is_array($where)) return FALSE;
    	
        $table = ($table)?$table:$this->_table;
        
    	foreach ($where as $f => $v)
        {
        	if(is_array($v))
        		$this->db->where_in($f, $v);
        	else
        		$this->db->where($f, $v);
        }
    
    	return $this->db->delete($table);
    }
    
    public function get_by_id($id)
    {
        if (!$this->_where_primary($id)) {
            return null;
        }

        $this->_prepare_fields(new Criteria());
        $this->_prepare_from();
		
		$res = $this->db->get();
		
		if( is_object($res) && $res->num_rows()){
			return $res->row_array();
		} else {
			return false;
		}
		
    }
    
    public function update_table($table,$where = array(), $data)
    {
    	if(!is_array($where)) return FALSE;
    	
    	$this->db->where($where);
    
    	$this->db->update($table, $data);
    
    	if ($this->_debug){
    		log_message('debug', $this->db->last_query());
    	}
    
    	return $this->db->affected_rows();
    }
    
    public function insert_table($table,$data)
    {
    	$this->db->insert($table, $data);
    
    	if ($this->_debug){
    		log_message('debug', $this->db->last_query());
    	}
    
    	return $this->get_last_id();
    }

    public function get_last_id()
    {
        return $this->db->insert_id();
    }
    
    protected function _before_save($data) {}
    
    protected function _after_save($last_id) {}
    
}

?>
