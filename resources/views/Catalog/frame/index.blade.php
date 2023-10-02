{!! $header !!}
<div id="tv-wall-home-body">
    <div id="tv-wall-home-content">
        <iframe id="tv-wall-home-iframe" ref="tv-wall-home-iframe" :src="iframe_url"></iframe>
    </div>
    <div :style="{ display: screen_saver_status }" id="screen-saver" @click="cancelScreenSaver()"></div>
</div>
{!! $footer !!}

<script type="text/javascript">
const app = Vue.createApp({
    delimiters: ['${', '}'],

    data() {
        return {
            screen_saver_status: 'none',
            last_mouse: [0, 0],
            this_mouse: [0, 0],
            idle_second: 0,
            ws: null,
            iframe_url: '/home',
            screen_saver_activate_status: 1,
            screen_saver_time: 30,
            WebSocket_IP: ''
        }
    },

    mounted() {
        let _this = this;

        //_this.iframe_url = JSON.stringify(iframe_url);
        //_this.iframe_url = JSON.parse(iframe_url);

        window.addEventListener('message', this.iframeEvent, false);
    },

    methods: {
        iframeEvent(event) {
            let _this = this
            
            if (event.data == true || event.data == false) {
                if (event.data) {
                    _this.screen_saver_status = 'unset';
                } else {
                    _this.screen_saver_status = 'none';
                }
                return;
            }

            if (typeof(event.data.x) == 'undefined' && typeof(event.data.y) == 'undefined') {
                _this.iframe_url = event.data;
            } else {
                _this.idle_second = 0;
                _this.last_mouse[0] = _this.this_mouse[0];
                _this.last_mouse[1] = _this.this_mouse[1];
                _this.this_mouse[0] = event.data.x;
                _this.this_mouse[1] = event.data.y;
            }
        },

        detectIdle(event) {
            let _this = this;

            setInterval(function() {
                if (Math.abs(_this.last_mouse[0] - _this.this_mouse[0]) <= 2 && Math.abs(_this.last_mouse[1] - _this.this_mouse[1]) <= 2) {
                    _this.idle_second += 1;   
                } else {
                    _this.idle_second = 0;
                }
                /*if (_this.screen_saver_activate_status == 1 && _this.idle_second > _this.screen_saver_time) {
                    _this.screen_saver_status = 'unset';
                }*/
                console.log(_this.idle_second);
                console.log(_this.screen_saver_status);
            }, 1000);
        },

        cancelScreenSaver() {
            let _this = this;

            _this.idle_second = 0;
            _this.screen_saver_status = 'none';
        },

        initWebsocket() {
            let _this = this;
            
            _this.ws = new WebSocket('ws://' + _this.WebSocket_IP + ':8888');
            _this.ws.onopen = _this.websocketOpen;
            _this.ws.error = _this.websocketOnError;
            _this.ws.onmessage = _this.websocketOnMessage;
            _this.ws.onclose = _this.websocketClose;
        },

        websocketOpen() {
            let _this = this;
            _this.ws.send('web');
            console.log('ws連線成功!');
        },

        websocketOnError(e) {
            console.error('ws連線失敗', e);
        },

        websocketOnMessage(e) {
            let _this = this;
            
            _this.idle_second = 0;
            screen_saver_status: 'none';
            let resp = JSON.parse(e.data);
            
            switch(resp.action){
                case '001':
                    if (_this.iframe_url != '/home') {
                        _this.iframe_url = '/home';
                    }
                    
                    setTimeout(function() {
                        _this.clickClass('best-combination-button');
                    }, 3000);
                    break;
                case '002':
                    _this.iframe_url = '/teacher';
                    setTimeout(function() {
                        _this.clickClass(resp.parameters);
                    }, 2000);
                    break;
                case '003':
                    if (_this.iframe_url != 'index.php?route=information/information/imgWall') {
                        _this.iframe_url = 'index.php?route=information/information/imgWall';
                    }

                    _this.cancelScreenSaver();

                    setTimeout(function() {
                        _this.clickAlbumClass(resp.parameters);
                    }, 2000);
                    break;
                case '004':
                    if (_this.iframe_url != 'index.php?route=information/information/announcementsList') {
                        _this.iframe_url = 'index.php?route=information/information/announcementsList';
                    }
                    setTimeout(function() {
                        _this.clickAnnouncementClass(resp.parameters);
                    }, 2000);
                    break;
                case '005':
                    if(resp.parameters == "幽靈飛飛飛") {
                        if (_this.iframe_url != 'index.php?route=information/information/spiritGame') {
                            _this.iframe_url = 'index.php?route=information/information/spiritGame';
                        }
                    }else{
                        if (_this.iframe_url != 'index.php?route=information/information/tableTennisGame') {
                            _this.iframe_url = 'index.php?route=information/information/tableTennisGame';
                        }
                    }
                    break;
            }
            
        },

        executiveFunction(ev) {
            let _this = this;
            
            switch (ev.keyCode) {
                case 74:
                    _this.screen_saver_status = 'unset';
                    console.log('aa');
                    break;

                case 75: 
                    _this.screen_saver_status = 'none';
                    console.log('aas');
                    break;
            }
        },

        websocketClose() {
            console.log('ws關閉連線!');
        },

        getScreenSaverSettingValue() {
            let _this = this;

            $.ajax({
                type: 'post',
                url: 'index.php?route=information/information/getScreenSaverSetting',
                success(data) {
                    let resp = JSON.parse(data);

                    if (resp.validate) {
                        _this.screen_saver_activate_status = resp.screen_saver_status;
                        _this.screen_saver_time = resp.screen_saver_time;
                        _this.WebSocket_IP = resp.WebSocket_IP;
                        _this.initWebsocket();
                    }
                },
                error(msg) {
                    //location.reload();
                }
            })
        },

        clickClass(class_name) {
            let _this = this;

            _this.screen_saver_status = 'none';
            $iframe = $('#tv-wall-home-iframe').contents();
            $iframe.find('.'+ class_name).click();
        },

        clickAlbumClass(value) {
            let _this = this;

            _this.screen_saver_status = 'none';
            setTimeout(function() {
                $iframe = $('#tv-wall-home-iframe').contents();
                $iframe.find('div[value = "'+ value +'"]').click();
            }, 1000);
        },

        getURLip(key) {
            let query = String(document.location).split('/');           
            
            let value = query[2];

            if (value) {
                return value;
            } else {
                return '';
            }
        },

        updateIPSetting() {
            let _this = this;

            $.ajax({
                type: 'post',
                url: 'index.php?route=information/information/updateIPSetting',
                data: {                        
                    server_IP: _this.getURLip()
                },
                success(data) {
                    let resp = JSON.parse(data);
                    
                    if (resp.validate) {
                        _this.getScreenSaverSettingValue();
                    }
                },
                error(msg) {
                    //location.reload();
                }
            });
        },

        clickAnnouncementClass(value) {
            let _this = this;
            
            _this.screen_saver_status = 'none';
            setTimeout(function() {
                $iframe = $('#tv-wall-home-iframe').contents();
                $iframe.find('div[value = "'+ value +'"]').click();
            }, 1000);
        }          
    },

    created() {
        let _this = this;

        /*setTimeout(function() {
            _this.screen_saver_status = 'none';
        }, 100);*/
        _this.updateIPSetting();
        // _this.getScreenSaverSettingValue();
        _this.detectIdle();
    }
}).mount('#tv-wall-home-body');
</script>