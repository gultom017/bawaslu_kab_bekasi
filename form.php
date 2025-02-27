<?php

require_once('header.php');

?>

<main>
    <div class="container">

		<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">

			<div class="row">

					<div class="col-lg-12">

					<div class="card">
						<div class="card-body">
						<h5 class="card-title">Form Rekap Perhitungan Suara Pilpres</h5>

						<!-- Advanced Form Elements -->
						<form>
							<div class="row mb-5">
							<label class="col-sm-2 col-form-label">Switches</label>
							<div class="col-sm-10">
								<div class="form-check form-switch">
								<input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
								<label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label>
								</div>
								<div class="form-check form-switch">
								<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
								<label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label>
								</div>
								<div class="form-check form-switch">
								<input class="form-check-input" type="checkbox" id="flexSwitchCheckDisabled" disabled>
								<label class="form-check-label" for="flexSwitchCheckDisabled">Disabled switch checkbox input</label>
								</div>
								<div class="form-check form-switch">
								<input class="form-check-input" type="checkbox" id="flexSwitchCheckCheckedDisabled" checked disabled>
								<label class="form-check-label" for="flexSwitchCheckCheckedDisabled">Disabled checked switch checkbox input</label>
								</div>
							</div>
							</div>

							<div class="row mb-5">
							<label class="col-sm-2 col-form-label">Ranges</label>
							<div class="col-sm-10">
								<div>
								<label for="customRange1" class="form-label">Example range</label>
								<input type="range" class="form-range" id="customRange1">
								</div>
								<div>
								<label for="disabledRange" class="form-label">Disabled range</label>
								<input type="range" class="form-range" id="disabledRange" disabled>
								</div>
								<div>
								<label for="customRange2" class="form-label">Min and max with steps</label>
								<input type="range" class="form-range" min="0" max="5" step="0.5" id="customRange2">
								</div>
							</div>
							</div>

							<div class="row mb-3">
							<label class="col-sm-2 col-form-label">Floating labels</label>
							<div class="col-sm-10">
								<div class="form-floating mb-3">
								<input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
								<label for="floatingInput">Email address</label>
								</div>
								<div class="form-floating mb-3">
								<input type="password" class="form-control" id="floatingPassword" placeholder="Password">
								<label for="floatingPassword">Password</label>
								</div>
								<div class="form-floating mb-3">
								<textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px;"></textarea>
								<label for="floatingTextarea">Comments</label>
								</div>
								<div class="form-floating mb-3">
								<select class="form-select" id="floatingSelect" aria-label="Floating label select example">
									<option selected>Open this select menu</option>
									<option value="1">One</option>
									<option value="2">Two</option>
									<option value="3">Three</option>
								</select>
								<label for="floatingSelect">Works with selects</label>
								</div>
							</div>
							</div>

							<div class="row mb-5">
							<label class="col-sm-2 col-form-label">Input groups</label>
							<div class="col-sm-10">
								<div class="input-group mb-3">
								<span class="input-group-text" id="basic-addon1">@</span>
								<input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
								</div>

								<div class="input-group mb-3">
								<input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
								<span class="input-group-text" id="basic-addon2">@example.com</span>
								</div>

								<label for="basic-url" class="form-label">Your vanity URL</label>
								<div class="input-group mb-3">
								<span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
								<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
								</div>

								<div class="input-group mb-3">
								<span class="input-group-text">$</span>
								<input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
								<span class="input-group-text">.00</span>
								</div>

								<div class="input-group mb-3">
								<input type="text" class="form-control" placeholder="Username" aria-label="Username">
								<span class="input-group-text">@</span>
								<input type="text" class="form-control" placeholder="Server" aria-label="Server">
								</div>

								<div class="input-group">
								<span class="input-group-text">With textarea</span>
								<textarea class="form-control" aria-label="With textarea"></textarea>
								</div>
							</div>
							</div>

						</form><!-- End General Form Elements -->

						</div>
					</div>

				</div>
			</div>
		</section>

	</div>
</main>

<?php

require_once('footer.php');

?>