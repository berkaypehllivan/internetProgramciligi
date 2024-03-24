<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <!-- Main content -->
      <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Horizontal Form -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Yeni Şube Ekleme İşlemi</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="POST" action="<?php echo base_url("Branches/save") ?>">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">Şubenin Adı:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Şubenin Adını Giriniz.">
                                    <?php if (isset($formError)) { ?>
                                        <small><?php echo form_error("title"); ?></small>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="location" class="col-sm-2 col-form-label">Şubenin Konumu:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="location" class="form-control" id="location" placeholder="Şubenin Konumunu Giriniz.">
                                    <?php if (isset($formError)) { ?>
                                        <small><?php echo form_error("location"); ?></small>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Şubenin Durumu:</label>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input type="radio" id="status_active" name="status" value="1" class="form-check-input">
                                        <label for="status_active" class="form-check-label">Aktif</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" id="status_inactive" name="status" value="0" class="form-check-input">
                                        <label for="status_inactive" class="form-check-label">Pasif</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Kaydet</button>
                            <a href="<?php echo base_url("Branches") ?>" class="btn btn-default float-right">Vazgeç</a>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>

      <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->