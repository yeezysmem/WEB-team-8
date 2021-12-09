<!--    Helpful functions:    -->



<!-- 
Returns the HTML code of the table body.
  
$result - a mysqli object
-->
<?php 
function table_body_from($result) {
  while ($row = $result->fetch_assoc()) { ?>

    <tr>
      <td>
        <?= implode('</td><td>', array_values($row)); ?></td>
      </tr>

      <?php
    }
  } ?>







<?php 
function post_the_id($url, $id) {
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($id)
        )
    );

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result === FALSE) { 
        echo "Something went wrong: \$result === FALSE";
    }
}
?>


