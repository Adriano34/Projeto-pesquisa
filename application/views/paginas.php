<?php $this->load->view('layout/header');?>

<?php foreach($css_files as $file): ?>
  <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>

  <div style="padding: 10px">
    <?php echo $output; ?>
  </div>

<?php
  foreach($js_files as $file): 
?>
    <script src="<?php echo $file; ?>"></script>
<?php
  endforeach;

  if (isset($js_custom)) {
    echo $js_custom;
  }

  $this->load->view('layout/footer');

