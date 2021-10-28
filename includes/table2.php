<?php

// set IP address and API access key 
$ip = $_POST['search'];
if ($ip !== 'view all') {
?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th><small>Code</small></th>
                <th><small>Continent</small></th>
                <th></small>Country Code</small></th>
                <th><small>Country Name</small></th>
                <th><small>Region Code</small></th>
                <th><small>Region Name</small></th>
                <th><small>City</small></th>
                <th><small>Zip</small></th>
                <th><small>Latitude</small></th>
                <th><small>Longitude</small></th>
                <th><small>Geoname ID<small></th>
                <th><small>Capital</small></th>
            </tr>
        </thead>
        <tbody>

            <?php

            $access_key = '69ae6df03fc1d5736596b361ec66a7be&format=1';

            // Initialize CURL:
            $ch = curl_init('http://api.ipstack.com/' . $ip . '?access_key=' . $access_key . '');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            // Store the data:
            $json = curl_exec($ch);
            curl_close($ch);

            // Decode JSON response:
            $api_result = json_decode($json, true);

            // Output the "capital" object inside "location"
            $continet_code = $api_result['continent_code'];
            $conti_name = $api_result['continent_name'];
            $country_code = $api_result['country_code'];
            $country_name = $api_result['country_name'];
            $region_code = $api_result['region_code'];
            $region_name = $api_result['region_name'];
            $city = $api_result['city'];
            $zip = $api_result['zip'];
            $latitude = $api_result['latitude'];
            $longitude = $api_result['longitude'];
            $geoname_id = $api_result['location']['geoname_id'];
            $capital = $api_result['location']['capital'];
            ?>
            <tr>
                <td><small><?php echo $continet_code; ?><small></td>
                <td><small><?php echo $conti_name; ?></small></td>
                <td><small><?php echo $country_code; ?></small></td>
                <td><small><?php echo $country_name; ?></small></td>
                <td><small><?php echo $region_code; ?></small></td>
                <td><small><?php echo $region_name; ?></small></td>
                <td><small><?php echo $city; ?></small></td>
                <td><small><?php echo $zip; ?></small></td>
                <td><small><?php echo $capital; ?></small></td>
                <td><small><?php echo $latitude; ?></small></td>
                <td><small><?php echo $longitude; ?></small></td>
                <td><small><?php echo $ip; ?></small></td>

            </tr>

        </tbody>
    </table>
<?php

}elseif ($ip === 'view all') {

    
    //include file for mockupapi data
    include('obj_file.php');
?>
<table class="table table-striped" name="all_results" id="all_results">
            <thead>
                <tr>
                    <th><small>id</small></th>
                    <th><small>Date Created</small></th>
                    <th><small>Name</small></th>
                    <th><small>Job Description</small></th>
                    <th><small>User Email</small></th>
                    <th><small>Continent Name</small></th>
                    <th><small>Country Name</small></th>
                    <th><small>Region Name</small></th>
                    <th><small>City</small></th>
                    <th><small>Capital</small></th>
                    <th><small>Latitude</small></th>
                    <th><small>Longitude</small></th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($obj as $mockAPI_info) { //foreach element in $arr

                    // set IP address and API access key 
                    $ip = $mockAPI_info['userIpAddress'];
                    $access_key = '69ae6df03fc1d5736596b361ec66a7be&format=1';

                    // Initialize CURL:
                    $ch = curl_init('http://api.ipstack.com/' . $ip . '?access_key=' . $access_key . '');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                    // Store the data:
                    $json = curl_exec($ch);
                    curl_close($ch);

                    // Decode JSON response:
                    $api_result = json_decode($json, true);

                    $id = $mockAPI_info['id'];
                    $created = $mockAPI_info['createdAt'];
                    $name = $mockAPI_info['name'];
                    $jobdesc = $mockAPI_info['jobDescription'];
                    $email = $mockAPI_info['userEmail'];
                    $ip_addr = $mockAPI_info['userIpAddress'];
                    $useragent = $mockAPI_info['userAgent'];

                    // Output the "capital" object inside "location"
                    $continet_code = $api_result['continent_code'];
                    $conti_name = $api_result['continent_name'];
                    $country_code = $api_result['country_code'];
                    $contry_name = $api_result['country_name'];
                    $region_code = $api_result['region_code'];
                    $region_name = $api_result['region_name'];
                    $city = $api_result['city'];
                    $zip = $api_result['zip'];
                    $latitude = $api_result['latitude'];
                    $longitude = $api_result['longitude'];
                    $geoname_id = $api_result['location']['geoname_id'];
                    $capital = $api_result['location']['capital'];
                ?>
                    <tr>
                        <td><small><?php echo $id; ?></small></td>
                        <td><small><?php echo $created; ?></small></td>
                        <td><small><?php echo $name; ?></small></td>
                        <td><small><?php echo $jobdesc; ?></small></td>
                        <td><small><?php echo $email; ?></small></td>
                        <td><small><?php echo $conti_name; ?></small></td>
                        <td><small><?php echo $contry_name; ?></small></td>
                        <td><small><?php echo $region_name; ?></small></td>
                        <td><small><?php echo $city; ?></small></td>
                        <td><small><?php echo $capital; ?></small></td>
                        <td><small><?php echo $latitude; ?></small></td>
                        <td><small><?php echo $longitude; ?></small></td>
                    </tr>

                <?php
                }
                ?>
            </tbody>
        </table>
<?php
}
