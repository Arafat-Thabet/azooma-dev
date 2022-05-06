
<footer class="footer">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 footer-copyright text-center">
        <p class="mb-0"><?= Session::get('sitename'); ?> © <?= date('Y'); ?>  </p>
      </div>
    </div>
  </div>
</footer>
<?=message_box('error')?>
<?=message_box('success')?>
  <script src="<?= asset(js_path() .'bootstrap.bundle.js') ?>"></script>
  <script src="<?= asset(js_path() .'sidebar-menu.js') ?>"></script>
  <script src="<?= asset(js_path() .'simplebar.js') ?>"></script>
  <script src="<?= asset(js_path() .'datatable/dataTables.min.js?1') ?>"></script>
  <script src="<?= asset(js_path() .'datatable/datatable.custom.js?3') ?>"></script>
  <script src="<?= asset(js_path() .'custom.js') ?>"></script>
  <script src="<?= asset(js_path() .'script.js') ?>"></script>
  <script src="<?= asset(js_path() .'index.js') ?>"></script>
  <script src="<?= asset(js_path() .'sweetalert2.js') ?>"></script>
  <script src="<?= asset(js_path() .'jqValidate/jquery.validate.min.js') ?>"></script>
  <script src="<?= asset(js_path() .'icons/feather-icon/feather.min.js') ?>"></script>
  <script src="<?= asset(js_path() .'icons/feather-icon/feather-icon.js') ?>"></script>

  <script src="<?= asset(js_path() .'select2.min.js') ?>"></script>
