{!! $header !!}

<link href="css/Catalog/img_wall.css" rel="stylesheet">

<div v-cloak id="img-wall-page">
    <div id="d1"><div id="d2"><div id="d3"></div></div></div>
    <div class="picture-row">
        <div v-cloak class="picture-block comet" v-for="picture in pictures_data">
            <figure class="picture-border" @click="showFrame(picture.picture_id)">
                <img :src="picture.url" class="picture-img">
            </figure>
        </div> 
    </div>

    <transition name="planet-shadow">
            <div v-cloak v-if="show_album"  @mouseenter="mouseLeave()" class="planet-shadow"></div>
    </transition>
    <div :style="{ top: hover_block_position }" @mouseenter="mouseEnter()" class="hover-block">
        <div :style="{ top: show_album_hover_position, 'z-index': planet_index }" class="planet-block">
            <div :style="{ top: planet_hover_position }" id="planet"></div>
                <div v-cloak v-show="show_album" class="album-block" v-for="(album,index) in albums_data"  :style="{ rotate:  -55 + 110/7 * index + rotate_route + 'deg'  }" >
                    <svg @click="getPicturesData(album.album_id);mouseLeave();" v-if="album.show_pic == 0" version="1.1" class="album-pic" id="capa-blue" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 59 70" style="enable-background:new 0 0 59 59;" xml:space="preserve">
                        <g>
                            <circle class="capa-blue-star1" style="fill:#0096E6;" cx="7.5" cy="6" r="1"/>
                            <circle class="capa-blue-star1" style="fill:#0096E6;" cx="54.5" cy="29" r="1"/>
                            <circle class="capa-blue-star1" style="fill:#0096E6;" cx="54.5" cy="7" r="1"/>
                            <circle class="capa-blue-star1" style="fill:#0096E6;" cx="49.5" cy="16" r="1"/>
                            <circle class="capa-blue-star1" style="fill:#0096E6;" cx="8.5" cy="38" r="1"/>
                            <circle class="capa-blue-star1" style="fill:#0096E6;" cx="3.5" cy="24" r="1"/>
                            <circle class="capa-blue-star2" style="fill:#0096E6;" cx="7.5" cy="6" r="1"/>
                            <circle class="capa-blue-star2" style="fill:#0096E6;" cx="54.5" cy="29" r="1"/>
                            <circle class="capa-blue-star2" style="fill:#0096E6;" cx="54.5" cy="7" r="1"/>
                            <circle class="capa-blue-star2" style="fill:#0096E6;" cx="49.5" cy="16" r="1"/>
                            <circle class="capa-blue-star2" style="fill:#0096E6;" cx="8.5" cy="38" r="1"/>
                            <circle class="capa-blue-star2" style="fill:#0096E6;" cx="3.5" cy="24" r="1"/>
                            <rect x="16.5" y="15" style="fill:#ECF0F1;" width="26" height="37"/>
                            <path style="fill:#556080;" d="M42.5,15h-26v0c0-3.758,1.844-7.276,4.933-9.415L29.5,0l8.067,5.585
                                C40.656,7.724,42.5,11.242,42.5,15L42.5,15z"/>
                            <polygon style="fill:#556080;" points="39.5,58 19.5,58 21.5,52 37.5,52 	"/>
                            <rect x="31.5" y="23" style="fill:#CBB292;" width="11" height="18"/>
                            <polygon style="fill:#D1D4D1;" points="16.5,41.879 10.5,47.879 12.621,50 16.5,46.121 	"/>
                            <polygon style="fill:#D1D4D1;" points="42.5,41.879 48.5,47.879 46.379,50 42.5,46.121 	"/>
                            <circle style="fill:#F5EFCA;" cx="34.5" cy="26" r="1"/>
                            <circle style="fill:#F5EFCA;" cx="34.5" cy="30" r="1"/>
                            <circle style="fill:#F5EFCA;" cx="34.5" cy="34" r="1"/>
                            <circle style="fill:#F5EFCA;" cx="34.5" cy="38" r="1"/>
                            <circle style="fill:#556080;" cx="19.5" cy="49" r="1"/>
                            <circle style="fill:#556080;" cx="29.5" cy="49" r="1"/>
                            <circle style="fill:#556080;" cx="39.5" cy="49" r="1"/>
                            <g>
                            <path class="capa-blue-fire-left" style="fill:#E6E6E6;" d="M5.501,51c0.15,0,0.303-0.034,0.446-0.105l2-1c0.494-0.247,0.694-0.848,0.447-1.342
                                c-0.248-0.494-0.848-0.694-1.342-0.447l-2,1c-0.494,0.247-0.694,0.848-0.447,1.342C4.781,50.798,5.134,51,5.501,51z"/>
                            <path class="capa-blue-fire-left" style="fill:#E6E6E6;" d="M11.947,52.105c-0.495-0.248-1.094-0.047-1.342,0.447l-1,2c-0.247,0.494-0.047,1.095,0.447,1.342
                                C10.196,55.966,10.349,56,10.499,56c0.367,0,0.72-0.202,0.896-0.553l1-2C12.642,52.953,12.441,52.353,11.947,52.105z"/>
                            <circle class="capa-blue-fire-left" style="fill:#E6E6E6;" cx="9.5" cy="58" r="1"/>
                            <circle class="capa-blue-fire-left" style="fill:#E6E6E6;" cx="2.5" cy="58" r="1"/>
                            <circle class="capa-blue-fire-left" style="fill:#E6E6E6;" cx="4.5" cy="56" r="1"/>
                            <circle class="capa-blue-fire-left" style="fill:#E6E6E6;" cx="6.5" cy="54" r="1"/>
                            <circle class="capa-blue-fire-left" style="fill:#E6E6E6;" cx="8.5" cy="52" r="1"/>
                            <circle class="capa-blue-fire-left" style="fill:#E6E6E6;" cx="2.5" cy="51" r="1"/>
                            <path class="capa-blue-fire-right" style="fill:#E6E6E6;" d="M51.053,49.895l2,1C53.196,50.966,53.349,51,53.499,51c0.367,0,0.72-0.202,0.896-0.553
                                c0.247-0.494,0.047-1.095-0.447-1.342l-2-1c-0.493-0.247-1.094-0.047-1.342,0.447C50.358,49.047,50.559,49.647,51.053,49.895z"/>
                            <path class="capa-blue-fire-right" style="fill:#E6E6E6;" d="M48.947,55.895c0.494-0.247,0.694-0.848,0.447-1.342l-1-2c-0.248-0.494-0.848-0.695-1.342-0.447
                                c-0.494,0.247-0.694,0.848-0.447,1.342l1,2C47.781,55.798,48.134,56,48.501,56C48.651,56,48.804,55.966,48.947,55.895z"/>
                            <circle class="capa-blue-fire-right" style="fill:#E6E6E6;" cx="49.5" cy="58" r="1"/>
                            <circle class="capa-blue-fire-right" style="fill:#E6E6E6;" cx="56.5" cy="58" r="1"/>
                            <circle class="capa-blue-fire-right" style="fill:#E6E6E6;" cx="54.5" cy="56" r="1"/>
                            <circle class="capa-blue-fire-right" style="fill:#E6E6E6;" cx="52.5" cy="54" r="1"/>
                            <circle class="capa-blue-fire-right" style="fill:#E6E6E6;" cx="50.5" cy="52" r="1"/>
                            <circle class="capa-blue-fire-right" style="fill:#E6E6E6;" cx="56.5" cy="51" r="1"/>
                        </g>
                        <rect x="16.5" y="45" style="fill:#D1D4D1;" width="26" height="2"/>
                        <polygon style="fill:#CBB292;" points="16.5,22 16.5,24 23.5,24 23.5,28 16.5,28 16.5,30 23.5,30 23.5,34 16.5,34 16.5,36 23.5,36 
                            23.5,40 16.5,40 16.5,42 25.5,42 25.5,36 25.5,34 25.5,30 25.5,28 25.5,22 	"/>
                        </g>
                    </svg>  
                    <svg @click="getPicturesData(album.album_id);mouseLeave();" v-if="album.show_pic == 1" version="1.1" class="album-pic" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                        <g>
                            <polygon style="fill:#F3D55B;" points="167.033,222.243 81.122,308.146 0,225.627 104.136,112.814 	"/>
                            <polygon style="fill:#F3D55B;" points="399.186,407.864 286.373,512 203.854,430.878 289.757,344.966 	"/>
                        </g>
                        <g>
                            <polygon style="fill:#556080;" points="179.304,283.605 154.763,308.146 117.942,271.334 142.484,246.784 	"/>
                            <polygon style="fill:#556080;" points="265.216,369.516 240.675,394.058 203.854,357.246 228.395,332.696 	"/>
                        </g>
                        <path style="fill:#95A5A5;" d="M357.255,154.745c44.058,44.058,71.532,88.012,61.362,98.182
                            c-10.162,10.162-54.124-17.313-98.182-61.362c-44.049-44.058-71.524-88.012-61.362-98.183
                            C269.243,83.213,313.196,110.687,357.255,154.745"/>
                        <path style="fill:#E6E7E8;" d="M320.443,200.235c-2.222,0-4.443-0.85-6.135-2.543c-3.393-3.393-3.393-8.878,0-12.271l70.066-70.066
                            c3.393-3.393,8.886-3.393,12.271,0c3.393,3.384,3.393,8.878,0,12.271l-70.066,70.066
                            C324.886,199.385,322.664,200.235,320.443,200.235"/>
                        <path style="fill:#95A5A5;" d="M402.779,109.221c6.777,6.777,6.777,17.764,0,24.541c-6.777,6.777-17.764,6.777-24.541,0
                            c-6.777-6.777-6.777-17.764,0-24.541C385.015,102.443,396.002,102.443,402.779,109.221"/>
                        <g>
                            <path class="satellite" style="fill:#E6E7E8;" d="M503.322,138.847c-4.79,0-8.678-3.879-8.678-8.678c0-62.204-50.61-112.814-112.814-112.814
                                c-4.79,0-8.678-3.879-8.678-8.678S377.04,0,381.831,0C453.606,0,512,58.394,512,130.169
                                C512,134.968,508.112,138.847,503.322,138.847"/>
                            <path class="satellite" style="fill:#E6E7E8;" d="M451.254,138.847c-4.79,0-8.678-3.879-8.678-8.678c0-33.488-27.249-60.746-60.746-60.746
                                c-4.79,0-8.678-3.879-8.678-8.678s3.888-8.678,8.678-8.678c43.06,0,78.102,35.033,78.102,78.102
                                C459.932,134.968,456.044,138.847,451.254,138.847"/>
                            <path style="fill:#E6E7E8;" d="M320.443,191.557c-44.058-44.058-71.532-88.012-61.362-98.183
                                c-33.887,33.896-25.652,97.08,18.406,141.138s107.242,52.293,141.138,18.406C408.455,263.09,364.501,235.615,320.443,191.557"/>
                        </g>
                        <g>
                            <path style="fill:#556080;" d="M197.71,400.193l-11.698,11.698c-7.099,7.099-18.597,7.099-25.695,0L100.1,351.675
                                c-7.09-7.09-7.09-18.597,0-25.687l11.698-11.707L197.71,400.193z"/>
                            <path style="fill:#556080;" d="M277.487,234.513c-18.337-18.337-30.364-39.979-35.84-61.449
                                c-16.046,21.313-19.473,55.227-0.981,73.719l24.55,24.55c18.493,18.493,52.406,15.065,73.719-0.981
                                C317.466,264.878,295.823,252.85,277.487,234.513"/>
                        </g>
                        <path style="fill:#E6E7E8;" d="M265.216,271.334l-24.541-24.541c-4.313-4.313-7.385-9.485-9.433-15.117l-101.02,101.02
                            l49.091,49.091l101.02-101.02C274.701,278.719,269.529,275.647,265.216,271.334"/>
                        <g>
                            <path style="fill:#CBB292;" d="M131.428,160.299c-0.651,0.373-1.328,0.694-1.883,1.25l-97.089,97.098l12.158,12.366
                                c0.017-0.026,0.043-0.026,0.061-0.043l95.484-95.484L131.428,160.299z"/>
                            <path style="fill:#CBB292;" d="M241.031,467.326c-0.017,0.017-0.026,0.043-0.043,0.061l12.366,12.158l97.089-97.08
                                c0.555-0.564,0.876-1.241,1.25-1.892l-15.178-8.721L241.031,467.326z"/>
                        </g>
                    </svg>    
                    <svg @click="getPicturesData(album.album_id);mouseLeave();" v-if="album.show_pic == 2" version="1.1" class="album-pic" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 60 80" style="enable-background:new 0 0 60 60;" xml:space="preserve">
                        <g>
                            <path class="capa-fire" style="fill:#F18D46;" d="M30,57c-0.553,0-1-0.447-1-1v-2c0-0.553,0.447-1,1-1s1,0.447,1,1v2C31,56.553,30.553,57,30,57z"/>
                            <path style="fill:#556080;" d="M30,5c-0.553,0-1-0.447-1-1V1c0-0.553,0.447-1,1-1s1,0.447,1,1v3C31,4.553,30.553,5,30,5z"/>
                            <rect x="26" y="11" style="fill:#556080;" width="8" height="8"/>
                            <polygon style="fill:#48A0DC;" points="34,11 26,11 28,4 32,4 "/>
                            <path class="capa-fire" style="fill:#F18D46;" d="M46,60c-0.553,0-1-0.447-1-1v-3c0-0.553,0.447-1,1-1s1,0.447,1,1v3C47,59.553,46.553,60,46,60z"/>
                            <path class="capa-fire" style="fill:#F18D46;" d="M14,60c-0.553,0-1-0.447-1-1v-3c0-0.553,0.447-1,1-1s1,0.447,1,1v3C15,59.553,14.553,60,14,60z"/>
                            <circle class="capa-star1" style="fill:#F0C419;" cx="18" cy="17" r="1"/>
                            <circle class="capa-star1" style="fill:#F0C419;" cx="5" cy="12" r="1"/>
                            <circle class="capa-star1" style="fill:#F0C419;" cx="47" cy="6" r="1"/>
                            <circle class="capa-star1" style="fill:#F0C419;" cx="53" cy="19" r="1"/>
                            <circle class="capa-star1" style="fill:#F0C419;" cx="53" cy="58" r="1"/>
                            <circle class="capa-star1" style="fill:#F0C419;" cx="22" cy="56" r="1"/>
                            <circle class="capa-star1" style="fill:#F0C419;" cx="4" cy="38" r="1"/>
                            <circle class="capa-star2" style="fill:#F0C419;" cx="18" cy="17" r="1"/>
                            <circle class="capa-star2" style="fill:#F0C419;" cx="5" cy="12" r="1"/>
                            <circle class="capa-star2" style="fill:#F0C419;" cx="47" cy="6" r="1"/>
                            <circle class="capa-star2" style="fill:#F0C419;" cx="53" cy="19" r="1"/>
                            <circle class="capa-star2" style="fill:#F0C419;" cx="53" cy="58" r="1"/>
                            <circle class="capa-star2" style="fill:#F0C419;" cx="22" cy="56" r="1"/>
                            <circle class="capa-star2" style="fill:#F0C419;" cx="4" cy="38" r="1"/>
                            <rect x="23" y="47" style="fill:#556080;" width="4" height="4"/>
                            <path style="fill:#ECF0F1;" d="M43,27v23v2h6v-2V27c0-1.657-1.343-3-3-3h0C44.343,24,43,25.343,43,27z"/>
                            <rect x="44" y="52" style="fill:#38454F;" width="4" height="4"/>
                            <path style="fill:#ECF0F1;" d="M11,27v23v2h6v-2V27c0-1.657-1.343-3-3-3h0C12.343,24,11,25.343,11,27z"/>
                            <g>
                                <path style="fill:#35495E;" d="M49,29h-6c-0.553,0-1,0.447-1,1s0.447,1,1,1h6c0.553,0,1-0.447,1-1S49.553,29,49,29z"/>
                                <path style="fill:#35495E;" d="M17,29h-6c-0.553,0-1,0.447-1,1s0.447,1,1,1h6c0.553,0,1-0.447,1-1S17.553,29,17,29z"/>
                            </g>
                            <rect x="12" y="52" style="fill:#38454F;" width="4" height="4"/>
                            <rect x="33" y="47" style="fill:#556080;" width="4" height="4"/>
                            <rect x="25" y="19" style="fill:#ECF0F1;" width="10" height="8"/>
                            <g>
                                <polygon style="fill:#35495E;" points="49,49.793 59,56 49,43.083 		"/>
                                <polygon style="fill:#35495E;" points="43,35.333 37,27.583 37,42.345 43,46.069 		"/>
                            </g>
                            <g>
                                <polygon style="fill:#35495E;" points="11,43.083 1,56 11,49.793 		"/>
                                <polygon style="fill:#35495E;" points="17,35.333 17,46.069 23,42.345 23,27.583 		"/>
                            </g>
                            <path style="fill:#35495E;" d="M23,27v20h4c0-1.65,1.35-3,3-3s3,1.35,3,3h4V27H23z"/>
                            <circle style="fill:#8697CB;" cx="26" cy="30" r="1"/>
                            <circle style="fill:#BDC3C7;" cx="14" cy="39" r="1"/>
                            <circle style="fill:#BDC3C7;" cx="14" cy="42" r="1"/>
                            <circle style="fill:#BDC3C7;" cx="14" cy="45" r="1"/>
                            <circle style="fill:#BDC3C7;" cx="14" cy="48" r="1"/>
                            <circle style="fill:#BDC3C7;" cx="46" cy="39" r="1"/>
                            <circle style="fill:#BDC3C7;" cx="46" cy="42" r="1"/>
                            <circle style="fill:#BDC3C7;" cx="46" cy="45" r="1"/>
                            <circle style="fill:#BDC3C7;" cx="46" cy="48" r="1"/>
                            <circle style="fill:#8697CB;" cx="30" cy="30" r="1"/>
                            <circle style="fill:#8697CB;" cx="34" cy="30" r="1"/>
                            <rect x="23" y="32" style="fill:#8697CB;" width="14" height="2"/>
                            <path style="fill:#8697CB;" d="M33,47v4h-6v-4c0-1.65,1.35-3,3-3h0C31.65,44,33,45.35,33,47z"/>
                            <rect x="28" y="51" style="fill:#38454F;" width="4" height="3"/>
                        </g>
                    </svg>  
                    <svg @click="getPicturesData(album.album_id);mouseLeave();" v-if="album.show_pic == 3" version="1.1" class="album-pic" id="Capa-fat" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 60 60" style="enable-background:new 0 0 60 60;" xml:space="preserve">
                        <g> 
                            <path class="capa-fat-fire" style="fill:#F18D46;" d="M27,52.5c-0.553,0-1-0.448-1-1v-5c0-0.552,0.447-1,1-1s1,0.448,1,1v5C28,52.052,27.553,52.5,27,52.5
                                z"/>
                            <path class="capa-fat-fire" style="fill:#F18D46;" d="M30,55.5c-0.553,0-1-0.448-1-1v-4c0-0.552,0.447-1,1-1s1,0.448,1,1v4C31,55.052,30.553,55.5,30,55.5
                                z"/>
                            <path class="capa-fat-fire" style="fill:#F18D46;" d="M33,50.5c-0.553,0-1-0.448-1-1v-3c0-0.552,0.447-1,1-1s1,0.448,1,1v3C34,50.052,33.553,50.5,33,50.5
                                z"/>
                            <path class="capa-fat-fire" style="fill:#F18D46;" d="M30,47.5c-0.553,0-1-0.448-1-1v-3c0-0.552,0.447-1,1-1s1,0.448,1,1v3C31,47.052,30.553,47.5,30,47.5
                                z"/>
                            <polygon style="fill:#38454F;" points="35,39.5 25,39.5 27,33.5 33,33.5 	"/>
                            <path style="fill:#E57E25;" d="M26,22.5L26,22.5v-9c0-2.007,0.683-3.954,1.937-5.521l0.741-0.927c0.678-0.847,1.966-0.847,2.644,0
                                l0.741,0.927C33.317,9.546,34,11.493,34,13.5v9l0,0l3,1.8V7.4c0-3.866-3.134-6.9-7-6.9s-7,3.034-7,6.9v16.787L26,22.5z"/>
                            <g>
                                <path style="fill:#D1D4D1;" d="M45,29.1V9.167c0-0.5-0.148-0.988-0.425-1.404l-2.567-3.851c-0.479-0.719-1.536-0.719-2.015,0
                                    l-2.567,3.851C37.148,8.179,37,8.667,37,9.167V24.3L45,29.1z"/>
                                <rect x="37" y="34.5" style="fill:#D1D4D1;" width="8" height="3"/>
                            </g>
                            <g>
                                <path style="fill:#D1D4D1;" d="M23,24.188V9.167c0-0.5-0.148-0.988-0.425-1.404l-2.567-3.851c-0.479-0.719-1.536-0.719-2.015,0
                                    l-2.567,3.851C15.148,8.179,15,8.667,15,9.167v19.521L23,24.188z"/>
                                <rect x="15" y="34.5" style="fill:#D1D4D1;" width="8" height="3"/>
                            </g>
                            <path class="capa-fat-fire" style="fill:#F18D46;" d="M16,43.5c-0.553,0-1-0.448-1-1v-2c0-0.552,0.447-1,1-1s1,0.448,1,1v2C17,43.052,16.553,43.5,16,43.5
                                z"/>
                            <path class="capa-fat-fire" style="fill:#F18D46;" d="M19,44.5c-0.553,0-1-0.448-1-1v-2c0-0.552,0.447-1,1-1s1,0.448,1,1v2C20,44.052,19.553,44.5,19,44.5
                                z"/>
                            <path class="capa-fat-fire" style="fill:#F18D46;" d="M22,43.5c-0.553,0-1-0.448-1-1v-2c0-0.552,0.447-1,1-1s1,0.448,1,1v2C23,43.052,22.553,43.5,22,43.5
                                z"/>
                            <path class="capa-fat-fire" style="fill:#F18D46;" d="M38,43.5c-0.553,0-1-0.448-1-1v-2c0-0.552,0.447-1,1-1s1,0.448,1,1v2C39,43.052,38.553,43.5,38,43.5
                                z"/>
                            <path class="capa-fat-fire" style="fill:#F18D46;" d="M41,44.5c-0.553,0-1-0.448-1-1v-2c0-0.552,0.447-1,1-1s1,0.448,1,1v2C42,44.052,41.553,44.5,41,44.5
                                z"/>
                            <path class="capa-fat-fire" style="fill:#F18D46;" d="M44,43.5c-0.553,0-1-0.448-1-1v-2c0-0.552,0.447-1,1-1s1,0.448,1,1v2C45,43.052,44.553,43.5,44,43.5
                                z"/>                        
                                <line style="fill:none;stroke:#0096E6;stroke-width:2;stroke-linecap:round;stroke-miterlimit:10;" x1="29" y1="12.5" x2="31" y2="12.5"/>                        
                            <path style="fill:#ECF0F1;" d="M34,22.5v-9c0-2.007-0.683-3.954-1.937-5.521l-0.741-0.927c-0.678-0.847-1.966-0.847-2.644,0
                                l-0.741,0.927C26.683,9.546,26,11.493,26,13.5v9l-16,9v4h13h2h10h2h12v-4L34,22.5z"/>
                            <rect x="10" y="33.5" style="fill:#546A79;" width="39" height="2"/>
                            <path style="fill:#546A79;" d="M28.213,13.198l-0.87-0.87l2.036-2.036c0.438-0.438,1.147-0.438,1.585,0L33,12.328l-0.87,0.87
                                C31.048,14.28,29.295,14.28,28.213,13.198z"/>
                            <rect x="15" y="11.5" style="fill:#ECF0F1;" width="8" height="2"/>
                            <rect x="15" y="19.5" style="fill:#ECF0F1;" width="8" height="2"/>
                            <rect x="37" y="11.5" style="fill:#ECF0F1;" width="8" height="2"/>
                            <rect x="37" y="19.5" style="fill:#ECF0F1;" width="8" height="2"/>
                        </g>
                    </svg>
                <div class="album-row-name" :value="album.name">${ album.name }</div>        
            </div>

            <div v-cloak v-show="show_album" class="album-block" v-for="(album,index) in albums_data_next" :style="{ rotate:  -125 - 110/7 * index + rotate_route + 'deg'  }" >
                <svg @click="getPicturesData(album.album_id);mouseLeave();" v-if="album.show_pic == 0" version="1.1" class="album-pic" id="capa-blue" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 59 70" style="enable-background:new 0 0 59 59;" xml:space="preserve">
                    <g>
                        <circle class="capa-blue-star1" style="fill:#0096E6;" cx="7.5" cy="6" r="1"/>
                        <circle class="capa-blue-star1" style="fill:#0096E6;" cx="54.5" cy="29" r="1"/>
                        <circle class="capa-blue-star1" style="fill:#0096E6;" cx="54.5" cy="7" r="1"/>
                        <circle class="capa-blue-star1" style="fill:#0096E6;" cx="49.5" cy="16" r="1"/>
                        <circle class="capa-blue-star1" style="fill:#0096E6;" cx="8.5" cy="38" r="1"/>
                        <circle class="capa-blue-star1" style="fill:#0096E6;" cx="3.5" cy="24" r="1"/>
                        <circle class="capa-blue-star2" style="fill:#0096E6;" cx="7.5" cy="6" r="1"/>
                        <circle class="capa-blue-star2" style="fill:#0096E6;" cx="54.5" cy="29" r="1"/>
                        <circle class="capa-blue-star2" style="fill:#0096E6;" cx="54.5" cy="7" r="1"/>
                        <circle class="capa-blue-star2" style="fill:#0096E6;" cx="49.5" cy="16" r="1"/>
                        <circle class="capa-blue-star2" style="fill:#0096E6;" cx="8.5" cy="38" r="1"/>
                        <circle class="capa-blue-star2" style="fill:#0096E6;" cx="3.5" cy="24" r="1"/>
                        <rect x="16.5" y="15" style="fill:#ECF0F1;" width="26" height="37"/>
                        <path style="fill:#556080;" d="M42.5,15h-26v0c0-3.758,1.844-7.276,4.933-9.415L29.5,0l8.067,5.585
                            C40.656,7.724,42.5,11.242,42.5,15L42.5,15z"/>
                        <polygon style="fill:#556080;" points="39.5,58 19.5,58 21.5,52 37.5,52 	"/>
                        <rect x="31.5" y="23" style="fill:#CBB292;" width="11" height="18"/>
                        <polygon style="fill:#D1D4D1;" points="16.5,41.879 10.5,47.879 12.621,50 16.5,46.121 	"/>
                        <polygon style="fill:#D1D4D1;" points="42.5,41.879 48.5,47.879 46.379,50 42.5,46.121 	"/>
                        <circle style="fill:#F5EFCA;" cx="34.5" cy="26" r="1"/>
                        <circle style="fill:#F5EFCA;" cx="34.5" cy="30" r="1"/>
                        <circle style="fill:#F5EFCA;" cx="34.5" cy="34" r="1"/>
                        <circle style="fill:#F5EFCA;" cx="34.5" cy="38" r="1"/>
                        <circle style="fill:#556080;" cx="19.5" cy="49" r="1"/>
                        <circle style="fill:#556080;" cx="29.5" cy="49" r="1"/>
                        <circle style="fill:#556080;" cx="39.5" cy="49" r="1"/>
                        <g>
                        <path class="capa-blue-fire-left" style="fill:#E6E6E6;" d="M5.501,51c0.15,0,0.303-0.034,0.446-0.105l2-1c0.494-0.247,0.694-0.848,0.447-1.342
                            c-0.248-0.494-0.848-0.694-1.342-0.447l-2,1c-0.494,0.247-0.694,0.848-0.447,1.342C4.781,50.798,5.134,51,5.501,51z"/>
                        <path class="capa-blue-fire-left" style="fill:#E6E6E6;" d="M11.947,52.105c-0.495-0.248-1.094-0.047-1.342,0.447l-1,2c-0.247,0.494-0.047,1.095,0.447,1.342
                            C10.196,55.966,10.349,56,10.499,56c0.367,0,0.72-0.202,0.896-0.553l1-2C12.642,52.953,12.441,52.353,11.947,52.105z"/>
                        <circle class="capa-blue-fire-left" style="fill:#E6E6E6;" cx="9.5" cy="58" r="1"/>
                        <circle class="capa-blue-fire-left" style="fill:#E6E6E6;" cx="2.5" cy="58" r="1"/>
                        <circle class="capa-blue-fire-left" style="fill:#E6E6E6;" cx="4.5" cy="56" r="1"/>
                        <circle class="capa-blue-fire-left" style="fill:#E6E6E6;" cx="6.5" cy="54" r="1"/>
                        <circle class="capa-blue-fire-left" style="fill:#E6E6E6;" cx="8.5" cy="52" r="1"/>
                        <circle class="capa-blue-fire-left" style="fill:#E6E6E6;" cx="2.5" cy="51" r="1"/>
                        <path class="capa-blue-fire-right" style="fill:#E6E6E6;" d="M51.053,49.895l2,1C53.196,50.966,53.349,51,53.499,51c0.367,0,0.72-0.202,0.896-0.553
                            c0.247-0.494,0.047-1.095-0.447-1.342l-2-1c-0.493-0.247-1.094-0.047-1.342,0.447C50.358,49.047,50.559,49.647,51.053,49.895z"/>
                        <path class="capa-blue-fire-right" style="fill:#E6E6E6;" d="M48.947,55.895c0.494-0.247,0.694-0.848,0.447-1.342l-1-2c-0.248-0.494-0.848-0.695-1.342-0.447
                            c-0.494,0.247-0.694,0.848-0.447,1.342l1,2C47.781,55.798,48.134,56,48.501,56C48.651,56,48.804,55.966,48.947,55.895z"/>
                        <circle class="capa-blue-fire-right" style="fill:#E6E6E6;" cx="49.5" cy="58" r="1"/>
                        <circle class="capa-blue-fire-right" style="fill:#E6E6E6;" cx="56.5" cy="58" r="1"/>
                        <circle class="capa-blue-fire-right" style="fill:#E6E6E6;" cx="54.5" cy="56" r="1"/>
                        <circle class="capa-blue-fire-right" style="fill:#E6E6E6;" cx="52.5" cy="54" r="1"/>
                        <circle class="capa-blue-fire-right" style="fill:#E6E6E6;" cx="50.5" cy="52" r="1"/>
                        <circle class="capa-blue-fire-right" style="fill:#E6E6E6;" cx="56.5" cy="51" r="1"/>
                    </g>
                    <rect x="16.5" y="45" style="fill:#D1D4D1;" width="26" height="2"/>
                    <polygon style="fill:#CBB292;" points="16.5,22 16.5,24 23.5,24 23.5,28 16.5,28 16.5,30 23.5,30 23.5,34 16.5,34 16.5,36 23.5,36 
                        23.5,40 16.5,40 16.5,42 25.5,42 25.5,36 25.5,34 25.5,30 25.5,28 25.5,22 	"/>
                    </g>
                </svg>  
                <svg @click="getPicturesData(album.album_id);mouseLeave();" v-if="album.show_pic == 1" version="1.1" class="album-pic" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                    <g>
                        <polygon style="fill:#F3D55B;" points="167.033,222.243 81.122,308.146 0,225.627 104.136,112.814 	"/>
                        <polygon style="fill:#F3D55B;" points="399.186,407.864 286.373,512 203.854,430.878 289.757,344.966 	"/>
                    </g>
                    <g>
                        <polygon style="fill:#556080;" points="179.304,283.605 154.763,308.146 117.942,271.334 142.484,246.784 	"/>
                        <polygon style="fill:#556080;" points="265.216,369.516 240.675,394.058 203.854,357.246 228.395,332.696 	"/>
                    </g>
                    <path style="fill:#95A5A5;" d="M357.255,154.745c44.058,44.058,71.532,88.012,61.362,98.182
                        c-10.162,10.162-54.124-17.313-98.182-61.362c-44.049-44.058-71.524-88.012-61.362-98.183
                        C269.243,83.213,313.196,110.687,357.255,154.745"/>
                    <path style="fill:#E6E7E8;" d="M320.443,200.235c-2.222,0-4.443-0.85-6.135-2.543c-3.393-3.393-3.393-8.878,0-12.271l70.066-70.066
                        c3.393-3.393,8.886-3.393,12.271,0c3.393,3.384,3.393,8.878,0,12.271l-70.066,70.066
                        C324.886,199.385,322.664,200.235,320.443,200.235"/>
                    <path style="fill:#95A5A5;" d="M402.779,109.221c6.777,6.777,6.777,17.764,0,24.541c-6.777,6.777-17.764,6.777-24.541,0
                        c-6.777-6.777-6.777-17.764,0-24.541C385.015,102.443,396.002,102.443,402.779,109.221"/>
                    <g>
                        <path class="satellite" style="fill:#E6E7E8;" d="M503.322,138.847c-4.79,0-8.678-3.879-8.678-8.678c0-62.204-50.61-112.814-112.814-112.814
                            c-4.79,0-8.678-3.879-8.678-8.678S377.04,0,381.831,0C453.606,0,512,58.394,512,130.169
                            C512,134.968,508.112,138.847,503.322,138.847"/>
                        <path class="satellite" style="fill:#E6E7E8;" d="M451.254,138.847c-4.79,0-8.678-3.879-8.678-8.678c0-33.488-27.249-60.746-60.746-60.746
                            c-4.79,0-8.678-3.879-8.678-8.678s3.888-8.678,8.678-8.678c43.06,0,78.102,35.033,78.102,78.102
                            C459.932,134.968,456.044,138.847,451.254,138.847"/>
                        <path style="fill:#E6E7E8;" d="M320.443,191.557c-44.058-44.058-71.532-88.012-61.362-98.183
                            c-33.887,33.896-25.652,97.08,18.406,141.138s107.242,52.293,141.138,18.406C408.455,263.09,364.501,235.615,320.443,191.557"/>
                    </g>
                    <g>
                        <path style="fill:#556080;" d="M197.71,400.193l-11.698,11.698c-7.099,7.099-18.597,7.099-25.695,0L100.1,351.675
                            c-7.09-7.09-7.09-18.597,0-25.687l11.698-11.707L197.71,400.193z"/>
                        <path style="fill:#556080;" d="M277.487,234.513c-18.337-18.337-30.364-39.979-35.84-61.449
                            c-16.046,21.313-19.473,55.227-0.981,73.719l24.55,24.55c18.493,18.493,52.406,15.065,73.719-0.981
                            C317.466,264.878,295.823,252.85,277.487,234.513"/>
                    </g>
                    <path style="fill:#E6E7E8;" d="M265.216,271.334l-24.541-24.541c-4.313-4.313-7.385-9.485-9.433-15.117l-101.02,101.02
                        l49.091,49.091l101.02-101.02C274.701,278.719,269.529,275.647,265.216,271.334"/>
                    <g>
                        <path style="fill:#CBB292;" d="M131.428,160.299c-0.651,0.373-1.328,0.694-1.883,1.25l-97.089,97.098l12.158,12.366
                            c0.017-0.026,0.043-0.026,0.061-0.043l95.484-95.484L131.428,160.299z"/>
                        <path style="fill:#CBB292;" d="M241.031,467.326c-0.017,0.017-0.026,0.043-0.043,0.061l12.366,12.158l97.089-97.08
                            c0.555-0.564,0.876-1.241,1.25-1.892l-15.178-8.721L241.031,467.326z"/>
                    </g>
                </svg>    
                <svg @click="getPicturesData(album.album_id);mouseLeave();" v-if="album.show_pic == 2" version="1.1" class="album-pic" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 60 80" style="enable-background:new 0 0 60 60;" xml:space="preserve">
                    <g>
                        <path class="capa-fire" style="fill:#F18D46;" d="M30,57c-0.553,0-1-0.447-1-1v-2c0-0.553,0.447-1,1-1s1,0.447,1,1v2C31,56.553,30.553,57,30,57z"/>
                        <path style="fill:#556080;" d="M30,5c-0.553,0-1-0.447-1-1V1c0-0.553,0.447-1,1-1s1,0.447,1,1v3C31,4.553,30.553,5,30,5z"/>
                        <rect x="26" y="11" style="fill:#556080;" width="8" height="8"/>
                        <polygon style="fill:#48A0DC;" points="34,11 26,11 28,4 32,4 "/>
                        <path class="capa-fire" style="fill:#F18D46;" d="M46,60c-0.553,0-1-0.447-1-1v-3c0-0.553,0.447-1,1-1s1,0.447,1,1v3C47,59.553,46.553,60,46,60z"/>
                        <path class="capa-fire" style="fill:#F18D46;" d="M14,60c-0.553,0-1-0.447-1-1v-3c0-0.553,0.447-1,1-1s1,0.447,1,1v3C15,59.553,14.553,60,14,60z"/>
                        <circle class="capa-star1" style="fill:#F0C419;" cx="18" cy="17" r="1"/>
                        <circle class="capa-star1" style="fill:#F0C419;" cx="5" cy="12" r="1"/>
                        <circle class="capa-star1" style="fill:#F0C419;" cx="47" cy="6" r="1"/>
                        <circle class="capa-star1" style="fill:#F0C419;" cx="53" cy="19" r="1"/>
                        <circle class="capa-star1" style="fill:#F0C419;" cx="53" cy="58" r="1"/>
                        <circle class="capa-star1" style="fill:#F0C419;" cx="22" cy="56" r="1"/>
                        <circle class="capa-star1" style="fill:#F0C419;" cx="4" cy="38" r="1"/>
                        <circle class="capa-star2" style="fill:#F0C419;" cx="18" cy="17" r="1"/>
                        <circle class="capa-star2" style="fill:#F0C419;" cx="5" cy="12" r="1"/>
                        <circle class="capa-star2" style="fill:#F0C419;" cx="47" cy="6" r="1"/>
                        <circle class="capa-star2" style="fill:#F0C419;" cx="53" cy="19" r="1"/>
                        <circle class="capa-star2" style="fill:#F0C419;" cx="53" cy="58" r="1"/>
                        <circle class="capa-star2" style="fill:#F0C419;" cx="22" cy="56" r="1"/>
                        <circle class="capa-star2" style="fill:#F0C419;" cx="4" cy="38" r="1"/>
                        <rect x="23" y="47" style="fill:#556080;" width="4" height="4"/>
                        <path style="fill:#ECF0F1;" d="M43,27v23v2h6v-2V27c0-1.657-1.343-3-3-3h0C44.343,24,43,25.343,43,27z"/>
                        <rect x="44" y="52" style="fill:#38454F;" width="4" height="4"/>
                        <path style="fill:#ECF0F1;" d="M11,27v23v2h6v-2V27c0-1.657-1.343-3-3-3h0C12.343,24,11,25.343,11,27z"/>
                        <g>
                            <path style="fill:#35495E;" d="M49,29h-6c-0.553,0-1,0.447-1,1s0.447,1,1,1h6c0.553,0,1-0.447,1-1S49.553,29,49,29z"/>
                            <path style="fill:#35495E;" d="M17,29h-6c-0.553,0-1,0.447-1,1s0.447,1,1,1h6c0.553,0,1-0.447,1-1S17.553,29,17,29z"/>
                        </g>
                        <rect x="12" y="52" style="fill:#38454F;" width="4" height="4"/>
                        <rect x="33" y="47" style="fill:#556080;" width="4" height="4"/>
                        <rect x="25" y="19" style="fill:#ECF0F1;" width="10" height="8"/>
                        <g>
                            <polygon style="fill:#35495E;" points="49,49.793 59,56 49,43.083 		"/>
                            <polygon style="fill:#35495E;" points="43,35.333 37,27.583 37,42.345 43,46.069 		"/>
                        </g>
                        <g>
                            <polygon style="fill:#35495E;" points="11,43.083 1,56 11,49.793 		"/>
                            <polygon style="fill:#35495E;" points="17,35.333 17,46.069 23,42.345 23,27.583 		"/>
                        </g>
                        <path style="fill:#35495E;" d="M23,27v20h4c0-1.65,1.35-3,3-3s3,1.35,3,3h4V27H23z"/>
                        <circle style="fill:#8697CB;" cx="26" cy="30" r="1"/>
                        <circle style="fill:#BDC3C7;" cx="14" cy="39" r="1"/>
                        <circle style="fill:#BDC3C7;" cx="14" cy="42" r="1"/>
                        <circle style="fill:#BDC3C7;" cx="14" cy="45" r="1"/>
                        <circle style="fill:#BDC3C7;" cx="14" cy="48" r="1"/>
                        <circle style="fill:#BDC3C7;" cx="46" cy="39" r="1"/>
                        <circle style="fill:#BDC3C7;" cx="46" cy="42" r="1"/>
                        <circle style="fill:#BDC3C7;" cx="46" cy="45" r="1"/>
                        <circle style="fill:#BDC3C7;" cx="46" cy="48" r="1"/>
                        <circle style="fill:#8697CB;" cx="30" cy="30" r="1"/>
                        <circle style="fill:#8697CB;" cx="34" cy="30" r="1"/>
                        <rect x="23" y="32" style="fill:#8697CB;" width="14" height="2"/>
                        <path style="fill:#8697CB;" d="M33,47v4h-6v-4c0-1.65,1.35-3,3-3h0C31.65,44,33,45.35,33,47z"/>
                        <rect x="28" y="51" style="fill:#38454F;" width="4" height="3"/>
                    </g>
                </svg>  
                <svg @click="getPicturesData(album.album_id);mouseLeave();" v-if="album.show_pic == 3" version="1.1" class="album-pic" id="Capa-fat" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 60 60" style="enable-background:new 0 0 60 60;" xml:space="preserve">
                    <g> 
                        <path class="capa-fat-fire" style="fill:#F18D46;" d="M27,52.5c-0.553,0-1-0.448-1-1v-5c0-0.552,0.447-1,1-1s1,0.448,1,1v5C28,52.052,27.553,52.5,27,52.5
                            z"/>
                        <path class="capa-fat-fire" style="fill:#F18D46;" d="M30,55.5c-0.553,0-1-0.448-1-1v-4c0-0.552,0.447-1,1-1s1,0.448,1,1v4C31,55.052,30.553,55.5,30,55.5
                            z"/>
                        <path class="capa-fat-fire" style="fill:#F18D46;" d="M33,50.5c-0.553,0-1-0.448-1-1v-3c0-0.552,0.447-1,1-1s1,0.448,1,1v3C34,50.052,33.553,50.5,33,50.5
                            z"/>
                        <path class="capa-fat-fire" style="fill:#F18D46;" d="M30,47.5c-0.553,0-1-0.448-1-1v-3c0-0.552,0.447-1,1-1s1,0.448,1,1v3C31,47.052,30.553,47.5,30,47.5
                            z"/>
                        <polygon style="fill:#38454F;" points="35,39.5 25,39.5 27,33.5 33,33.5 	"/>
                        <path style="fill:#E57E25;" d="M26,22.5L26,22.5v-9c0-2.007,0.683-3.954,1.937-5.521l0.741-0.927c0.678-0.847,1.966-0.847,2.644,0
                            l0.741,0.927C33.317,9.546,34,11.493,34,13.5v9l0,0l3,1.8V7.4c0-3.866-3.134-6.9-7-6.9s-7,3.034-7,6.9v16.787L26,22.5z"/>
                        <g>
                            <path style="fill:#D1D4D1;" d="M45,29.1V9.167c0-0.5-0.148-0.988-0.425-1.404l-2.567-3.851c-0.479-0.719-1.536-0.719-2.015,0
                                l-2.567,3.851C37.148,8.179,37,8.667,37,9.167V24.3L45,29.1z"/>
                            <rect x="37" y="34.5" style="fill:#D1D4D1;" width="8" height="3"/>
                        </g>
                        <g>
                            <path style="fill:#D1D4D1;" d="M23,24.188V9.167c0-0.5-0.148-0.988-0.425-1.404l-2.567-3.851c-0.479-0.719-1.536-0.719-2.015,0
                                l-2.567,3.851C15.148,8.179,15,8.667,15,9.167v19.521L23,24.188z"/>
                            <rect x="15" y="34.5" style="fill:#D1D4D1;" width="8" height="3"/>
                        </g>
                        <path class="capa-fat-fire" style="fill:#F18D46;" d="M16,43.5c-0.553,0-1-0.448-1-1v-2c0-0.552,0.447-1,1-1s1,0.448,1,1v2C17,43.052,16.553,43.5,16,43.5
                            z"/>
                        <path class="capa-fat-fire" style="fill:#F18D46;" d="M19,44.5c-0.553,0-1-0.448-1-1v-2c0-0.552,0.447-1,1-1s1,0.448,1,1v2C20,44.052,19.553,44.5,19,44.5
                            z"/>
                        <path class="capa-fat-fire" style="fill:#F18D46;" d="M22,43.5c-0.553,0-1-0.448-1-1v-2c0-0.552,0.447-1,1-1s1,0.448,1,1v2C23,43.052,22.553,43.5,22,43.5
                            z"/>
                        <path class="capa-fat-fire" style="fill:#F18D46;" d="M38,43.5c-0.553,0-1-0.448-1-1v-2c0-0.552,0.447-1,1-1s1,0.448,1,1v2C39,43.052,38.553,43.5,38,43.5
                            z"/>
                        <path class="capa-fat-fire" style="fill:#F18D46;" d="M41,44.5c-0.553,0-1-0.448-1-1v-2c0-0.552,0.447-1,1-1s1,0.448,1,1v2C42,44.052,41.553,44.5,41,44.5
                            z"/>
                        <path class="capa-fat-fire" style="fill:#F18D46;" d="M44,43.5c-0.553,0-1-0.448-1-1v-2c0-0.552,0.447-1,1-1s1,0.448,1,1v2C45,43.052,44.553,43.5,44,43.5
                            z"/>                        
                            <line style="fill:none;stroke:#0096E6;stroke-width:2;stroke-linecap:round;stroke-miterlimit:10;" x1="29" y1="12.5" x2="31" y2="12.5"/>                        
                        <path style="fill:#ECF0F1;" d="M34,22.5v-9c0-2.007-0.683-3.954-1.937-5.521l-0.741-0.927c-0.678-0.847-1.966-0.847-2.644,0
                            l-0.741,0.927C26.683,9.546,26,11.493,26,13.5v9l-16,9v4h13h2h10h2h12v-4L34,22.5z"/>
                        <rect x="10" y="33.5" style="fill:#546A79;" width="39" height="2"/>
                        <path style="fill:#546A79;" d="M28.213,13.198l-0.87-0.87l2.036-2.036c0.438-0.438,1.147-0.438,1.585,0L33,12.328l-0.87,0.87
                            C31.048,14.28,29.295,14.28,28.213,13.198z"/>
                        <rect x="15" y="11.5" style="fill:#ECF0F1;" width="8" height="2"/>
                        <rect x="15" y="19.5" style="fill:#ECF0F1;" width="8" height="2"/>
                        <rect x="37" y="11.5" style="fill:#ECF0F1;" width="8" height="2"/>
                        <rect x="37" y="19.5" style="fill:#ECF0F1;" width="8" height="2"/>
                    </g>
                </svg>
                <div class="album-row-name" :value="album.name">${ album.name }</div>                   
            </div>
            
        </div>
    </div>
    <transition name="frame-shadow">
        <div v-cloak v-show="up_left_frame.show_status" id="up-left-shadow"></div>
    </transition>
    <transition name="up-left-frame">
        <div v-cloak v-if="up_left_frame.show_status" id="up-left-frame">
            <div class="container-fulid full-height">
                <div class="row full-height">
                    <div class="col-md-12"> 
                        <div v-if="up_left_frame_img.show" class="picture-frame-img-border">
                        <div class="futurepanel">
                            <div class="futurepanel-header">
                                <h1 class="futurepanel-title" v-if="up_left_frame.text_show">${ up_left_frame.picture_data.upload_time }</h1>
                            </div>
                            <div class="futurepanel-body"> 
                                <img class="picture-frame-img"  :src="up_left_frame.picture_data.url" >       
                            </div>
                            <div class="futurepanel-footer">
                                <div class="picture-frame-location" v-if="up_left_frame.text_show"><i class="fa-solid fa-location-dot"></i>&ensp;${ up_left_frame.picture_data.location }
                                    <div class="picture-frame-photographer" v-if="up_left_frame.text_show"><i class="fa-solid fa-camera-retro"></i>&ensp;${ up_left_frame.picture_data.photographer }</div>
                                </div>
                            </div>
                        </div>                          
                        </div> 
                    </div>   
                </div>
            </div>
        </div>
    </transition>
    <transition name="frame-shadow">
        <div v-cloak v-if="bottom_left_frame.show_status" key="bottom-left-frame-shadow" id="bottom-left-shadow"></div>
    </transition>
    <transition name="bottom-left-frame">
        <div v-cloak v-if="bottom_left_frame.show_status" key="bottom-left-frame" id="bottom-left-frame">
            <div class="container-fulid full-height">
                <div class="row full-height">
                    <div class="col-md-12">   
                        <div v-if="bottom_left_frame_img.show" class="picture-frame-img-border">   
                            <div class="futurepanel">
                                <div class="futurepanel-header">
                                    <h1 class="futurepanel-title" v-if="bottom_left_frame.text_show">${ bottom_left_frame.picture_data.upload_time }</h1>
                                </div>
                                <div class="futurepanel-body"> 
                                    <img class="picture-frame-img"  :src="bottom_left_frame.picture_data.url" >       
                                </div>
                                <div class="futurepanel-footer">
                                    <div class="picture-frame-location" v-if="bottom_left_frame.text_show"><i class="fa-solid fa-location-dot"></i>&ensp;${ bottom_left_frame.picture_data.location }
                                        <div class="picture-frame-photographer" v-if="bottom_left_frame.text_show"><i class="fa-solid fa-camera-retro"></i>&ensp;${ bottom_left_frame.picture_data.photographer }</div>
                                    </div>
                                </div>
                            </div>                  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </transition>
    <transition name="frame-shadow">
        <div v-cloak v-if="up_right_frame.show_status" key="up-right-frame-shadow" id="up-right-shadow"></div>
    </transition>
    <transition name="up-right-frame">
        <div v-cloak v-if="up_right_frame.show_status" key="up-right-frame" id="up-right-frame">
            <div class="container-fulid full-height">
                <div class="row full-height">
                    <div class="col-md-12">             
                        <div v-if="up_right_frame_img.show" class="picture-frame-img-border">   
                            <div class="futurepanel">
                                <div class="futurepanel-header">
                                    <h1 class="futurepanel-title" v-if="up_right_frame.text_show">${ up_right_frame.picture_data.upload_time }</h1>
                                </div>
                                <div class="futurepanel-body"> 
                                    <img class="picture-frame-img"  :src="up_right_frame.picture_data.url" >       
                                </div>
                                <div class="futurepanel-footer">
                                    <div class="picture-frame-location" v-if="up_right_frame.text_show"><i class="fa-solid fa-location-dot"></i>&ensp;${ up_right_frame.picture_data.location }
                                        <div class="picture-frame-photographer" v-if="up_right_frame.text_show"><i class="fa-solid fa-camera-retro"></i>&ensp;${ up_right_frame.picture_data.photographer }</div>
                                    </div>
                                </div>
                            </div>                  
                        </div>      
                    </div>
                </div>
            </div>
        </div>
    </transition>
    <transition name="frame-shadow">
        <div v-cloak v-if="bottom_right_frame.show_status" key="bottom-right-frame-shadow" id="bottom-right-shadow"></div>
    </transition>
    <transition name="bottom-right-frame">
        <div v-cloak v-if="bottom_right_frame.show_status" key="bottom-right-frame" id="bottom-right-frame">
            <div class="container-fulid full-height">
                <div class="row full-height">
                    <div class="col-md-12">             
                        <div v-if="bottom_right_frame_img.show" class="picture-frame-img-border">   
                            <div class="futurepanel">
                                <div class="futurepanel-header">
                                    <h1 class="futurepanel-title" v-if="bottom_right_frame.text_show">${ bottom_right_frame.picture_data.upload_time }</h1>
                                </div>
                                <div class="futurepanel-body"> 
                                    <img class="picture-frame-img"  :src="bottom_right_frame.picture_data.url" >       
                                </div>
                                <div class="futurepanel-footer">
                                    <div class="picture-frame-location" v-if="bottom_right_frame.text_show"><i class="fa-solid fa-location-dot"></i>&ensp;${ bottom_right_frame.picture_data.location }
                                        <div class="picture-frame-photographer" v-if="bottom_right_frame.text_show"><i class="fa-solid fa-camera-retro"></i>&ensp;${ bottom_right_frame.picture_data.photographer }</div>
                                    </div>
                                </div>
                            </div>                  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </transition>
        <div id="mouse-hand" :style="{ top: mouse_coordinate.y - 10 + 'px', left: mouse_coordinate.x - 10 + 'px' }">
            <img v-if="mouse_status == 'point'" src="/images/Catalog/point_hand.png">
            <img v-if="mouse_status == 'grip'" src="/images/Catalog/grip_hand.png">
        </div>

    <div v-cloak v-if="loading" id="loading-mask">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0.5 -1.40426 25 8.904">
            <defs>
                <radialGradient id="Gradient-color">
                    <stop offset="0%" stop-color="#FFD8A9"></stop>
                    <stop offset="50%" stop-color="#F1A661"></stop>
                    <stop offset="100%" stop-color="#E38B29"></stop>
                </radialGradient>
            </defs>
            <path class="path" d="M 1 2 Q 2 3 4 2 C 3 -5 1 7 2 7 S 4 5 5 2 Q 4 4 5 6 C 6 7 7 5 7 3 C 7 1 5 3 7 4 Q 8 5 9 2 C 7 8 11 7 11 3 C 10 9 13 6 13 4 C 13 1 11 3 13 4 C 14 5 15 3 16 2 Q 13 5 15 6 C 16 6 17 5 17 3 Q 17 2 16 2 C 17 2 17 3 18 2 C 16 7 18 7 19 5 Q 21 1 21 1 C 22 -2 19 -2 19 5 C 19 7 21 6 21 6 C 26 1 22 -4 22 3 C 22 9 24 5 25 4" stroke="url(#Gradient-color)" stroke-width="0.25" fill="none"/>
        </svg>
    </div>

    <div v-cloak v-if="tools_tab.status" id="tools" :style="{ opacity: tools_tab.mask_opacity }"></div>
    <div v-cloak v-if="tools_tab.status" class="tool-choice" :style="{ top: '2%', left: '10%', opacity: tools_tab.bubbles_opacity }" @click="goToFunction('home')">
        <div class="tool-choice-background">
            <img class="tool-img" src="/images/Catalog/home.png">
            <div class="tool-text">主頁</div>
        </div>
    </div>
    <div v-cloak v-if="tools_tab.status" class="tool-choice" :style="{ top: '50%', left: '65%', opacity: tools_tab.bubbles_opacity }" @click="goToFunction('teacher')">
        <div class="tool-choice-background">
            <img class="tool-img" src="/images/Catalog/teacher.png">
            <div class="tool-text">教師列表</div>
        </div>
   </div>
    <div v-cloak v-if="tools_tab.status" class="tool-choice" :style="{ top: '7%', left: '50%', opacity: tools_tab.bubbles_opacity }" @click="goToFunction('spiritGame')">
        <div class="tool-choice-background">
            <img class="tool-img" src="/images/Catalog/controller.png">
            <div class="tool-text">光速飛飛飛</div>
        </div>
    </div>
    <div v-cloak v-if="tools_tab.status" class="tool-choice" :style="{ top: '2%', left: '75%', opacity: tools_tab.bubbles_opacity }" @click="goToFunction('tableTennis')">
            <div class="tool-choice-background">
                <img class="tool-img" src="/images/Catalog/table_tennis.png">
                <div class="tool-text">打桌球</div>
            </div>
        </div>
    <div v-cloak v-if="tools_tab.status" class="tool-choice" :style="{ top: '50%', left: '10%', opacity: tools_tab.bubbles_opacity }" @click="goToFunction('announcement')">
        <div class="tool-choice-background">
            <img class="tool-img" src="/images/Catalog/announcement.png">
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
            picture_amount: 0,
            album_amount: 0,
            now_album_id: 0,
            load_start_position: 0,
            album_start_place: 0,
            albums_data: [],
            albums_data_next: [],
            pictures_data: [],
            last_mouse: [0, 0],
            this_mouse: [0, 0],
            idle_second: 0,
            iframe_url: './home',
            up_left_frame: {
                show_status: false,
                text_show: false,
                picture_data: null,
            },
            bottom_left_frame: {
                show_status: false,
                text_show: false,
                picture_data: null,
            },
            up_right_frame: {
                show_status: false,
                text_show: false,
                picture_data: null,
            },
            bottom_right_frame: {
                show_status: false,
                text_show: false,
                picture_data: null,
            },
            up_left_frame_img: {
                show: false
            },
            up_right_frame_img: {
                show: false
            },
            bottom_left_frame_img: {
                show: false
            },
            bottom_right_frame_img: {
                show: false
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
            carousel_interval: 30,
            show_album: false,
            show_album_hover_position: '78vh',
            planet_hover_position: '85vh',
            show_album_hover_index: '20',
            album_z_index: '45',
            hover_block_position: '85vh',
            rotate_route: 0,
            planet_index: 4,
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

        _this.detectIdle();
        _this.getAlbums(); 
        _this.getSettingValue();              
    },

    methods: {
        detectIdle(event) {
            let _this = this;

            setInterval(function() {
                if (Math.abs(_this.last_mouse[0] - _this.this_mouse[0]) <= 2 && Math.abs(_this.last_mouse[1] - _this.this_mouse[1]) <= 2) {
                    _this.idle_second += 1;   
                    if (_this.picture_amount > 60 && _this.idle_second % _this.carousel_interval == 0) {
                        _this.getNextPagePictures();
                    }
                } else {
                    _this.idle_second = 0;                        
                }
            }, 1000);
        },

        onMouseMove(ev) {
            let _this = this;

            _this.mouse_coordinate.x = ev.clientX;
            _this.mouse_coordinate.y = ev.clientY;

            window.parent.postMessage(JSON.parse(JSON.stringify(_this.mouse_coordinate)), 'http://' + _this.server_ip + '/tvWall');
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

        mouseEnter() {
            let _this = this;

            _this.show_album = true;
            _this.show_album_hover_position = '30vh';
            _this.planet_hover_position = '70vh';
            _this.planet_index = '35';
            _this.show_album_hover_index = '40';
            _this.album_z_index = '45';
            _this.hover_block_position = '50vh';
        },

        mouseLeave() {
            let _this = this;

            _this.show_album = false;
            _this.show_album_hover_position = '78vh';
            _this.planet_hover_position = '85vh';
            _this.planet_index = '4';
            _this.show_album_hover_index = '20';
            _this.album_z_index = '30';
            _this.hover_block_position = '85vh';
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

        getAlbums() {
            let _this = this;
            
            $.ajax({
                type: 'post',
                url: './imgWall/getAlbums',
                data: {
                    album_start_place: _this.album_start_place,
                    _token: '{{ csrf_token() }}'
                },
                success(resp) {
                    if (resp.validate) {
                        if ((_this.rotate_route / 180) % 2 == 1) {
                            _this.albums_data_next = resp.album_list;
                            _this.album_amount = resp.album_amount;

                            _this.albums_data_next.forEach((album, index) =>{
                                let pic = Math.floor(Math.random() * 4);
                                _this.albums_data_next[index].show_pic = pic;
                            });

                            _this.getPicturesData(_this.albums_data_next[0].album_id);
                        } else {
                            _this.albums_data = resp.album_list;
                            _this.album_amount = resp.album_amount;

                            _this.albums_data.forEach((album, index) =>{
                                let pic = Math.floor(Math.random() * 4);
                                _this.albums_data[index].show_pic = pic;
                            });

                            _this.getPicturesData(_this.albums_data[0].album_id);
                        }
                    } else {
                        location.reload();
                    }
                },
                error(msg) {
                    location.reload();
                }
            });
        },

        getPicturesData(album_id) {
            let _this = this;

            _this.now_album_id = album_id;
            _this.hideFrame('up-left-frame');
            _this.hideFrame('up-right-frame');
            _this.hideFrame('bottom-left-frame');
            _this.hideFrame('bottom-right-frame');

            $.ajax({    
                type: 'post',
                url: './imgWall/getPictures',
                data: {
                    show_album_id: album_id,
                    load_start_position: _this.load_start_position,
                    _token: '{{ csrf_token() }}'
                },
                success(resp) {
                    if (resp.validate) {
                        _this.pictures_data = resp.picture_list;
                        _this.picture_amount = resp.picture_amount;

                        _this.pictures_data.forEach(function(picture){
                            let rotate = Math.floor(Math.random() * 40) - 20;
                            picture.rotate = rotate;
                        });

                        setTimeout(function() {
                            $('body').addClass('loaded');
                            setTimeout(function() {
                                _this.loading = false;
                            }, 2000);
                        }, 1000);
                    } else {
                        location.reload();
                    }
                },
                error(msg) {
                    location.reload();
                }
            })
        },

        getNextPagePictures() {
            let _this = this;
            
            _this.load_start_position += 60;                                         
            if (_this.load_start_position >= parseInt(_this.picture_amount) ) {
                _this.load_start_position = 0;
            }

            _this.getPicturesData(_this.now_album_id, _this.load_start_position);
        },

        executiveFunction(ev) {
            let _this = this;
            
            switch (ev.keyCode) {
                case 81:
                    if (_this.tools_tab.status == false) {
                        _this.hideFrame('up-left-frame');
                    }                        
                    break;

                case 87:
                    if (_this.tools_tab.status  == false) {
                        _this.hideFrame('up-right-frame');
                    }                        
                    break;

                case 65:
                    if (_this.tools_tab.status  == false) {
                        _this.hideFrame('bottom-left-frame');
                    }                        
                    break;

                case 83:
                    if (_this.tools_tab.status  == false) {
                        _this.hideFrame('bottom-right-frame');
                    }                        
                    break;

                case 79:
                    if (_this.show_album == true) {
                        _this.getNextPageAlbums();
                    }
                    break;
                
                case 80:
                    _this.getNextPagePictures();
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

        showFrame(picture_id) {
            let _this = this;                
            
            let key = _this.pictures_data.findIndex(picture => picture.picture_id === picture_id);
            let key2 = key % 10;

            $.ajax({
                type: 'post',
                url: './imgWall/getPictureDetailData',
                data: {
                    picture_id: picture_id,
                    _token: '{{ csrf_token() }}'
                },
                success(resp) {
                    if (resp.validate) {
                        if (key < 40 && key2 < 5) {
                            _this.up_left_frame.picture_data = resp.picture_data;
                            _this.up_left_frame.show_status = true;
                            _this.up_left_frame_img.show = true;
                            setTimeout(() => {
                                _this.up_left_frame.text_show = true;
                            }, 1000);
                        } else if (key < 40 && key2 >= 5) {
                            _this.up_right_frame.picture_data = resp.picture_data;
                            _this.up_right_frame.show_status = true;
                            _this.up_right_frame_img.show = true;
                            setTimeout(() => {
                                _this.up_right_frame.text_show = true;
                            }, 1000);
                        } else if (key > 40 && key2 < 5) {
                            _this.bottom_left_frame.picture_data = resp.picture_data;                        
                            _this.bottom_left_frame.show_status = true;
                            _this.bottom_left_frame_img.show = true;
                            setTimeout(() => {
                                _this.bottom_left_frame.text_show = true;
                            }, 1000);
                        } else {
                            _this.bottom_right_frame.picture_data = resp.picture_data;
                            _this.bottom_right_frame.show_status = true;
                            _this.bottom_right_frame_img.show = true;
                            setTimeout(() => {
                                    _this.bottom_right_frame.text_show = true;
                            }, 1000);
                        }
                    } else {
                        location.reload();
                    }
                },
                error(msg) {
                    location.reload();
                }
            });
        },

        hideFrame(frame_class) {
            let _this = this;

            switch (frame_class) {
                case 'up-left-frame':
                    _this.up_left_frame.text_show = false;
                    _this.up_left_frame_img.show = false;
                    _this.up_left_frame.show_status = false;
                    break;

                case 'bottom-left-frame':
                    _this.bottom_left_frame.text_show = false;
                    _this.bottom_left_frame_img.show = false;
                        _this.bottom_left_frame.show_status = false;
                    break;

                case 'up-right-frame':
                    _this.up_right_frame.text_show = false;
                    _this.up_right_frame_img.show = false;
                    _this.up_right_frame.show_status = false;
                    break;

                case 'bottom-right-frame':
                    _this.bottom_right_frame.text_show = false;
                    _this.bottom_right_frame_img.show = false;
                    _this.bottom_right_frame.show_status = false;                        
                    break;
            }
        },

        getNextPageAlbums() {
            let _this = this;
            
            _this.album_start_place += 8;                            
            if (_this.album_start_place >= _this.album_amount) {
                _this.album_start_place = 0;
            }                
            _this.getAlbums(_this.album_start_place);   
            _this.rotate_route += 180;
        },
    }
}).mount('#img-wall-page');
</script>