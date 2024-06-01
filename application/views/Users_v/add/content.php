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
                    <h3 class="card-title">Kullanıcı Ekleme İşlemi</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="POST" action="<?php echo base_url("Users/save") ?>">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Kullanıcı Adı:</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Kullanıcı Adını Giriniz.">
                                    <?php if (isset($formError)) { ?>
                                        <small><?php echo form_error("email"); ?></small>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">İsim:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="İsminizi Giriniz.">
                                    <?php if (isset($formError)) { ?>
                                        <small><?php echo form_error("name"); ?></small>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="surname" class="col-sm-2 col-form-label">Soyisim:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="surname" class="form-control" id="surname" placeholder="Soyisminizi Giriniz.">
                                    <?php if (isset($formError)) { ?>
                                        <small><?php echo form_error("surname"); ?></small>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-sm-2 col-form-label">Şifrenizi Giriniz:</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Şifrenizi Giriniz.">
                                    <?php if (isset($formError)) { ?>
                                        <small><?php echo form_error("password"); ?></small>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="re-password" class="col-sm-2 col-form-label">Şifrenizin Tekrarını Giriniz:</label>
                                <div class="col-sm-10">
                                    <input type="password" name="re-password" class="form-control" id="re-password" placeholder="Şifrenizin Tekrarını Giriniz.">
                                    <?php if (isset($formError)) { ?>
                                        <small><?php echo form_error("re-password"); ?></small>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kullanıcı Aktifliği:</label>
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
                            <a href="<?php echo base_url("Users") ?>" class="btn btn-default float-right">Vazgeç</a>
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