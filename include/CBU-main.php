<?php
/***********************************************************
*
* 
*  Backend functions
*  
************************************************************/


function CBU_main( $content_type = '' ) {

// POST authentication
    // If the form was submitted and page reloaded, let's ensure nonce is correct / process form data 
    if (!empty($_POST['was_form_submitted'])) {
        if( 0 || !isset( $_POST['CBU_nonce'] ) || !wp_verify_nonce( $_POST['CBU_nonce'], 'refresh_filter' )
            ) {
                echo '<h2>Oops. Your nonce did not verify.</h2>';
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

    
// Set up user filter
    ?>
	<div class="wrap">


	<h2>View content by user</h2>
	
		<form name="filter_content" method="post">
		<?php wp_nonce_field( 'refresh_filter', 'CBU_nonce' ); ?>
		<input type="hidden" name="was_form_submitted" value="true" />
		
	<?php 

	
	 
	   // add user list to the drop-down menu in the form
	   $user_list = get_users( array( 'fields' => array( 'display_name', 'ID' ), 'role__in' => array( 'author', 'editor', 'contributor', 'administrator' ) ) );
             
	   ?>Viewing content for <select name="filter_by_user_id">
<?php /*	   <option value="all" <?php if( $user_id__filter == '' ) echo "SELECTED"; ?>>All users</option> */ ?> 
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
       
// ====== PAGES
//  Get and show filtered content
        $page_table = new TableData( "pages", $user_id__filter );
        $header = $page_table->setUpHeaders();
        $page_list = $page_table->filterPages();
        
?>         
        <br/><br/>
        <h2>Pages (<?php echo count( $page_list ); ?>)</h2>	
		
<?php         
        require '_table_head.php'; // template for formatting row
        foreach( $page_list as $row_content ) {
            $user_data = get_userdata( $row_content->post_author );
            require '_table_row.php'; // template for formatting row
        }
        require '_table_footer.php'; // end of table
       
        unset( $page_list, $page_table, $user_data, $header );
?>
        <br/><br/>




<?php         
// ====== POSTS 
//  Get and show filtered content    
	   
        $page_table = new TableData( "posts", $user_id__filter );
        $header = $page_table->setUpHeaders();
        $post_list = $page_table->filterPosts();
?>
        <h2>Posts (<?php echo count( $post_list ); ?>)</h2>	
        
<?php 
       
        require '_table_head.php'; // template for formatting row
        foreach( $post_list as $row_content ) {
            $user_data = get_userdata( $row_content->post_author );
            require '_table_row.php'; // template for formatting row
        }
        require '_table_footer.php'; // end of table */

?>        
        <br/><br/>
        
  
  
  
<?php       
// ====== Comments
//  Get and show filtered content    

        $page_table = new TableData( "comments", $user_id__filter );
        $header = $page_table->setUpHeaders();
        $comment_list = $page_table->filterComments();
        
?>	   
        <h2>Comments (<?php echo count( $comment_list ); ?>)</h2>
<?php 	
        
        require '_table_head.php'; // template for formatting row
        foreach( $comment_list as $row_content ) {
            require '_tableComment_row.php'; // template for formatting row
        }
        require '_table_footer.php'; // end of table */
        
        ?>
        <br/><br/>
	    
       </form>
        
	</div>
  
  
<?php   
}
?>