<!-- jQuery -->
<script src="<?= base_url(); ?>public/personal_style/js/jquery.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url(); ?>public/personal_style/js/bootstrap.bundle.min.js"></script>

<!-- LÓGICA PARA CHAMAR UM SCRIPT ESPECIFICO DA VIEW -->
<?php if (isset($scripts)) {
  foreach ($scripts as $script_name) {
    $src = base_url() . $script_name; ?>
        <script src="<?=$src?>"></script>
  <?php }
} ?>

</html>