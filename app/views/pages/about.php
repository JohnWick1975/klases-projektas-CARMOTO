<div class="container mt-5">
	<div class="row">
		<div class="col-lg-6 text-center">
			<h2><?= strtoupper(SITENAME); ?></h2>
			<p>In entirely be to at settling felicity. Fruit two match men you seven share. Needed as or is enough
				points. Miles at smart ﻿no marry whole linen mr. Income joy nor can wisdom summer. Extremely depending
				he gentleman improving intention rapturous as.

				Consulted perpetual of pronounce me delivered. Too months nay end change relied who beauty wishes
				matter. Shew of john real park so rest we on. Ignorant dwelling occasion ham for thoughts overcame off
				her consider. Polite it elinor is depend. His not get talked effect worthy barton. Household shameless
				incommode at no objection behaviour. Especially do at he possession insensible sympathize boisterous it.
				Songs he on an widen me event truth. Certain law age brother sending amongst why covered.

				Endeavor bachelor but add eat pleasure doubtful sociable. Age forming covered you entered the examine.
				Blessing scarcely confined her contempt wondered shy. Dashwoods contented sportsmen at up no convinced
				cordially affection. Am so continued resembled frankness disposing engrossed dashwoods. Earnest greater
				on no observe fortune norland. Hunted mrs ham wishes stairs. Continued he as so breakfast shameless. All
				men drew its post knew. Of talking of calling however civilly wishing resolve. </p>
		</div>
		<div class="col-lg-6">
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15514.780868612474!2d25.281491481221504!3d54.686995071746274!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1slt!2slt!4v1583310775686!5m2!1slt!2slt"
					width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
		</div>
	</div>

	<div class="row my-5">
		<div class="col-12">
			<form class="form-inline" method="post">
				<div class="form-group  mr-3">
					<div>
						<input type="text" name="name"
							   class="form-control  <?= (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>"
							   value="<?= $data['name']; ?>" placeholder="Name">
						<span class="invalid-feedback position-absolute"><?= $data['name_err']; ?></span>
					</div>
				</div>
				<div class="form-group  mr-3">
					<div>
						<input type="email" name="email" class="form-control <?=
                        (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['email']; ?>"
							   placeholder="Email" aria-describedby="emailHelp">
						<span class="invalid-feedback position-absolute"><?= $data['email_err']; ?></span>
					</div>
				</div>
				<button type="submit" class="btn btn-primary mt-5 mt-md-0" name="subscribe">Subscribe</button>
			</form>
		</div>
	</div>
</div>