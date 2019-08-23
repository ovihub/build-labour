<template>
    <div class="form-group view-company" v-if="record">
        <div class="record-title">
            {{ record.name }}
        </div>
        <div class="record-photo">
            <div class="record-profile-pic">
                <img v-if="record.photo_url" :src="record.photo_url" height="120px" />
                <img v-else src="/img/logo/1.jpg" height="120px" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <label class="record-label">
                    Workers
                </label>
                <ul>
                    <li v-for="(value, index) in record.workers" :key=index>
                        <span>
                            <img v-if="value.profile_photo_url" :src="value.profile_photo_url" height="40px" />
                            <img v-else src="/img/defaults/user.png" height="40px" />
                            {{ getProfileName(value) }}
                        </span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row" v-for="(value, key) in record" :key="key.id">
            <div class="col-md-12" v-if="excludes.indexOf(key) < 0">
                <label class="record-label">
                    {{ key.split('_').join(' ').toUpperCase() }}
                </label>
            </div>

            <div class="col-md-12" v-if="key && excludes.indexOf(key) < 0">
                <span v-if="key == 'created_at' || key == 'updated_at' || key == 'deleted_at'"
                    class="form-control record-input">{{ formatDate(value) }}</span>

                <span v-else class="form-control record-input">{{ value }}</span>
            </div>
        </div>
        <div class="row">

            <div class="col-md-12">
                <label class="record-label">
                    LOCATIONS
                </label>
            </div>

            <div class="col-md-12">
                <span class="form-control record-input" v-for="(loc, index) in record.locations" :key=index>
                    {{ loc }}
                </span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "view-company",
		data() {
			return {
                record_id: 0,
				record: null,
				endpoints: {
					get: ''
				},
                excludes: [
                    'updated_at',
                    'deleted_at',
                    'workers',
                    'created_by',
                    'locations',
                    'photo_url'
                ]
			}
		},
		created() {
			let component = this;

            Bus.$on('datatableViewCompany', function(id){
                component.record_id = id;
                component.endpoints.get = '/api/v1/admin/company/get?id=' + id;
                component.viewRecord();
            });
            
            Bus.$on('croppedPhoto', function (profile_photo_url) {
                component.record.profile_photo_url = profile_photo_url;
            });

            Bus.$on('closePhotoModal', function() {
                $('#upload').val('');
            });
		},
		methods: {
		  	viewRecord() {
				let component = this;

				axios.get(component.endpoints.get, Utils.getBearerAuth())

                    .then(function(response) {
                        
                        component.record = response.data.data.record;
                    })
                    .catch(function(error) {
                        
                        Utils.handleError(error);
                    });
            },
            formatDate(d) {
                if (d != null) {
                    let date = new Date(d);

                    return date.getDate() + ' ' + Utils.getMonth(date.getMonth()) + ' ' + date.getFullYear();
                }
			},
            getProfileName(value) {
                return value.first_name + ' ' + value.last_name;
            },
            onClickDeleteAccount() {
				Bus.$emit('datatableDeleteUser', this.record_id);
            },
            onClickUploadImage() {
                upload.click();
            },
            onFileChange(e) {
                Utils.onFileChange(e, this.record_id);
            },
            onClickDeleteImage() {
                Bus.$emit('deletePhoto', this.record_id);
            },
        }
	}
</script>