<template>
	<div class="admin-companies">
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
		
		<admin-view-company v-if="modalName == 'Company'" :class="dataRecord"></admin-view-company>
		
		<div :class="dataTable">
			<div style="overflow:scroll">
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
								<span>{{ value }}</span>
							</td>
						</tr>
					</tbody>
				</table>
			</div>

			<nav v-if="pagination && tableData.length > 0">
				<ul class="pagination">
					<a class="page-link-2 mr-3" href="#" @click="fetchData"><span class="fa fa-sync"></span> Refresh</a>
					<li class="page-item-2" :class="{'disabled' : currentPage === 1}">
						<a class="page-link-2" href="#" v-bind:class="{ 'btn-pagination-disabled': !pagination.links.prev }" @click.prevent="changePage(currentPage - 1, 'prev')">Previous</a>
					</li>
					<li v-for="page in pagesNumber" :key="page.id" class="page-item-2" :class="{'active': page == pagination.meta.current_page}">
						<a href="javascript:void(0)" @click.prevent="changePage(page)" class="page-link-2">{{ page }}</a>
					</li>
					<li class="page-item-2" :class="{'disabled': currentPage === pagination.meta.last_page }">
						<a class="page-link-2" v-bind:class="{ 'btn-pagination-disabled': !pagination.links.next }" href="#" @click.prevent="changePage(currentPage + 1, 'next')">Next</a>
					</li>
					<span class="ml-3" style="margin-top: 8px;">Displaying {{ pagination.meta.from }} - {{ pagination.meta.to }} of {{ pagination.meta.total }} entries.</span>
				</ul>
			</nav>
		</div>
	</div>
</template>

<script>
	export default {
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
						from: 1
					},
					links : {
					    first: '',
						last: '',
						next: '',
						prev: ''
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
			
			changePage(pageNumber, mode) {

			    if (mode == 'next' && !this.pagination.links.next) {

			        return false;
				}

                if (mode == 'prev' && !this.pagination.links.prev) {

			        this.currentPage = 1;
                    return false;
                }

				this.currentPage = pageNumber;

				this.fetchData();
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

			onClickSearch() {
				this.dataSearch = this.dataSearch == 'hidden' ? 'data-search' : 'hidden';
			},

			onClickViewRow(data) {

			    console.log(data);
				let id = data.id;

				this.subTitle = data.name;
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
		
		name: 'DataTable'
	}
</script>

<style scoped></style>
