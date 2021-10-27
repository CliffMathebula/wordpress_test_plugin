<?php

/**
 * Plugin Name: cliff_plugin
 * Plugin URI: http://www.tbds.co.za/cliff_plugin
 * Description: The plugin for interview.
 * Version: 1.0
 * Author: Cliff Mathebula
 * Author URI: http://www.tbds.co.za
 */
require_once 'vendor/autoload.php';
?>
<!-- jquery & ajax code to send data -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#search_results').show();
        search();
    });

    function search() {
        //submit check domain form
        $('#search_form').submit(function() {
            var form_values = $('#search_form').serialize();
            $.ajax({
                type: 'POST',
                url: 'wp-content/plugins/cliff_plugin/includes/table2.php',
                data: form_values,
                success: function(data) {
                    //alert(data);

                    $('#search_results').html(data);
                    $('#search_results').show();
                }
            });
            return false;
        });
    }
</script>

<?php

function get_user_data()
{
    //include file for mockupapi data
    include('includes/obj_file.php');

?>
    <form id="search_form" name="search_form">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Select IP Address Or View All Results</label>
            <select class="form-control" name="search" id="exampleFormControlSelect1">
                <option value="view all">View All </option>
                <?php
                foreach ($obj as $mockAPI_info) { //foreach element in $arr
                    $ip_addr = $mockAPI_info['userIpAddress'];
                    echo '<option value=' . $ip_addr . '>' . $ip_addr . ' </option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <button class="btn btn-success" name="submit">view by selection</button>
        </div>
    </form>
    <?php //include('includes/table1.php'); 
    ?>
    <div name="search_results" id="search_results"></div><!-- display table-->
<?php
}

// Hook our function to WordPress the_content filter
add_filter('the_content', 'get_user_data');
