<!--    Helpful functions:    -->



<!-- Returns the HTML code of the table body.
  
$result - is a mysqli object
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

