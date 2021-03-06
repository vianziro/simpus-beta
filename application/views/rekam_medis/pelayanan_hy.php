<style type="text/css">
	.kd_penyakit {
		border-radius: 0px;
		background: #4a4a4a;
		color: #96f226;
		border: 1px solid #454545;
		height: 0 0 30px;
	}
	
	.ui-tooltip {
		background: #4a4a4a;
		color: #96f226;
		border: 2px solid #454545;
		border-radius: 0px;
		box-shadow: 0 0 
	}
	.ui-autocomplete {
		background: #4a4a4a;
		border-radius: 1px;
	}
	.ui-autocomplete.source:hover {
		background: #454545;
	}
	
	.ui-menu .ui-menu-item a{
		color: #ffffff;
		border-radius: 0px;
		border: 1px solid #454545;
	}
	
	.ui-menu .ui-menu-item a:hover{
		color: #96f226;
		border-radius: 0px;
		border: 1px solid #454545;
	}
	
	#rawat-inap { display: none;}
	#rawat-inap2 { display: none;}
</style>
<?php if($this->session->flashdata('flash_message') != ""):?>
 		<script>
			jAlert('<?php echo $this->session->flashdata('flash_message'); ?>', 'Informasi');
		</script>
<?php endif;?>
<div class="rightpanel">
	<div class="breadcrumbwidget">
    	<ul class="breadcrumb">
        	<li><a href="#">Home</a> <span class="divider">/</span></li>
            <li><a href="#">Master Pelayanan</a> <span class="divider">/</span></li>
            <li class="active"><?php echo $page_title; ?></li>
        </ul>
	</div><!--breadcrumbwidget-->
    <div class="pagetitle">
    	<h1><?php echo $page_title; ?></h1> <span>Halaman manajemen data pelayanan pasien</span>
    </div><!--pagetitle-->
     
    <div class="maincontent">
    	<div class="contentinner content-dashboard">
        	<div class="row-fluid">
            	<div class="span12">
					<div id="tabs">
  	 					<ul>
                        	<?php if(isset($edit_pelayanan)):?>
            				<li class="ui-tabs-active"><a href="#ubah"><i class="icon-edit"></i> Ubah Data Transaksi Pelayanan</a></li>
            				<?php endif;?>
      						
                            <li class="<?php if(!isset($edit_pelayanan) && strlen($this->uri->segment(3)) < 17)echo 'ui-tabs-active';?>"><a href="#list"><i class="icon-align-justify"></i> Daftar Transaksi Pelayanan</a></li>
                            <li class="<?php if(!isset($edit_pelayanan) && strlen($this->uri->segment(3)) >= 17)echo 'ui-tabs-active'; ?>"><a href="#tambah"><i class="icon-plus"></i>Transaksi Pelayanan Baru</a></li>
                        </ul>
                        
                        <!----EDITING FORM STARTS---->
        				<?php if(isset($edit_pelayanan)):?>
                        <div id="ubah">
                        	<h4 class="widgettitle">Transaksi Pelayanan</h4>
                            <?php foreach ($edit_pelayanan as $row): ?>
                            <?php echo form_open('cont_transaksi_pelayanan/pelayanan/ubah/do_update/'.$row['kd_trans_pelayanan'], array('class' => 'stdform', 'id' => 'form_edit')); ?>
                            
                            <div class="row-fluid">
                            <div class="span6">
                            	<table class="table table-bordered table-invoice">
                                	<!--
                                    <tr>
                                    	<td class="width30">No. Rekam Medis</td>
                                        <td class="width70"><input type="text" name="kd_rekam_medis" id="kd_rekam_medis" class="input-large" /></td>
                                    </tr>
                                    -->
                                    <tr>
                                    	<td>No. Rekam Medis</td>
                                        <td><input type="text" name="kd_rekam_medis" id="kd_rekam_medis2" class="input-large" value="<?php echo $row['kd_rekam_medis']; ?>" readonly /></td>
                                    </tr>
                                    <tr>
                                    	<td>Nama Lengkap</td>
                                        <td><input type="text" name="nm_lengkap" id="nm_lengkap2" class="input-large" value="<?php echo $edit_pasien['nm_lengkap']; ?>" readonly /></td>
                                    </tr>
                                    <tr>
                                        <td>NIK</td>
                                        <td><input type="text" name="nik" id="nik2" class="input-large" value="<?php echo $edit_pasien['nik']; ?>" readonly /></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Lahir</td>
                                        <td><input type="text" name="tanggal_lahir" id="tanggal_lahir2" class="input-small" value="<?php echo $this->functions->convert_date_indo(array("datetime" => $edit_pasien['tanggal_lahir'])); ?>" readonly /> <i>dd-mm-yyyy</i></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>
                                        	<input type="text" name="jenis_kelamin" id="jenis_kelamin2" class="input-large" value="<?php echo $edit_pasien['jenis_kelamin']; ?>" readonly />
                                       </td>
                                    </tr>
                                    
                                </table>
                            </div>
                            <div class="span6">
                            	<table class="table table-bordered table-invoice">
                                	<tr>
                                        <td class="width30">Tanggal Transaksi</td>
                                        <td class="width70"><input type="text" name="tgl_pelayanan" id="tgl_pelayanan2" readonly class="input-large" value="<?php echo $this->functions->convert_date_indo(array("datetime" => $row['tgl_pelayanan'])); ?>" /></td>
                                    </tr>
                                    <tr>
                                    <tr>
                                    	<td>No. KK</td>
                                        <td><input type="text" name="no_kk" id="no_kk2" class="input-large" value="<?php echo $edit_pasien['no_kk']; ?>" readonly /></td>
                                    </tr>
                                    <tr>
                                    	<td>Nama KK</td>
                                        <td><input type="text" name="nm_kk" id="nm_kk2" class="input-large" value="<?php echo $edit_pasien['nm_kk']; ?>" readonly /></td>
                                    </tr>
                                    <!--
                                    <tr>
                                        <td>Golongan Darah</td>
                                        <td><input type="text" name="gol_darah" id="gol_darah2" class="input-large" value="<?php echo $edit_pasien['gol_darah']; ?>" readonly /></td>
                                    </tr>
                                    
                                    <tr>
                                    	<td>Cara Bayar</td>
                                        <td><input type="text" name="cara_bayar" id="cara_bayar2" class="input-large" value="<?php echo $edit_pasien['cara_bayar']; ?>" readonly /></td>
                                    </tr>
                                    !-->
                                </table>
                            </div>
                            </div>
                            <div class="clearfix"><br/></div>
                            
                            
                            <div class="widgetcontent">
                			<!-- START OF TABBED WIZARD -->
                    			<div id="wizard1" class="wizard tabbedwizard">
                    				<ul class="tabbedmenu anchor">
                            			<li>
                                            <a href="#wiz1step1_1" class="selected" isdone="1" rel="1">
                                                <span class="h2">STEP 1</span>
                                                <span class="label">Unit Pelayanan</span>
                                            </a>
                            			</li>
                            			<li>
                                            <a href="#wiz1step1_2" class="disabled" isdone="0" rel="2">
                                                <span class="h2">STEP 2</span>
                                                <span class="label">Rekam Medis</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#wiz1step1_3" class="disabled" isdone="0" rel="3">
                                                <span class="h2">STEP 3</span>
                                                <span class="label">Obat</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#wiz1step1_4" class="disabled" isdone="0" rel="4">
                                                <span class="h2">STEP 4</span>
                                                <span class="label">Rujukan</span>
                                            </a>
                                        </li>
                        			</ul>
                                    
                        			<div id="wiz1step1_1" class="formwiz content" style="display: block;">
                        				<h4>Step 1: Unit Pelayanan</h4>
                                        <p>
                                            <label>Jenis Pelayanan</label>
                                            <span class="field">
                                            	<select name="kd_jenis_layanan" id="kd_jenis_layanan2" class="uniformselect">
                                               		<option value="-">Pilih Jenis Pelayanan</option>
													<?php foreach($list_jenis_layanan as $ljl) : ?>
                                                    <?php 
														if($ljl['kd_jenis_layanan'] == $row['kd_jenis_layanan'])
                                                    		echo '<option value="'.$ljl['kd_jenis_layanan'].'" selected>'.$ljl['jenis_layanan'].'</option>';
														else
															echo '<option value="'.$ljl['kd_jenis_layanan'].'">'.$ljl['jenis_layanan'].'</option>';
                                                     ?>
                                                    <?php endforeach; ?>
                            					</select>
                                           </span>
                                        </p>
                                        <p>
                                            <label>Unit pelayanan yang dituju</label>
                                            <span class="field">
                                            	<select name="kd_unit_pelayanan" id="kd_unit_pelayanan2" class="uniformselect">
                                               		<option value="-">Pilih Unit Pelayanan</option>
													<?php foreach($list_unit_pelayanan as $lup) : ?>
                                                    	<?php 
														if($lup['kd_unit_pelayanan'] == $row['kd_unit_pelayanan'])
                                                    		echo '<option value="'.$lup['kd_unit_pelayanan'].'" selected>'.$lup['nm_unit'].'</option>';
														else
															echo '<option value="'.$lup['kd_unit_pelayanan'].'">'.$lup['nm_unit'].'</option>';
                                                     	?>
                                                    <?php endforeach; ?>
                            					</select>
                                            </span>
                                        </p>                             
                                        <p>
                                            <label>Petugas yang melayani</label>
                                            <span class="field">
                                            	<select name="kd_petugas" id="kd_petugas2" class="uniformselect">
                                               		<option value="-">Pilih Petugas</option>
													<?php foreach($list_petugas as $lp) : ?>
                                                        <?php 
														if($lp['kd_petugas'] == $row['kd_petugas'])
                                                    		echo '<option value="'.$lp['kd_petugas'].'" selected>'.$lp['nama_petugas'].'</option>';
														else
															echo '<option value="'.$lp['kd_petugas'].'">'.$lp['nama_petugas'].'</option>';
                                                     	?>
                                                    <?php endforeach; ?>
                            					</select>
                                            </span>
                                        </p>
                                        
                                        <div id="rawat-inap2">
                                        	<h4>Data Ruang Inap</h4>
                                        	<p>
                                                <label>Kelas</label>
                                                <span class="field">
                                                    <select name="kelas" id="kelas2" class="uniformselect">
                                                        <option value="-">Pilih Kelas</option>
                                                        <?php
															if(isset($edit_bed)){
																for($i=1; $i<=3; $i++){
																	if($i == $edit_bed['kelas'])
																		echo '<option value="'.$i.'" selected>Kelas '.$i.'</option>';
																	else
																		echo '<option value="'.$i.'">Kelas '.$i.'</option>';
																}
															} else { ?>
																<option value="1">Kelas 1</option>
                                                       			<option value="2">Kelas 2</option>
                                                        		<option value="3">Kelas 3</option>
													  <?php } ?>
													
                                                        
                                                    </select>
                                                </span>
                                            </p>
                                            <p>
                                                <label>Ruangan</label>
                                                <span class="field">
                                                    <select name="kd_ruangan" id="kd_ruangan2" class="uniformselect">
                                                        <option value="-">Pilih Ruangan</option>
                                                        <?php foreach($list_ruangan as $lr) : ?>
                                                            <?php 
															if($lr['kd_ruangan'] == $edit_bed['kd_ruangan'])
																echo '<option value="'.$lr['kd_ruangan'].'" selected>'.$lr['nm_ruangan'].'</option>';
															else
																echo '<option value="'.$lr['kd_ruangan'].'">'.$lr['nm_ruangan'].'</option>';
															?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </span>
                                            </p>
                                            <p>
                                                <label>Kamar</label>
                                                <span class="field">
                                                    <select name="kd_bed" id="kd_bed2" class="uniformselect">
                                                        <option value="-">Pilih Kamar</option>
                                                         <?php foreach($list_bed as $lb) : ?>
                                                            <?php 
															if($lb['kd_bed'] == $edit_bed['kd_bed'])
																echo '<option value="'.$lb['kd_bed'].'" selected>Kamar '.$lb['no_kamar'].' - Bed '.$lb['no_bed'].'</option>';
															else
																echo '<option value="'.$lb['kd_bed'].'">Kamar '.$lb['no_kamar'].' - Bed '.$lb['no_bed'].'</option>';
															?>
                                                         <?php endforeach; ?>
                                                    </select>
                                                </span>
                                            </p>

                                        </div> <!-- end Rawat Inap -->
                        			</div>
                            		<div id="wiz1step1_2" class="formwiz content" style="display: none;">
                                        <h4>Step 2: Rekam Medis</h4> 
                                        <p>
                                            <label>Dokter</label>
                                            <span class="field">
                                            	<select name="kd_dokter" id="kd_dokter2" class="uniformselect">
                                               		<option value="NULL">Pilih Dokter</option>
													<?php foreach($list_dokter as $ld) : ?>
                                                    	<?php 
															if($ld['kd_dokter'] == $row['kd_dokter'])
																echo '<option value="'.$ld['kd_dokter'].'" selected>'.$ld['nm_dokter'].'</option>';
															else
																echo '<option value="'.$ld['kd_dokter'].'">'.$ld['nm_dokter'].'</option>';
															?>
                                                    <?php endforeach; ?>
                            					</select>
                                            </span>
                                        </p>
                                        <p>
                                            <label>Anamnesa</label>
                                            <span class="field"><textarea cols="80" rows="5" class="span6" name="anamnesa" id="anamnesa2"><?php echo $row['anamnesa']; ?></textarea></span>
                                        </p>
                                        <p>
                                            <label>Catatan Fisik</label>
                                            <span class="field"><textarea cols="80" rows="5" class="span6" name="cat_fisik" id="cat_fisik2"><?php echo $row['cat_fisik']; ?></textarea></span>
                                        </p>  
                                        <p>
                                            <label>Catatan Dokter</label>
                                            <span class="field"><textarea cols="80" rows="5" class="span6" name="cat_dokter" id="cat_dokter2"><?php echo $row['cat_dokter']; ?></textarea></span>
                                        </p> 
                                        <h4>Diagnosa</h4>
                                        <p>
                                            <table class="table table-stripped table-bordered" id="tbl-penyakit2">
                                                <colgroup>
                                                    <col class="con0" />
                                                    <col class="con1" />
                                                    <col class="con0" />
                                                    <col class="con1" />
                                                    <col class="con0" />
                                                </colgroup>
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Kode Penyakit</th>
                                                        <th>Penyakit</th>
                                                        <th>Jenis Kasus</th>
                                                        <th>Jenis Diagnosa</th>
                                                     </tr>
                                                </thead>
                                                <tbody>
                                                <?php $i=0; ?>
                                                <?php foreach($edit_penyakit as $ep): ?>
                                                    <?php $i++; ?>
                                                    <tr>
                                                    	<td>
                                                        	<div id="<?php echo $i; ?>"><?php echo $i; ?></div>
                                                        </td>
                                                        <td>
                                                        	<input type="text" name="kd_penyakit_<?php echo $i; ?>" id="kd_penyakit2_<?php echo $i; ?>" value="<?php echo $ep['kd_penyakit']; ?>" class="kd_penyakit2 input-large" />
                                                        </td>
                                                        <td>
                                                        	<input type="text" name="penyakit_<?php echo $i; ?>" id="penyakit2_<?php echo $i; ?>" value="<?php echo $ep['penyakit']; ?>" class="penyakit2 input-large" />
                                                        </td>
                                                        <td>
                                                        	<select name="kd_jenis_kasus_<?php echo $i; ?>" id="kd_jenis_kasus2_<?php echo $i; ?>" class="kd_jenis_kasus2 uniformselect" style="width:150px">
                                                            	<option value="-">Pilih Jenis Kasus</option>
																<?php foreach($list_jenis_kasus as $ljk) : ?>
                                                                	<?php 
																	if($ljk['kd_jenis_kasus'] == $ep['kd_jenis_kasus']) 
																		echo '<option value="'.$ljk['kd_jenis_kasus'].'" selected>'.$ljk['jenis_kasus'].'</option>';
																	else
																		echo '<option value="'.$ljk['kd_jenis_kasus'].'">'.$ljk['jenis_kasus'].'</option>';
																	?>
                                                                
																<?php endforeach; ?>
                                                            </select>
                                                        </td>
                                                        <td>
                                                        	<select name="kd_jenis_diagnosa_<?php echo $i; ?>" id="kd_jenis_diagnosa2_<?php echo $i; ?>" class="kd_jenis_diagnosa2 uniformselect" style="width:150px">
                                                            	<option value="-">Pilih Jenis Diagnosa</option>
																<?php foreach($list_jenis_diagnosa as $ljd) : ?>
                                                                	<?php 
																	if($ljd['kd_jenis_diagnosa'] == $ep['kd_jenis_diagnosa']) 
																		echo '<option value="'.$ljd['kd_jenis_diagnosa'].'" selected>'.$ljd['jenis_diagnosa'].'</option>';
																	else
																		echo '<option value="'.$ljd['kd_jenis_diagnosa'].'">'.$ljd['jenis_diagnosa'].'</option>';
																	?>
																<?php endforeach; ?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </p>
                                        <p>
                                        	<a href="#" id="addPenyakit2" class="btn btn-primary btn-rounded"><i class="icon-plus icon-white"></i>&nbsp;Tambah</a> <a href="#" id="removePenyakit2" class="btn btn-danger btn-rounded"><i class="icon-trash icon-white"></i>&nbsp;Hapus</a>
                                        </p>
                                        <h4>Tindakan</h4> 
                                        <p>
                                        	<table class="table table-stripped table-bordered" id="tbl-tindakan2">
                                                <colgroup>
                                                    <col class="con0" />
                                                    <col class="con1" />
                                                    <col class="con0" />
                                                    <col class="con1" />
                                                    <col class="con0" />
                                                </colgroup>
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Jenis Tindakan</th>
                                                        <th>Harga</th>
                                                        <th>Jumlah (Qty)</th>
                                                        <th>Keterangan Tindakan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $i=0; ?>
                                                <?php foreach($edit_tindakan as $et): ?>
                                                	<?php $i++; ?>
                                                    <tr>
                                                    	<td>
                                                        	<div id="<?php echo $i; ?>"><?php echo $i; ?></div>
                                                            <input type="hidden" name="kd_produk_<?php echo $i; ?>" id="kd_produk2_<?php echo $i; ?>" value="<?php echo $et['kd_produk']; ?>" class="kd_produk2" />
                                                        </td>
                                                        <td>
                                                        	<input type="text" name="produk_<?php echo $i; ?>" id="produk2_<?php echo $i; ?>" value="<?php echo $et['produk']; ?>" class="produk2 input-large" />
                                                        </td>
                                                        <td>
                                                        	<input type="text" name="harga_<?php echo $i; ?>" id="harga2_<?php echo $i; ?>" value="<?php echo $et['harga']; ?>" class="harga2 input-small" readonly />
                                                        </td>
                                                        <td>
                                                        	<input type="text" name="qty_<?php echo $i; ?>" id="qty2_<?php echo $i; ?>" value="<?php echo $et['qty']; ?>" class="qty2 input-small" />
                                                        </td>
                                                        <td>
                                                        	<input type="text" name="ket_tindakan_<?php echo $i; ?>" id="ket_tindakan2_<?php echo $i; ?>" value="<?php echo $et['ket_tindakan']; ?>" class="ket_tindakan2 input-large" />
                                                        </td>
                                                	</tr>
                                                <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                         </p>
                                         <p>
                                        	<a href="#" id="addTindakan2" class="btn btn-primary btn-rounded"><i class="icon-plus icon-white"></i>&nbsp;Tambah</a> <a href="#" id="removeTindakan2" class="btn btn-danger btn-rounded"><i class="icon-trash icon-white"></i>&nbsp;Hapus</a>
                                        </p>			                                                           
                                    </div>
                            		<div id="wiz1step1_3" class="content" style="display: none;">
                                        <h4>Step 3: Obat</h4>
                                        <p>
                                            <table class="table table-stripped table-bordered" id="tbl-obat2">
                                                <colgroup>
                                                    <col class="con0" />
                                                    <col class="con1" />
                                                    <col class="con0" />
                                                    <col class="con1" />
                                                    <col class="con0" />
                                                </colgroup>
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Obat</th>
                                                        <th>Dosis</th>
                                                        <th>Satuan</th>
                                                        <th>Jumlah</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                 <?php $i=0; ?>
                                                 <?php foreach($edit_obat as $eo): ?>
                                                 	<?php $i++; ?>
                                                    <tr>
                                                    	<td>
                                                        	<div id="<?php echo $i; ?>"><?php echo $i; ?></div>
                                                            <input type="hidden" name="kd_obat_<?php echo $i; ?>" id="kd_obat2_<?php echo $i; ?>" value="<?php echo $eo['kd_obat']; ?>" class="kd_obat2" />
                                                        </td>
                                                        <td>
                                                        	<input type="text" name="nama_obat_<?php echo $i; ?>" id="nama_obat2_<?php echo $i; ?>" value="<?php echo $eo['nama_obat']; ?>" class="nama_obat2 input-large" />
                                                        </td>
                                                        <td>
                                                        	<input type="text" name="dosis_<?php echo $i; ?>" id="dosis2_<?php echo $i; ?>" value="<?php echo $eo['dosis']; ?>" class="dosis2 input-small" />
                                                        </td>
                                                        <td>
                                                        	<select name="satuan_<?php echo $i; ?>" id="satuan2_<?php echo $i; ?>" class="satuan2 uniformselect" style="width:100px;">
                                                                <option name="-">Pilih Satuan</option>
                                                                <?php foreach($list_satuan_kecil as $lsk) : ?>
                                                                    <?php 
																	if($lsk['kd_sat_kecil_obat'] == $eo['kd_sat_kecil_obat']) 
																		echo '<option value="'.$lsk['kd_sat_kecil_obat'].'" selected>'.$lsk['sat_kecil_obat'].'</option>';
																	else
																		echo '<option value="'.$lsk['kd_sat_kecil_obat'].'">'.$lsk['sat_kecil_obat'].'</option>';
																	?>
                                                                <?php endforeach; ?>
                                                         	</select>
                                                        </td>
                                                        <td>
                                                        	<input type="text" name="jumlah_<?php echo $i; ?>" id="jumlah2_<?php echo $i; ?>" value="<?php echo $eo['qty']; ?>" class="jumlah2 input-large" />
                                                        </td>
                                                    </tr>
                                                 <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </p>
                                        <p>
                                        	<a href="#" id="addObat2" class="btn btn-primary btn-rounded"><i class="icon-plus icon-white"></i>&nbsp;Tambah</a> <a href="#" id="removeObat2" class="btn btn-danger btn-rounded"><i class="icon-trash icon-white"></i>&nbsp;Hapus</a>
                                        </p>
                        			</div>
                                    <div id="wiz1step1_4" class="content" style="display: none;">
                                    	<h4>Status Keluar Pasien</h4>
                                    	<p>
                                            <label>Status Keluar Pasien</label>
                                            <span class="field">
                                            	<select name="kd_status_pasien" id="kd_status_pasien2" class="uniformselect">
                                               		<option value="-">Pilih Status Keluar Pasien</option>
													<?php foreach($list_status_keluar as $lsk) : ?>
                                                    	<?php 
														if($lsk['kd_status_pasien'] == $row['kd_status_pasien']) 
															echo '<option value="'.$lsk['kd_status_pasien'].'" selected>'.$lsk['keterangan'].'</option>';
														else
															echo '<option value="'.$lsk['kd_status_pasien'].'">'.$lsk['keterangan'].'</option>';
														?>
                                                    <?php endforeach; ?>
                            					</select>
                                            </span>
                                        </p>
                                    	<h4>Rujukan</h4>
                                        <p>
                                            <label>No. Rujukan</label>
                                            <span class="field"><input type="text" name="no_rujukan" id="no_rujukan2" value="<?php echo $row['no_rujukan']; ?>" class="input-large" /></span>
                                        </p>  
                                        <p>
                                            <label>RS / Tempat Rujukan</label>
                                            <span class="field"><input type="text" name="tempat_rujukan" id="tempat_rujukan2" value="<?php echo $row['tempat_rujukan']; ?>" class="input-large" /></span>
                                        </p>
                                    </div>
      							</div><!--#wizard-->                        
                			<!-- END OF TABBED WIZARD -->
      						</div>
                            
                            <?php echo form_close(); ?>
                            <?php endforeach; ?>
                       	</div>
                        <?php endif;?>
                        <!---- END EDITING FORM ---->
                        
                        <!---- DAFTAR PENDAFTARAN START ---->
   						<div id="list">
                        	<?php echo $this->table->generate(); ?>
                        <script type="text/javascript">
							jQuery(document).ready(function () {
								var oTable = jQuery('#dyntable').dataTable({
									"bProcessing": true,
									"bServerSide": true,
									"bAutoWidth": false,
									"sAjaxSource": '<?php echo base_url(); ?>datatable_master/pelayanan',
									"bJQueryUI": false,
									"sPaginationType": "full_numbers",
									//"aaSortingFixed": [[0,'asc']],
									"fnDrawCallback": function(oSettings) {
										jQuery.uniform.update();
									},
									"iDisplayStart ": 10,
									"oLanguage": {
										"sProcessing": "<center><img src='<?php echo base_url(); ?>assets/img/loaders/loader_blue.gif' /></center>"
									},
									"fnInitComplete": function () {
										//oTable.fnAdjustColumnSizing();
									},
									'fnServerData': function (sSource, aoData, fnCallback) {
										jQuery.ajax
										({
											'dataType': 'json',
											'type': 'POST',
											'url': sSource,
											'data': aoData,
											'success': fnCallback
										});
									}
								});
							});
						</script>
                        </div>
                         <!---- END DAFTAR PELAYANAN ---->
                        
                        <!---- TAMBAH PELAYANAN START ---->
                        
                        <div id="tambah">
                        <?php echo form_open('cont_transaksi_pelayanan/pelayanan/tambah', array('class' => 'stdform', 'id' => 'form_input')); ?>
                       		<h4 class="widgettitle">Transaksi Pelayanan</h4>
                           
                            <div class="row-fluid">
                            <div class="span6">
                            	<table class="table table-bordered table-invoice">
                                	<!--
                                    <tr>
                                    	<td class="width30">No. Rekam Medis</td>
                                        <td class="width70"><input type="text" name="kd_rekam_medis" id="kd_rekam_medis" class="input-large" /></td>
                                    </tr>
                                    -->
                                    <tr>
                                    	<td>No. Rekam Medis</td>
                                        <td><input type="text" name="kd_rekam_medis" id="kd_rekam_medis" class="input-large"  /></td>
                                    </tr>
                                    <tr>
                                    	<td>Nama Lengkap</td>
                                        <td><input type="text" name="nm_lengkap" id="nm_lengkap" class="input-large" readonly /></td>
                                    </tr>
                                    <tr>
                                        <td>NIK</td>
                                        <td><input type="text" name="nik" id="nik" class="input-large" readonly /></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Lahir</td>
                                        <td><input type="text" name="tanggal_lahir" id="tanggal_lahir" class="input-small" readonly /> <i>dd-mm-yyyy</i></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>
                                        	<input type="text" name="jenis_kelamin" id="jenis_kelamin" class="input-large" readonly />
                                       </td>
                                    </tr>
                                    
                                </table>
                            </div>
                            <div class="span6">
                            	<table class="table table-bordered table-invoice">
                                	<tr>
                                        <td class="width30">Tanggal Transaksi</td>
                                        <td class="width70"><input type="text" name="tgl_pelayanan" id="tgl_pelayanan" readonly class="input-large" value="<?php echo date('d-m-Y'); ?>" /></td>
                                    </tr>
                                    <tr>
                                    <tr>
                                    	<td>No. KK</td>
                                        <td><input type="text" name="no_kk" id="no_kk" class="input-large" readonly /></td>
                                    </tr>
                                    <tr>
                                    	<td>Nama KK</td>
                                        <td><input type="text" name="nm_kk" id="nm_kk" class="input-large" readonly /></td>
                                    </tr>
                                    <!--
                                    <tr>
                                        <td>Golongan Darah</td>
                                        <td><input type="text" name="gol_darah" id="gol_darah" class="input-large" readonly /></td>
                                    </tr>
                                    
                                    <tr>
                                    	<td>Cara Bayar</td>
                                        <td><input type="text" name="cara_bayar" id="cara_bayar" class="input-large" readonly /></td>
                                    </tr>
                                    !-->
                                </table>
                                <br>
                                <a href="#" class="btn btn-primary" name="lihat-rm" id="lihat-rm" >Lihat Rekam Medis</a>
                            </div>
                            </div>
                            <div class="clearfix"><br/></div>
                            <!--<h4 class="widgettitle">Data Alamat</h4>-->
                            
                            <div class="widgetcontent">
                			<!-- START OF TABBED WIZARD -->
                    			<div id="wizard2" class="wizard tabbedwizard">
                    				<ul class="tabbedmenu anchor">
                            			<li>
                                            <a href="#wiz1step2_1" class="selected" isdone="1" rel="1">
                                                <span class="h2">STEP 1</span>
                                                <span class="label">Unit Pelayanan</span>
                                            </a>
                            			</li>
                            			<li>
                                            <a href="#wiz1step2_2" class="disabled" isdone="0" rel="2">
                                                <span class="h2">STEP 2</span>
                                                <span class="label">Rekam Medis</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#wiz1step2_3" class="disabled" isdone="0" rel="3">
                                                <span class="h2">STEP 3</span>
                                                <span class="label">Obat</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#wiz1step2_4" class="disabled" isdone="0" rel="4">
                                                <span class="h2">STEP 4</span>
                                                <span class="label">Rujukan</span>
                                            </a>
                                        </li>
                        			</ul>
                                    
                        			<div id="wiz1step2_1" class="formwiz content" style="display: block;">
                        				<h4>Step 1: Unit Pelayanan</h4>
                                        <p>
                                            <label>Jenis Pelayanan</label>
                                            <span class="field">
                                            	<select name="kd_jenis_layanan" id="kd_jenis_layanan" class="uniformselect">
                                               		<option value="-">Pilih Jenis Pelayanan</option>
													<?php foreach($list_jenis_layanan as $ljl) : ?>
                                                    	<option value="<?php echo $ljl['kd_jenis_layanan']; ?>"><?php echo $ljl['jenis_layanan']; ?></option>
                                                    <?php endforeach; ?>
                            					</select>
                                           </span>
                                        </p>
                                        <p>
                                            <label>Unit pelayanan yang dituju</label>
                                            <span class="field">
                                            	<select name="kd_unit_pelayanan" id="kd_unit_pelayanan" class="uniformselect">
                                               		<option value="-">Pilih Unit Pelayanan</option>
													<?php foreach($list_unit_pelayanan as $lup) : ?>
                                                    	<option value="<?php echo $lup['kd_unit_pelayanan']; ?>"><?php echo $lup['nm_unit']; ?></option>
                                                    <?php endforeach; ?>
                            					</select>
                                            </span>
                                        </p>                             
                                        <p>
                                            <label>Petugas yang melayani</label>
                                            <span class="field">
                                            	<select name="kd_petugas" id="kd_petugas" class="uniformselect">
                                               		<option value="-">Pilih Petugas</option>
													<?php foreach($list_petugas as $lp) : ?>
                                                    	<option value="<?php echo $lp['kd_petugas']; ?>"><?php echo $lp['nama_petugas']; ?></option>
                                                    <?php endforeach; ?>
                            					</select>
                                            </span>
                                        </p>
                                        
                                        <div id="rawat-inap">
                                        	<h4>Data Ruang Inap</h4>
                                        	<p>
                                                <label>Kelas</label>
                                                <span class="field">
                                                    <select name="kelas" id="kelas" class="uniformselect">
                                                        <option value="-">Pilih Kelas</option>
                                                        <option value="1">Kelas 1</option>
                                                        <option value="2">Kelas 2</option>
                                                        <option value="3">Kelas 3</option>
                                                    </select>
                                                </span>
                                            </p>
                                            <p>
                                                <label>Ruangan</label>
                                                <span class="field">
                                                    <select name="kd_ruangan" id="kd_ruangan" class="uniformselect">
                                                        <option value="-">Pilih Ruangan</option>
                                                        <?php foreach($list_ruangan as $lr) : ?>
                                                            <option value="<?php echo $lr['kd_ruangan']; ?>"><?php echo $lr['nm_ruangan']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </span>
                                            </p>
                                            <p>
                                                <label>Kamar</label>
                                                <span class="field">
                                                    <select name="kd_bed" id="kd_bed" class="uniformselect">
                                                        <option value="NULL">Pilih Kamar</option>
                                                        <!--
                                                         <?php foreach($list_bed as $lb) : ?>
                                                            <option value="<?php echo $lb['kd_bed']; ?>">Kamar <?php echo $lb['no_kamar']; ?> - Bed <?php echo $lb['no_bed']; ?></option>
                                                        <?php endforeach; ?>
                                                        -->
                                                    </select>
                                                </span>
                                            </p>

                                        </div> <!-- end Rawat Inap -->
                        			</div>
                            		<div id="wiz1step2_2" class="formwiz content" style="display: none;">
                                        <h4>Step 2: Rekam Medis</h4> 
                                        <p>
                                            <label>Dokter</label>
                                            <span class="field">
                                            	<select name="kd_dokter" id="kd_dokter" class="uniformselect">
                                               		<option value="-">Pilih Dokter</option>
													<?php foreach($list_dokter as $ld) : ?>
                                                    	<option value="<?php echo $ld['kd_dokter']; ?>"><?php echo $ld['nm_dokter']; ?></option>
                                                    <?php endforeach; ?>
                            					</select>
                                            </span>
                                        </p>
                                        <p>
                                            <label>Anamnesa</label>
                                            <span class="field"><textarea cols="80" rows="5" class="span6" name="anamnesa" id="anamnesa"></textarea></span>
                                        </p>
                                        <p>
                                            <label>Catatan Fisik</label>
                                            <span class="field"><textarea cols="80" rows="5" class="span6" name="cat_fisik" id="cat_fisik"></textarea></span>
                                        </p>  
                                        <p>
                                            <label>Catatan Dokter</label>
                                            <span class="field"><textarea cols="80" rows="5" class="span6" name="cat_dokter" id="cat_dokter"></textarea></span>
                                        </p> 
                                        <h4>Diagnosa</h4>
                                        <p>
                                            <table class="table table-stripped table-bordered" id="tbl-penyakit">
                                                <colgroup>
                                                    <col class="con0" />
                                                    <col class="con1" />
                                                    <col class="con0" />
                                                    <col class="con1" />
                                                    <col class="con0" />
                                                </colgroup>
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Kode Penyakit</th>
                                                        <th>Penyakit</th>
                                                        <th>Jenis Kasus</th>
                                                        <th>Jenis Diagnosa</th>
                                                     </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                </tbody>
                                            </table>
                                        </p>
                                        <p>
                                        	<a href="#" id="addPenyakit" class="btn btn-primary btn-rounded"><i class="icon-plus icon-white"></i>&nbsp;Tambah</a> <a href="#" id="removePenyakit" class="btn btn-danger btn-rounded"><i class="icon-trash icon-white"></i>&nbsp;Hapus</a>
                                        </p>
                                        <h4>Tindakan</h4> 
                                        <p>
                                        	<table class="table table-stripped table-bordered" id="tbl-tindakan">
                                                <colgroup>
                                                    <col class="con0" />
                                                    <col class="con1" />
                                                    <col class="con0" />
                                                    <col class="con1" />
                                                    <col class="con0" />
                                                </colgroup>
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Jenis Tindakan</th>
                                                        <th>Harga</th>
                                                        <th>Jumlah (Qty)</th>
                                                        <th>Keterangan Tindakan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                </tbody>
                                            </table>
                                         </p>
                                         <p>
                                        	<a href="#" id="addTindakan" class="btn btn-primary btn-rounded"><i class="icon-plus icon-white"></i>&nbsp;Tambah</a> <a href="#" id="removeTindakan" class="btn btn-danger btn-rounded"><i class="icon-trash icon-white"></i>&nbsp;Hapus</a>
                                        </p>			                                                           
                                    </div>
                            		<div id="wiz1step2_3" class="content" style="display: none;">
                                        <h4>Step 3: Obat</h4>
                                        <p>
                                            <table class="table table-stripped table-bordered" id="tbl-obat">
                                                <colgroup>
                                                    <col class="con0" />
                                                    <col class="con1" />
                                                    <col class="con0" />
                                                    <col class="con1" />
                                                    <col class="con0" />
                                                </colgroup>
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Obat</th>
                                                        <th>Dosis</th>
                                                        <th>Satuan</th>
                                                        <th>Jumlah</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                </tbody>
                                            </table>
                                        </p>
                                        <p>
                                        	<a href="#" id="addObat" class="btn btn-primary btn-rounded"><i class="icon-plus icon-white"></i>&nbsp;Tambah</a> <a href="#" id="removeObat" class="btn btn-danger btn-rounded"><i class="icon-trash icon-white"></i>&nbsp;Hapus</a>
                                        </p>
                        			</div>
                                    <div id="wiz1step2_4" class="content" style="display: none;">
                                    	<h4>Status Keluar Pasien</h4>
                                    	<p>
                                            <label>Status Keluar Pasien</label>
                                            <span class="field">
                                            	<select name="kd_status_pasien" id="kd_status_pasien" class="uniformselect">
                                               		<option value="-">Pilih Status Keluar Pasien</option>
													<?php foreach($list_status_keluar as $lsk) : ?>
                                                    	<option value="<?php echo $lsk['kd_status_pasien']; ?>"><?php echo $lsk['keterangan']; ?></option>
                                                    <?php endforeach; ?>
                            					</select>
                                            </span>
                                        </p>
                                        <h4>Rujukan</h4>
                                        <p>
                                            <label>No. Rujukan</label>
                                            <span class="field"><input type="text" name="no_rujukan" id="no_rujukan" class="input-large" /></span>
                                        </p>  
                                        <p>
                                            <label>RS / Tempat Rujukan</label>
                                            <span class="field"><input type="text" name="tempat_rujukan" id="tempat_rujukan" class="input-large" /></span>
                                        </p>
                                    </div>
      							</div><!--#wizard-->                        
                			<!-- END OF TABBED WIZARD -->
      						</div>
                        </div>
                        <?php echo form_close();  ?>
                        <!---- END TAMBAH PELAYANAN ---->
                	</div><!--tabs-->
                </div><!--span12-->
            </div><!--row-fluid-->
        </div><!--contentinner-->
    </div><!--maincontent-->
</div><!--mainright-->

<script type="text/javascript">
jQuery(document).ready(function(){
	// Cari pasien berdasar no. rekam medis
	jQuery("#kd_rekam_medis").keyup(function(e){
		var isi = jQuery(e.target).val();
		jQuery(e.target).val(isi.toUpperCase());
		CariPasien();
	});
	
	jQuery("#kd_rekam_medis").blur(function(e){
		var isi = jQuery(e.target).val();
		CariPasien();
	});
	
	jQuery("#kd_rekam_medis").focus(function(e){
		var isi = jQuery(e.target).val();
		CariPasien();
	});
	
	jQuery("#kd_rekam_medis").keyup(function(){
		CariPasien();
	});
	
	function CariPasien(){
		var rekam_medis = jQuery("#kd_rekam_medis").val();
		jQuery.ajax({
			type	: 'POST',
			url		: "<?php echo base_url(); ?>cont_transaksi_pelayanan/cari_pasien",
			data	: "rekam_medis="+rekam_medis,
			cache	: false,
			dataType : "json",
			success	: function(data){
				jQuery("#nm_lengkap").val(data.nm_lengkap);
				jQuery("#nik").val(data.nik);
				jQuery("#tempat_lahir").val(data.tempat_lahir);
				jQuery("#tanggal_lahir").val(data.tanggal_lahir);
				jQuery("#jenis_kelamin").val(data.jenis_kelamin);
				//jQuery("#gol_darah").val(data.gol_darah);
				jQuery("#no_kk").val(data.no_kk);
				jQuery("#nm_kk").val(data.nm_kk);
				//jQuery("#cara_bayar").val(data.cara_bayar);
				
				jQuery( "#lihat-rm" ).attr( "href", "http://facebook.com" );
				
			}
		});
	};
	
	<?php if(strlen($this->uri->segment(3)) >= 17): ?>
		jQuery("#kd_rekam_medis").val('<?php echo $this->uri->segment(3); ?>');
		jQuery("#kd_rekam_medis").attr('readonly','readonly');
		jQuery("#kd_rekam_medis").blur();
	<?php endif; ?>

	// Validasi
	jQuery("#form_input").validate({
		rules: {
			nm_ibu: "required",
			kd_puskesmas: "required"
		},
		messages: {
			
			nm_ibu: "Nama ibu harus diisi!",
			kd_puskesmas: "Pilih puskesmas!"
		},
		highlight: function(label) {
			jQuery(label).closest('p').addClass('error');
	    },
	    success: function(label) {
	    	label
	    		.text('Ok!').addClass('valid')
	    		.closest('p').addClass('success');
	    }
	});
	 
	// Smart Wizard (step) 	
	jQuery('#wizard1').smartWizard();
  	jQuery('#wizard2').smartWizard();
	
	// Chaining form rawat inap
	jQuery('#kd_jenis_layanan').change(function () {
		if (jQuery(this).val() == '3')  // Rawat Inap 
		{
			jQuery('#rawat-inap').show();
		} else {
			jQuery('#rawat-inap').hide();
		}
	});
	
	jQuery('#kd_jenis_layanan2').change(function () {
		if (jQuery(this).val() == '3')  // Rawat Inap 
		{
			jQuery('#rawat-inap2').show();
		} else {
			jQuery('#rawat-inap2').hide();
		}
	});
	
	// Firing kamar rawat inap
	jQuery('#kd_ruangan').change(function () {
		var kd_ruangan = jQuery(this).val();
		var kelas = jQuery('#kelas').val();
		
		jQuery.ajax({
			type	: 'POST',
			url		: '<?php echo base_url(); ?>cont_transaksi_pelayanan/cari_kamar',
			data	: 'kd_ruangan='+kd_ruangan+'&kelas='+kelas,
			cache	: false,
			success: function(data) {
				//console.log(data);
				jQuery('#kd_bed').html(data);
			},  
		   	error: function(e){  
				alert('Error: ' + e);  
			}  
		});
		
	});
	
	jQuery('#kd_ruangan').focus(function () {
		var kd_ruangan = jQuery(this).val();
		//console.log(kd_ruangan);
		var kelas = jQuery('#kelas').val();
		//console.log(kelas);
		
		jQuery.ajax({
			type	: 'POST',
			url		: '<?php echo base_url(); ?>cont_transaksi_pelayanan/cari_kamar',
			data	: 'kd_ruangan='+kd_ruangan+'&kelas='+kelas,
			cache	: false,
			success: function(data) {
				//console.log(data);
				jQuery('#kd_bed').html(data);
			},  
		   	error: function(e){  
				alert('Error: ' + e);  
			}  
		});
		
	});
	
	jQuery('#kelas').change(function () {
		var kelas = jQuery(this).val();
		var kd_ruangan = jQuery('#kd_ruangan').val();
		
		jQuery.ajax({
			type	: 'POST',
			url		: '<?php echo base_url(); ?>cont_transaksi_pelayanan/cari_kamar',
			data	: 'kd_ruangan='+kd_ruangan+'&kelas='+kelas,
			cache	: false,
			success: function(data) {
				//console.log(data);
				jQuery('#kd_bed').html(data);
			},  
		   	error: function(e){  
				alert('Error: ' + e);  
			}  
		});
		
	});
	
	jQuery('#kelas').focus(function () {
		var kelas = jQuery(this).val();
		var kd_ruangan = jQuery('#kd_ruangan').val();
		
		jQuery.ajax({
			type	: 'POST',
			url		: '<?php echo base_url(); ?>cont_transaksi_pelayanan/cari_kamar',
			data	: 'kd_ruangan='+kd_ruangan+'&kelas='+kelas,
			cache	: false,
			success: function(data) {
				//console.log(data);
				jQuery('#kd_bed').html(data);
			},  
		   	error: function(e){  
				alert('Error: ' + e);  
			}  
		});
		
	});
	
	// edit
	jQuery('#kd_ruangan2').change(function () {
		var kd_ruangan = jQuery(this).val();
		var kelas = jQuery('#kelas2').val();
		
		jQuery.ajax({
			type	: 'POST',
			url		: '<?php echo base_url(); ?>cont_transaksi_pelayanan/cari_kamar',
			data	: 'kd_ruangan='+kd_ruangan+'&kelas='+kelas,
			cache	: false,
			success: function(data) {
				//console.log(data);
				jQuery('#kd_bed2').html(data);
			},  
		   	error: function(e){  
				alert('Error: ' + e);  
			}  
		});
		
	});
	
	jQuery('#kd_ruangan2').focus(function () {
		var kd_ruangan = jQuery(this).val();
		//console.log(kd_ruangan);
		var kelas = jQuery('#kelas2').val();
		//console.log(kelas);
		
		jQuery.ajax({
			type	: 'POST',
			url		: '<?php echo base_url(); ?>cont_transaksi_pelayanan/cari_kamar',
			data	: 'kd_ruangan='+kd_ruangan+'&kelas='+kelas,
			cache	: false,
			success: function(data) {
				//console.log(data);
				jQuery('#kd_bed2').html(data);
			},  
		   	error: function(e){  
				alert('Error: ' + e);  
			}  
		});
		
	});
	
	jQuery('#kelas2').change(function () {
		var kelas = jQuery(this).val();
		var kd_ruangan = jQuery('#kd_ruangan2').val();
		
		jQuery.ajax({
			type	: 'POST',
			url		: '<?php echo base_url(); ?>cont_transaksi_pelayanan/cari_kamar',
			data	: 'kd_ruangan='+kd_ruangan+'&kelas='+kelas,
			cache	: false,
			success: function(data) {
				//console.log(data);
				jQuery('#kd_bed2').html(data);
			},  
		   	error: function(e){  
				alert('Error: ' + e);  
			}  
		});
		
	});
	
	jQuery('#kelas2').focus(function () {
		var kelas = jQuery(this).val();
		var kd_ruangan = jQuery('#kd_ruangan2').val();
		
		jQuery.ajax({
			type	: 'POST',
			url		: '<?php echo base_url(); ?>cont_transaksi_pelayanan/cari_kamar',
			data	: 'kd_ruangan='+kd_ruangan+'&kelas='+kelas,
			cache	: false,
			success: function(data) {
				//console.log(data);
				jQuery('#kd_bed2').html(data);
			},  
		   	error: function(e){  
				alert('Error: ' + e);  
			}  
		});
	});
	
	<?php if(isset($edit_bed)): ?>
   		jQuery('#rawat-inap2').show();
    <?php endif; ?>
	
	// flag form rujukan disabled or not
	jQuery('#no_rujukan').attr('readonly','readonly');
	jQuery('#tempat_rujukan').attr('readonly','readonly');
	
	<?php if(!isset($row['no_rujukan']) or $row['no_rujukan'] == ''): ?>
   		jQuery('#no_rujukan2').attr('readonly','readonly');
		jQuery('#tempat_rujukan2').attr('readonly','readonly');
    <?php endif; ?>
	
	jQuery('#kd_status_pasien').change(function () {
		if (jQuery(this).val() == 'SKP-1' || jQuery(this).val() == 'SKP-2')  // Tidak di rujuk 
		{
			jQuery('#no_rujukan').attr('readonly','readonly');
			jQuery('#tempat_rujukan').attr('readonly','readonly');
		} 
		else if(jQuery(this).val() == 'SKP-3' || jQuery(this).val() == 'SKP-4') // Di rujuk
		{
			jQuery('#no_rujukan').removeAttr('readonly');
			jQuery('#tempat_rujukan').removeAttr('readonly');
		}
		else
		{
			jQuery('#no_rujukan').attr('readonly','readonly');
			jQuery('#tempat_rujukan').attr('readonly','readonly');
		}
	});
	
	jQuery('#kd_status_pasien2').change(function () {
		if (jQuery(this).val() == 'SKP-1' || jQuery(this).val() == 'SKP-2')  // Tidak di rujuk 
		{
			jQuery('#no_rujukan2').attr('readonly','readonly');
			jQuery('#tempat_rujukan2').attr('readonly','readonly');
		} 
		else if(jQuery(this).val() == 'SKP-3' || jQuery(this).val() == 'SKP-4') // Di rujuk
		{
			jQuery('#no_rujukan2').removeAttr('readonly');
			jQuery('#tempat_rujukan2').removeAttr('readonly');
		}
		else
		{
			jQuery('#no_rujukan2').attr('readonly','readonly');
			jQuery('#tempat_rujukan2').attr('readonly','readonly');
		}
	});
	
});

// Autocomplete Kode ICD
jQuery(function() {
	var counter = 1;
	var options = {
		source: '<?php echo base_url(); ?>cont_transaksi_pelayanan/autoCompleteICD',
		minLength: 2,
		focus: function( event, ui ) {
        			jQuery('#kd_penyakit_'+counter).val(ui.item.value);
					jQuery(this).closest('tr').find('input.penyakit').val(ui.item.penyakit);  
					//console.log(ui.item.alamat);
        },
        select: function( event, ui ) {
					//event.preventDefault();
                    jQuery('#kd_penyakit_'+counter).val(ui.item.value);
					jQuery(this).closest('tr').find('input.penyakit').val(ui.item.penyakit);                        
               		//console.log(ui.item.penyakit);
                   //return false;
        },
		messages: {
		   		noResults:	''
		}
	};
		
	jQuery('input.kd_penyakit').live("keydown.autocomplete", function() {
		jQuery(this).autocomplete(options);
	});
	
	var addInput = function() {
		if (counter > 1){
			jQuery('a#removePenyakit').removeAttr('disabled');
		}
			
		var inputHTML = '<tr><td><div id="'+counter+'">'+counter+'</div></td><td><input type="text" name="kd_penyakit_'+counter+'" id="kd_penyakit_'+counter+'" class="kd_penyakit input-large" /></td><td><input type="text" name="penyakit_'+counter+'" id="penyakit_'+counter+'" class="penyakit input-large" /></td><td><select name="kd_jenis_kasus_'+counter+'" id="kd_jenis_kasus_'+counter+'" class="kd_jenis_kasus uniformselect" style="width:150px"><option value="-">Pilih Jenis Kasus</option><?php foreach($list_jenis_kasus as $ljk) : ?><option value="<?php echo $ljk['kd_jenis_kasus']; ?>"><?php echo $ljk['jenis_kasus']; ?></option><?php endforeach; ?></select></td><td><select name="kd_jenis_diagnosa_'+counter+'" id="kd_jenis_diagnosa_'+counter+'" class="kd_jenis_diagnosa uniformselect" style="width:150px"><option value="-">Pilih Jenis Diagnosa</option><?php foreach($list_jenis_diagnosa as $ljd) : ?><option value="<?php echo $ljd['kd_jenis_diagnosa']; ?>"><?php echo $ljd['jenis_diagnosa']; ?></option><?php endforeach; ?></select></td></tr>';
		
		jQuery(inputHTML).appendTo("table#tbl-penyakit tbody");
		counter++;
	};
		
	var removeInput = function() {
		counter--;
		if(counter == 1){
			jQuery('a#removePenyakit').attr('disabled','disabled');
			//alert("Minimal sisa 1!");
			counter++;
			//console.log('Jika Counter == 1 :' + counter);
		}else{
			jQuery("table#tbl-penyakit tbody tr:last").remove();
			//console.log('Jika Counter != 1 :' + counter);
		}
	};
	
	if (!jQuery("table#tbl-penyakit tbody").find("input.kd_penyakit").length) {
		addInput();
	}
	
	var refreshFocus = function() {
		jQuery("input.kd_penyakit:last").focus();
		jQuery('html, body').animate({
       		scrollTop: jQuery("input.kd_penyakit:last").offset().top
    	}, 2000);
	};
	
	//jQuery("a#addPenyakit").click(addInput);
	jQuery("a#addPenyakit").click(function() {
		addInput();
		refreshFocus();
	});
	//jQuery("a#removePenyakit").click(removeInput);
	jQuery("a#removePenyakit").click(function() {
		removeInput();
		refreshFocus();
	});
});	

jQuery(function() {
	var counter = <?php if(isset($counter)) echo $counter; else echo 1; ?>;
	var options = {
		source: '<?php echo base_url(); ?>cont_transaksi_pelayanan/autoCompleteICD',
		minLength: 2,
		focus: function( event, ui ) {
        			jQuery('#kd_penyakit2_'+counter).val(ui.item.value);
					jQuery(this).closest('tr').find('input.penyakit2').val(ui.item.penyakit);  
					//console.log(ui.item.alamat);
        },
        select: function( event, ui ) {
					//event.preventDefault();
                    jQuery('#kd_penyakit2_'+counter).val(ui.item.value);
					jQuery(this).closest('tr').find('input.penyakit2').val(ui.item.penyakit);                        
               		//console.log(ui.item.penyakit);
                   //return false;
        },
		messages: {
		   		noResults:	''
		}
	};
		
	jQuery('input.kd_penyakit2').live("keydown.autocomplete", function() {
		jQuery(this).autocomplete(options);
	});
	
	var addInput = function() {
		if (counter > 1){
			jQuery('a#removePenyakit2').removeAttr('disabled');
		}
			
		var inputHTML = '<tr><td><div id="'+counter+'">'+counter+'</div></td><td><input type="text" name="kd_penyakit_'+counter+'" id="kd_penyakit2_'+counter+'" class="kd_penyakit2 input-large" /></td><td><input type="text" name="penyakit_'+counter+'" id="penyakit2_'+counter+'" class="penyakit2 input-large" /></td><td><select name="kd_jenis_kasus_'+counter+'" id="kd_jenis_kasus2_'+counter+'" class="kd_jenis_kasus2 uniformselect" style="width:150px"><option value="-">Pilih Jenis Kasus</option><?php foreach($list_jenis_kasus as $ljk) : ?><option value="<?php echo $ljk['kd_jenis_kasus']; ?>"><?php echo $ljk['jenis_kasus']; ?></option><?php endforeach; ?></select></td><td><select name="kd_jenis_diagnosa_'+counter+'" id="kd_jenis_diagnosa2_'+counter+'" class="kd_jenis_diagnosa2 uniformselect" style="width:150px"><option value="-">Pilih Jenis Diagnosa</option><?php foreach($list_jenis_diagnosa as $ljd) : ?><option value="<?php echo $ljd['kd_jenis_diagnosa']; ?>"><?php echo $ljd['jenis_diagnosa']; ?></option><?php endforeach; ?></select></td></tr>';
		
		jQuery(inputHTML).appendTo("table#tbl-penyakit2 tbody");
		counter++;
	};
		
	var removeInput = function() {
		counter--;
		if(counter == 1){
			jQuery('a#removePenyakit2').attr('disabled','disabled');
			//alert("Minimal sisa 1!");
			counter++;
			//console.log('Jika Counter == 1 :' + counter);
		}else{
			jQuery("table#tbl-penyakit2 tbody tr:last").remove();
			//console.log('Jika Counter != 1 :' + counter);
		}
	};
	
	if (!jQuery("table#tbl-penyakit2 tbody").find("input.kd_penyakit2").length) {
		addInput();
	}
	
	var refreshFocus = function() {
		jQuery("input.kd_penyakit2:last").focus();
		jQuery('html, body').animate({
       		scrollTop: jQuery("input.kd_penyakit2:last").offset().top
    	}, 2000);
	};
	
	//jQuery("a#addPenyakit").click(addInput);
	jQuery("a#addPenyakit2").click(function() {
		addInput();
		refreshFocus();
	});
	//jQuery("a#removePenyakit").click(removeInput);
	jQuery("a#removePenyakit2").click(function() {
		removeInput();
		refreshFocus();
	});
});

// Autocomplete Tindakan
jQuery(function() {
	var counter2 = 1;
	var options = {
		source: '<?php echo base_url(); ?>cont_transaksi_pelayanan/autoCompleteTindakan',
		minLength: 2,
		focus: function( event, ui ) {
        			jQuery('#produk_'+counter2).val(ui.item.value);
					jQuery(this).closest('tr').find('input.kd_produk').val(ui.item.kd_produk);
					jQuery(this).closest('tr').find('input.harga').val(ui.item.harga);  
					//console.log(ui.item.alamat);
        },
        select: function( event, ui ) {
					//event.preventDefault();
                    jQuery('#produk_'+counter2).val(ui.item.value);
					jQuery(this).closest('tr').find('input.kd_produk').val(ui.item.kd_produk);
					jQuery(this).closest('tr').find('input.harga').val(ui.item.harga);                        
               		//console.log(ui.item.penyakit);
                   //return false;
        },
		messages: {
		   		noResults:	''
		}
	};
		
	jQuery('input.produk').live("keydown.autocomplete", function() {
		jQuery(this).autocomplete(options);
	});
	
	var addInput = function() {
		if (counter2 > 1){
			jQuery('a#removeTindakan').removeAttr('disabled');
		}
			
		var inputHTML = '<tr><td><div id="'+counter2+'">'+counter2+'</div><input type="hidden" name="kd_produk_'+counter2+'" id="kd_produk_'+counter2+'" class="kd_produk" /></td><td><input type="text" name="produk_'+counter2+'" id="produk_'+counter2+'" class="produk input-large" /></td><td><input type="text" name="harga_'+counter2+'" id="harga_'+counter2+'" class="harga input-small" readonly /></td><td><input type="text" name="qty_'+counter2+'" id="qty_'+counter2+'" class="qty input-small" /></td><td><input type="text" name="ket_tindakan_'+counter2+'" id="ket_tindakan_'+counter2+'" class="ket_tindakan input-large" /></td></tr>';
		
		jQuery(inputHTML).appendTo("table#tbl-tindakan tbody");
		counter2++;
	};
		
	var removeInput = function() {
		counter2--;
		if(counter2 == 1){
			jQuery('a#removeTindakan').attr('disabled','disabled');
			counter2++;
			//console.log('Jika Counter == 1 :' + counter2);
		}else{
			jQuery("table#tbl-tindakan tbody tr:last").remove();
			//console.log('Jika Counter != 1 :' + counter2);
		}
	};
	
	if (!jQuery("table#tbl-tindakan tbody").find("input.produk").length) {
		addInput();
	}
	
	var refreshFocus = function() {
		jQuery("input.produk:last").focus();
		jQuery('html, body').animate({
       		scrollTop: jQuery("input.produk:last").offset().top
    	}, 2000);
	};
	
	//jQuery("a#addTindakan").click(addInput);
	jQuery("a#addTindakan").click(function() {
		addInput();
		refreshFocus();
	});
	//jQuery("a#removeTindakan").click(removeInput);
	jQuery("a#removeTindakan").click(function() {
		removeInput();
		refreshFocus();
	});
});

jQuery(function() {
	var counter2 = <?php if(isset($counter2)) echo $counter2; else echo 1; ?>;
	var options = {
		source: '<?php echo base_url(); ?>cont_transaksi_pelayanan/autoCompleteTindakan',
		minLength: 2,
		focus: function( event, ui ) {
        			jQuery('#produk2_'+counter2).val(ui.item.value);
					jQuery(this).closest('tr').find('input.kd_produk2').val(ui.item.kd_produk);
					jQuery(this).closest('tr').find('input.harga2').val(ui.item.harga);  
					//console.log(ui.item.alamat);
        },
        select: function( event, ui ) {
					//event.preventDefault();
                    jQuery('#produk_'+counter2).val(ui.item.value);
					jQuery(this).closest('tr').find('input.kd_produk2').val(ui.item.kd_produk);
					jQuery(this).closest('tr').find('input.harga2').val(ui.item.harga);                        
               		//console.log(ui.item.penyakit);
                   //return false;
        },
		messages: {
		   		noResults:	''
		}
	};
		
	jQuery('input.produk2').live("keydown.autocomplete", function() {
		jQuery(this).autocomplete(options);
	});
	
	var addInput = function() {
		if (counter2 > 1){
			jQuery('a#removeTindakan2').removeAttr('disabled');
		}
			
		var inputHTML = '<tr><td><div id="'+counter2+'">'+counter2+'</div><input type="hidden" name="kd_produk_'+counter2+'" id="kd_produk2_'+counter2+'" class="kd_produk2" /></td><td><input type="text" name="produk_'+counter2+'" id="produk2_'+counter2+'" class="produk2 input-large" /></td><td><input type="text" name="harga_'+counter2+'" id="harga2_'+counter2+'" class="harga2 input-small" /></td><td><input type="text" name="qty_'+counter2+'" id="qty2_'+counter2+'" class="qty2 input-small" /></td><td><input type="text" name="ket_tindakan_'+counter2+'" id="ket_tindakan2_'+counter2+'" class="ket_tindakan2 input-large" /></td></tr>';
		
		jQuery(inputHTML).appendTo("table#tbl-tindakan2 tbody");
		counter2++;
	};
		
	var removeInput = function() {
		counter2--;
		if(counter2 == 1){
			jQuery('a#removeTindakan2').attr('disabled','disabled');
			//alert("Minimal sisa 1!");
			counter2++;
			//console.log('Jika Counter == 1 :' + counter2);
		}else{
			jQuery("table#tbl-tindakan2 tbody tr:last").remove();
			//console.log('Jika Counter != 1 :' + counter2);
		}
	};
	
	if (!jQuery("table#tbl-tindakan2 tbody").find("input.produk2").length) {
		addInput();
	}
	
	var refreshFocus = function() {
		jQuery("input.produk2:last").focus();
		jQuery('html, body').animate({
       		scrollTop: jQuery("input.produk2:last").offset().top
    	}, 2000);
	};
	
	//jQuery("a#addTindakan").click(addInput);
	jQuery("a#addTindakan2").click(function() {
		addInput();
		refreshFocus();
	});
	//jQuery("a#removeTindakan").click(removeInput);
	jQuery("a#removeTindakan2").click(function() {
		removeInput();
		refreshFocus();
	});
});		

// Autocomplete Obat
jQuery(function() {
	var counter3 = 1;
	var options = {
		source: '<?php echo base_url(); ?>cont_transaksi_pelayanan/autoCompleteObat',
		minLength: 2,
		focus: function( event, ui ) {
        			jQuery('#nama_obat_'+counter3).val(ui.item.value);
					jQuery(this).closest('tr').find('input.kd_obat').val(ui.item.kd_obat);
					//console.log(ui.item.kd_obat);
        },
        select: function( event, ui ) {
					//event.preventDefault();
                    jQuery('#nama_obat_'+counter3).val(ui.item.value);
					jQuery(this).closest('tr').find('input.kd_obat').val(ui.item.kd_obat);                      
               		//console.log(ui.item.penyakit);
                   //return false;
        },
		messages: {
		   		noResults:	''
		}
	};
		
	jQuery('input.nama_obat').live("keydown.autocomplete", function() {
		jQuery(this).autocomplete(options);
	});
	
	var addInput = function() {
		if (counter3 > 1){
			jQuery('a#removeObat').removeAttr('disabled');
		}
			
		var inputHTML = '<tr><td><div id="'+counter3+'">'+counter3+'</div><input type="hidden" name="kd_obat_'+counter3+'" id="kd_obat_'+counter3+'" class="kd_obat" /></td><td><input type="text" name="nama_obat_'+counter3+'" id="nama_obat_'+counter3+'" class="nama_obat input-large" /></td><td><input type="text" name="dosis_'+counter3+'" id="dosis_'+counter3+'" class="dosis input-small" /></td><td><select name="satuan_'+counter3+'" id="satuan_'+counter3+'" class="satuan uniformselect" style="width:100px;"><option name="-">Pilih Satuan</option><?php foreach($list_satuan_kecil as $lsk) : ?><option value="<?php echo $lsk['kd_sat_kecil_obat']; ?>"><?php echo $lsk['sat_kecil_obat']; ?></option><?php endforeach; ?></select></td><td><input type="text" name="jumlah_'+counter3+'" id="jumlah_'+counter3+'" class="jumlah input-large" /></td></tr>';
		
		jQuery(inputHTML).appendTo("table#tbl-obat tbody");
		counter3++;
	};
		
	var removeInput = function() {
		counter3--;
		if(counter3 == 1){
			jQuery('a#removeObat').attr('disabled','disabled');
			//alert("Minimal sisa 1!");
			counter3++;
			//console.log('Jika Counter == 1 :' + counter3);
		}else{
			jQuery("table#tbl-obat tbody tr:last").remove();
			//console.log('Jika Counter != 1 :' + counter3);
		}
	};
	
	if (!jQuery("table#tbl-obat tbody").find("input.nama_obat").length) {
		addInput();
	}
	
	var refreshFocus = function() {
		jQuery("input.nama_obat:last").focus();
		jQuery('html, body').animate({
       		scrollTop: jQuery("input.nama_obat:last").offset().top
    	}, 2000);
	};
	
	//jQuery("a#addObat").click(addInput);
	jQuery("a#addObat").click(function() {
		addInput();
		refreshFocus();
	});
	//jQuery("a#removeObat").click(removeInput);
	jQuery("a#removeObat").click(function() {
		removeInput();
		refreshFocus();
	});
});

jQuery(function() {
	var counter3 = <?php if(isset($counter3)) echo $counter3; else echo 1; ?>;
	var options = {
		source: '<?php echo base_url(); ?>cont_transaksi_pelayanan/autoCompleteObat',
		minLength: 2,
		focus: function( event, ui ) {
        			jQuery('#nama_obat2_'+counter3).val(ui.item.value);
					jQuery(this).closest('tr').find('input.kd_obat2').val(ui.item.kd_obat);
					//console.log(ui.item.kd_obat);
        },
        select: function( event, ui ) {
					//event.preventDefault();
                    jQuery('#nama_obat2_'+counter3).val(ui.item.value);
					jQuery(this).closest('tr').find('input.kd_obat2').val(ui.item.kd_obat);                      
               		//console.log(ui.item.penyakit);
                   //return false;
        },
		messages: {
		   		noResults:	''
		}
	};
		
	jQuery('input.nama_obat2').live("keydown.autocomplete", function() {
		jQuery(this).autocomplete(options);
	});
	
	var addInput = function() {
		if (counter3 > 1){
			jQuery('a#removeObat2').removeAttr('disabled');
		}
			
		var inputHTML = '<tr><td><div id="'+counter3+'">'+counter3+'</div><input type="hidden" name="kd_obat_'+counter3+'" id="kd_obat2_'+counter3+'" class="kd_obat2" /></td><td><input type="text" name="nama_obat_'+counter3+'" id="nama_obat2_'+counter3+'" class="nama_obat2 input-large" /></td><td><input type="text" name="dosis_'+counter3+'" id="dosis2_'+counter3+'" class="dosis2 input-small" /></td><td><select name="satuan_'+counter3+'" id="satuan2_'+counter3+'" class="satuan2 uniformselect" style="width:100px;"><option name="-">Pilih Satuan</option><?php foreach($list_satuan_kecil as $lsk) : ?><option value="<?php echo $lsk['kd_sat_kecil_obat']; ?>"><?php echo $lsk['sat_kecil_obat']; ?></option><?php endforeach; ?></select></td><td><input type="text" name="jumlah_'+counter3+'" id="jumlah2_'+counter3+'" class="jumlah2 input-large" /></td></tr>';
		
		jQuery(inputHTML).appendTo("table#tbl-obat2 tbody");
		counter3++;
	};
		
	var removeInput = function() {
		counter3--;
		if(counter3 == 1){
			jQuery('a#removeObat2').attr('disabled','disabled');
			//alert("Minimal sisa 1!");
			counter3++;
			//console.log('Jika Counter == 1 :' + counter3);
		}else{
			jQuery("table#tbl-obat2 tbody tr:last").remove();
			//console.log('Jika Counter != 1 :' + counter3);
		}
	};
	
	if (!jQuery("table#tbl-obat2 tbody").find("input.nama_obat2").length) {
		addInput();
	}
	
	var refreshFocus = function() {
		jQuery("input.nama_obat2:last").focus();
		jQuery('html, body').animate({
       		scrollTop: jQuery("input.nama_obat2:last").offset().top
    	}, 2000);
	};
	
	//jQuery("a#addObat").click(addInput);
	jQuery("a#addObat2").click(function() {
		addInput();
		refreshFocus();
	});
	//jQuery("a#removeObat").click(removeInput);
	jQuery("a#removeObat2").click(function() {
		removeInput();
		refreshFocus();
	});
});
	
</script>
