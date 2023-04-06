<footer class="main-footer">
    <div class="footer-left">
        Copyright &copy; 2023 <div class="bullet"></div> IES Portal</a>
    </div>
    <div class="footer-right">
        1.0
    </div>
</footer>
</div>
</div>

<!-- General JS Scripts -->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> -->
<script src="<?= base_url('stisla/modules/jquery/jquery-3.3.1.min.js') ?>"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
<script src="<?= base_url('stisla/modules/popper/popper.min.js') ?>"></script>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
<script src="<?= base_url('stisla/modules/bootstrap/bootstrap.min.js') ?>"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script> -->
<script src="<?= base_url('stisla/modules/jquery/jquery.nicescroll.min.js') ?>"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script> -->
<script src="<?= base_url('stisla/modules/moment/moment.min.js') ?>"></script>
<!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
<script src="<?= base_url('stisla/js/stisla.js') ?>"></script>

<!-- JS Libraies -->
<script src="<?= base_url('stisla/modules/chocolat/dist/js/jquery.chocolat.min.js') ?>"></script>
<script src="<?= base_url('stisla/modules/datatables/datatables.min.js') ?>"></script>
<script src="<?= base_url('stisla/modules/bootstrap/daterangepicker.js') ?>"></script>
<script src="<?= base_url('stisla/modules/bootstrap/bootstrap-timepicker.min.js') ?>"></script>
<script src="<?= base_url('stisla/modules/datatables/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('stisla/modules/datatables/dataTables.select.min.js') ?>"></script>
<script src="<?= base_url('stisla/modules/jquery-ui/jquery-ui.min.js') ?>"></script>
<script src="<?= base_url('stisla/modules/select2/select2.full.min.js') ?>"></script>
<script src="<?= base_url('stisla/modules/selectric/jquery.selectric.min.js') ?>"></script>

<!-- Template JS File -->
<script src="<?= base_url('stisla/js/scripts.js') ?>"></script>
<script src="<?= base_url('stisla/modules/chart.js/chart.js') ?>"></script>
<script src="<?= base_url('stisla/js/custom.js') ?>"></script>

<!-- Custom JS -->
<script>
    //Time Alert
    $(document).ready(function() {
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 5000);
    });
</script>

<!-- Page Specific JS File -->
<?= $this->renderSection('script'); ?>
</body>

</html>