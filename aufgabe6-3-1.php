<!DOCTYPE html>
<html>
 <head>
  <title>Aufgabe 6-3-1</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/style.css" rel="stylesheet">
 </head>
 <body>
  <h1>Aufgabe 6-3-1</h1>
  <table id="myTable">
   <thead id="tableHead">
    <tr>
     <th>BENI???</th>
     <th>Nachname</th>
     <th>Geschlecht</th>
     <th>Abteilung</th>
    </tr>
   </thead>
   <tbody>
    <?php
    $link = new mysqli('localhost', 'wwwrun', 'zbw98', 'personenverwaltung');

    if ($link->connect_errno) {
      echo '<tr>td colspan="4">Verbindungsfehler</td></tr>';
    } else {
      $link->set_charset('UTF-8');
      $sql = "SELECT firstname, lastname, sex, name FROM pv_person INNER JOIN pv_department ON pv_person.id_department_fk=pv_department.id ORDER BY pv_person.lastname, pv_person.firstname DESC";
      $result = $link->query($sql);
      while ($obj = $result->fetch_object()) {
        echo '<tr>';
        echo '<td>' . $obj->firstname . '</td>';
        echo '<td>' . $obj->lastname . '</td>';
        if ($obj->sex == 'w') {
          echo '<td>weiblich</td>';
        } else {
          echo '<td>männlich</td>';
        }
        echo '<td>' . htmlentities($obj->name) . '</td>';
        echo '</tr>';
      }
    }
    $link->close();
    ?>
   </tbody>
  </table>
  <script src="js/script.js"></script>
 </body>
</html>
