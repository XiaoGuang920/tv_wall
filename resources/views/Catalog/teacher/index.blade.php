{!! $header !!}

<link href="css/Catalog/teacher.css" rel="stylesheet">

<div v-cloak id="teacher-home-body" v-on:mousemove="updateCoordinates">
    <div v-for="teacher in teacher_list" class="teacher-block">
        <div class="teacher-frame" @click="showFrame(teacher.teacher_id)" :class="teacher.name">
            <div class="teacher-avatar">
                <img :src="teacher.avatar" alt="教師頭像">
                <div class="teacher-shadow"></div>
            </div>
            <div class="teacher-data-block">
                <div class="teacher-name"><i class="fa-solid fa-chalkboard-user"></i> ${ teacher.name } 老師</div>
                <div class="teacher-office">${ teacher.office }</div>
            </div>
        </div>
    </div>

    <div id="decoration">
        <input id="duck" type="checkbox">
        <label class="duck" for="duck">
            <div class="head">
                <div class="eyes"></div>
                <div class="mouth"><i></i></div>
            </div>
            <div class="arms"></div>
        </label>
    </div>

    <transition name="top-left-frame">
        <div v-show="top_left_frame.show_status" id="top-left-frame">
            <div v-if="top_left_frame.show_status" class="container-fulid full-height">
                <div class="row full-height">
                    <div class="col-md-4">
                        <img class="teacher-frame-avatar" :src="top_left_frame.teacher_data.avatar" alt="教師頭像">
                        <div class="teacher-frame-office"><i class="fa-solid fa-location-dot"></i> 辦公室: ${ top_left_frame.teacher_data.office }</div>
                        <div class="teacher-frame-telephone"><i class="fa-solid fa-phone-volume"></i> 電話: ${ top_left_frame.teacher_data.telephone }</div>
                        <div class="teacher-frame-email"><i class="fa-solid fa-envelope"></i> Email: ${ top_left_frame.teacher_data.email }</div>
                    </div>
                    <div class="col-md-8">
                        <div class="teacher-frame-name">${ top_left_frame.teacher_data.name }</div>
                        <div class="teacher-frame-data">
                            <div>
                                <div class="teacher-frame-education">學歷:<br>${ top_left_frame.education_str }</div>
                                <div class="teacher-frame-expertise">專長:<br>${ top_left_frame.expertise_str }</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </transition>

    <transition name="down-left-frame">
        <div v-show="down_left_frame.show_status" id="down-left-frame">
            <div v-if="down_left_frame.show_status" class="container-fulid full-height">
                <div class="row full-height">
                    <div class="col-md-4">
                        <img class="teacher-frame-avatar" :src="down_left_frame.teacher_data.avatar" alt="教師頭像">
                        <div class="teacher-frame-office"><i class="fa-solid fa-location-dot"></i> 辦公室: ${ down_left_frame.teacher_data.office }</div>
                        <div class="teacher-frame-telephone"><i class="fa-solid fa-phone-volume"></i> 電話: ${ down_left_frame.teacher_data.telephone }</div>
                        <div class="teacher-frame-email"><i class="fa-solid fa-envelope"></i> Email: ${ down_left_frame.teacher_data.email }</div>
                    </div>
                    <div class="col-md-8">
                        <div class="teacher-frame-name">${ down_left_frame.teacher_data.name }</div>
                        <div class="teacher-frame-data">
                            <div>
                                <div class="teacher-frame-education">學歷:<br>${ down_left_frame.education_str }</div>
                                <div class="teacher-frame-expertise">專長:<br>${ down_left_frame.expertise_str }</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </transition>

    <transition name="top-right-frame">
        <div v-show="top_right_frame.show_status" id="top-right-frame">
            <div v-if="top_right_frame.show_status" class="container-fulid full-height">
                <div class="row full-height">
                    <div class="col-md-4">
                        <img class="teacher-frame-avatar" :src="top_right_frame.teacher_data.avatar" alt="教師頭像">
                        <div class="teacher-frame-office"><i class="fa-solid fa-location-dot"></i> 辦公室: ${ top_right_frame.teacher_data.office }</div>
                        <div class="teacher-frame-telephone"><i class="fa-solid fa-phone-volume"></i> 電話: ${ top_right_frame.teacher_data.telephone }</div>
                        <div class="teacher-frame-email"><i class="fa-solid fa-envelope"></i> Email: ${ top_right_frame.teacher_data.email }</div>
                    </div>
                    <div class="col-md-8">
                        <div class="teacher-frame-name">${ top_right_frame.teacher_data.name }</div>
                        <div class="teacher-frame-data">
                            <div>
                                <div class="teacher-frame-education">學歷:<br>${ top_right_frame.education_str }</div>
                                <div class="teacher-frame-expertise">專長:<br>${ top_right_frame.expertise_str }</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </transition>

    <transition name="down-right-frame">
        <div v-show="down_right_frame.show_status" id="down-right-frame">
            <div v-if="down_right_frame.show_status" class="container-fulid full-height">
                <div class="row full-height">
                    <div class="col-md-4">
                        <img class="teacher-frame-avatar" :src="down_right_frame.teacher_data.avatar" alt="教師頭像">
                        <div class="teacher-frame-office"><i class="fa-solid fa-location-dot"></i> 辦公室: ${ down_right_frame.teacher_data.office }</div>
                        <div class="teacher-frame-telephone"><i class="fa-solid fa-phone-volume"></i> 電話: ${ down_right_frame.teacher_data.telephone }</div>
                        <div class="teacher-frame-email"><i class="fa-solid fa-envelope"></i> Email: ${ down_right_frame.teacher_data.email }</div>
                    </div>
                    <div class="col-md-8">
                        <div class="teacher-frame-name">${ down_right_frame.teacher_data.name }</div>
                        <div class="teacher-frame-data">
                            <div>
                                <div class="teacher-frame-education">學歷:<br>${ down_right_frame.education_str }</div>
                                <div class="teacher-frame-expertise">專長:<br>${ down_right_frame.expertise_str }</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </transition>

    <div id="mouse-hand" :style="{ top: mouse_coordinate.y - 10 + 'px', left: mouse_coordinate.x - 10 + 'px' }">
        <img v-if="mouse_status == 'point'" src="/images/Catalog/point_hand.png" alt="指手指">
        <img v-if="mouse_status == 'grip'" src="/images/Catalog/grip_hand.png" alt="握手指">
    </div>

    <div v-if="loading" id="loading-mask">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0.5 -1.40426 25 8.904">
            <defs>
                <radialGradient id="Gradient-color">
                    <stop offset="0%" stop-color="#7900FF"></stop>
                    <stop offset="50%" stop-color="#548CFF"></stop>
                    <stop offset="100%" stop-color="#93FFD8"></stop>
                </radialGradient>
            </defs>
            <path class="path" d="M 1 2 Q 2 3 4 2 C 3 -5 1 7 2 7 S 4 5 5 2 Q 4 4 5 6 C 6 7 7 5 7 3 C 7 1 5 3 7 4 Q 8 5 9 2 C 7 8 11 7 11 3 C 10 9 13 6 13 4 C 13 1 11 3 13 4 C 14 5 15 3 16 2 Q 13 5 15 6 C 16 6 17 5 17 3 Q 17 2 16 2 C 17 2 17 3 18 2 C 16 7 18 7 19 5 Q 21 1 21 1 C 22 -2 19 -2 19 5 C 19 7 21 6 21 6 C 26 1 22 -4 22 3 C 22 9 24 5 25 4" stroke="url(#Gradient-color)" stroke-width="0.25" fill="none"/>
        </svg>
    </div>

    <div v-cloak v-if="tools_tab.status" id="tools" :style="{ opacity: tools_tab.mask_opacity }"></div>
    <div v-cloak v-if="tools_tab.status" class="tool-choice" :style="{ top: '2%', left: '10%', opacity: tools_tab.bubbles_opacity }" @click="goToFunction('home')">
        <div class="tool-choice-background">
            <img class="tool-img" src="/images/Catalog/home.png" alt="主頁">
            <div class="tool-text">主頁</div>
        </div>
    </div>
    <div v-cloak v-if="tools_tab.status" class="tool-choice" :style="{ top: '55%', left: '50%', opacity: tools_tab.bubbles_opacity }" @click="goToFunction('spiritGame')">
        <div class="tool-choice-background">
            <img class="tool-img" src="/images/Catalog/controller.png" alt="光速飛飛飛">
            <div class="tool-text">光速飛飛飛</div>
        </div>
    </div>
    <div v-cloak v-if="tools_tab.status" class="tool-choice" :style="{ top: '50%', left: '75%', opacity: tools_tab.bubbles_opacity }" @click="goToFunction('tableTennis')">
        <div class="tool-choice-background">
            <img class="tool-img" src="/images/Catalog/table_tennis.png" alt="打桌球">
            <div class="tool-text">打桌球</div>
        </div>
    </div>
    <div v-cloak v-if="tools_tab.status" class="tool-choice" :style="{ top: '2%', left: '65%', opacity: tools_tab.bubbles_opacity }" @click="goToFunction('imgWall')">
        <div class="tool-choice-background">
            <img class="tool-img" src="/images/Catalog/photo_wall.png" alt="照片牆">
            <div class="tool-text">照片牆</div>
        </div>
    </div>
    <div v-cloak v-if="tools_tab.status" class="tool-choice" :style="{ top: '50%', left: '10%', opacity: tools_tab.bubbles_opacity }" @click="goToFunction('announcement')">
        <div class="tool-choice-background">
            <img class="tool-img" src="/images/Catalog/announcement.png" alt="公告牆">
            <div class="tool-text">公告牆</div>
        </div>
    </div>
</div>
{!! $footer !!}

<script type="text/javascript">
const app = Vue.createApp({
    delimiters: ['${', '}'],

    data() {
        return {
            teacher_list: [],
            top_left_frame: {
                show_status: false,
                teacher_data: null,
                education_str: null,
                expertise_str: null
            },
            down_left_frame: {
                show_status: false,
                teacher_data: null,
                education_list: null,
                expertise_list: null
            },
            top_right_frame: {
                show_status: false,
                teacher_data: null,
                education_list: null,
                expertise_list: null
            },
            down_right_frame: {
                show_status: false,
                teacher_data: null,
                education_list: null,
                expertise_list: null
            },
            loading: true,
            mouse_status: 'point',
            mouse_coordinate: {
                x: 0,
                y: 0
            },
            tools_tab: { 
                status: false, 
                mask_opacity: 0,
                bubbles_opacity: 0 
            },
            server_ip: ''
        }
    },

    mounted() {
        let _this = this;

        document.addEventListener('mousemove', _this.onMouseMove);
        document.addEventListener('keydown', _this.executiveFunction);
        document.addEventListener('click', _this.changeMouseHandClick);
    },

    created() {
        let _this = this;

        $.ajax({
            type: 'post',
            url: './teacher/getAllTeacher',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success(resp) {
                if (resp.validate) {
                    _this.teacher_list = resp.teacher_list;
                    _this.screen_saver_status = false;
                    
                    _this.getSettingValue();
                    
                    setTimeout(function() {
                        $('body').addClass('loaded');
                        setTimeout(function() {
                            _this.loading = false;
                        }, 2000);
                    }, 1000);
                }
            },
            error(msg) {
                window.location.reload;
            }
        });
    },

    methods: {
        onMouseMove(ev) {
            let _this = this;

            _this.mouse_coordinate.x = ev.clientX;
            _this.mouse_coordinate.y = ev.clientY;

            window.parent.postMessage(JSON.parse(JSON.stringify(_this.mouse_coordinate)), 'http://' + _this.server_ip + '/tv_wall/index.php?route=information/information/tvWall');
        },

        executiveFunction(ev) {
            let _this = this;

            switch (ev.keyCode) {
                case 81:
                    _this.hideFrame('top-left-frame');
                    break;

                case 87:
                    _this.hideFrame('top-right-frame');
                    break;

                case 65:
                    _this.hideFrame('down-left-frame');
                    break;

                case 83:
                    _this.hideFrame('down-right-frame');
                    break;

                case 32:
                    if (_this.loading) return;

                    if (_this.tools_tab.mask_opacity == '0.8') {
                        _this.tools_tab.mask_opacity = '0';
                        _this.tools_tab.bubbles_opacity = '0';

                        setTimeout(function() {
                            _this.tools_tab.status = false;
                        }, 500);
                    } else {
                        _this.tools_tab.status = true;
                        
                        setTimeout(function() {
                            _this.tools_tab.mask_opacity = '0.8';
                            _this.tools_tab.bubbles_opacity = '1';
                        }, 500);
                    }                 
                    break;
                
                case 74:
                    window.parent.postMessage(JSON.parse(JSON.stringify(true)), 'http://' + _this.server_ip + '/tvWall');
                    break;

                case 75: 
                    window.parent.postMessage(JSON.parse(JSON.stringify(false)), 'http://' + _this.server_ip + '/tvWall');
                    break;
            }
        },

        changeMouseHandClick() {
            let _this = this;

            _this.mouse_status = 'grip';
            setTimeout(function() {
                _this.mouse_status = 'point';
            }, 200);
        },

        goToFunction(url) {
            let _this = this

            window.parent.postMessage(url , 'http://' + _this.server_ip + '/tvWall');
        },

        showFrame(teacher_id) {
            let _this = this;                
            
            let key = _this.teacher_list.findIndex(teacher => teacher.teacher_id === teacher_id);
            
            $.ajax({
                type: 'post',
                url: './teacher/getTeacherInfo',
                data: {
                    _token: '{{ csrf_token() }}',
                    teacher_id: teacher_id
                },
                success(resp) {
                    if (key >= 0 && key <= 3) {
                        _this.top_left_frame.teacher_data = resp.teacher_data;

                        resp.education_list.forEach(function(education, index) {
                            if (index == 0) {
                                _this.top_left_frame.education_str = education;
                            } else {
                                _this.top_left_frame.education_str += ',' + education;
                            }
                        });

                        resp.expertise_list.forEach(function(expertise, index) {
                            if (index == 0) {
                                _this.top_left_frame.expertise_str = expertise;
                            } else {
                                _this.top_left_frame.expertise_str += ',' + expertise;
                            }
                        });

                        _this.top_left_frame.show_status = true;
                    } else if (key >= 4 && key <= 7) {
                        _this.top_right_frame.teacher_data = resp.teacher_data;

                        resp.education_list.forEach(function(education, index) {
                            if (index == 0) {
                                _this.top_right_frame.education_str = education;
                            } else {
                                _this.top_right_frame.education_str += ',' + education;
                            }
                        });

                        resp.expertise_list.forEach(function(expertise, index) {
                            if (index == 0) {
                                _this.top_right_frame.expertise_str = expertise;
                            } else {
                                _this.top_right_frame.expertise_str += ',' + expertise;
                            }
                        });

                        _this.top_right_frame.show_status = true;
                    } else if (key >= 8 && key <= 11) {
                        _this.down_left_frame.teacher_data = resp.teacher_data;

                        resp.education_list.forEach(function(education, index) {
                            if (index == 0) {
                                _this.down_left_frame.education_str = education;
                            } else {
                                _this.down_left_frame.education_str += ',' + education;
                            }
                        });

                        resp.expertise_list.forEach(function(expertise, index) {
                            if (index == 0) {
                                _this.down_left_frame.expertise_str = expertise;
                            } else {
                                _this.down_left_frame.expertise_str += ',' + expertise;
                            }
                        });

                        _this.down_left_frame.show_status = true;
                    } else {
                        _this.down_right_frame.teacher_data = resp.teacher_data;

                        resp.education_list.forEach(function(education, index) {
                            if (index == 0) {
                                _this.down_right_frame.education_str = education;
                            } else {
                                _this.down_right_frame.education_str += ',' + education;
                            }
                        });

                        resp.expertise_list.forEach(function(expertise, index) {
                            if (index == 0) {
                                _this.down_right_frame.expertise_str = expertise;
                            } else {
                                _this.down_right_frame.expertise_str += ',' + expertise;
                            }
                        });

                        _this.down_right_frame.show_status = true;
                    }
                },
                error(msg) {
                    location.reload();
                }
            });
        },

        getSettingValue() {
            let _this = this;

            $.ajax({
                type: 'post',
                url: './setting/getSetting',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success(resp) {
                    if (resp.validate) {
                        _this.server_ip = resp.server_ip;
                        console.log(`Server IP: ${_this.server_ip}`);
                    }
                },
                error(msg) {
                    location.reload();
                }
            })
        },

        hideFrame(frame_class) {
            let _this = this;

            switch (frame_class) {
                case 'top-left-frame':
                    _this.top_left_frame.text_show = false;
                    _this.top_left_frame.width = '0%';
                    setTimeout(() => {
                        _this.top_left_frame.show_status = false;
                    }, 500);
                    break;

                case 'down-left-frame':
                    _this.down_left_frame.text_show = false;
                    _this.down_left_frame.width = '0%';
                    setTimeout(() => {
                        _this.down_left_frame.show_status = false;
                    }, 500);
                    break;

                case 'top-right-frame':
                    _this.top_right_frame.text_show = false;
                    _this.top_right_frame.width = '0%';
                    setTimeout(() => {
                        _this.top_right_frame.show_status = false;
                    }, 500);
                    break;

                case 'down-right-frame':
                    _this.down_right_frame.text_show = false;
                    _this.down_right_frame.width = '0%';
                    setTimeout(() => {
                        _this.down_right_frame.show_status = false;
                    }, 500);
                    break;
            }
        }
    }
}).mount('#teacher-home-body');
</script>