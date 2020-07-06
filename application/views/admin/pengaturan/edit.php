
            <main class="dash-content" >
                <div class="container-fluid">
                   
                     <div class="row">
                        <div class="col-xl-12">
                            <div class="card easion-card">
                                <div class="card-header">
                                    <div class="easion-card-icon">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                    <div class="easion-card-title"> Pengaturan </div>
                                </div><?php foreach($blog->result() as $u) {?>
                                <div class="card-body ">
                                    <form method="post" action="">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="inputEmail4">Nama Blog</label>
                                                <input type="text" class="form-control" id="inputEmail4" placeholder="Nama Lengkap" name="nama" value="<?=$u->nama?>">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="inputState">Logo</label>
                                                 <input type="file" class="form-control" id="inputEmail4" placeholder="Username" name="logo" value="<?=$u->logo?>">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="inputState">Tentang</label>
                                                 <textarea id="summernote" class="display" name="tentang"><?=$u->tentang?></textarea>
                                            </div>
                                    <?php } ?>
                                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
