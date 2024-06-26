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
                        <h3 class="card-title">Ürün Kategorisi Ekleme İşlemi</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="POST" action="<?php echo base_url("Branches/update/$item->id") ?>">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">Ürün Kategorisi Adı:</label>
                                <div class="col-sm-10">

                                    <input type="text" name="title" class="form-control" id="title" value="<?php echo isset($formError) ? set_value("title") : $item->title; ?>" placeholder="Şubenin Adını Giriniz.">

                                    <?php if (isset($formError)) { ?>
                                        <small><?php echo form_error("title"); ?></small>
                                    <?php } ?>
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