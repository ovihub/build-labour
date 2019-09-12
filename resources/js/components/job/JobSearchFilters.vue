<template>
    <div class="profile-item-2">
        <div class="profile-content">
            <div class="header-label">Looking for</div>
            <div class="mt-3">
                <input id="search_type_individuals" class="styled-checkbox-round" type="checkbox"
                    ref="search_type_individuals" @change="formatCheckbox('search_type', 'individuals')" />
                <label for="search_type_individuals">Individuals</label>
                
                <input id="search_type_companies" class="styled-checkbox-round" type="checkbox"
                    ref="search_type_companies" @change="formatCheckbox('search_type', 'companies')" />
                <label for="search_type_companies">Companies</label>

                <input id="search_type_jobs" class="styled-checkbox-round" type="checkbox"
                    ref="search_type_jobs" @change="formatCheckbox('search_type', 'jobs')" />
                <label for="search_type_jobs">Jobs</label>
            </div>

            <div class="header-label mt-2">Location</div>
            <div class="emp-row mt-2">
                <input type="text" class="form-control search-input bg-search" placeholder="Search"
                    v-model="input.address" @keyup="onSearch('address')">
            </div>

            <div class="header-label mt-4">Industries</div>
            <div class="emp-row mt-2">
                <input type="text" class="form-control search-input bg-search" placeholder="Search"
                    v-model="input.industry" @keyup="onSearch('industry')">
            </div>

            <div class="header-label mt-4">Education</div>
            <div class="emp-row mt-2">
                <input type="text" class="form-control search-input bg-search" placeholder="Search"
                    v-model="input.education" @keyup="onSearch('education')">
            </div>
            
            <div class="header-label mt-4">Tickets</div>
            <div class="emp-row mt-2">
                <input type="text" class="form-control search-input bg-search" placeholder="Search"
                    v-model="input.ticket" @keyup="onSearch('ticket')">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "job-search-filters",
        data() {
            return {
                input: {
                    search_type: 'jobs',
                    search_string: '',
                    address: '',
                    education: '',
                    ticket: '',
                    industry: '',
                },
                endpoints: {
                    open_search: '/api/v1/open-search',
                },
            }
        },
        methods: {
            formatCheckbox(refName, value) {
                this.$refs[refName + '_' + value].checked = true;

                if (value == 'individuals') {
                    this.$refs[refName + '_companies'].checked = false;
                    this.$refs[refName + '_jobs'].checked = false;

                } else if (value == 'companies') {
                    this.$refs[refName + '_individuals'].checked = false;
                    this.$refs[refName + '_jobs'].checked = false;
                    
                } else if (value == 'jobs') {
                    this.$refs[refName + '_individuals'].checked = false;
                    this.$refs[refName + '_companies'].checked = false;
                    
                } else {
                    this.$refs[refName + '_individuals'].checked = false;
                    this.$refs[refName + '_companies'].checked = false;
                    this.$refs[refName + '_jobs'].checked = false;
                }

                this.input[refName] = value;
                this.onSearch(value);
            },
            async onSearch(type) {
                let vm = this;

                await axios.post(this.endpoints.open_search, this.input, 
                
                Utils.getBearerAuth()).then(function(response) {
                    let data = response.data.data;

                    Bus.$emit('openSearch' + data.search_type.charAt(0).toUpperCase() + data.search_type.substr(1), data.search_result);
                
                }).catch(function(error) {
                    let inputErrors = Utils.handleError(error);
                    
                    if (inputErrors) vm.errors = inputErrors;
                });
            },
        },
        created() {
            let vm = this;

            Bus.$on('openSearchKeyword', function(keyword) {
                vm.input.search_string = keyword;
                vm.onSearch('jobs');
            });
        },
        mounted() {
            this.$refs['search_type_jobs'].checked = true;
            this.onSearch('jobs');
        },
    }
</script>

<style scoped>
    .header-label {
        font-size: 16px;
        font-weight: 600;
        color: #383d3f;
    }
    .search-input {
        padding: 12px;
        font-size: 16px;
        border-radius: 4px;
        border: solid 1px rgba(25, 25, 25, 0.32);
        background-color: #ffffff;
        height: 46px;
    }
    .search-input.bg-search {
        padding-left: 40px;
        background-position: 9px 13px;
        background-repeat: no-repeat;
        background-image: url(/img/icons/search.png);
        background-image: -webkit-image-set(url(/img/icons/search@2x.png) 2x, url(/img/icons/search@3x.png) 3x);
    }
    .search-input::placeholder {
        color: #acbbbf;
    }
    .styled-checkbox-round + label {
        margin-right: 0px;
        margin-bottom: 18px;
        width: 100%;
    }
    .styled-checkbox-round:checked + label:before {
        background: #00aeef;
        border: 1px solid #00aeef;
    }
    .styled-checkbox-round:checked + label {
        color: #00aeef;
        font-weight: 600;
    }
</style>