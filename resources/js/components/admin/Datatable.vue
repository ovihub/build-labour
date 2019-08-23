<template>
	<div>
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center bl-mb-32">
			<div class="table-title">
				<span :class="dataTitle" @click="onClickTitle">{{ title }}</span>
				<span v-if="dataTable === 'hidden'">
					<span class="fa fa-angle-right data-title ml-1 mr-1"></span>
					<span class="data-title-active">{{ subTitle }}</span>
				</span>
			</div>
			<img class="table-search" src="/img/icons/search.png"
                srcset="/img/icons/search@2x.png 2x, /img/icons/search@3x.png 3x"
				@click="onClickSearch">

			<input :class="dataSearch" type="text" v-model="searchText"
				@keyup="fetchData">
    	</div>
		
		<view-user v-if="modalName == 'User'" :class="dataRecord"></view-user>

		<view-job v-else-if="modalName == 'Job'" :class="dataRecord"></view-job>
		
		<view-company v-else-if="modalName == 'Company'" :class="dataRecord"></view-company>

		<view-ticket v-else-if="modalName == 'Ticket'" :class="dataRecord"></view-ticket>

		<view-job-role v-else-if="modalName == 'JobRole'" :class="dataRecord"></view-job-role>
		<div :class="dataTable">
			<div style="overflow:auto">
				<table class="table table-hover">
					<thead>
						<tr>
							<th v-for="column in columns" :key="column" @click="sortByColumn(column)" class="">
								{{ column | columnHead }}
								
								<span v-if="column === sortedColumn">
									<i v-if="order === 'asc'" class="fa fa-arrow-up"></i>
									<i v-else class="fa fa-arrow-down"></i>
								</span>
							</th>
						</tr>
					</thead>
				
					<tbody>
						<tr class="" v-if="tableData.length === 0">
							<td class="lead text-center" :colspan="columns.length + 1">No data found.</td>
						</tr>
						<tr v-for="(data, key1) in tableData" :key="key1" class="m-datatable__row" @click="onClickViewRow(data)" v-else>
							<td v-for="(value, key) in data" :key="key.id">
								<span v-if="key !== 'full_name'">{{ value }}</span>
								<span v-if="key === 'full_name'">
									<img class="table-profile-pic" :src="getProfilePic(value)"/>{{ getProfileName(value) }}
								</span>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			
			<br>

			<nav v-if="pagination && tableData.length > 0">
				<ul class="pagination">
					<a class="page-link-2 mr-3" href="#" 
						v-if="modalName == 'Job' || modalName == 'Ticket' || modalName == 'JobRole'"
						@click="onClickViewRow(null)">
							<span class="fa fa-sync"></span>Add
					</a>
					<a class="page-link-2 mr-3" href="#" @click="fetchData"><span class="fa fa-sync"></span>Refresh</a>
					<li class="page-item-2" :class="{'disabled' : currentPage === 1}">
						<a class="page-link-2" href="#" @click.prevent="changePage(currentPage - 1)">Previous</a>
					</li>
					<li v-for="page in pagesNumber" :key="page.id" class="page-item-2" :class="{'active': page == pagination.meta.current_page}">
						<a href="javascript:void(0)" @click.prevent="changePage(page)" class="page-link-2">{{ page }}</a>
					</li>
					<li class="page-item-2" :class="{'disabled': currentPage === pagination.meta.last_page }">
						<a class="page-link-2" href="#" @click.prevent="changePage(currentPage + 1)">Next</a>
					</li>
					<span class="ml-3" style="margin-top: 8px;">Displaying {{ pagination.meta.from }} - {{ pagination.meta.to }} of {{ pagination.meta.total }} entries.</span>
				</ul>
			</nav>

			<nav v-else>
				<ul class="pagination">
					<a class="page-link-2 mr-3" href="#" 
						v-if="modalName == 'Job' || modalName == 'Ticket'"
						@click="onClickViewRow(null)">
							<span class="fa fa-sync"></span>Add
					</a>
				</ul>
			</nav>
		</div>
	</div>
</template>

<script>
	import ViewUser from '../admin/ViewUser';
	import ViewCompany from '../admin/ViewCompany';
	import ViewJob from '../admin/ViewJob';
	import ViewJobRole from '../admin/ViewJobRole';
	import ViewTicket from '../admin/ViewTicket';

	export default {
		name: "datatable",
		data() {
			return {
				dataSearch: 'hidden',
				dataTitle: 'data-title',
				dataTable: 'data-table',
				dataRecord: 'data-record',
				subTitle: '',
				tableData: [],
				searchText: '',
				url: '',
				pagination: {
					meta: { 
						to: 1,
						from: 1,
						last_page: 1,
					}
				},
				offset: 4,
				currentPage: 1,
				perPage: 10,
				sortedColumn: this.columns[0],
				order: 'asc',
			}
		},
		props: {
			title: {
				type: String, 
				required: true
			},
			
			fetchUrl: { 
				type: String, 
				required: true 
			},
			
			columns: { 
				type: Array, 
				required: true 
			},

			modalName: { 
				type: String, 
				required: true 
			},
		},
		watch: {
	 		fetchUrl: {
				handler: function(fetchUrl) {
		  			this.url = fetchUrl
				},
				
				immediate: true
	  		}
		},
		created() {
			let component = this;

			Bus.$on('refreshDatatable', function() {
				component.fetchData();
			});

			Bus.$on('adminSaveChanges', function(id) {
				component.onClickTitle();
				
				if (id == 0) {
					component.changePage(component.pagination.meta.last_page);
				}
			});

			this.fetchData();
		},
		computed: {
			pagesNumber() {
				if (!this.pagination.meta.to) {
					return [];
				}

				let from = this.pagination.meta.current_page - this.offset;
				if (from < 1) {
					from = 1;
				}

				let to = from + (this.offset * 2);
				if (to >= this.pagination.meta.last_page) {
					to = this.pagination.meta.last_page;
				}

				let pagesArray = [];
				for (let page = from; page <= to; page++) {
					pagesArray.push(page);
				}

				return pagesArray;
			},
			totalData() {
				return (this.pagination.meta.to - this.pagination.meta.from) + 1;
			},
		},
		methods: {
			fetchData() {
				let dataFetchUrl = `${this.url}?page=${this.currentPage}&column=${this.sortedColumn}&order=${this.order}&per_page=${this.perPage}&search_text=${this.searchText}`

				axios.get(dataFetchUrl, Utils.getBearerAuth())

					.then(({ data }) => {
							this.pagination = data;

							this.tableData = data.data;
						})
					.catch(error => this.tableData = [])
		
				Bus.$emit('alertHide');
			},
			serialNumber(key) {
				return (this.currentPage - 1) * this.perPage + 1 + key;
			},
			changePage(pageNumber) {
				if (pageNumber != this.pagination.meta.last_page + 1 && pageNumber >= 1) {
					this.currentPage = pageNumber;

					this.fetchData();
				}
			},
			sortByColumn(column) {
				if (column === this.sortedColumn) {
					this.order = (this.order === 'asc') ? 'desc' : 'asc';
				
				} else {
					this.sortedColumn = column;
					this.order = 'asc';
				}

				this.fetchData();
			},
			getProfilePic(value) {
				return value.split(' ')[0];
			},
			getProfileName(value) {
				return value.split(' ').slice(1).join(' ');
			},
			onClickSearch() {
				this.dataSearch = this.dataSearch == 'hidden' ? 'data-search' : 'hidden';
			},
			onClickViewRow(data) {
				let id = 0;

				if (data != null) {
					id = data.id;
					
					if (this.modalName == 'User') {
						this.subTitle = this.getProfileName(data.full_name);
					
					} else if (this.modalName == 'Job') {
						this.subTitle = data.title;
					
					} else if (this.modalName == 'Company') {
						this.subTitle = data.name;
					
					} else if (this.modalName == 'Ticket') {

						this.subTitle = data.ticket;

					} else if (this.modalName == 'JobRole') {

                    	this.subTitle = data.JobRole;
                	}
				
				} else {
					this.subTitle = 'Add New';
				}

				this.dataSearch = 'hidden';
				this.dataTitle = 'data-title';
				this.dataTable = 'hidden';
				this.dataRecord = 'data-record';

				Bus.$emit('datatableView' + this.modalName, id)
			},
			onClickTitle() {
				this.dataTitle = 'data-title';
				this.dataTable = 'data-table';
				this.dataRecord = 'hidden';

				this.fetchData();
			},
		},
		filters: {
			columnHead(value) {
				return value.split('_').join(' ').toUpperCase();
			}
		},
		components: {
			ViewUser,
			ViewCompany,
			ViewJob,
			ViewJobRole,
			ViewTicket,
		},
	}
</script>

<style scoped></style>
