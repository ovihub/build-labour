<template>
    <span v-if="editable"
        :class="cls"
        data-toggle="modal"
        data-backdrop="static"
        data-keyboard="false"
        :data-target="dataTarget">

        <img :src="'/img/icons/' + iconName + '.png'"
            :srcset="'/img/icons/' + iconName + '@2x.png 2x, /img/icons/' + iconName + '@3x.png 3x'">
    </span>
</template>

<script>
    export default {
        data() {
            return {
                editable: false,
            }
        },

        props: {
            cls: {
                type: String,
                required: true
            },
            dataTarget: {
                type: String,
                required: true
            },
            iconName: {
                type: String,
                default: 'editbutton'
            },
        },

        created() {
            if (! parseInt(window.location.pathname.split('/').pop(), 10)) {
                this.editable = true;
            }
        },

        methods: {

        }
    }
</script>