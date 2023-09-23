{!! $header !!}{!! $sidebar !!}

<link href="{{ URL::asset('css/Admin/album.css') }}" rel="stylesheet">

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
            <template v-cloak v-if="show_block == 'list'">相簿管理</template>
            <template v-cloak v-else-if="show_block == 'add'">新增相簿</template>
            <template v-cloak v-else-if="show_block == 'edit'">編輯相簿</template>
            <div class="operation">
                <button v-cloak v-if="show_block == 'list'" class="add-btn" @click="show_block = 'add'">新增相簿</button>
                <button v-cloak v-else class="add-btn" @click="init()">返回</button>
            </div>
        </div>
        
        <div v-cloak v-if="show_block == 'list'" class="box-info">
            <div v-cloak v-if="album_list.length > 0" v-for="album in album_list" class="album-item" @click="showAlbumInfo(album.album_id)">
                <svg width="800px" height="800px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <path d="M213.333333 192c-46.933333 0-85.333333 38.4-85.333333 85.333333v554.666667c0 46.933333 38.4 85.333333 85.333333 85.333333h341.333334c46.933333 0 85.333333-38.4 85.333333-85.333333V277.333333c0-46.933333-38.4-85.333333-85.333333-85.333333" fill="#673AB7" />
                    <path d="M298.666667 277.333333h42.666666v554.666667h-42.666666zM512 192V149.333333c0-25.6-17.066667-42.666667-42.666667-42.666666h-170.666666c-25.6 0-42.666667 17.066667-42.666667 42.666666v42.666667h256z" fill="#311B92" />
                    <path d="M640 277.333333H341.333333v554.666667h298.666667V277.333333z m-192 512h-64v-85.333333h64v85.333333z m0-384h-64v-85.333333h64v85.333333z m128 384h-64v-85.333333h64v85.333333z m-64-384v-85.333333h64v85.333333h-64z" fill="#D84315" />
                    <path d="M640 277.333333v42.666667h64v85.333333h-64v298.666667h64v85.333333h-64v42.666667h256V277.333333H640z m192 512h-64v-85.333333h64v85.333333z m0-384h-64v-85.333333h64v85.333333z" fill="#FF5722" />
                </svg>
                ${ album.name }
                <button class="delete-btn" @click.stop="showRemoveAlbumPopup(album.album_id)"><i class="fa-regular fa-trash-can"></i></button>
            </div>
            <div v-cloak v-if="album_list.length == 0 && album_list !== ''" class="no-data-section">
                <div class="no-data">
                    <svg fill="#000000" width="800px" height="800px" viewBox="0 0 24 24" id="wind" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color">
                        <path id="secondary" d="M10,8H3A1,1,0,0,1,3,6h7a1,1,0,0,0,0-2,1,1,0,0,1,0-2,3,3,0,0,1,0,6ZM20,18a4,4,0,0,0-4-4H3a1,1,0,0,0,0,2H16a2,2,0,0,1,0,4,1,1,0,0,0,0,2A4,4,0,0,0,20,18Z" style="fill: rgb(44, 169, 188);"></path>
                        <path id="primary" d="M10,20H3a1,1,0,0,1,0-2h7a1,1,0,0,1,0,2ZM22,7.5A4.51,4.51,0,0,0,17.5,3a1,1,0,0,0,0,2,2.5,2.5,0,0,1,0,5H3a1,1,0,0,0,0,2H17.5A4.51,4.51,0,0,0,22,7.5Z" style="fill: rgb(0, 0, 0);"></path>
                    </svg>
                    無相簿資料
                </div>
            </div>
        </div>

        <transition name="popup-mask">
            <div v-show="popup_status" class="popup-mask">
                <transition name="popup-window">
                    <div v-show="popup_status" class="popup-window">
                        <div class="title">
                            系統訊息
                            <button class="close-btn" @click="hideRemoveAlbumPopup()"><i class="fa-regular fa-circle-xmark"></i></button>
                        </div>
                        <div class="body">
                            確定要刪除此相簿嗎?
                        </div>
                        <div class="footer">
                            <button @click="hideRemoveAlbumPopup()" class="cancel-btn">取消</button>
                            <button @click="removeAlbum()" class="confirm-btn">確定</button>
                        </div>
                    </div>
                </transition>
            </div>
        </transition>
        
        <div v-cloak v-if="show_block == 'add'" class="box-info">
            <div class="container-fluid display-flex-between">
               <div class="row">
                    <div class="col-md-4">
                        <span class="data-tag">相簿名稱</span>
                        <input v-model="name" class="data-input" placeholder="請輸入相簿名稱">
                    </div>
                    <div class="col-md-4">
                        <span class="data-tag">拍攝者</span>
                        <input v-model="photographer" class="data-input" placeholder="請輸入拍攝者">
                    </div>
                    <div class="col-md-4">
                        <span class="data-tag">拍攝地點</span>
                        <input v-model="location" class="data-input" placeholder="請輸入拍攝地點">
                    </div>
               </div>
                <label class="album-upload">
                    <input id="upload-img" ref="file" type="file" accept="image/*" webkitdirectory @change="getUploadPicture">
                    <i class="fa fa-photo"></i>上傳相簿
                </label>
            </div>
            <div v-for="(picture, index) in picture_list" class="picture-item">
                <img class="picture-preview" :src="preview_picture_list[index]">
                <div class="file-name">${ picture.name }</div>
                <button class="delete-btn" @click="deletePicture(index)"><i class="fa-solid fa-trash-can"></i></button>
            </div>
        </div>

        <div v-cloak v-if="show_block == 'edit'" class="box-info">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <span class="data-tag"><i class="fa-solid fa-signature"></i>相簿名稱:<span class="info-hint-txt">${ name }</span></span>
                    </div>
                    <div class="col-md-6">
                        <span class="data-tag"><i class="fa-solid fa-clock"></i>上傳時間:<span class="info-hint-txt">${ upload_time }</span></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <span class="data-tag"><i class="fa-solid fa-camera-retro"></i>拍攝者:<span class="info-hint-txt">${ photographer }</span></span>
                    </div>
                    <div class="col-md-6">
                        <span class="data-tag"><i class="fa-solid fa-location-dot"></i>拍攝地點:<span class="info-hint-txt">${ location }</span></span>
                    </div>
                </div>
            </div>
            <div v-for="picture in picture_list" class="picture-item">
                <img class="picture-preview" :src="picture">
            </div>
        </div>

        <transition name="save">
            <div v-cloak v-show="show_block == 'add'" class="save-block">
                <button v-show="btn_loading" class="normal-btn save-btn">
                    <div class="loading">Loading&#8230;</div>    
                    處理中...
                </button>
                <button v-show="!btn_loading" class="normal-btn" @click="uploadAlbum()">儲存</button>
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
            page: 'album',
            hide_menu: true,
            show_block: 'list',
            album_list: '',
            picture_list: [],
            preview_picture_list: [],
            name: '',
            photographer: '',
            location: '',
            upload_time: '',
            success_status: false,
            success_msg: '',
            error_status: false,
            error_msg: '',
            remove_album_id: '',
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
        
        init() {
            let _this = this;

            _this.picture_list = [],
            _this.preview_picture_list = [],
            _this.name = '',
            _this.photographer = '',
            _this.location = '';
            _this.upload_time = '';

            _this.show_block = 'list';
            _this.getAlbumList();
        },

        showRemoveAlbumPopup(album_id) {
            let _this = this;

            _this.remove_album_id = album_id;
            _this.popup_status = true;
        },

        hideRemoveAlbumPopup() {
            let _this = this;

            _this.remove_album_id = '';
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

        getAlbumList() {
            let _this = this;

            $.ajax({
                type: 'post',
                url: './album/getAlbumList',
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
                    _this.album_list = resp.album_list;
                },
                error(msg) {
                    _this.showErrorMsg('出現錯誤，請重新整理並再試一次!');
                }
            });
        },

        getUploadPicture(event) {
            let _this = this;
            let input = event.target;
            
            if (input.files) {
                _this.picture_list = [];
                _this.preview_picture_list = [];

                for (let count_file = 0; count_file < input.files.length; count_file ++) {
                    let reader = new FileReader();

                    reader.onload = function(event) {
                        _this.preview_picture_list.push(event.target.result);
                    }
                    reader.readAsDataURL(input.files[count_file]);

                    _this.picture_list.push(input.files[count_file]);
                }
            }

            _this.$refs.file.value = '';
        },

        deletePicture(index) {
            let _this = this;

            _this.preview_picture_list.splice(index, 1);
            _this.picture_list.splice(index, 1);
        },

        uploadAlbum() {
            let _this = this;

            let error_input = '';
            if (_this.name == '') {
                error_input += '相簿名稱';
            }
            if (_this.photographer == '') {
                error_input += error_input == '' ? '拍攝者' : '、拍攝者';
            }
            if (_this.location == '') {
                error_input += error_input == '' ? '拍攝地點' : '、拍攝地點';
            }
            if (_this.picture_list.length == 0) {
                error_input += error_input == '' ? '一個相簿資料夾' : '、一個相簿資料夾';
            }

            if (error_input) {
                _this.showErrorMsg('請填寫 ' + error_input + ' 再儲存!');
                return;
            }

            $.ajax({
                type: 'post',
                url: './album/uploadAlbum',
                data: {
                    name: _this.name,
                    _token: '{{ csrf_token() }}'
                },
                beforeSend() {
                    _this.btn_loading = true;
                    _this.page_loading = true;
                },
                success(resp) {
                    if (resp.validate) {
                        _this.uploadPicture(resp.album_id);
                    } else {
                        _this.showErrorMsg('出現錯誤，請再試一次!');
                    }
                },
                error(msg) {
                    _this.showErrorMsg('出現錯誤，請重新整理並再試一次!');
                }
            });
        },

        uploadPicture(album_id) {
            let _this = this;

            let promise_list = [];
            _this.picture_list.forEach((picture) => {
                let promise = new Promise((resolve, reject) => {
                    let form_data = new FormData();
                    form_data.append('album_id', album_id);
                    form_data.append('picture', picture);
                    form_data.append('photographer', _this.photographer);
                    form_data.append('location', _this.location);
                    form_data.append('_token', '{{ csrf_token() }}');

                    $.ajax({
                        type: 'post',
                        url: './album/uploadPicture',
                        processData: false,
                        contentType: false,
                        data: form_data,
                        success(resp) {
                            if (resp.validate) {
                                resolve(true);
                            } else {
                                reject(false);
                            }
                        },
                        error(msg) {
                            reject(false);
                        }
                    });
                });

                promise_list.push(promise);
            });

            Promise.all(promise_list)
                .then(res => {   
                    _this.btn_loading = false;

                    _this.showSuccessMsg('相簿新增成功');
                    _this.init();
                })
        },

        showAlbumInfo(album_id) {
            let _this = this;

            $.ajax({
                type: 'post',
                url: './album/getAlbumInfo',
                data: {
                    album_id: album_id,
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
                        _this.name = resp.name;
                        _this.location = resp.location;
                        _this.photographer = resp.photographer;
                        _this.upload_time = resp.upload_time;
                        _this.picture_list = resp.picture_list;
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

        removeAlbum() {
            let _this = this;

            $.ajax({
                type: 'post',
                url: './album/deleteAlbum',
                data: {
                    album_id: _this.remove_album_id,
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