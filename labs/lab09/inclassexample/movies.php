<?php 
  include('includes/init.inc.php'); 
  include('includes/config.inc.php'); 
  include('includes/functions.inc.php'); 
?>

<title>PHP &amp; MySQL - ITWS</title>

<?php include('includes/head.inc.php'); ?>

<h1>PHP &amp; MySQL</h1>


<?php include('includes/menubody.inc.php'); ?>

<?php
$dbOk = false;

@$db = new mysqli($GLOBALS['DB_HOST'], $GLOBALS['DB_USERNAME'], $GLOBALS['DB_PASSWORD'], $GLOBALS['DB_NAME']);

if ($db->connect_error) {
   echo '<div class="messages">Could not connect to the database. Error: ';
   echo $db->connect_errno . ' - ' . $db->connect_error . '</div>';
} else {
   $dbOk = true;
}

$havePost = isset($_POST["save"]);

$errors = '';
if ($havePost) {

   $title = htmlspecialchars(trim($_POST["title"]));
   $year = htmlspecialchars(trim($_POST["year"]));

   $focusId = '';

   if ($title == '') {
      $errors .= '<li>Title may not be blank</li>';
      if ($focusId == '') $focusId = '#title';
   }
   if ($year == '') {
      $errors .= '<li>Year may not be blank</li>';
      if ($focusId == '') $focusId = '#year';
   }

   if ($errors != '') {
      echo '<div class="messages"><h4>Please correct the following errors:</h4><ul>';
      echo $errors;
      echo '</ul></div>';
      echo '<script type="text/javascript">';
      echo '$(document).ready(function() { $("' . $focusId . '").focus(); });';
      echo '</script>';
   } else {
      if ($dbOk) {

         $title = trim($_POST["title"]);
         $year = trim($_POST["year"]);

         // FIXED insert query
         $insQuery = "INSERT INTO movies (title, year) VALUES (?, ?)";
         $statement = $db->prepare($insQuery);

         // Only 2 params, both strings
         $statement->bind_param("ss", $title, $year);

         $statement->execute();

         echo '<div class="messages"><h4>Success: ' . $statement->affected_rows . ' movie added to database.</h4>';
         echo $title . ' released in ' . $year . '</div>';

         $statement->close();
      }
   }
}
?>

<h3>Add Movie</h3>
<form id="addForm" name="addForm" action="movies.php" method="post">
   <fieldset>
      <div class="formData">

         <label class="field" for="title">Title:</label>
         <div class="value"><input type="text" size="60" 
            value="<?php if ($havePost && $errors != '') echo $title; ?>" 
            name="title" id="title" /></div>

         <label class="field" for="year">Year:</label>
         <div class="value"><input type="text" size="60" 
            value="<?php if ($havePost && $errors != '') echo $year; ?>" 
            name="year" id="year" /></div>

         <input type="submit" name="save" value="Save Movie" />

      </div>
   </fieldset>
</form>

<h3>Movies</h3>
<table id="movieTable">
<?php
if ($dbOk) {

  $query = "SELECT * FROM movies ORDER BY year";
  $result = $db->query($query);

  echo '<tr><th>Title</th><th>Year</th></tr>';

  echo '<tr><th>Title</th><th>Year</th><th></th></tr>';

  $i = 0;
  while ($record = $result->fetch_assoc()) {
    $rowClass = ($i % 2 == 0 ? '' : 'class="odd"');

    echo "<tr $rowClass id='movie-{$record['movieid']}'>";
    echo "<td>" . htmlspecialchars($record['title']) . "</td>";
    echo "<td>" . htmlspecialchars($record['year']) . "</td>";
    echo "<td><img src='resources/delete.png' class='deleteMovie' width='16' height='16' alt='delete movie'/></td>";
    echo "</tr>";
      
    $i++;
  }
   $result->free();
   $db->close();
}
?>
</table>

<?php include('includes/foot.inc.php'); ?>
