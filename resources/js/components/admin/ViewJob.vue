<template>
    <div class="form-group" v-if="record">
        <!-- <div class="record-title">
            {{ record.full_name }}
        </div> -->
        <div class="row" v-for="(value, key) in record" :key="key.id">
            <div class="col-md-12">
                <label class="record-label">
                    {{ key.split('_').join(' ').toUpperCase() }}
                </label>
            </div>

            <div class="col-md-12" v-if="key != 'profile_photo_url'">
                <span v-if="key == 'created_at' || key == 'updated_at' || key == 'deleted_at'"
                    class="form-control record-input">{{ formatDate(value) }}</span>
                
                <span v-else-if="key != 'message'" class="form-control record-input">{{ value }}</span>

                <textarea v-else-if="key == 'message'" class="form-control record-input" :value="value" readonly></textarea>
            </div>
        </div>
        <!-- <div class="form-group row mt-5">
            <div class="col-md-12">
                <button class="btn btn-primary" data-toggle="modal" data-target="#deleteRecordModal" @click="onClickDeleteAccount()">
                    Delete Job Role
                </button>
            </div>
        </div> -->
    </div>
</template>

<script>
    export default {
		data() {
			return {
                record_id: 0,
				record: null,
				endpoints: {
					get: ''
				}
			}
		},
		
		created() {
			let component = this;

            Bus.$on('datatableViewJob', function(id){
                component.record_id = id;
                component.endpoints.get = '/api/v1/admin/user/get?id=' + id;
                component.viewRecord();
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
            
        }
	}
</script>