{!! $header !!}

<link href="css/Catalog/tennis_game.css" rel="stylesheet">

<div id="table-tennis-game-body">
    <div id="table-tennis-game-content"></div>

    <div id="mouse-hand" :style="{ top: mouse_coordinate.y - 10 + 'px', left: mouse_coordinate.x - 10 + 'px' }">
        <img v-if="mouse_status == 'point'" src="/images/Catalog/point_hand.png" alt="指手指">
        <img v-if="mouse_status == 'grip'" src="/images/Catalog/grip_hand.png" alt="握手指">
    </div>

    <div v-if="loading" id="loading-mask">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0.5 -1.40426 25 8.904">
            <defs>
                <radialGradient id="Gradient-color">
                    <stop offset="0%" stop-color="#fee140"></stop>
                    <stop offset="100%" stop-color="#fa709a"></stop>
                </radialGradient>
            </defs>
            <path class="path" d="M 1 2 Q 2 3 4 2 C 3 -5 1 7 2 7 S 4 5 5 2 Q 4 4 5 6 C 6 7 7 5 7 3 C 7 1 5 3 7 4 Q 8 5 9 2 C 7 8 11 7 11 3 C 10 9 13 6 13 4 C 13 1 11 3 13 4 C 14 5 15 3 16 2 Q 13 5 15 6 C 16 6 17 5 17 3 Q 17 2 16 2 C 17 2 17 3 18 2 C 16 7 18 7 19 5 Q 21 1 21 1 C 22 -2 19 -2 19 5 C 19 7 21 6 21 6 C 26 1 22 -4 22 3 C 22 9 24 5 25 4" stroke="url(#Gradient-color)" stroke-width="0.25" fill="none"/>
        </svg>
    </div>

    <div v-cloak v-if="tools_tab.status" id="tools" :style="{ opacity: tools_tab.mask_opacity }"></div>
    <div v-cloak v-if="tools_tab.status" class="tool-choice" :style="{ top: '7%', left: '0%', opacity: tools_tab.bubbles_opacity }" @click="goToFunction('home')">
        <div class="tool-choice-background">
            <img class="tool-img" src="/images/Catalog/home.png" alt="主頁">
            <div class="tool-text">主頁</div>
        </div>
    </div>
    <div v-cloak v-if="tools_tab.status" class="tool-choice" :style="{ top: '2%', left: '25%', opacity: tools_tab.bubbles_opacity }" @click="goToFunction('spiritGame')">
        <div class="tool-choice-background">
            <img class="tool-img" src="/images/Catalog/controller.png" alt="光速飛飛飛">
            <div class="tool-text">光速飛飛飛</div>
        </div>
    </div>
    <div v-cloak v-if="tools_tab.status" class="tool-choice" :style="{ top: '50%', left: '65%', opacity: tools_tab.bubbles_opacity }" @click="goToFunction('teacher')">
        <div class="tool-choice-background">
            <img class="tool-img" src="/images/Catalog/teacher.png" alt="教師列表">
            <div class="tool-text">教師列表</div>
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

<script src="js/Catalog/table_tennis.js" type="text/javascript"></script>
<script type="text/javascript">
const app = Vue.createApp({
    delimiters: ['${', '}'],

    data() {
        return {
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

        _this.getSettingValue();
        setTimeout(function() {
            _this.loading = false;
        }, 3000);
    },

    methods: {
        onMouseMove(ev) {
            let _this = this;

            _this.mouse_coordinate.x = ev.clientX;
            _this.mouse_coordinate.y = ev.clientY;

            window.parent.postMessage(JSON.parse(JSON.stringify(_this.mouse_coordinate)), 'http://' + _this.server_ip + '/tvWall');
        },

        executiveFunction(ev) {
            let _this = this;
            
            switch (ev.keyCode) {
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
        }
    }
}).mount('#table-tennis-game-body');
</script>