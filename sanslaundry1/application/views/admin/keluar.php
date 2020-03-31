<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Data Laundry yang sudah di Ambil</h2>
            
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="close-link"></a></li>
                <li><a class="close-link"></a></li>
                <li><a class="close-link"></a></li>
                <li><a class="close-link"></a></li>
                <li><a class="close-link"></a></li>
                <a href="<?php echo base_url();?>admin/downloadkeluar"  class="btn btn-dark">Download Excel</a>
                                    <li><a class="close-link"></a></li>                                          </ul>  
                <div class="clearfix"></div>
        </div>


        <div class="x_content">
            <table id="example" class="table table-striped responsive-utilities jambo_table">
                <thead>
                    <tr class="headings">

                        <th>No </th>
                        <th>Nama Konsumen</th>
                        <th>Berat</th>
                        <th>Tanggal Masuk</th>
                        <th>Tanggal Keluar</th>
                        <th>Bayar</th>
                        <th>Paket</th>
                        <?php if($this->session->userdata('level')=='admin') : ?>
                            <th class=" no-link last"><span class="nobr">Action</span></th>
                        <?php endif ?>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <?php
            $no = 1;
            foreach ($data->result() as $row) {
            ?>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row->nama_konsumen; ?></td>
                        <td><?php echo $row->berat; ?></td>
                        <td><?php echo $row->tgl_masuk; ?></td>
                        <td><?php echo $row->tgl_keluar; ?></td>
                        <td><?php echo $row->bayar; ?></td>
                        <td><?php echo $row->nama_paket; ?></td>
                        <?php if($this->session->userdata('level')=='admin') : ?>
                        <td>
                            <a href="<?php echo base_url();?>admin/editlaundry/<?php echo $row->id_laundry; ?>"
                                class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                            <a href="<?php echo base_url();?>admin/deletelaundry/<?php echo $row->id_laundry; ?>"
                                onclick="return confirm('anda yakin akan menghapus data ini');"
                                class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>

                        </td>
                        <?php endif ?>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Datatables -->
<script src="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('input.tableflat').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
    });

    var asInitVals = new Array();
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>