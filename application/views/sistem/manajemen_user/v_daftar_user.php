<!DOCTYPE html>
<html>

<?php $this->load->view("includes/head.php", $head) ?>

<body class="hold-transition skin-green-light sidebar-mini">
<div class="wrapper">

<?php $this->load->view("includes/navbar.php", $navbar) ?>
<?php $this->load->view("includes/sidebar.php", $sidebar) ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Daftar User
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <!-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li> -->
        <li class="active"><i class="fa fa-user"></i> Daftar User</li>
      </ol>
    </section>
    <section class="content">
        <div class="row">
        	<div class="col-xs-12">
        		<div class="box box-primary">
        			<div class="box-body">
                        <?php echo $this->session->flashdata('notifikasi') ?>
        		  		<table id="datatable" class="table table-bordered table-striped display nowrap" style="width:100%;">
        		    		<thead>
        					    <tr>
        							<th width="5%">No</th>
        							<th width="25%">Fullname</th>
        							<th width="15%">Handphone</th>
        							<th width="20%">Email</th>
        							<th width="15%">Company</th>
        							<th width="20%">Username</th>
        					    </tr>
        				    </thead>
        				    <tbody>
        				    </tbody>
        		  		</table>
        			</div>
        		</div>
        	</div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php $this->load->view("includes/footer.php") ?>
  <!-- FOOTER.PHP -->
   <?php $this->load->view("includes/sidebar_control.php") ?>
  <!-- SIDEBAR_CONTROL.PHP -->
</div>
<!-- ./wrapper -->
 <?php $this->load->view("includes/js.php") ?>
<!-- JS.PHP -->
<script>
$(function () {
	$('#datatable').DataTable({
		"processing": true,
		"serverSide": true,
		"ajax": "<?php echo base_url('admin/get_daftar_user') ?>",
		"scrollX": true,
		"pageLength": 25,
		"lengthChange": false,
		"columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": [0, 5]
        } ],
		"columns": [
			{
			    data: 'id',
				name: 'number',
			    render: function (data, type, row, meta) {
			        return meta.row + meta.settings._iDisplayStart + 1;
			    }
			},
			{ data: 'first_name', name: 'first_name' },
			{ data: 'phone', name: 'phone' },
			{ data: 'email', name: 'email' },
			{ data: 'company', name: 'company' },
			{ data: 'username', name: 'username' },
		],
		"order": [[1, 'asc']]
    });
});
</script>
</body>
</html>
