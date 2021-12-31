<?php
/***********************************************************
*
* 
*  Backend functions
*  
************************************************************/


function CBU_pages() {

    CBU_main( "pages" );
}

function CBU_main( $content_type = '' ) {
?>
	<div class="wrap">
	<h2>Filter content by user</h2>
		<p>Is null? <?php echo ( is_null( $content_type ) === TRUE ? "true" : "false" ); ?></p>
		<p>List of all <?php echo ( is_null( $content_type ) ? "content" : $content_type ); ?>, filterable by user.</p>
	
	
	<?php 
// Set up user filter
	
	   // Who am I? Let's set current user to automatically be the active filter
        $user_id__current = get_current_user_id();
	 
	   // add user list to the drop-down menu in the form
	   $user_list = get_users( array( 'fields' => array( 'display_name', 'ID' ), 'role__in' => array( 'author', 'editor', 'contributor', 'administrator' ) ) );
        
     
        ?>Filter by user <select name="filter_by_user_id"><?php 
        foreach( $user_list as $user ) {
            $user_data = get_userdata( $user->ID );
            
            ?><option value="<?php echo $user->ID; ?>" <?php echo ( $user->id == $user_id__current ? "SELECTED" : "" ); ?>><?php echo $user_data->first_name." ".$user_data->last_name." (".esc_html( $user->display_name ).")"; ?></option>
            <?php 
        }     
        echo "</select>";
       
        
        
//         
        
        get_pages();
        
        ?>
       
       
       
        
	</div>
  
  
<?php   
}


?>