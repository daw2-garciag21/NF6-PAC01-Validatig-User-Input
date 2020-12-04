<?php
$db = mysqli_connect(gethostname(), 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));
?>
<html>
 <head>
  <title>Movie database</title>
  <style type="text/css">
   th { background-color: #999;}
   .odd_row { background-color: #EEE; }
   .even_row { background-color: #FFF; }
  </style>
 </head>
 <body>
 <table style="width:100%;">
  <tr>
    <th colspan="2">People <a href="people_copy.php?action=add"> [ADD]</a></th>
  </tr>
<?php
$query = 'SELECT * FROM people';
$result = mysqli_query($db, $query) or die (mysqli_error($db));

$odd = true;
while ($row = mysqli_fetch_assoc($result)) {
    echo ($odd == true) ? '<tr class="odd_row">' : '<tr class="even_row">';
    $odd = !$odd; 
    echo '<td style="width: 25%;">'; 
    echo $row['people_fullname'];
    echo '</td><td>';
    echo ' <a href="people_copy.php?action=edit&id=' . $row['people_id'] .
        '"> [EDIT]</a>'; 
    echo ' <a href="delete_copy.php?type=people&id=' . $row['people_id'] .
        '"> [DELETE]</a>';
    echo '</td></tr>';
}
?>
  </table>
 </body>
</html>
