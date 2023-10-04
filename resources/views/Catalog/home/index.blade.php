{!! $header !!}

<link href="css/Catalog/home.css" rel="stylesheet">

<div class="stars"></div>
<div v-cloak id="home-page-body" class="body">
    <div class="home-top-left">
        <div class="container-fulid full-height">
            <div class="row set-time full-height ">
                <div class="time-div" id="time-left">
                    <h1 class="glitched1">${ tense }</h1>
                    <div class="glitch-window">
                        <h1 class="glitched">${ tense }</h1>
                    </div>
                    <h1 class="glitched">${ hour }:${ minute }</h1>
                    <div class="glitch-window-tense">
                        <h1 class="glitched">${ hour }:${ minute }</h1>
                    </div>
                </div>
            </div>
            <transition name="best">
                <div v-show="isShow" class="best-combinnation-frame block">
                    <div class="best-combinnation-word">
                        陽光普通</br>
                        空氣品質${ aqi_status }</br>
                        降雨機率 : ${ rainy }%
                    </div>
                    <div class="best-combinnation-separate">
                    </div>
                    <div class="best-combinnation-fitting">
                        <div v-if="rainy >= 50"><img class="check-img" src="/images/Catalog/check.png" alt="打勾"> 雨傘</div>
                        <div v-if="['不健康','非常不健康','危害'].includes(aqi_status)"><img class="check-img" src="/images/Catalog/check.png" alt="打勾"> 口罩</div>
                        <div v-if="uvi > 6"><img class="check-img" src="/images/Catalog/check.png" alt="打勾"> 墨鏡</div>
                    </div>
                    <div class="best-combinnation-people">
                        <img class="people-img" src="/images/Catalog/people.png" alt="人">
                        <div v-if="uvi > 6"><img class="glasses-img" src="/images/Catalog/glasses.png" alt="墨鏡"></div>
                        <div v-if="['不健康','非常不健康','危害'].includes(aqi_status)"><img class="mask-img" src="/images/Catalog/mask.png" alt="口罩"></div>
                        <div v-if="avg_tem >= 28">
                            <img class="beach-pants-img" src="/images/Catalog/beach-pants.png" alt="海灘褲">
                            <img class="underwear-img" src="/images/Catalog/underwear.png" alt="內褲">
                            <img class="sandals-img" src="/images/Catalog/sandals.png" alt="拖鞋">
                        </div>
                        <div v-else-if="avg_tem <= 18">
                            <img class="sweater-img" src="/images/Catalog/sweater.png" alt="毛衣">
                            <img class="pants-img" src="/images/Catalog/pants.png" alt="厚褲子">
                            <img class="shoes-img" src="/images/Catalog/shoes.png" alt="皮鞋">
                        </div>
                        <div v-else>
                            <img class="pants-img" src="/images/Catalog/pants.png" alt="薄褲子">
                            <img class="t-shirt-img" src="/images/Catalog/t-shirt.png" alt="T恤">
                            <img class="leather-shoes-img" src="/images/Catalog/leather-shoes.png" alt="皮鞋">
                        </div>
                        <div v-if="rainy >= 50"><img class="umbrella-img" src="/images/Catalog/umbrella.png" alt="雨傘"></div>
                    </div>
                </div>
            </transition>
        </div>
    </div>
    <div class="home-top-right">
        <div class="container-fulid full-height">
            <div class="row weather full-width">
                <div v-cloak class="full-width">
                    <div v-if="parameter === '晴天'"><svg data-name="Layer 1" id="sun" viewBox="0 0 65 60" xmlns="http://www.w3.org/2000/svg"><defs></defs><title/><circle class="sun-circle" cx="32" cy="32" r="17"/><line class="sun-out" x1="32" x2="32" y1="5" y2="11"/><line class="sun-out" x1="32" x2="32" y1="53" y2="59"/><line class="sun-out" x1="59" x2="53" y1="32" y2="32"/><line class="sun-out" x1="11" x2="5" y1="32" y2="32"/><line class="sun-out" x1="51.09" x2="46.85" y1="12.91" y2="17.15"/><line class="sun-out" x1="17.15" x2="12.91" y1="46.85" y2="51.09"/><line class="sun-out" x1="51.09" x2="46.85" y1="51.09" y2="46.85"/><line class="sun-out" x1="17.15" x2="12.91" y1="17.15" y2="12.91"/></svg></div>
                    <div v-if="parameter === '陰天' || parameter === '陰時多雲'"><svg data-name="Layer 1" id="cloudy" viewBox="0 0 65 65" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><linearGradient gradientTransform="matrix(-1, 0, 0, 1, -378.03, 0)" gradientUnits="userSpaceOnUse" id="linear-gradient" x1="-397.28" x2="-418.37" y1="46.39" y2="19.08"><stop offset="0" stop-color="#f2f2f2"/><stop offset="1" stop-color="#cfcfcf"/></linearGradient><linearGradient gradientTransform="matrix(0, -1, -1, 0, 89.46, -453.06)" gradientUnits="userSpaceOnUse" id="linear-gradient-2" x1="-488.25" x2="-476.64" y1="37.19" y2="54.83"><stop offset="0.02" stop-color="#fff"/><stop offset="1" stop-color="#fff" stop-opacity="0"/></linearGradient></defs><title/><path class="cloudy-big-cloud" d="M23.66,9.9a17.49,17.49,0,0,1,15.47,9.32A13.75,13.75,0,1,1,46,44.84l-22.39.06a17.5,17.5,0,0,1,0-35Z"/><circle class="cloudy-circle-cloud" cx="46.05" cy="31.09" r="13.75" transform="translate(3.72 67.08) rotate(-74.39)"/><line class="cloudy-shadow1-cloud" x1="37.84" x2="48.06" y1="49.5" y2="49.5"/><line class="cloudy-shadow2-cloud" x1="15.94" x2="32.74" y1="49.5" y2="49.5"/><line class="cloudy-shadow1-cloud" x1="33.23" x2="44.55" y1="54.5" y2="54.5"/><line class="cloudy-shadow1-cloud" x1="19.96" x2="27.65" y1="54.5" y2="54.5"/></svg></div>
                    <div v-if="parameter === '雨' || parameter === '陰陣雨' || parameter === '陰短暫陣雨' || parameter === '陰時多雲短暫陣雨' || parameter === '陰短暫雨'"><svg data-name="Layer 1" id="rainy" viewBox="0 0 65 65" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><linearGradient gradientTransform="matrix(-1, 0, 0, 1, -82.03, 0)" gradientUnits="userSpaceOnUse" id="linear-gradient" x1="-101.28" x2="-122.37" y1="46.39" y2="19.08"><stop offset="0" stop-color="#f2f2f2"/><stop offset="1" stop-color="#cfcfcf"/></linearGradient><linearGradient gradientTransform="matrix(0, -1, -1, 0, 137.46, -102.8)" gradientUnits="userSpaceOnUse" id="linear-gradient-2" x1="-137.98" x2="-126.37" y1="85.19" y2="102.84"><stop offset="0.02" stop-color="#fff"/><stop offset="1" stop-color="#fff" stop-opacity="0"/></linearGradient></defs><title/><line class="rainy-rain" x1="32.5" x2="32.5" y1="50.5" y2="51.5"/><line class="rainy-rain" x1="26.5" x2="26.5" y1="48.5" y2="49.5"/><line class="rainy-rain" x1="38.5" x2="38.5" y1="48.5" y2="49.5"/><line class="rainy-rain" x1="38.5" x2="38.5" y1="54.5" y2="55.5"/><line class="rainy-rain" x1="26.5" x2="26.5" y1="54.5" y2="55.5"/><line class="rainy-rain" x1="32.5" x2="32.5" y1="56.5" y2="57.5"/><path class="rainy-cloudy-big" d="M23.66,9.9a17.49,17.49,0,0,1,15.47,9.32A13.75,13.75,0,1,1,46,44.84l-22.39.06a17.5,17.5,0,0,1,0-35Z"/><circle class="rainy-cloudy-circle" cx="46.05" cy="31.09" r="13.75" transform="translate(3.72 67.08) rotate(-74.39)"/></svg></div>
                    <div v-if="parameter === '晴時多雲' || parameter === '多雲時晴' || parameter === '多雲短暫陣雨或雷雨' || parameter === '多雲短暫陣雨'"><svg data-name="Layer 1" id="sun-and-cloudy" viewBox="0 0 65 60" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><linearGradient gradientTransform="matrix(-1, 0, 0, 1, 65.8, 0)" gradientUnits="userSpaceOnUse" id="linear-gradient" x1="46.72" x2="25.63" y1="58.39" y2="31.08"><stop offset="0" stop-color="#f2f2f2"/><stop offset="1" stop-color="#cfcfcf"/></linearGradient><linearGradient gradientTransform="matrix(0, -1, -1, 0, 109.04, 59.43)" gradientUnits="userSpaceOnUse" id="linear-gradient-2" x1="12.25" x2="23.86" y1="56.93" y2="74.58"><stop offset="0.02" stop-color="#fff"/><stop offset="1" stop-color="#fff" stop-opacity="0"/></linearGradient></defs><title/><circle class="sun-and-cloudy-sun" cx="39.8" cy="28" r="12.59"/><line class="sun-and-cloudy-sun-out" x1="39.8" x2="39.8" y1="8" y2="12.44"/><line class="sun-and-cloudy-sun-out" x1="39.8" x2="39.8" y1="43.56" y2="48"/><line class="sun-and-cloudy-sun-out" x1="19.8" x2="24.25" y1="28" y2="28"/><line class="sun-and-cloudy-sun-out" x1="55.36" x2="59.8" y1="28" y2="28"/><line class="sun-and-cloudy-sun-out" x1="25.66" x2="28.8" y1="13.86" y2="17"/><line class="sun-and-cloudy-sun-out" x1="50.8" x2="53.94" y1="39" y2="42.14"/><line class="sun-and-cloudy-sun-out" x1="25.66" x2="28.8" y1="42.14" y2="39"/><line class="sun-and-cloudy-sun-out" x1="50.8" x2="53.94" y1="17" y2="13.86"/><path class="sun-and-cloudy-cloudy-big" d="M23.5,21.9A17.49,17.49,0,0,1,39,31.22a13.75,13.75,0,1,1,6.92,25.62L23.5,56.9a17.5,17.5,0,0,1,0-35Z"/><circle class="sun-and-cloudy-cloudy-circle" cx="45.89" cy="43.09" r="13.75" transform="translate(-7.96 75.69) rotate(-74.39)"/></svg></div>
                    <div v-if="parameter === '多雲'"><svg data-name="Layer 1" id="cloudy" viewBox="0 0 65 65" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><linearGradient gradientTransform="matrix(-1, 0, 0, 1, -378.03, 0)" gradientUnits="userSpaceOnUse" id="linear-gradient" x1="-397.28" x2="-418.37" y1="46.39" y2="19.08"><stop offset="0" stop-color="#f2f2f2"/><stop offset="1" stop-color="#cfcfcf"/></linearGradient><linearGradient gradientTransform="matrix(0, -1, -1, 0, 89.46, -453.06)" gradientUnits="userSpaceOnUse" id="linear-gradient-2" x1="-488.25" x2="-476.64" y1="37.19" y2="54.83"><stop offset="0.02" stop-color="#fff"/><stop offset="1" stop-color="#fff" stop-opacity="0"/></linearGradient></defs><title/><path class="cloudy-big-cloud" d="M23.66,9.9a17.49,17.49,0,0,1,15.47,9.32A13.75,13.75,0,1,1,46,44.84l-22.39.06a17.5,17.5,0,0,1,0-35Z"/><circle class="cloudy-circle-cloud" cx="46.05" cy="31.09" r="13.75" transform="translate(3.72 67.08) rotate(-74.39)"/><line class="cloudy-shadow1-cloud" x1="37.84" x2="48.06" y1="49.5" y2="49.5"/><line class="cloudy-shadow2-cloud" x1="15.94" x2="32.74" y1="49.5" y2="49.5"/><line class="cloudy-shadow1-cloud" x1="33.23" x2="44.55" y1="54.5" y2="54.5"/><line class="cloudy-shadow1-cloud" x1="19.96" x2="27.65" y1="54.5" y2="54.5"/></svg></div>
                    <div v-if="parameter === '多雲雷陣雨' || parameter === '陰短暫陣雨或雷雨'"><svg data-name="Layer 1" id="thunderstorm" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><linearGradient gradientTransform="matrix(-1, 0, 0, 1, 361.97, 0)" gradientUnits="userSpaceOnUse" id="linear-gradient" x1="342.72" x2="321.63" y1="46.39" y2="19.08"><stop offset="0" stop-color="#f2f2f2"/><stop offset="1" stop-color="#cfcfcf"/></linearGradient><linearGradient gradientTransform="matrix(0, -1, -1, 0, 191.73, 293.2)" gradientUnits="userSpaceOnUse" id="linear-gradient-2" x1="258.02" x2="269.63" y1="139.46" y2="157.11"><stop offset="0.02" stop-color="#fff"/><stop offset="1" stop-color="#fff" stop-opacity="0"/></linearGradient></defs><title/><path class="thunderstorm-cloudy-big" d="M23.66,9.9a17.49,17.49,0,0,1,15.47,9.32A13.75,13.75,0,1,1,46,44.84l-22.39.06a17.5,17.5,0,0,1,0-35Z"/><circle class="thunderstorm-cloudy-circle" cx="46.05" cy="31.09" r="13.75" transform="translate(3.72 67.08) rotate(-74.39)"/><polygon class="thunderstorm-thunder" points="33.13 36.35 31 48.6 35.26 48.6 33.13 57.65 43.25 44.87 38.46 44.87 42.72 36.35 33.13 36.35"/><path class="thunderstorm-rainy" d="M28.85,53.28a3.72,3.72,0,1,1-7.44,0c0-3.26,3-6.28,3.72-6.28S28.85,50,28.85,53.28Z"/></svg></div>
                </div>
            </div>
            <div class="row full-width">
                <div class="temperature-div">
                    <div class="today">Today</div>
                    <div class="temperature">${ min_tem }°C ~ ${ max_tem }°C</div>
                </div>
            </div>
            <div class="best-combination-button" @click="isShow =! isShow">
                <div class="machine">
                    <div class="drawer"></div>
                    <div class="panel"></div>
                    <div class="door">
                        <div class="drum"></div>
                    </div>
                </div>
            </div>    
        </div>
    </div>
    <div class="home-bottom-left">
        <div class="bottom-left-picture">
            <img class="frame" src="/images/Catalog/frame1.png" alt="影片框">                    
            <div id="video-carousel">
                <div v-for="video in video_list" :style="{ left: video.left + '%', height: video.height + '%', zIndex: video.z_index }" class="video-block">
                    <video v-if="video.z_index == 6" :src="video.src" muted autoplay loop></video>
                    <video v-else :src="video.src" muted ></video>                            
                    <div class="video-mask" :style="{ backdropFilter: 'blur(' + video.blur + 'px)' }"></div>
                </div>
            </div>                    
        </div>
        <div class="bottom-left-shadow"></div>
    </div>
    <div class="home-bottom-right">
        <div class="container-fulid full-height">
            <div class="row full-height full-width">
                <div class="centered full-height full-width">
                    <div class="full-width bottom-right-font">
                        <h1 class="neon-effect">NUU IM</h1>
                        <h1 class="neon-effect">TV Wall</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div v-cloak v-if="loading" id="loading-mask">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0.5 -1.40426 25 8.904">
        <defs>
            <radialGradient id="Gradient-color">
                <stop offset="0%" stop-color="#00FFAB"></stop>
                <stop offset="50%" stop-color="#14C38E"></stop>
                <stop offset="100%" stop-color="#B8F1B0"></stop>
            </radialGradient>
        </defs>
        <path class="path" d="M 1 2 Q 2 3 4 2 C 3 -5 1 7 2 7 S 4 5 5 2 Q 4 4 5 6 C 6 7 7 5 7 3 C 7 1 5 3 7 4 Q 8 5 9 2 C 7 8 11 7 11 3 C 10 9 13 6 13 4 C 13 1 11 3 13 4 C 14 5 15 3 16 2 Q 13 5 15 6 C 16 6 17 5 17 3 Q 17 2 16 2 C 17 2 17 3 18 2 C 16 7 18 7 19 5 Q 21 1 21 1 C 22 -2 19 -2 19 5 C 19 7 21 6 21 6 C 26 1 22 -4 22 3 C 22 9 24 5 25 4" stroke="url(#Gradient-color)" stroke-width="0.25" fill="none"/>
    </svg>
    </div>

    <div id="mouse-hand" :style="{ top: mouse_coordinate.y - 10 + 'px', left: mouse_coordinate.x - 10 + 'px' }">
        <img v-if="mouse_status == 'point'" src="/images/Catalog/point_hand.png" alt="指手指">
        <img v-if="mouse_status == 'grip'" src="/images/Catalog/grip_hand.png" alt="握手指">
    </div>

    <div v-cloak v-if="tools_tab.status" id="tools" :style="{ opacity: tools_tab.mask_opacity }"></div>
        <div v-cloak v-if="tools_tab.status" class="tool-choice" :style="{ top: '2%', left: '10%', opacity: tools_tab.bubbles_opacity }" @click="goToFunction('imgWall')">
            <div class="tool-choice-background">
                <img class="tool-img" src="/images/Catalog/photo_wall.png" alt="照片牆">
                <div class="tool-text">照片牆</div>
            </div>
        </div>
        <div v-cloak v-if="tools_tab.status" class="tool-choice" :style="{ top: '50%', left: '65%', opacity: tools_tab.bubbles_opacity }" @click="goToFunction('teacher')">
            <div class="tool-choice-background">
                <img class="tool-img" src="/images/Catalog/teacher.png" alt="教師列表">
                <div class="tool-text">教師列表</div>
            </div>
        </div>
        <div v-cloak v-if="tools_tab.status" class="tool-choice" :style="{ top: '7%', left: '50%', opacity: tools_tab.bubbles_opacity }" @click="goToFunction('spiritGame')">
            <div class="tool-choice-background">
                <img class="tool-img" src="/images/Catalog/controller.png" alt="光速飛飛飛">
                <div class="tool-text">光速飛飛飛</div>
            </div>
        </div>
        <div v-cloak v-if="tools_tab.status" class="tool-choice" :style="{ top: '2%', left: '75%', opacity: tools_tab.bubbles_opacity }" @click="goToFunction('tableTennis')">
            <div class="tool-choice-background">
                <img class="tool-img" src="/images/Catalog/table_tennis.png" alt="打桌球">
                <div class="tool-text">打桌球</div>
            </div>
        </div>
        <div v-cloak v-if="tools_tab.status" class="tool-choice" :style="{ top: '50%', left: '10%', opacity: tools_tab.bubbles_opacity }" @click="goToFunction('announcement')">
            <div class="tool-choice-background">
                <img class="tool-img" src="/images/Catalog/announcement.png" alt="公告牆">
                <div class="tool-text">公告牆</div>
            </div>
        </div>
    </div>
</div>
{!! $footer !!}

<script type="text/javascript">
const app = Vue.createApp({
    delimiters: ['${', '}'],
    
    data() {
        return {
            best_show_status: true,
            isShow: false,
            best_word_status: true,
            best_opacity: '0',
            hour: '',
            minute: '',
            tense: '',
            loading: true,
            location: '',
            parameter: '',
            rainy: '',
            min_tem: '',
            max_tem: '',
            avg_tem: '',
            aqi_status: '普通',
            uvi: '',
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
            video_list: [
                { src: '/images/Catalog/tutorial/homepage.mp4', left: 50, height: 70, z_index: 6, blur: 0 },
                { src: '/images/Catalog/tutorial/imgWall.mp4', left: 70, height: 80, z_index: 5, blur: 5 },
                { src: '/images/Catalog/tutorial/teacherhome.mp4', left: 90, height: 70, z_index: 4, blur: 5 },
                { src: '/images/Catalog/tutorial/announcementsList.mp4', left: 110, height: 60, z_index: 3, blur: 5 },
                { src: '/images/Catalog/tutorial/tabletennis.mp4', left: 130, height: 60, z_index: 2, blur: 5 },    
                { src: '/images/Catalog/tutorial/game.mp4', left: 150, height: 60, z_index: 1, blur: 5 }
            ],
            server_ip: ''
        }
    },

    mounted() {
        let _this = this;
        document.addEventListener('mousemove', _this.onMouseMove);
        document.addEventListener('keydown', _this.showTools);
        document.addEventListener('keydown', _this.showBestCombinnation);
        document.addEventListener('click', _this.changeMouseHandClick);
        document.addEventListener('keydown', this.moveVideo);
        document.addEventListener('keydown', this.executiveFunction);
    },

    created() {
        let _this = this;

        _this.updateTime();
        _this.getLocation();
        _this.getUviAqi();
        _this.getSettingValue();
    },

    methods: {
        onMouseMove(ev) {
            let _this = this;

            _this.mouse_coordinate.x = ev.clientX;
            _this.mouse_coordinate.y = ev.clientY;

            window.parent.postMessage(JSON.parse(JSON.stringify(_this.mouse_coordinate)), 'http://' + _this.server_ip + '/tvWall');
        },

        showTools(ev) {
            let _this = this;

            if (ev.keyCode == 32) {
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
            }
        },

        executiveFunction(ev) {
            let _this = this;            

            switch (ev.keyCode) {
                case 74:
                    window.parent.postMessage(JSON.parse(JSON.stringify(true)), 'http://' + _this.server_ip + '/tvWall');
                    break;

                case 75: 
                    window.parent.postMessage(JSON.parse(JSON.stringify(false)), 'http://' + _this.server_ip + '/tvWall');
                    break;
            }
        },

        showBestCombinnation(ev) {
            let _this = this;

            if(ev.keyCode == 66 && _this.isShow == true) {                    
                _this.isShow = false;
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

        updateTime() {
            let _this = this;

            setInterval(function () {
                let now = new Date();

                _this.hour = _this.padDate(now.getHours());
                _this.minute = _this.padDate(now.getMinutes());

                if (_this.hour > 12) {
                    _this.tense = 'PM';
                    _this.hour =  _this.hour - 12;
                }else if (_this.hour == 12) {
                    _this.tense = 'PM';
                } else {
                    _this.tense = 'AM';
                }
            }, 2000);
        },

        padDate(time) {
            let time_str = '';

            if (time < 10) {
                time_str = '0' + time;
            } else {
                time_str = time.toString();
            }

            return time_str;
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

        getLocation() {
            let _this = this;

            _this.location = '苗栗縣';

            $.ajax({
                type: 'post',
                url: './home/getWeather',
                data: {
                    _token: '{{ csrf_token() }}',
                    city: _this.location
                },
                success(resp) {               
                    _this.parameter = resp.weather_detail.parameter;
                    _this.rainy = resp.weather_detail.rainy;
                    _this.min_tem = resp.weather_detail.min_tem;
                    _this.max_tem = resp.weather_detail.max_tem;
                    _this.avg_tem = (parseInt(_this.min_tem) + parseInt(_this.max_tem)) / 2;
                    
                    setTimeout(function() {
                        $('body').addClass('loaded');

                        setTimeout(function() {
                            _this.loading = false;
                        }, 2000);
                    }, 1000);
                },
                error(msg) {
                    location.reload();
                }
            });
        },

        getUviAqi() {
            let _this = this;

            _this.location = '苗栗縣';

            $.ajax({
                type: 'post',
                url: './home/getUviAqi',
                data: {
                    _token: '{{ csrf_token() }}',
                    city: _this.location
                },
                success(resp) {
                    if (typeof(resp) == Object) {
                        _this.aqi_status = resp.uvi_and_aqi.aqi_status;

                        if (_this.aqi_status == '對敏感族群不健康' || _this.aqi_status == '對所有族群不健康'){ 
                            _this.aqi_status = '不健康';
                        }

                        _this.uvi = resp.uvi_and_aqi.uv;
                    } else {
                        _this.aqi_status = '普通';
                    }
                },
                error(msg) {
                    location.reload();
                }
            });
        },

        moveVideo(event) {
            let _this = this;

            let middle = _this.video_list.findIndex(video => video.z_index === 6);
            
            if (middle == 0 && event.keyCode == '77') return;
            if (middle == 5 && event.keyCode == '78') return;

            if (event.keyCode == '78') {
                let this_middle = middle + 1;

                _this.video_list[this_middle].left = 50;
                _this.video_list[this_middle].height = 80;
                _this.video_list[this_middle].z_index = 6;
                _this.video_list[this_middle].blur = 0;

                for (let index = this_middle - 1; index >= 0; index --) {
                    _this.video_list[index].left = _this.video_list[index + 1].left - 20;
                    _this.video_list[index].height = _this.video_list[index + 1].height - 10;
                    _this.video_list[index].z_index = _this.video_list[index + 1].z_index - 1;
                    _this.video_list[index].blur = 5;
                }

                for (let index = this_middle + 1; index < _this.video_list.length; index ++) {
                    _this.video_list[index].left = _this.video_list[index - 1].left + 20;
                    _this.video_list[index].height = _this.video_list[index - 1].height - 10;
                    _this.video_list[index].z_index = _this.video_list[index - 1].z_index - 1;
                    _this.video_list[index].blur = 5;
                }
            } else if (event.keyCode == '77') {
                let this_middle = middle - 1;

                _this.video_list[this_middle].left = 50;
                _this.video_list[this_middle].height = 80;
                _this.video_list[this_middle].z_index = 6;
                _this.video_list[this_middle].blur = 0;

                for (let index = this_middle - 1; index >= 0; index --) {
                    _this.video_list[index].left = _this.video_list[index + 1].left - 20;
                    _this.video_list[index].height = _this.video_list[index + 1].height - 10;
                    _this.video_list[index].z_index = _this.video_list[index + 1].z_index - 1;
                    _this.video_list[index].blur = 5;
                }

                for (let index = this_middle + 1; index < _this.video_list.length; index ++) {
                    _this.video_list[index].left = _this.video_list[index - 1].left + 20;
                    _this.video_list[index].height = _this.video_list[index - 1].height - 10;
                    _this.video_list[index].z_index = _this.video_list[index - 1].z_index - 1;
                    _this.video_list[index].blur = 5;
                }
            }
        }
    }
}).mount('#home-page-body');
</script>