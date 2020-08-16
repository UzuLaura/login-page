<template>
    <form v-on:submit.prevent="login" id="login-form">

        <!-- Username Input START -->
        <div v-on:focusin="highlightInputField"
             v-on:focusout="removeHighlightFromInputField"
             class="input-group">
            <input v-model="username.value"
                   name="username"
                   id="username"
                   type="email"
                   placeholder="Username">
            <label for="username"><i class="fas fa-user"></i></label>
        </div>
        <!-- Username Input END -->

        <!--Error Message START-->
        <div class="error-block">
            <small v-if="username.error">{{ username.error[0] }}</small>
        </div>
        <!--Error Message END-->

        <!-- Password Input START -->
        <div v-on:focusin="highlightInputField"
             v-on:focusout="removeHighlightFromInputField"
             class="input-group">
            <input v-model="password.value"
                   name="password"
                   id="password"
                   type="password"
                   placeholder="Password">
            <label for="password"><i class="fas fa-lock"></i></label>
        </div>
        <!-- Password Input END -->

        <!--Error Message START-->
        <div class="error-block">
            <small v-if="password.error">{{ password.error[0] }}</small>
        </div>
        <!--Error Message END-->

        <!-- Form Submit Button START -->
        <div class="btn-group">
            <button class="button">Sign In</button>
        </div>
        <!-- Form Submit Button END -->

    </form>
</template>

<script>
    export default {
        data: function () {
            return {
                username: {
                    value: '',
                    error: ''
                },
                password: {
                    value: '',
                    error: ''
                },
                token: document.head.querySelector("[name~=csrf-token][content]").content,
            }
        },
        methods: {
            highlightInputField: e => {
                e.target.parentElement.classList.add('input-group-focused');
            },
            removeHighlightFromInputField: e => {
                e.target.parentElement.classList.remove('input-group-focused');
            },
            login: function () {
                this.sendData();
            },
            sendData: function () {
                fetch('/login', {
                    method: 'post',
                    body: JSON.stringify({'username': this.username.value, 'password': this.password.value}),
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-Token': this.token,
                    }
                })
                    .then(response => {
                        return response.text();
                    })
                    .then(data => {
                        const message = JSON.parse(data);
                        if (message.fail) {
                            this.username.error = message.fail.username ?? '';
                            this.password.error = message.fail.password ?? '';
                        }
                        if (message.success) {
                            this.redirectHome();
                        }
                    })
            },
            redirectHome: function () {
                window.location = window.location.href + 'home';
            }
        },
    }
</script>