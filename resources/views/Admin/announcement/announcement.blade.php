{!! $header !!}{!! $sidebar !!}

<link href="{{ URL::asset('css/Admin/announcement.css') }}" rel="stylesheet">

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
            <template v-cloak v-if="show_block == 'list'">公告管理</template>
            <template v-cloak v-else-if="show_block == 'add'">新增公告</template>
            <template v-cloak v-else-if="show_block == 'edit'">編輯公告</template>
            <div class="operation">
                <button v-cloak v-if="show_block == 'list'" class="add-btn" @click="show_block = 'add'">新增公告</button>
                <button v-cloak v-else class="add-btn" @click="init()">返回</button>
            </div>
        </div>

        <div v-cloak v-if="show_block == 'list'" class="filter-block">
            <div class="filter-item" @click="getAnnouncementList()">全部</div>
            <div class="filter-item" @click="getAnnouncementList(1)">教學</div>
            <div class="filter-item" @click="getAnnouncementList(2)">報名表單</div>
            <div class="filter-item" @click="getAnnouncementList(3)">演講、座談會</div>
            <div class="filter-item" @click="getAnnouncementList(4)">專題相關</div>
            <div class="filter-item" @click="getAnnouncementList(5)">活動</div>
            <div class="filter-item" @click="getAnnouncementList(6)">其他</div>
        </div>

        <div v-cloak v-if="show_block == 'list'" class="box-info">
            <div v-cloak v-if="announcement_list.length == 0 && announcement_list !== ''" class="no-data-section">
                <div class="no-data">
                    <svg fill="#000000" width="800px" height="800px" viewBox="0 0 24 24" id="wind" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color">
                        <path id="secondary" d="M10,8H3A1,1,0,0,1,3,6h7a1,1,0,0,0,0-2,1,1,0,0,1,0-2,3,3,0,0,1,0,6ZM20,18a4,4,0,0,0-4-4H3a1,1,0,0,0,0,2H16a2,2,0,0,1,0,4,1,1,0,0,0,0,2A4,4,0,0,0,20,18Z" style="fill: rgb(44, 169, 188);"></path>
                        <path id="primary" d="M10,20H3a1,1,0,0,1,0-2h7a1,1,0,0,1,0,2ZM22,7.5A4.51,4.51,0,0,0,17.5,3a1,1,0,0,0,0,2,2.5,2.5,0,0,1,0,5H3a1,1,0,0,0,0,2H17.5A4.51,4.51,0,0,0,22,7.5Z" style="fill: rgb(0, 0, 0);"></path>
                    </svg>
                    無公告資料
                </div>
            </div>
            <div v-cloak v-else v-for="announcement in announcement_list" class="announcement-item">
                <div class="title-content">
                    ${ announcement.title }
                </div>
                <div class="operation-content">
                    <button class="edit-btn" @click="showAnnouncementInfo(announcement.announcement_id)"><i class="fa-solid fa-pencil"></i></button>
                    <button class="delete-btn" @click="showRemoveAnnouncementPopup(announcement.announcement_id)"><i class="fa-solid fa-trash-can"></i></button>
                </div>
            </div>
        </div>

        <transition name="popup-mask">
            <div v-show="popup_status" class="popup-mask">
                <transition name="popup-window">
                    <div v-show="popup_status" class="popup-window">
                        <div class="title">
                            系統訊息
                            <button class="close-btn" @click="hideRemoveAnnouncementPopup()"><i class="fa-regular fa-circle-xmark"></i></button>
                        </div>
                        <div class="body">
                            確定要刪除此公告嗎?
                        </div>
                        <div class="footer">
                            <button @click="hideRemoveAnnouncementPopup()" class="cancel-btn">取消</button>
                            <button @click="removeAnnouncement()" class="confirm-btn">確定</button>
                        </div>
                    </div>
                </transition>
            </div>
        </transition>
        
        <div v-cloak v-if="show_block == 'add' || show_block == 'edit'" class="box-info">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <span class="data-tag">作者</span>
                        <input v-model="author" class="data-input" placeholder="請輸入作者">
                    </div>
                    <div class="col-md-6">
                        <span class="data-tag">公告分類</span>
                        <select v-model="category_type" class="data-input">
                            <option value="">請選擇</option>
                            <option value="1">教學</option>
                            <option value="2">報名表單</option>
                            <option value="3">演講、座談會</option>
                            <option value="4">專題相關</option>
                            <option value="5">活動</option>
                            <option value="6">其他</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <span class="data-tag">開始時間</span>
                        <input v-model="start_time" class="data-input" type="datetime-local">
                    </div>
                    <div class="col-md-6">
                        <span class="data-tag">結束時間</span>
                        <input v-model="end_time" class="data-input" type="datetime-local">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <span class="data-tag">公告標題</span>
                        <input v-model="title" class="data-input" placeholder="請輸入公告標題">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <span class="data-tag">公告內文</span>
                        <textarea v-model="content" class="data-input" rows="8" placeholder="請輸入公告內文"></textarea>
                    </div>
                </div>
                <label v-cloak v-show="preview_image == ''" class="announcement-upload">
                    <input id="upload-img" ref="file" type="file" accept="image/*" @change="getUploadPicture">
                    <i class="fa fa-photo"></i>上傳相簿
                </label>
                <div v-cloak v-show="preview_image != ''" class="announcement-upload image">
                    <img v-cloak :src="preview_image">
                    <button class="delete-announcement-upload-btn" @click="deleteUploadImage()"><i class="fa-solid fa-trash-can"></i></button>
                </div>
            </div>
        </div>

        <transition name="save">
            <div v-cloak v-show="show_block == 'add' || show_block == 'edit'" class="save-block">
                <button v-show="btn_loading" class="normal-btn save-btn">
                    <div class="loading">Loading&#8230;</div>    
                    處理中...
                </button>
                <button v-show="!btn_loading" class="normal-btn" @click="uploadAnnouncement()">儲存</button>
            </div>
        </transition>

        <transition name="inner-success-alert">
            <div v-cloak v-show="success_status" class="inner-success-alert"><i class="fa-solid fa-circle-check"></i></i>${ success_msg }</div>
        </transition>
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
            page: 'announcement',
            hide_menu: true,
            show_block: 'list',
            announcement_list: [],
            title: '',
            content: '',
            author: '',
            category_type: '',
            start_time: '',
            end_time: '',
            image: '',
            preview_image: '',
            edit_announcement_id: '',
            remove_announcement_id: '',
            success_status: false,
            success_msg: '',
            error_status: false,
            error_msg: '',
            popup_status: false,
            btn_loading: false,
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

        _this.init();
    },

    methods: {
        changeSidebarStatus() {
            let _this = this;

            _this.hide_menu = !_this.hide_menu;
            window.localStorage.setItem('menu_hide', _this.hide_menu);
        },

        getAnnouncementList(filter='') {
            let _this = this;

            $.ajax({
                type: 'post',
                url: './announcement/getAnnouncementList',
                data: {
                    filter: filter,
                    _token: '{{ csrf_token() }}'
                },
                beforeSend() {
                    _this.page_loading = true;
                },
                complete() {
                    _this.page_loading = false;
                },
                success(resp) {
                    _this.announcement_list = resp.announcement_list;
                },
                error(msg) {
                    _this.showErrorMsg('出現錯誤，請重新整理並再試一次!');
                }
            });
        },
        
        init() {
            let _this = this;

            _this.show_block = 'list';
            _this.announcement_list = [];
            _this.title = '';
            _this.content = '';
            _this.author = '';
            _this.category_type = '';
            _this.start_time = '';
            _this.end_time = '';
            _this.image = '';
            _this.preview_image = '';
            _this.edit_announcement_id = '';

            _this.getAnnouncementList();
        },

        showRemoveAnnouncementPopup(announcement_id) {
            let _this = this;

            _this.remove_announcement_id = announcement_id;
            _this.popup_status = true;
        },

        hideRemoveAnnouncementPopup() {
            let _this = this;

            _this.remove_announcement_id = '';
            _this.popup_status = false;
        },

        showSuccessMsg(show_msg) {
            let _this = this;

            if (_this.success_status) {
                return;
            }

            _this.success_msg = show_msg;
            _this.success_status = true;

            setTimeout(function() {
                _this.success_status = false;
            }, 5000);
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

        getUploadPicture(event) {
            let _this = this;
            let input = event.target;
            
            if (input.files) {
                _this.image = '';
                _this.preview_image = '';
                
                let reader = new FileReader();

                reader.onload = function(event) {
                    _this.preview_image = event.target.result;
                }
                reader.readAsDataURL(input.files[0]);

                _this.image = input.files[0];
            }

            _this.$refs.file.value = '';
        },

        deleteUploadImage() {
            let _this = this;

            _this.image = '';
            _this.preview_image = '';
        },

        uploadAnnouncement() {
            let _this = this;

            let error_input = '';
            if (_this.title == '') {
                error_input += '公告標題';
            }
            if (_this.content == '') {
                error_input += error_input == '' ? '公告內文' : '、公告內文';
            }
            if (_this.author == '') {
                error_input += error_input == '' ? '作者' : '、作者';
            }
            if (_this.category_type == '') {
                error_input += error_input == '' ? '公告分類' : '、公告分類';
            }
            if (_this.start_time == '') {
                error_input += error_input == '' ? '開始時間' : '、開始時間';
            }
            if (_this.end_time == '') {
                error_input += error_input == '' ? '結束時間' : '、結束時間';
            }

            if (error_input) {
                _this.showErrorMsg('請填寫 ' + error_input + ' 再儲存!');
                return;
            }

            let start_time = new Date(_this.start_time);
            let end_time = new Date(_this.end_time);
            if (start_time >= end_time) {
                _this.showErrorMsg('開始時間不能晚於結束時間!');
                return;
            }

            let form_data = new FormData();
            form_data.append('title', _this.title);
            form_data.append('content', _this.content);
            if (_this.image) {
                form_data.append('image', _this.image);
            }
            form_data.append('author', _this.author);
            form_data.append('category_type', _this.category_type);
            form_data.append('start_time', _this.start_time);
            form_data.append('end_time', _this.end_time);
            if (_this.edit_announcement_id) {
                form_data.append('edit_announcement_id', _this.edit_announcement_id);
            }
            form_data.append('_token', '{{ csrf_token() }}');

            let post_url = './announcement/uploadAnnouncement';
            if (_this.show_block == 'edit') {
                post_url = './announcement/updateAnnouncement';
            }

            $.ajax({
                type: 'post',
                url: post_url,
                processData: false,
                contentType: false,
                data: form_data,
                beforeSend() {
                    _this.btn_loading = true;
                },
                complete() {
                    _this.btn_loading = false;
                },
                success(resp) {
                    if (resp.validate) {
                        _this.showSuccessMsg('儲存成功!');
                        _this.init();
                    } else {
                        _this.showErrorMsg('出現錯誤，請再試一次!');
                    }
                },
                error(msg) {
                    _this.showErrorMsg('出現錯誤，請重新整理並再試一次!');
                }
            });
        },

        showAnnouncementInfo(announcement_id) {
            let _this = this;

            $.ajax({
                type: 'post',
                url: './announcement/showAnnouncementInfo',
                data: {
                    announcement_id: announcement_id,
                    _token: '{{ csrf_token() }}'
                },
                beforeSend() {
                    _this.page_loading = true;
                },
                complete() {
                    _this.page_loading = false;
                },
                success(resp) {
                    if (resp.validate) {
                        _this.title = resp.announcement_info.title;
                        _this.content = resp.announcement_info.content;
                        _this.author = resp.announcement_info.author;
                        _this.category_type = resp.announcement_info.category_type;
                        _this.start_time = resp.announcement_info.start_time;
                        _this.end_time = resp.announcement_info.end_time;
                        _this.preview_image = resp.announcement_info.image;
                        _this.edit_announcement_id = resp.announcement_info.announcement_id;
                        _this.show_block = 'edit';
                    } else {
                        _this.showErrorMsg('出現錯誤，請再試一次!');
                    }
                },
                error(msg) {
                    _this.showErrorMsg('出現錯誤，請重新整理並再試一次!');
                }
            });
        },

        removeAnnouncement() {
            let _this = this;

            $.ajax({
                type: 'post',
                url: './announcement/deleteAnnouncement',
                data: {
                    announcement_id: _this.remove_announcement_id,
                    _token: '{{ csrf_token() }}'
                },
                beforeSend() {
                    _this.page_loading = true;
                },
                complete() {
                    _this.page_loading = false;
                },
                success(resp) {
                    if (resp.validate) {
                        _this.showSuccessMsg('刪除成功!');
                        _this.popup_status = false;
                        _this.init();
                    } else {
                        _this.showErrorMsg('出現錯誤，請再試一次!');
                    }
                },
                error(msg) {
                    _this.showErrorMsg('出現錯誤，請重新整理並再試一次!');
                }
            });
        }
    }
}).mount('#body-content');
</script>