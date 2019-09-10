<template>
    <div class="profile-item-2">
        <div class="profile-content">
            <div class="header-label">Looking for</div>
            <div class="mt-3">
                <input id="filter_by_0" class="styled-checkbox-round" type="checkbox"
                    ref="filter_by_0" @change="formatCheckbox('filter_by', 0)" />
                <label for="filter_by_0">Individuals</label>
                
                <input id="filter_by_1" class="styled-checkbox-round" type="checkbox"
                    ref="filter_by_1" @change="formatCheckbox('filter_by', 1)" />
                <label for="filter_by_1">Companies</label>

                <input id="filter_by_2" class="styled-checkbox-round" type="checkbox"
                    ref="filter_by_2" @change="formatCheckbox('filter_by', 2)" />
                <label for="filter_by_2">Jobs</label>
            </div>

            <div class="header-label mt-2">Location</div>
            <div class="emp-row mt-2">
                <input type="text" class="form-control search-input bg-search" placeholder="Search" v-model="location" @keyup="onSearch('location')">
            </div>

            <div class="header-label mt-4">Industries</div>
            <div class="emp-row mt-2">
                <input type="text" class="form-control search-input bg-search" placeholder="Search" v-model="industries" @keyup="onSearch('industries')">
            </div>

            <div class="header-label mt-4">Education</div>
            <div class="emp-row mt-2">
                <input type="text" class="form-control search-input bg-search" placeholder="Search" v-model="education" @keyup="onSearch('education')">
            </div>
            
            <div class="header-label mt-4">Tickets</div>
            <div class="emp-row mt-2">
                <input type="text" class="form-control search-input bg-search" placeholder="Search" v-model="tickets" @keyup="onSearch('tickets')">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "job-search-filters",
        data() {
            return {
                location: '',
                industries: '',
                education: '',
                tickets: '',
                input: {
                    filter_by: ''
                },
            }
        },
        props: {

        },
        methods: {
            formatCheckbox(refName, value) {
                if (value == 2) {
                    this.$refs[refName + '_2'].checked = true;
                    this.$refs[refName + '_1'].checked = false;
                    this.$refs[refName + '_0'].checked = false;

                } else if (value == 1) {
                    this.$refs[refName + '_2'].checked = false;
                    this.$refs[refName + '_1'].checked = true;
                    this.$refs[refName + '_0'].checked = false;
                    
                } else if (value == 0) {
                    this.$refs[refName + '_2'].checked = false;
                    this.$refs[refName + '_1'].checked = false;
                    this.$refs[refName + '_0'].checked = true;
                    
                } else {
                    this.$refs[refName + '_2'].checked = false;
                    this.$refs[refName + '_1'].checked = false;
                    this.$refs[refName + '_0'].checked = false;
                }

                this.input[refName] = value;
            },
            onSearch(type) {
                switch(type) {
                    case 'location': break;
                    case 'industries': break;
                    case 'education': break;
                    case 'tickets': break;
                }
            },
        },
        created() {
            let vm = this;

            Bus.$on('', function() {

            });
        },
        mounted() {

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