<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <h3>Menu</h3>
                            <ul class="nav side-menu">
                                <?php if($this->session->userdata('level')=='admin') : ?>
                                <li><a><i class="fa fa-home"></i> Master <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo base_url();?>admin/paket">Paket Laundry</a>
                                        </li>
                                    </ul>

                                </li>
                                <?php endif?>

                                <li><a><i class="fa fa-edit"></i> Monitoring <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <?php if($this->session->userdata('level')=='admin') : ?>
                                            <li><a href="<?php echo base_url();?>admin/masuk">Cucian Masuk</a>
                                        <?php endif?>
                                        <?php if($this->session->userdata('level')=='super') : ?>
                                            <li><a href="<?php echo base_url();?>admin/tambahlaundry">Cucian Masuk</a>
                                        <?php endif?>
                                        </li>
                                        <li><a href="<?php echo base_url();?>admin/keluar">Cucian Keluar</a>
                                        </li>

                                    </ul>
                                </li>

                                <?php if($this->session->userdata('level')=='admin') : ?>
                                <li><a><i class="fa fa-bar-chart-o"></i> Other <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                    <li><a href="<?php echo base_url();?>admin/navigasi">On Prosess</a></li>  
                                    </ul>
                                </li>
                                <?php endif?>

                                <?php if($this->session->userdata('level')=='admin') : ?>
                                <li><a><i class="fa fa-edit"></i> Data Customer <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo base_url('Data_user');?>">Data</a>
                                        </li>
                                    </ul>

                                </li>
                                <?php endif?>
                                
                            </ul>
                        </div>
                        
                    </div>