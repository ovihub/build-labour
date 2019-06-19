<template>
    <span v-if="editable"
        :class="cls"
        data-toggle="modal"
        data-backdrop="static"
        data-keyboard="false"
        :data-target="dataTarget">

        <img src="/img/icons/editbutton.png"
            srcset="/img/icons/editbutton@2x.png 2x, /img/icons/editbutton@3x.png 3x">
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