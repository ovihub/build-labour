<template>
    <div class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content modal-ku">
                <div class="modal-header">
                    <slot name="custom-modal-title"></slot>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <slot name="custom-modal-content"></slot>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
    .modal-ku {
        width: 500px;
        margin-top: 100px;
        padding: 30px;
    }
</style>