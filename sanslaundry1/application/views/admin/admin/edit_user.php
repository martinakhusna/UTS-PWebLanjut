
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Tambah Data user</h1>
		</div>

        
		<div class="card">
			<div class="card-body">

                <?php foreach($user as $us) : ?>

                <form action="<?= base_url('Data_user/edit_user_simpan')?>" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="hidden" name="id_user" value="<?=$us->id_user?>">
                                <input type="text" name="nama" class="form-control" value="<?= $us->nama_usr?>">
                                
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                
                                <input type="text" name="username" class="form-control" value="<?= $us->username?>">
                                
                            </div>
                            
                            <div class="form-group">
                                <label>Level</label>
                                <select name="level" class="form-control">
                                    <option value="<?= $us->level?>">
                                        <?= $us->level?>
                                    </option>

                                    <option value="admin">Admin</option>
                                    <option value="super">User</option>
                                </select>
                                
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="<?= $us->status?>">
                                    <?= $us->status?>
                                    </option>

                                    <option value="pending">Pending</option>
                                    <option value="aktif">Aktif</option>
                                </select>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                            <button type="reset" class="btn btn-danger mt-3">Reset</button>
                        </div>
                    </div>
                </form>

                <?php endforeach ?>

			</div>
		</div>
	</section>
</div>
