<template>
    <main-modal id="modalTickets">

        <template slot="custom-modal-title">
            <h4 class="modal-title">Edit Tickets</h4>
            <div class="close" data-dismiss="modal" @click="close">&times;</div>
        </template>

        <template slot="custom-modal-content">
            <ticket-details></ticket-details>
        </template>

        <template slot="custom-modal-footer">
            <button class="pull-right" type="button" data-dismiss="modal" @click="submit">
                Save Changes
            </button>
        </template>

    </main-modal>
</template>

<script>
    import Api from '@/api';

    export default {
        data() {
            return {

            }
        },

        created() {

        },

        methods: {

            close() {
                Bus.$emit('refreshTicketDetails');
            },
            
            submit() {
                Bus.$emit('submitTickets');

                this.close();
            },
        }
    }
</script>