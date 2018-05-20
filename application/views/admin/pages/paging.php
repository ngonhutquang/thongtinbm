
<div class="container">
            <h1 id='form_head'>User Listing</h1>
 
            <?php if (isset($results)) { ?>
            		<table id="example" class="display" cellspacing="0" width="100%">
	        <thead>
	            <tr>
	                <th>ID</th>
	                        <th>NAME</th>
	            </tr>
	        </thead>   
	        <tbody>  
                  
                     
                    <?php foreach ($results as $data) { ?>
                        <tr>
                            <td><?php echo $data->uid ?></td>
                            <td><?php echo $data->uname ?></td>
                        </tr>

                    <?php } ?>
            </tbody>
                </table>
            <?php } else { ?>
                <div>No user(s) found.</div>
            <?php } ?>
 
            <?php if (isset($links)) { ?>
                <?php echo $links."           " ?>
            <?php } ?>
        </div>
    </body>

     <script type="text/javascript">
            $(document).ready(function() {
                     $('#example').DataTable({
                        "paging":   false
                     });
    } );
    </script>