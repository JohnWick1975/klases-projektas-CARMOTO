<div class="container my-5 text-center">
	<table class="table table-striped">
		<thead>
			<tr>
                <?php foreach ($data['all_users'][0] as $key => $user) : ?>
					<th scope="col"><?= $key; ?></th>
                <?php endforeach; ?>
			</tr>
		</thead>
		<tbody>
            <?php foreach ($data['all_users'] as $user) : ?>
				<tr>
					<th scope="row"><?= $user->id ?></th>
					<td><?= $user->name; ?></td>
					<td><?= $user->email; ?></td>
					<td><?= $user->role; ?></td>
				</tr>
            <?php endforeach; ?>
		</tbody>
	</table>
	<div class="container bg-secondary mt-5">
		<form class="admin-form my-auto" method="post" action="<?= URLROOT; ?>/admins/admins">
			<div class="row py-3">
				<div class="form-group col-md-3 my-auto">
					<label class="text-white mr-1" for="id">ID</label>
					<input class="form-control <?= (!empty($data['id_err'])) ? 'is-invalid' : ''; ?>" type="text"
						   name="id" placeholder="ID"
						   value="<?= (!empty($data['get_user'])) ? $data['get_user']->id : ''; ?>">
					<span class="invalid-feedback position-absolute mt-4"><?= $data['id_err']; ?></span>
				</div>
				<div class="form-group col-md-3 my-auto">
					<label class="text-white mr-1" for="name">NAME</label>
					<input class="form-control <?= (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" type="text"
						   name="name" placeholder="NAME"
						   value="<?= (!empty($data['get_user'])) ? $data['get_user']->name : ''; ?>">
					<span class="invalid-feedback position-absolute mt-4"><?= $data['name_err']; ?></span>
				</div>
				<div class="form-group  col-md-3 my-auto">
					<label class="text-white" for="email">EMAIL</label>
					<input class="form-control <?= (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" type="email"
						   name="email" placeholder="EMAIL"
						   value="<?= (!empty($data['get_user'])) ? $data['get_user']->email : ''; ?>">
					<span class="invalid-feedback position-absolute mt-4"><?= $data['email_err']; ?></span>
				</div>
				<div class="form-group col-md-3 my-auto">
					<label class="text-white mr-1" for="role">ROLE</label>
					<input class="form-control <?= (!empty($data['role_err'])) ? 'is-invalid' : ''; ?>" type="text"
						   name="role" placeholder="ROLE"
						   value="<?= (!empty($data['get_user'])) ? $data['get_user']->role : ''; ?>">
					<span class="invalid-feedback position-absolute mt-4"><?= $data['role_err']; ?></span>
				</div>
			</div>
			<div>
				<button type="submit" name="update" class="btn btn-warning pull-right mt-5 mr-3">UPDATE</button>
			</div>
			<div>
				<button type="submit" name="delete" class="btn btn-danger pull-right mt-5 mr-3">DELETE</button>
			</div>
			<div>
				<button type="submit" name="select" class="btn btn-info pull-right mt-5 mr-3">SELECT</button>
			</div>
		</form>
	</div>
</div>
<div class="div-progress container mb-5">
	<label>Admin</label>
	<div class="progress mb-3">
		<div name="admin" class="progress-bar bg-success" role="progressbar"
			 style="width: <?= $data['admin_proc'] ?>"><?= $data['admin'] . ' ' . '(' . $data['admin_proc'] . ')'; ?></div>
	</div>
	<label>User</label>
	<div class="progress mb-3">
		<div class="progress-bar bg-info" role="progressbar"
			 style="width: <?= $data['user_proc'] ?>"><?= $data['user'] . ' ' . '(' . $data['user_proc'] . ')'; ?></div>
	</div>
	<label>All users</label>
	<div class="progress">
		<div class="progress-bar bg-warning" role="progressbar" style="width: 100%"><?= $data['users_amount']; ?></div>
	</div>
</div>