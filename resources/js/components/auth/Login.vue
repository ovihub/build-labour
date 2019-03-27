<template>
    <form method="POST" @submit.prevent="loginUser">

        <div class="form-group row">
            <label for="email" class="col-sm-4 col-form-label text-md-right">E-Mail Address</label>

            <div class="col-md-6">
                <input id="email" type="email"  name="email" class="form-control" v-model="input.email" required autofocus>

                <span class="err-msg" v-if="errors.email">
                    {{ errors.email }}
                </span>
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

            <div class="col-md-6">
                <input id="password" type="password"  name="password" class="form-control" v-model="input.password" required>

                <span class="err-msg" v-if="errors.password">
                    {{ errors.password }}
                </span>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"> <!-- {{ old('remember') ? 'checked' : '' }} -->

                    <label class="form-check-label"> <!-- for="remember" -->
                        Remember Me
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Login
                </button>

                <a class="btn btn-link" v-bind:href="endpoints.reset">
                    Forgot Your Password
                </a>
            </div>
        </div>
    </form>
</template>

<script src="./Login.js"></script>