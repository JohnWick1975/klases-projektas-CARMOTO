<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
	<div class="container">
		<a class="navbar-brand" href="<?= URLROOT; ?>"><?= strtoupper(SITENAME); ?></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
				aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarsExampleDefault">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="<?= URLROOT; ?>">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= URLROOT; ?>/pages/about">About</a>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['user_id'])) : ?>
					<li class="nav-item">
						<a class="nav-link" href="<?= URLROOT; ?>/cars/cars">Cars</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= URLROOT; ?>/moto/moto">Moto</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= URLROOT; ?>/pages/random">Contact</a>
					</li>
                    <?php if ($_SESSION['user_role'] == 'admin') : ?>
						<li class="nav-item">
							<a class="nav-link" href="<?= URLROOT; ?>/admins/admins">Administration</a>
						</li>
                    <?php endif; ?>
					<li class="nav-item">
						<a class="nav-link" href="<?= URLROOT; ?>/users/logout">Logout</a>
					</li>
                <?php else : ?>
					<li class="nav-item">
						<a class="nav-link" href="<?= URLROOT; ?>/users/register">Register</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= URLROOT; ?>/users/login">Login</a>
					</li>
                <?php endif; ?>
			</ul>
		</div>
	</div>
</nav>
