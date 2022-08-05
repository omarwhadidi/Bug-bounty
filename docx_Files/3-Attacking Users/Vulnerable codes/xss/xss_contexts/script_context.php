<?php
  $id = $_GET['id'];
  $name = $_GET['name'];

?>
<!DOCTYPE html>
<!-- Some more html -->

<script type="text/javascript">
  function getLink() {
    var link = "https://my-website.com/post.php?id=<?= $id; ?>";
  }
   var name = "<?php echo $_GET['name']; ?>";


    
</script>
