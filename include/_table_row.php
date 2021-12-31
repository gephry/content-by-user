<?php  /*
Desired data to display:
        ID
         post_date
         post_author
         post_date
         post_title
         post_status
         */

?>
        	<tr id="post-<?php echo $row_content->ID; ?>" class="post-<?php echo $row_content->ID; ?> type-page status-<?php echo $row_content->post_status; ?>">
    			
        		<td class="title column-title has-row-actions column-primary page-title" data-colname="Title">
        			
					<strong><a class="row-title" href="<?php echo get_edit_post_link( $row_content->ID );?>"><?php echo $row_content->post_title; ?></a></strong>

                    <div class="row-actions">
                    	<span class='edit'><a href="<?php echo get_edit_post_link( $row_content->ID ); ?>">Edit</a> | </span><span class='view'><a href="<?php echo get_preview_post_link( $row_content->ID );?>" rel="bookmark">Preview</a></span>
                    </div>
                 </td>
                 <td class='author column-author' data-colname="Author">
                 	<?php echo $user_data->display_name; ?>
                 </td>
                 <td class='date column-date' data-colname="Date">Last Modified<br /><?php echo date( "Y/m/d h:i a", strtotime( $row_content->post_date ) ); ?></td>		
			</tr>