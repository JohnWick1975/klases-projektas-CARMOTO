<?php require APPROOT . '/views/inc/header.php'; ?>
<form class="d-flex flex-column" method="post">
	<div class="custom-control custom-switch">
		<input type="checkbox" class="custom-control-input" id="customSwitch1">
		<label class="custom-control-label" for="customSwitch1">Petrol</label>
	</div>
	<div class="custom-control custom-switch">
		<input type="checkbox" class="custom-control-input" id="customSwitch2">
		<label class="custom-control-label" for="customSwitch2">Diesel</label>
	</div>
	<div class="custom-control custom-switch">
		<input type="checkbox" class="custom-control-input" id="customSwitch3">
		<label class="custom-control-label" for="customSwitch3">Power < 150W</label>
	</div>
	<div class="custom-control custom-switch">
		<input type="checkbox" class="custom-control-input" id="customSwitch4">
		<label class="custom-control-label" for="customSwitch4">Power > 150W</label>
	</div>
</form>


<div class="container d-flex justify-content-center align-items-center flex-wrap">
    <?php /*var_dump($data['cars']); */ ?>
    <?php foreach ($data['cars'] as $cars) : ?>
		<div class="card m-3" style="width: 18rem;">
			<img class="card-img-top" src="<?= $cars->img_url; ?>" alt="Card image cap">
			<div class="card-body">
				<h5 class="card-title"><?= $cars->brand; ?></h5>
				<h6 class="card-title"><?= $cars->model; ?></h6>
				<p class="card-text">YEAR: <?= $cars->year; ?></p>
				<p class="card-text">Fuel type: <?= $cars->fuel_type; ?></p>
				<p class="card-text">Power: <?= $cars->power; ?></p>
			</div>
		</div>
    <?php endforeach; ?>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>
