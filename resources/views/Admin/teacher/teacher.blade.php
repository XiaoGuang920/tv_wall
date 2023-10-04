{!! $header !!}{!! $sidebar !!}

<link href="{{ URL::asset('css/Admin/teacher.css') }}" rel="stylesheet">

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
            <template v-cloak v-if="show_block == 'list'">教師管理</template>
            <template v-cloak v-else-if="show_block == 'add'">新增教師</template>
            <template v-cloak v-else-if="show_block == 'edit'">編輯教師</template>
            <div class="operation">
                <button v-cloak v-if="show_block == 'list'" class="add-btn" @click="show_block = 'add'">新增教師</button>
                <button v-cloak v-else class="add-btn" @click="init()">返回</button>
            </div>
        </div>
        
        <div v-cloak v-if="show_block == 'list'" class="box-info">
            <div v-cloak v-if="teacher_list.length == 0 && teacher_list !== ''" class="no-data-section">
                <div class="no-data">
                    <svg fill="#000000" width="800px" height="800px" viewBox="0 0 24 24" id="wind" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color">
                        <path id="secondary" d="M10,8H3A1,1,0,0,1,3,6h7a1,1,0,0,0,0-2,1,1,0,0,1,0-2,3,3,0,0,1,0,6ZM20,18a4,4,0,0,0-4-4H3a1,1,0,0,0,0,2H16a2,2,0,0,1,0,4,1,1,0,0,0,0,2A4,4,0,0,0,20,18Z" style="fill: rgb(44, 169, 188);"></path>
                        <path id="primary" d="M10,20H3a1,1,0,0,1,0-2h7a1,1,0,0,1,0,2ZM22,7.5A4.51,4.51,0,0,0,17.5,3a1,1,0,0,0,0,2,2.5,2.5,0,0,1,0,5H3a1,1,0,0,0,0,2H17.5A4.51,4.51,0,0,0,22,7.5Z" style="fill: rgb(0, 0, 0);"></path>
                    </svg>
                    無教師資料
                </div>
            </div>
            <div v-cloak v-else v-for="teacher in teacher_list" class="info-square">
                <div class="img-block" @click="showEditTeacher(teacher.teacher_id)">
                    <img :src="teacher.avatar">
                </div>
                <div class="name" @click="showEditTeacher(teacher.teacher_id)">${ teacher.name }</div>

                <button class="delete-btn" @click="showRemoveTeacherPopup(teacher.teacher_id)"><i class="fa-regular fa-trash-can"></i></button>
            </div>
        </div>

        <transition name="popup-mask">
            <div v-show="popup_status" class="popup-mask">
                <transition name="popup-window">
                    <div v-show="popup_status" class="popup-window">
                        <div class="title">
                            系統訊息
                            <button class="close-btn" @click="hideRemoveTeacherPopup()"><i class="fa-regular fa-circle-xmark"></i></button>
                        </div>
                        <div class="body">
                            確定要刪除此教師嗎?
                        </div>
                        <div class="footer">
                            <button @click="hideRemoveTeacherPopup()" class="cancel-btn">取消</button>
                            <button @click="removeTeacher()" class="confirm-btn">確定</button>
                        </div>
                    </div>
                </transition>
            </div>
        </transition>
        
        <div v-cloak v-if="show_block == 'add' || show_block == 'edit'" class="box-info">
            <div class="container-fluid display-flex-between">
                <div class="teacher-info">
                    <div class="row">
                        <div class="col-md-6">
                            <span class="data-tag">姓名</span>
                            <input v-model="name" class="data-input" placeholder="請輸入教師姓名">
                        </div>
                        <div class="col-md-6">
                            <span class="data-tag">Email</span>
                            <input v-model="email" class="data-input" placeholder="請輸入教師Email">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <span class="data-tag">電話</span>
                            <input v-model="telephone" class="data-input" placeholder="請輸入教師辦公室電話">
                        </div>
                        <div class="col-md-6">
                            <span class="data-tag">辦公室</span>
                            <input v-model="office" class="data-input" placeholder="請輸入教師辦公室">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            學歷 <transition name="hint"><span v-cloak v-show="education_list.length > 0" class="hint">(點擊學歷色塊即可刪除該學歷)</span></transition>
                            <div class="add-list-block">
                                <input v-cloak v-model="push_education" class="data-input" placeholder="請輸入要新增的學歷">
                                <button class="insert-btn" @click="addEducation()">新增</button> 
                            </div>
                            <div class="list-data-block">
                                <div v-cloak v-for="(education, index) in education_list" class="list-data-text" @click="removeEducation(index)">${ education }</div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                           專長 <transition name="hint"><span v-cloak v-show="expertise_list.length > 0" class="hint">(點擊專長色塊即可刪除該專長)</span></transition>
                           <div class="add-list-block">
                                <input v-cloak v-model="push_expertise" class="data-input" placeholder="請輸入要新增的專長">
                                <button class="insert-btn" @click="addExpertise()">新增</button> 
                            </div>
                        </div>
                        <div class="list-data-block">
                            <div v-cloak v-for="(expertise, index) in expertise_list" class="list-data-text" @click="removeExpertise(index)">${ expertise }</div>
                        </div>
                    </div>
                </div>
                <div class="upload-teacher-avatar">
                    <img v-if="preview_avatar" class="teacher-avatar" :src="preview_avatar">
                    <img v-else class="teacher-avatar" src="/images/Admin/avatar.jpg">
                        
                    <label class="teacher-avatar-upload">
                        <input id="upload-img" ref="file" type="file" accept="image/*" @change="getTeacherAvatar">
                        <i class="fa fa-photo"></i>上傳圖片
                    </label>
                </div>
            </div>
        </div>

        <transition name="save">
            <div v-cloak v-show="show_block != 'list'" class="save-block">
                <button v-show="btn_loading" class="normal-btn save-btn">
                    <div class="loading">Loading&#8230;</div>    
                    處理中...
                </button>
                <button v-show="!btn_loading" class="normal-btn" @click="saveTeacherInfo()">儲存</button>
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
            page: 'teacher',
            hide_menu: true,
            show_block: 'list',
            teacher_list: '',
            name: '',
            email: '',
            telephone: '',
            office: '',
            preview_avatar: null,
            avatar: null,
            push_education: '',
            education_list: [],
            push_expertise: '',
            expertise_list: [],
            success_status: false,
            success_msg: '',
            error_status: false,
            error_msg: '',
            edit_teacher_id: '',
            remove_teacher_id: '',
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

            _this.edit_teacher_id = '';
            _this.name = '';
            _this.email = '';
            _this.telephone = '';
            _this.office = '';
            _this.preview_avatar = '';
            _this.education_list = [];
            _this.expertise_list = [];

            _this.show_block = 'list';
            _this.getTeacherList();
        },

        getTeacherList() {
            let _this = this;

            $.ajax({
                type: 'post',
                url: './teacher/getTeacherList',
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
                    _this.teacher_list = resp.teacher_list;
                },
                error(msg) {
                    _this.showErrorMsg('出現錯誤，請重新整理並再試一次!');
                }
            });
        },

        showEditTeacher(edit_teacher_id) {
            let _this = this;
            
            $.ajax({
                type: 'post',
                url: './teacher/getTeacherInfo',
                data: {
                    edit_teacher_id: edit_teacher_id,
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
                        _this.edit_teacher_id = edit_teacher_id;

                        _this.name = resp.teacher_info.name;
                        _this.email = resp.teacher_info.email;
                        _this.telephone = resp.teacher_info.telephone;
                        _this.office = resp.teacher_info.office;
                        _this.preview_avatar = resp.teacher_info.avatar;
                        _this.education_list = resp.education_list;
                        _this.expertise_list = resp.expertise_list;
                    
                        _this.show_block = 'edit';
                    }
                },
                error(msg) {
                    _this.showErrorMsg('出現錯誤，請重新整理並再試一次!');
                }
            });
        },

        showRemoveTeacherPopup(teacher_id) {
            let _this = this;

            _this.remove_teacher_id = teacher_id;
            _this.popup_status = true;
        },

        hideRemoveTeacherPopup() {
            let _this = this;

            _this.remove_teacher_id = '';
            _this.popup_status = false;
        },

        removeTeacher() {
            let _this = this;

            $.ajax({
                type: 'post',
                url: './teacher/removeTeacher',
                data: {
                    teacher_id: _this.remove_teacher_id,
                    _token: '{{ csrf_token() }}'
                },
                beforeSend() {
                    _this.popup_status = false;
                    _this.page_loading = true;
                },
                complete() {
                    _this.page_loading = false;
                },
                success(resp) {
                    if (resp.validate) {
                        _this.teacher_list.forEach((teacher, index) => {
                            if (teacher.teacher_id == _this.remove_teacher_id) {
                                _this.teacher_list.splice(index, 1);
                                return;
                            }
                        });                        

                        _this.showSuccessMsg('教師刪除成功!');
                    } else {
                        _this.showErrorMsg('出現錯誤，請再試一次!');
                    }
                },
                error(msg) {
                    _this.showErrorMsg('出現錯誤，請重新整理並再試一次!');
                }
            });
        },

        addEducation() {
            let _this = this;

            if (_this.push_education != '') {
                _this.education_list.push(_this.push_education);
                _this.push_education = '';
            }
        },

        removeEducation(education_index) {
            let _this = this;

            _this.education_list.splice(education_index, 1);
        },

        addExpertise() {
            let _this = this;

            if (_this.push_expertise != '') {
                _this.expertise_list.push(_this.push_expertise);
                _this.push_expertise = '';
            }
        },

        removeExpertise(expertise_index) {
            let _this = this;

            _this.expertise_list.splice(expertise_index, 1);
        },

        getTeacherAvatar(event) {
            let _this = this;
            let input = event.target;
            
            if (input.files[0].type.includes('image/')) {
                let reader = new FileReader();

                reader.onload = function(event) {
                    _this.preview_avatar = event.target.result;
                }
                reader.readAsDataURL(input.files[0]);

                _this.avatar = input.files[0];
            }

            _this.$refs.file.value = '';
        },

        uploadTeacherInfo(teacher_id=0) {
            let _this = this;

            let form_data = new FormData();
            form_data.append('avatar', _this.avatar);
            form_data.append('name', _this.name);
            form_data.append('email', _this.email);
            form_data.append('telephone', _this.telephone);
            form_data.append('office', _this.office);
            form_data.append('education_list', _this.education_list);
            form_data.append('expertise_list', _this.expertise_list);
            form_data.append('_token', '{{ csrf_token() }}');

            let post_url = '';
            if (_this.edit_teacher_id) {
                form_data.append('edit_teacher_id', _this.edit_teacher_id);
                post_url = './teacher/editTeacherInfo';
            } else {
                post_url = './teacher/uploadTeacherInfo';
            }

            $.ajax({
                type: 'post',
                url: post_url,
                processData: false,
                contentType: false,
                data: form_data,
                beforeSend() {
                    _this.page_loading = true;
                },
                complete() {
                    _this.page_loading = false;
                },
                success(resp) {
                    if (resp.validate) {
                        let success_msg = '';
                        if (_this.edit_teacher_id) {
                            success_msg = '教師修改成功!';
                        } else {
                            success_msg = '教師新增成功!';
                        }

                        _this.showSuccessMsg(success_msg);
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

        saveTeacherInfo() {
            let _this = this;
            
            let error_input = '';
            if (_this.name == '') {
                error_input += '姓名';
            }
            if (_this.email == '') {
                error_input += error_input == '' ? 'Email' : '、Email';
            }
            if (_this.telephone == '') {
                error_input += error_input == '' ? '電話' : '、電話';
            }
            if (_this.office == '') {
                error_input += error_input == '' ? '辦公室' : '、辦公室';
            }
            if (_this.education_list.length == 0) {
                error_input += error_input == '' ? '至少一個學歷' : '、至少一個學歷';
            }
            if (_this.expertise_list.length == 0) {
                error_input += error_input == '' ? '至少一個經歷' : '、至少一個經歷';
            }

            if (error_input) {
                _this.showErrorMsg('請填寫 ' + error_input + ' 再儲存!');
            } else {
                _this.uploadTeacherInfo();
            }
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
        }
    }
}).mount('#body-content');
</script>