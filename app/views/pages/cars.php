<?php /*require APPROOT . '/views/inc/header.php'; */ ?>
<div class="row">
	<div class="col-6 col-sm-6 col-md-5 col-lg-3 mx-auto select-form card card-body bg-light">
		<form class="d-flex flex-column" method="post">
			<div class="custom-control custom-switch">
				<input type="checkbox" class="custom-control-input" value="petrol" name="fuel_type[]"
					   id="customSwitch1">
				<label class="custom-control-label" for="customSwitch1">Petrol</label>
			</div>
			<div class="custom-control custom-switch">
				<input type="checkbox" class="custom-control-input" value="diesel" name="fuel_type[]"
					   id="customSwitch2">
				<label class="custom-control-label" for="customSwitch2">Diesel</label>
			</div>
			<div class="custom-control custom-switch">
				<input type="checkbox" class="custom-control-input" value="red" name="color[]" id="customSwitch3">
				<label class="custom-control-label" for="customSwitch3">Red</label>
			</div>
			<div class="custom-control custom-switch">
				<input type="checkbox" class="custom-control-input" value="green" name="color[]" id="customSwitch4">
				<label class="custom-control-label" for="customSwitch4">Green</label>
			</div>
			<div class="custom-control custom-switch">
				<input type="checkbox" class="custom-control-input" value="blue" name="color[]" id="customSwitch5">
				<label class="custom-control-label" for="customSwitch5">Blue</label>
			</div>
			<button class="btn btn-secondary" name="select" type="submit">SELECT</button>
		</form>
	</div>

	<div class="col-10 mx-auto">
		<div class="container d-flex justify-content-center align-items-center flex-wrap">
            <?php foreach ($data['cars'] as $cars) : ?>
				<div class="card m-3" style="width: 18rem;">
					<img class="card-img-top" src="<?= $cars->img_url; ?>" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title"><?= $cars->brand; ?></h5>
						<h6 class="card-title"><?= $cars->model; ?></h6>
						<p class="card-text">YEAR: <?= $cars->year; ?></p>
						<p class="card-text">Fuel type: <?= $cars->fuel_type; ?></p>
						<p class="card-text">Color: <?= $cars->color; ?></p>
					</div>
				</div>
            <?php endforeach; ?>
		</div>
	</div>
</div>

<?php /*require APPROOT . '/views/inc/footer.php'; */ ?>
