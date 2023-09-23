{!! $header !!}{!! $sidebar !!}

<link href="{{ URL::asset('css/Admin/dashboard.css') }}" rel="stylesheet">

<section id="content">
    <nav class="content-nav">
        <i class="fa-solid fa-bars" @click="changeSidebarStatus()"></i>

        <div class="user-info">
            <img class="user-img" src="/images/Admin/avatar.jpg">
            <div class="user-name">系辦</divs>
        </div>
    </nav>

    <main>
        <div class="head-title">
            主控台
        </div>
        
        <div v-cloak v-if="page_loading == false" class="box-info">
            <div v-cloak class="teacher-num">
                <div class="icon-content"><i class="fa-solid fa-chalkboard-user"></i></div>
                <div class="txt-content">
                    <div>教師數量</div>
                    <div v-cloak>${ teacher_quantity }</div>
                </div>
            </div>
            <div v-cloak class="announcement-num">
                <div class="icon-content"><i class="fa-solid fa-bullhorn"></i></div>
                <div class="txt-content">
                    <div>公告數量</div>
                    <div v-cloak>${ announcement_quantity }</div>
                </div>
            </div>
            <div v-cloak class="album-num">
                <div class="icon-content"><i class="fa-regular fa-images"></i></div>
                <div class="txt-content">
                    <div>相簿數量</div>
                    <div v-cloak>${ album_quantity }</div>
                </div>
            </div>
            <div v-cloak class="picture-num">
                <div class="icon-content"><i class="fa-regular fa-image"></i></div>
                <div class="txt-content">
                    <div>照片數量</div>
                    <div v-cloak>${ picture_quantity }</div>
                </div>
            </div>
        </div>
        
        <transition name="inner-error-alert">
            <div v-cloak v-show="error_status" class="inner-error-alert"><i class="fa-solid fa-circle-exclamation"></i>${ error_msg }</div>
        </transition>

        <transition name="page-loading">
            <div v-cloak v-show="page_loading" class="page-loading">
                <div class="wrapper">
                    <div class="box-wrap">
                        <div class="box one"></div><div class="box two"></div><div class="box three"></div>
                        <div class="box four"></div><div class="box five"></div><div class="box six"></div>
                    </div>
                </div>
            </div>
        </transition>
    </main>
</section>

{!! $footer !!}

<script type="text/javascript">
const app = Vue.createApp({
    delimiters: ['${', '}'],

    data() {
        return {
            page: 'dashboard',
            teacher_quantity: '',
            announcement_quantity: '',
            album_quantity: '',
            picture_quantity: '',
            hide_menu: true,
            error_status: false,
            error_msg: '',
            page_loading: false
        }
    },

    created() {
        let _this = this;
        let sidebar_hide = window.localStorage.getItem('menu_hide');

        if (sidebar_hide != null) {
            sidebar_hide = sidebar_hide == 'true' ? true : false;
        }

        if (sidebar_hide == null) {
            window.localStorage.setItem('menu_hide', false);
            _this.hide_menu = false;
        } else {
            if (sidebar_hide == true) {
                _this.hide_menu = true;
            } else {
                _this.hide_menu = false;
            }
        }

        _this.getDataQuantity();
    },

    methods: {
        changeSidebarStatus() {
            let _this = this;

            _this.hide_menu = !_this.hide_menu;
            window.localStorage.setItem('menu_hide', _this.hide_menu);
        },

        showErrorMsg(show_msg) {
            let _this = this;

            if (_this.error_status) {
                return;
            }

            _this.error_msg = show_msg;
            _this.error_status = true;

            setTimeout(function() {
                _this.error_status = false;
            }, 5000);
        },

        getDataQuantity() {
            let _this = this;

            $.ajax({
                type: 'post',
                url: './dashboard/getDataQuantity',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                beforeSend() {
                    _this.page_loading = true;
                },
                complete() {
                    _this.page_loading = false;
                },
                success(resp) {
                    _this.teacher_quantity = resp.teacher_quantity;
                    _this.announcement_quantity = resp.announcement_quantity;
                    _this.album_quantity = resp.album_quantity;
                    _this.picture_quantity = resp.picture_quantity;
                },
                error(msg) {
                    _this.showErrorMsg('出現錯誤，請重新整理並再試一次!');
                }
            });
        }
    }
}).mount('#body-content');
</script>