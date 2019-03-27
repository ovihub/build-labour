<template>
    <form method="POST" @submit.prevent="sendResetPasswordLink">

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

            <div class="col-md-7">
                <input id="email" type="email" name="email" class="form-control" v-model="input.email" required />

                <span class="err-msg" v-if="errors.email">
                    {{ errors.email }}
                </span>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-7 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Send Reset Password Link
                </button>
            </div>
        </div>
    </form>
</template>

<script src="./RequestLink.js"></script>