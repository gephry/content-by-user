<?php 
/* 
 * All display table headers. Info provided by CBU-main
 */
?>


        <table class="wp-list-table widefat fixed striped table-view-list ".$header["type"]." >
        	<thead>
        		<tr>
			        <th scope="col" id='title' class='column-title column-primary desc'>
        				<span><?php echo $header["title"]; ?></span>
        			</th>
			        <th scope="col" id='author' class=''><?php echo $header["author"]; ?></th>
        			<th scope="col" id='date' class=''>
        				<span><?php echo $header["date"]?></span></a>
        			</th>
        		</tr>
        	</thead>
        <tbody id="the-list">
        