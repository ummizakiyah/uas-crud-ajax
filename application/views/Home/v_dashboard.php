 <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CRUD</title>
    
    <link href="<?php echo base_url();?>assets/bs/bs2.css" rel='stylesheet' type='text/css' />
    <link href="<?php echo base_url();?>assets/bs/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="<?php echo base_url();?>assets/DataTables/css/dataTables.bootstrap.css" rel='stylesheet' type='text/css' />

    <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url();?>assets/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>assets/admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="<?php echo base_url();?>assets/admin/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url();?>assets/admin/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assets/admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>assets/admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


      
      

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">Home</a>
  <a href="#">Gallery</a>
  <a href="#">About</a>
  <a href="#">Contact</a>
</div>
<!-- <div class="header">
  <h1>My Website</h1>
  <p>A website created by me.</p>
</div> -->
<div class="topnav">
<span onclick="openNav()"><a class="active">Menu</a></span>
</div>

        <!-- Navigation -->
        

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tables</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
                        <br>
                        
                        <!-- <button type="button" class="btn btn-success"><p class="fa fa-plus-circle"> Add</p></button> -->
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                <button type="button" class="btn btn-success btn-circle btn-lg" onclick="add_book()"><span  class="glyphicon glyphicon-plus "></span></button>
                               

                                <p></p>
                        
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No ISBN</th>
                                        <th>Judul novel</th>
                                        <th>Penulis</th>
                                        <th>Kategori</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                 
                                <tbody>
                                <?php foreach ($buku  as $b) {?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $b->book_isbn;?></td>
                                        <td><?php echo $b->book_title;?></td>
                                        <td><?php echo $b->book_author;?></td>
                                        <td><?php echo $b->book_cathegory;?></td>
                                        <td>

                                              <button type="button" class="btn btn-warning" onclick="edit_novel(<?php echo $b->book_id;?>)"><i class="glyphicon glyphicon-edit"></i></button>

                                              <button type="button" class="btn btn-danger " onclick="delete_novel(<?php echo $b->book_id;?>)"><i class="glyphicon glyphicon-remove"></i></button>
                                        </td> 
                                    </tr>
                                     <?php } ?> 
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                          
                        </div>
                        </div>
                        
                        </div>
                        </div>
                        </div>
                        </body>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/admin/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>assets/admin/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>assets/admin/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url();?>assets/admin/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>assets/admin/dist/js/sb-admin-2.js"></script>
    <script src="<?php echo base_url();?>assets/js/home.js"></script>
    
    <script src="<?php echo base_url();?>assets/js/offcanvas.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable();
        });
        
        var save_method;
        var table;

        function add_book(){
            save_method = 'add';
            $('#form')[0].reset();
            $('#modal_form').modal('show'); 
        }

        function save() {
            var url;

            if (save_method == 'add') {
                url = '<?php echo site_url('index.php/Home/novel_add');?>';
            }else {
                url = '<?php echo site_url('index.php/Home/novel_update');?>';
            }
            
            $.ajax({
                url: url,
                type: "POST",
                data: $('#form').serialize(),
                dataType: "JSON",
                success: function(data){
                    $('#modal_form').modal('hide');
                    location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error adding / Update data');
                }
            });
        }
        function edit_novel(book_id){
            save_method = 'Update';
            $('#form')[0].reset();
            

            $.ajax({
              url: "<?php echo site_url('index.php/home/ajax_edit'); ?>/"+book_id,
              type: "GET",
              dataType: "JSON",
               success: function(data){
                $('[name="book_id"]').val(data.book_id);
                $('[name="book_isbn"]').val(data.book_isbn);
                $('[name="book_title"]').val(data.book_title);
                $('[name="book_author"]').val(data.book_author);
                $('[name="book_cathegory"]').val(data.book_cathegory);

                 $('#modal_form').modal('show');

                  $('.modal_title').text('Edit Book');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error Get data from ajax');
                }

            }); 
        }
        function delete_novel(book_id){
          if(confirm("Are You sure Delete This data ?")) {

            $.ajax({
              url: "<?php echo site_url('index.php/home/novel_delete'); ?>/"+book_id,
              type: "POST",
              dataType: "JSON",
              success: function(data) {
                location.reload();

              },
              error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error Delete data');
                }
            });
          }
        }
            
    </script>
    <div class="modal fade " id="modal_form"  role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" >
        <h1 align="center">Tambah Data</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body form">
      <form action="#" id="form" class="form-horizontal">
      <input type="hidden" value="" name="book_id">

      <div class="form-body">
          <div class="form-group">
              <label class="control-label col-md-3">No ISBN</label>
              <div class="col-md-9">
                  <input type="text" name="book_isbn" placeholder="Input No ISBN" class="form-control">
              </div>
            </div>
        </div>
    <div class="form-body">
        <div class="form-group">
              <label class="control-label col-md-3">Judul Buku</label>
              <div class="col-md-9">
                  <input type="text" name="book_title" placeholder="Input Judul Buku" class="form-control">
              </div>
            </div>
        </div>
         <div class="form-body">
          <div class="form-group">
              <label class="control-label col-md-3">Penulis</label>
              <div class="col-md-9">
                  <input type="text" name="book_author" placeholder="Input Penulis Buku" class="form-control">
              </div>
            </div>
        </div>
        <!-- <div class="form-body">
          <div class="form-group">
              <label class="control-label col-md-3">Kategori</label>
              <div class="col-md-9">
                  <input type="text" name="kategori" placeholder="Input Kategori Novel" class="form-control">
              </div>
            </div>
        </div> -->
        <div class="form-body">
         <div class="form-group">
         <label class="control-label col-md-3">Kategori</label>
         <div class="col-md-9">
     <select name="book_cathegory" class="form-control" >
     <option value="Romance">Romance</option>
     <option value="Adventure">Adventure</option>
     <option value="Comedy">Comedy</option>
     </select>
     </div>
     </div>
     </div>    
              
          
      </form>
      

        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="save()" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




</html>
