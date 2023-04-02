<?php
$menu = mysqli_query($conn, "SELECT * FROM menu");
$arr = array();
while ($row = mysqli_fetch_assoc($menu)) {
    $json[] = $row;
}
echo "<div>";
 $json_array = json_encode($json);
echo "</div>"; 
?>

<script> 
const categories = <?php echo $json_array; ?>
</script>

    <!-- Main Content -->
    <script src="dist/js/header.js"></script>
    <script src="dist/js/svg_icons.js"></script>
    <script src="dist/js/sidebar_nav.js"></script>
    <script src="dist/js/categories.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   
  </body>
</html>
<?php
ob_flush();
?>










