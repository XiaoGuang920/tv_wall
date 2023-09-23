{!! $header !!}

<link href="{{ URL::asset('css/Admin/login.css') }}" rel="stylesheet">

<div id="login-body">
    <div class="login-block">
        <div class="logo-img-block">
            <img class="logo-img" src="/images/Admin/logo.png">
        </div>

        <div class="input-block">
            <div class="login-input-group">
                <input class="login-input" :class="{ 'input-error': account_error }" required v-model="account">
                <span class="input-text">帳號</span>
                <div v-cloak v-show="account_error" class="input-error-txt"><i class="fa-solid fa-triangle-exclamation"></i>請填寫帳號</div>
            </div>
            <div class="login-input-group">
                <input class="login-input password" :class="{ 'input-error': password_error }" type="password" required v-model="password">
                <span class="input-text">密碼</span>
                <div v-cloak v-show="password_error" class="input-error-txt"><i class="fa-solid fa-triangle-exclamation"></i>請填寫密碼</div>
            </div>

            <div class="login-btn-block">
                <button class="login-btn" :class="{ 'loading-btn': loading }" :disabled="loading" @click="login()">
                    <template v-cloak v-if="loading">登入中...</template>
                    <template v-cloak v-else>登入</template>
                </button>
            </div>
        </div>
    </div>    

    <transition name="error-alert">
        <div v-cloak v-show="auth_error" class="error-alert"><i class="fa-solid fa-circle-exclamation"></i>${ error_msg }</div>
    </transition>
</div>
{!! $footer !!}

<script type="text/javascript">
const app = Vue.createApp({
    delimiters: ['${', '}'],

    data() {
        return {
            account: '',
            account_error: false,
            password: '',
            password_error: false,
            auth_error: false,
            error_msg: '',
            loading: false
        }
    },

    methods: {
        login() {
            let _this = this;

            _this.account_error = false;
            _this.password_error = false;

            if (_this.account == '') {
                _this.account_error = true;
            }
            if (_this.password == '') {
                _this.password_error = true;
            }
            if (_this.account_error || _this.password_error) {
                return;
            } 

            $.ajax({
                type: 'post',
                url: './login',
                data: {
                    account: _this.account,
                    password: _this.password,
                    _token: '{{ csrf_token() }}'
                },
                beforeSend() {
                    _this.loading = true;
                },
                complete() {
                    _this.loading = false;
                },
                success(resp) {
                    if (resp.validate) {
                        if (resp.auth) {
                            location.href = './dashboard';
                        } else {
                            _this.error_msg = '帳號或密碼錯誤!';
                            _this.auth_error = true;

                            setTimeout(function() {
                                _this.auth_error = false;
                            }, 5000);
                        }
                    } else {
                        _this.error_msg = '出現問題，請再試一次!';
                        _this.auth_error = true;

                        setTimeout(function() {
                            _this.auth_error = false;
                        }, 5000);
                    }
                },
                error(msg) {
                    console.log(msg);
                    _this.error_msg = '出現問題，請再試一次!';
                    _this.auth_error = true;

                    setTimeout(function() {
                        _this.auth_error = false;
                    }, 5000);
                }
            });
        }
    }
}).mount('#login-body');
</script>