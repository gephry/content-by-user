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

    // If the form was submitted and page reloaded, let's ensure nonce is correct / process form data 
    if (!empty($_POST['was_form_submitted'])) {
        if( !isset( $_POST['CBU_nonce'] ) || !wp_verify_nonce( $_POST['CBU_nonce'], 'refresh_filter' )
            ) {
                print 'Oops. Your nonce did not verify.';
                exit;
            } else {
                // process form data
                $user_id__filter = $_POST["filter_by_user_id"];
                
            }
    } else {
        // form was not submitted, so let's set up the page to display with defaults.
        
        
        // Who am I? Let's set current user to automatically be the active filter
        $user_id__filter = get_current_user_id();
        
    }
    
    $page_list = wp_list_pages( array( 'authors'=>$user_id__filter ) );
    

    ?>
	<div class="wrap">
	<h2>Filter content by user</h2>
		<p>Is null? <?php echo ( is_null( $content_type ) === TRUE ? "true" : "false" ); ?></p>
		<p>List of all <?php echo ( is_null( $content_type ) ? "content" : $content_type ); ?>, filterable by user.</p>
	
		<form name="filter_content" method="post">
		<?php wp_nonce_field( 'refresh_filter', 'CBU_nonce' ); ?>
		<input type="hidden" name="was_form_submitted" value="true" />
		
	<?php 
// Set up user filter
	
	 
	   // add user list to the drop-down menu in the form
	   $user_list = get_users( array( 'fields' => array( 'display_name', 'ID' ), 'role__in' => array( 'author', 'editor', 'contributor', 'administrator' ) ) );
             
	   ?>Filter by user <select name="filter_by_user_id">
	   <?php 
        foreach( $user_list as $user ) {
            $user_data = get_userdata( $user->ID );
            
            ?><option value="<?php echo $user->ID; ?>" <?php if( (int)$user->ID == (int)$user_id__filter ) echo "SELECTED"; ?>><?php echo $user_data->first_name." ".$user_data->last_name." (".esc_html( $user->display_name ).")"; ?></option>
            <?php 
        }     
        ?>
        </select>
        <input type="submit" name="filter_action" id="submit-filter" class="button" value="Apply Filter"  />	
        <?php 
       
        
        
//      Get and show filtered content    
        
        //$page_list = get_pages();
        //$lv = new Listview();
        
        echo $page_list;
        
        ?>
       
       
       </form>
        
	</div>
  
  
<?php   
}


?>