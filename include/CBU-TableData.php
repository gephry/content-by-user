<?php 

class TableData {
    public $type;
    public $user_id;
    
    public function __construct( $type = '', $user_id__filter )
    {
        if( $type == '' ) {
            $this->type = 'pages';
        } else {
            $this->type = $type;
        }
        
        $this->user_id = $user_id__filter;

    }
    
    
    
    public function setUpHeaders() {
        
        switch ($this->type) {
            case "pages":
                $header = array( "title" => "Page title", "author" => "Author", "date" => "Date" );
                break;
            case "posts":
                $header = array( "title" => "Post name", "author" => "Written by...", "date" => "Date" );
                break;
            case "comments":
                $header = array( "title" => "Comment appears on post...", "author" => "Left by", "date" => "On Date" );
                break;
        }
        
        return $header;
    }
    
    
    
    public function filterPages() {
        return get_pages( array( 'authors'=>$this->user_id ) );
    }
    
    public function filterPosts() {
        return get_posts( array( 'author'=>$this->user_id ) );
    }
    
    public function filterComments() {
        return get_comments( array( 'user_id'=>$this->user_id) );
    }
    
    public function rewrapPostOrPage( $post ) { // $id
        /*
        
        ID
        post_date
        post_author
        post_date
        post_title
        post_status
        
        
        return array(      
            "ID" => $post["ID"],
            "post_date" => 
            "post_author" => 
            "post_date" => 
            "post_title" => 
            "post_status" => 
        );
        */    
    }
    
     
    
}

?>