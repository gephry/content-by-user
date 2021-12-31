<?php  
/* 
 * Data that will be shown:
 * 
 * comment_author
 * comment_post_ID (view post info)
 * comment_date
 * 
 * post_title
 */ 

?>
        	<tr id="post-<?php echo $row_content->ID; ?>" class="post-<?php echo $row_content->ID; ?> type-page status-<?php echo $row_content->post_status; ?>">
    			
        		<td class="title column-title has-row-actions column-primary page-title" data-colname="Title">
        			
					<strong><a class="row-title" href="<?php echo get_preview_post_link( $row_content->comment_post_ID );?>"><?php echo $row_content->post_title; ?></a></strong>

                    <div class="row-actions">
                    	<span class='view'><a href="<?php echo get_preview_post_link( $row_content->comment_post_ID );?>" rel="bookmark">View post</a></span>
                    </div>
                 </td>
                 <td class='author column-author' data-colname="Author">
                 	<?php echo $row_content->comment_author; ?>
                 </td>
                 <td class='date column-date' data-colname="Date">Last Modified<br /><?php echo date( "Y/m/d h:i a", strtotime( $row_content->comment_date ) ); ?></td>		
			</tr>