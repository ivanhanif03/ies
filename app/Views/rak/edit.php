<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Edit Rak</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= base_url('rak') ?>">Rak</a></div>
            <div class="breadcrumb-item">Edit</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-body">
                        <form action="<?= base_url('rak/update') . '/' . $rak['id']; ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <input type="hidden" name="gambar_rak_lama" value="<?= $rak['gambar_rak'] ?>">
                            <div class="row">
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="nama_rak" class="font-weight-bolder">Nama Rak</label>
                                    <input id="nama_rak" type="text" class="form-control <?php if (session('errors.nama_rak')) : ?>is-invalid<?php endif ?>" name="nama_rak" value="<?= $rak['nama_rak']; ?>" placeholder="Masukkan nama rak">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_rak'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="lokasi">Lokasi</label>
                                    <select class="form-control selectric text-sm" name="lokasi" id="lokasi" style="width: 100%;">
                                        <option value="" disabled selected>Pilih Lokasi</option>
                                        <?php if ($rak['lokasi'] == 'Sentul') : ?>
                                            <option value="Sentul" selected>Sentul</option>
                                            <option value="Surabaya">Surabaya</option>
                                            <option value="HO">Head Office</option>
                                        <?php elseif ($rak['lokasi'] == 'Surabaya') : ?>
                                            <option value="Sentul">Sentul</option>
                                            <option value="Surabaya" selected>Surabaya</option>
                                            <option value="HO">Head Office</option>
                                        <?php else : ?>
                                            <option value="Sentul">Sentul</option>
                                            <option value="Surabaya">Surabaya</option>
                                            <option value="HO" selected>Head Office</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class=" col-lg-2 col-sm-12">
                                    <img class="img-thumbnail img-preview" src="/img/gambar_rak/<?= $rak['gambar_rak'] ?>" alt="Gambar Rak">
                                </div>
                                <div class="input-group col-lg-4 col-sm-12">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input <?php if (session('errors.gambar_rak')) : ?>is-invalid<?php endif ?>" id="gambar_rak" name="gambar_rak" onchange="previewImg()">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('gambar_rak'); ?>
                                        </div>
                                        <label class="custom-file-label" for="gambar_rak"><?= $rak['gambar_rak'] ?></label>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="<?= base_url('rak') ?>" class="btn btn-md btn-secondary mr-1">Cancel</a>
                                <button type="submit" class="btn btn-primary btn-md">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
    function previewImg() {
        //Gambar Rak
        const gambar_rak = document.querySelector('#gambar_rak');
        const gambar_rak_label = document.querySelector('.custom-file-label');
        const img_preview = document.querySelector('.img-preview');

        gambar_rak_label.textContent = gambar_rak.files[0].name;

        const file_gambar_rak = new FileReader();
        file_gambar_rak.readAsDataURL(gambar_rak.files[0]);

        file_gambar_rak.onload = function(e) {
            img_preview.src = e.target.result;
        }
    }
</script>
<?= $this->endSection(); ?>