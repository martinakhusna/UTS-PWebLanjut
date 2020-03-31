<!-- <h1> ini halaman user </h1>

<h1>Hello, <?php echo $this->session->userdata('level'); ?>!</h1> 
<a href=" <?= base_url().'login/logout';?>"> Logout</a>-->

<div class="container" style="margin-top:20px">
    <div class="col-md-12">
        <h1 style="text-align: center; margin-bottom:30px"> Data Paket </h1>
    </div>
        <table class="table table-striped table-bordered" id="list_mhs">
        <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Paket</th>
                      <th>Harga Paket</th>
                    </tr>
                  </thead> 
                  <tbody>
                  <?php
                  for ($i= 0; $i < count($data_paket['data']); $i++) { ?>                 
                      <tr>
                        <td> <?= $i+1 ?></td>
                        <td> <?= $data_paket['data'][$i]['nama_paket'] ?></td>
                        <td> <?= $data_paket['data'][$i]['harga'] ?></td>
                    </tr>

                <?php } ?>
                </tbody>
        </table>
</div>