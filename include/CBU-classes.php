<?php 

class Listview {
    //protected $bulletin_id;
    
    public function __construct( $type = '' )
    {
        if( $type == '' ) {
            $type = 'page';
        }
        
        
        
    }
    
    public function doHeader() {
        
    }
    
    public function doRow() {
        
    }
    
    public function doFooter() {
        
    }
    
    public function rewrapPostOrPage( $post ) { // $id
        /*
        
        ID
        post_date
        post_author
        post_date
        post_title
        post_status
        */
        
        return array(      
            "ID" => $post["ID"],
            "post_date" => 
            "post_author" => 
            "post_date" => 
            "post_title" => 
            "post_status" => 
        );
            
    }
    
     
    
}

?>