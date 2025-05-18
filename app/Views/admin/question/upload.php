<?= $this->extend('layouts/admin-layout') ?>

<?= $this->section('title') ?>
Upload file excel
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid">

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="btn-group pull-right">
                    <ol class="breadcrumb hide-phone p-0 m-0">
                        <li class="breadcrumb-item"><a href="#">Upcube</a></li>
                        <li class="breadcrumb-item"><a href="#">Forms</a></li>
                        <li class="breadcrumb-item active">File Uploads</li>
                    </ol>
                </div>
                <h4 class="page-title">File Uploads</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="alert alert-danger" role="alert" >
                        <?= validation_list_errors() ?>
                    </div>

                    <div class="m-b-30">
                        <form action="<?=base_url('/admin/question/upload')?>" method="post" enctype="multipart/form-data" >
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Lớp:</label>
                                <div class="col-sm-2">
                                    <select name="grade_code" class="form-control">
                                        <option value="">Chọn lớp</option>
                                        <?php foreach ($grades as $item): ?>
                                            <option value="<?=$item['code']?>"><?= esc($item['name']) ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="fallback col-sm-4">
                                    <input name="excel_file" type="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Send Files</button>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

</div> <!-- end container -->
<?= $this->endSection() ?>


