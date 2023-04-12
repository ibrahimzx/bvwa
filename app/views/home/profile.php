  <h1><?= $data['photo']; ?></h1>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile Saya</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    	 <div class="col-sm-12">
          <?php
            Flasher::Message();
          ?>
        </div>
   

      <!-- Default box -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">My Profile</h3>
        </div>
       <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="<?= base_url; ?>/dist/img/<?= $data['getData']['photo']; ?>" alt="User profile picture">
                </div>

                <h3 class="profile-name text-center">Name : <?= $data['getData']['nama']; ?></h3>
                <h3 class="profile-username text-center">Username : <?= $data['getData']['username'] ?></h3>
                <h3 class="profile-username text-center">Level : <?= $data['getData']['level']; ?></h3>
                <div class="card-footer">
                  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editProfile">
										  Edit
									</button>
                </div>
              </div>
        <!-- /.card-body --> 
      </div>
      <!-- /.card -->

      <!-- Button trigger modal -->

<!-- Modal -->
		<div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form method="POST" action="<?= base_url; ?>/home/updateData" enctype="multipart/form-data">
		        	<input type="hidden" name="id" value="<?= $data['getData']['id']; ?>">
							<div class="card-body">
							<div class="form-group">
								<label for="exampleInputEmail1">Nama</label>
								<input type="text" class="form-control" name="nama" value="<?= $data['getData']['nama']; ?>">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Username</label>
								<input type="text" class="form-control" name="username" value="<?= $data['getData']['username']; ?>" disabled>
							</div>
							<div class="form-group">
								<label for="exampleInputFile">Photo Profile</label>
							<div class="input-group">
							  <input type="file" class="form-control" name="photo" id="inputGroupFile02">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Password</label>
								<input type="password" class="form-control" name="password">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Ulangi Password</label>
								<input type="password" class="form-control" name="confirmPassword">
							</div>
							</div>
							<div class="form-check">
								<label class="form-check-label text-danger" for="exampleCheck1">Kosongkan password jika tidak diubah</label>
							</div>
							</div>

							<div class="card-footer">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->






   
                
