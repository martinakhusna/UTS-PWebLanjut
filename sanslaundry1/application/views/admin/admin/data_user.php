<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Data user</h1>
        </div>

        <!-- <a href="<?= base_url('admin/data_user/tambah_user')?>" class="btn btn-primary mb-3"> <i class="fas fa-plus"></i>  Tambah Data</a> -->
        <?= $this->session->flashdata('pesan') ?>
        <table class="table table table-hover table-striped table-bordered" id="data_table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Level</th>
                    <th>Status</th>
                    <!-- <th>Scan KTP</th>
                    <th>Scan KK</th> -->
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no=1;
                    foreach($data as $u) : ?>
                        <tr>
                            <td><?= $no++?></td>
                            <td><?= $u->nama_usr?></td>
                            <td><?= $u->username?></td>
                            <td><?= $u->level?></td>
                            <td><?= $u->status?></td>
                            <td>
                                <div class="input-group-append">
                                <a href="<?= base_url('Data_user/delete/').'/'.$u->id_user?>" class="btn btn-sm btn-danger">Delete</a>
                                <a href="<?= base_url('Data_user/edit_user').'/'.$u->id_user?>" class="btn btn-sm btn-primary">Edit</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
            </tbody>

        </table>
    </section>
</div>





