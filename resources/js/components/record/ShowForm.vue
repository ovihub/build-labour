<template>
	<div class="form-group">
		<div class="row" v-for="(value, key) in record" :key="key.id">
			<label class="col-md-2 col-form-label text-md-left">
				{{ key.split('_').join(' ').toUpperCase() }}
			</label>

			<div class="col-md-5">
				<span class="form-control">{{ value }}</span>
			</div>
		</div>
	</div>
</template>

<script src="./ShowForm.js"></script>