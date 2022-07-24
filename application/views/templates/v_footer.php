<footer class="main-footer d-flex p-2 px-3 bg-white border-top">
	<ul class="nav">
		<li class="nav-item">
			<a class="nav-link" href="#">Home</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#">Services</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#">About</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#">Products</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#">Blog</a>
		</li>
	</ul>
	<span class="copyright ml-auto my-auto mr-2">Copyright © 2022 - <?= date('Y') ?> PusHaki Universitas Kuningan</span>
</footer>
</main>
</div>
</div>
<script type="text/javascript" src="<?= base_url() ?>assets/js/loader.js"></script>
<script src="<?= base_url() ?>assets/js/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="<?= base_url() ?>assets/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/js/script.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
	<?php if ($this->session->flashdata('success')) { ?>
		let pesan = <?= json_encode($this->session->flashdata('success')) ?>;
		Swal.fire({
			icon: 'success',
			title: 'Good Job!',
			text: pesan
		});
	<?php } else if ($this->session->flashdata('error')) { ?>
		let pesan = <?= json_encode($this->session->flashdata('error')) ?>;
		Swal.fire({
			icon: 'error',
			title: 'Opss...!',
			text: pesan
		});
	<?php } ?>
</script>
</body>

</html>
