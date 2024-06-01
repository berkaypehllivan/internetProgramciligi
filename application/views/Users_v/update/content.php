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
                    <h3 class="card-title">Kullanıcı Güncelleme İşlemi</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="<?php echo base_url("Users/update/$item->id") ?>">
                    <div class="card-body">
                        <div class="form-group row" style="margin-bottom: 1rem;">
                            <label for="email" class="col-sm-2 col-form-label">Kullanıcı Mail:</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" id="email" value="<?php echo $item->email; ?>">
                                <?php if (isset($formError)) { ?>
                                    <small><?php echo form_error("email"); ?></small>
                                <?php } ?>
                            </div>
                        </div>
                        
                        <div class="form-group row" style="margin-bottom: 1rem;">
                            <label for="name" class="col-sm-2 col-form-label">İsim:</label>
                            <div class="col-sm-10">
                                <input type="name" name="name" class="form-control" id="name" value="<?php echo $item->name; ?>">
                                <?php if (isset($formError)) { ?>
                                    <small><?php echo form_error("name"); ?></small>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="form-group row" style="margin-bottom: 1rem;">
                            <label for="surname" class="col-sm-2 col-form-label">Soyisim:</label>
                            <div class="col-sm-10">
                                <input type="surname" name="surname" class="form-control" id="surname" value="<?php echo $item->surname; ?>">
                                <?php if (isset($formError)) { ?>
                                    <small><?php echo form_error("surname"); ?></small>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="form-group row" style="margin-bottom: 1rem;">
                            <label for="password" class="col-sm-2 col-form-label">Şifre:</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Yeni Şifre Giriniz.">
                                <?php if (isset($formError)) { ?>
                                    <small><?php echo form_error("password"); ?></small>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="form-group row" style="margin-bottom: 1rem;">
                            <label for="re-password" class="col-sm-2 col-form-label">Şifre Yeniden:</label>
                            <div class="col-sm-10">
                                <input type="password" name="re-password" class="form-control" id="re-password" placeholder="Kullanıcı Şifresini Yeniden Giriniz.">
                                <?php if (isset($formError)) { ?>
                                    <small><?php echo form_error("re-password"); ?></small>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Güncelle</button>
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