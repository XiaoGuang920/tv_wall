{!! $header !!}

<link href="css/Catalog/announcement.css" rel="stylesheet">

<div id="announcements-page">
    <div class="announcement-board"> 
        <div v-cloak v-if="show_hint" class="category-hint" @mouseenter="show_category = true, show_hint = false, announcement_background_left_position = '10%'"></div>
        
        <transition name="announcement-category" v-show="show_category">
            <div v-cloak class="announcement-categories" @mouseleave="show_category = false, show_hint = true, announcement_background_left_position = '5%'">
                <div class="category-block 教學公告" @click="showCategoryAnnouncement(1)" value="教學公告">
                    <div>
                        <svg class="category-image" viewBox="0 0 35 35" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <g id="_31._Book" data-name="31. Book">
                                    <path id="svg_1" d="m4,29a1,1 0 0 1 -1,-1l0,-24a4,4 0 0 1 4,-4l19,0a3,3 0 0 1 3,3l0,18a1,1 0 0 1 -2,0l0,-18a1,1 0 0 0 -1,-1l-19,0a2,2 0 0 0 -2,2l0,24a1,1 0 0 1 -1,1z" class="book"/>
                                    <path id="svg_2" d="m28,32l-13,0a1,1 0 0 1 0,-2l12,0l0,-4l-20,0a2,2 0 0 0 0,4l4,0a1,1 0 0 1 0,2l-4,0a4,4 0 0 1 0,-8l21,0a1,1 0 0 1 1,1l0,6a1,1 0 0 1 -1,1z" class="book"/>
                                    <path id="svg_3" d="m24,12l-14,0a1,1 0 0 1 -1,-1l0,-6a1,1 0 0 1 1,-1l14,0a1,1 0 0 1 1,1l0,6a1,1 0 0 1 -1,1zm-13,-2l12,0l0,-4l-12,0l0,4z" class="book-title"/>                    
                                </g>
                                <g id="path">
                                    <path class="book-word2" stroke-linecap="round" stroke-linejoin="round" stroke="#04009a" stroke-width="2" d="m8.23529,14.70588c0.14706,0 0.29412,0 0.58823,0c0.73529,0 1.32353,0 2.05882,0c0.88235,0 1.61765,0 2.20588,0c0.58824,0 1.02941,0 1.32353,0c0.88235,0 1.47059,0 1.91177,0c0.29412,0 0.58823,0 0.88235,0c0.44118,0 0.58823,0 0.88235,0c0.44118,0 0.58823,0 0.88235,0c0.14706,0 0.44118,0 0.88235,0c0.14706,0 0.44118,0 0.58824,0c0.14706,0 0.29412,0 0.58823,0c0.29412,0 0.58824,0 0.88235,0c0.29412,0 0.58824,0 0.88235,0c0.14706,0 0.44118,0 0.58824,0c0.14706,0 0.29412,0 0.58824,0c0.14706,0 0.29412,0 0.44118,0c0.14706,0 0.29412,0 0.58824,0c0.14706,0 0.44118,0 0.58824,0l0.14706,0l0.14706,0l0.14706,0" id="svg_6" stroke="#000" fill="none"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" class="book-word2" stroke="#04009a" stroke-width="2" d="m11.43529,19.00588c0.08921,0 0.17841,0 0.35683,0c0.44604,0 0.80287,0 1.24891,0c0.53525,0 0.98128,0 1.33811,0c0.35683,0 0.62445,0 0.80287,0c0.53525,0 0.89208,0 1.1597,0c0.17841,0 0.35683,0 0.53525,0c0.26762,0 0.35683,0 0.53525,0c0.26762,0 0.35683,0 0.53525,0c0.08921,0 0.26762,0 0.53525,0c0.08921,0 0.26762,0 0.35683,0c0.08921,0 0.17841,0 0.35683,0c0.17842,0 0.35683,0 0.53525,0c0.17842,0 0.35683,0 0.53525,0c0.08921,0 0.26762,0 0.35683,0c0.08921,0 0.17841,0 0.35683,0c0.08921,0 0.17841,0 0.26762,0c0.08921,0 0.17842,0 0.35683,0c0.08921,0 0.26762,0 0.35683,0l0.08921,0l0.08921,0l0.08921,0" id="svg_6" fill="none"/>
                                </g>
                            </g>
                        </svg>
                        
                        <div class="category-name">教學公告</div>
                    </div>
                </div>
                <div class="category-block 報名表單" @click="showCategoryAnnouncement(2)" value="報名表單">
                    <div>
                        <svg class="category-image" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g data-name="26. Clipboard" id="_26._Clipboard"><path class="cls-1" d="M25,32H7a3,3,0,0,1-3-3V7A3,3,0,0,1,7,4H8A1,1,0,0,1,8,6H7A1,1,0,0,0,6,7V29a1,1,0,0,0,1,1H25a1,1,0,0,0,1-1V16a1,1,0,0,1,2,0V29A3,3,0,0,1,25,32Z"/><path class="cls-1" d="M27,13a1,1,0,0,1-1-1V7a1,1,0,0,0-1-1H20a1,1,0,0,1,0-2h5a3,3,0,0,1,3,3v5A1,1,0,0,1,27,13Z"/><path class="cls-1" d="M19,8H13a2,2,0,0,1-2-2V4a2,2,0,0,1,2-2h6a2,2,0,0,1,2,2V6A2,2,0,0,1,19,8ZM13,4V6h6V4Z"/><path class="cls-1" d="M16,4a1,1,0,0,1-1-1V1a1,1,0,0,1,2,0V3A1,1,0,0,1,16,4Z"/><path class="cls-1" d="M13,17H9a1,1,0,0,1-1-1V12a1,1,0,0,1,1-1h4a1,1,0,0,1,1,1v4A1,1,0,0,1,13,17Zm-3-2h2V13H10Z"/><path class="cls-1" d="M13,26H9a1,1,0,0,1-1-1V21a1,1,0,0,1,1-1h4a1,1,0,0,1,1,1v4A1,1,0,0,1,13,26Zm-3-2h2V22H10Z"/><path class="cls-2" d="M23,15H17a1,1,0,0,1,0-2h6a1,1,0,0,1,0,2Z"/><path class="cls-2" d="M23,24H17a1,1,0,0,1,0-2h6a1,1,0,0,1,0,2Z"/></g></svg>
                        <div class="category-name">報名、表單</div>
                    </div>
                </div>
                <div class="category-block 演講座談會" @click="showCategoryAnnouncement(3)" value="演講">
                    <div>
                        <svg class="category-image" viewBox="0 0 35 35" xmlns="http://www.w3.org/2000/svg"><defs></defs><g data-name="38. Projector Screen" id="_38._Projector_Screen"><path class="cls-1" d="M29,6H3A3,3,0,0,1,3,0H8A1,1,0,0,1,8,2H3A1,1,0,0,0,3,4H29a1,1,0,0,0,0-2H12a1,1,0,0,1,0-2H29a3,3,0,0,1,0,6Z"/><path class="cls-1" d="M29,30H3a1,1,0,0,1-1-1V5A1,1,0,0,1,3,4H29a1,1,0,0,1,0,2H4V28H28V9a1,1,0,0,1,2,0V29A1,1,0,0,1,29,30Z"/><path class="cls-1" d="M16,32a1,1,0,0,1-1-1V29a1,1,0,0,1,2,0v2A1,1,0,0,1,16,32Z"/><path class="cls-1" d="M31,30H1a1,1,0,0,1,0-2H31a1,1,0,0,1,0,2Z"/><path class="cls-5" d="M17,18a1,1,0,0,1-.707-.293L12,13.414,7.707,17.707a1,1,0,0,1-1.414-1.414l5-5a1,1,0,0,1,1.414,0L17,15.586l6.293-6.293a1,1,0,0,1,1.414,1.414l-7,7A1,1,0,0,1,17,18Z"/><path class="cls-5" d="M25,13a1,1,0,0,1-1-1V10H22a1,1,0,0,1,0-2h3a1,1,0,0,1,1,1v3A1,1,0,0,1,25,13Z"/><path class="cls-2" d="M10,22H8a1,1,0,0,1,0-2h2a1,1,0,0,1,0,2Z"/><path class="cls-2" d="M17,22H15a1,1,0,0,1,0-2h2a1,1,0,0,1,0,2Z"/><path class="cls-2" d="M17,26H15a1,1,0,0,1,0-2h2a1,1,0,0,1,0,2Z"/><path class="cls-2" d="M24,22H22a1,1,0,0,1,0-2h2a1,1,0,0,1,0,2Z"/><path class="cls-2" d="M24,26H22a1,1,0,0,1,0-2h2a1,1,0,0,1,0,2Z"/><path class="cls-2" d="M10,26H8a1,1,0,0,1,0-2h2a1,1,0,0,1,0,2Z"/></g></svg>
                        <div class="category-name">演講、座談會</div>
                    </div>
                </div>
                <div class="category-block 專題相關公告" @click="showCategoryAnnouncement(4)" value="專題相關公告">
                    <div>
                         <svg class="category-image" viewBox="0 0 35 35" xmlns="http://www.w3.org/2000/svg"><defs></defs><g data-name="9. Tie" id="tie"><path class="tie" d="M21.7,24.659l-2.6-10.414,1.932-2.362a1,1,0,1,0-1.548-1.266L17.526,13H14.474l-1.95-2.383a1,1,0,1,0-1.548,1.266l1.932,2.362L10.3,24.66a3.018,3.018,0,0,0,.79,2.848l4.2,4.2a1,1,0,0,0,1.414,0l4.2-4.2A3.017,3.017,0,0,0,21.7,24.659Zm-2.2,1.435L16,29.586l-3.492-3.492a1.008,1.008,0,0,1-.264-.95L14.78,15h2.44l2.535,10.143A1.007,1.007,0,0,1,19.492,26.094Z"/><path class="clothes" d="M25.555,2.168l-3-2A.985.985,0,0,0,22,.012V0H10V.012a.985.985,0,0,0-.555.156l-3,2a1,1,0,0,0-.393,1.148l.667,2a1,1,0,1,0,1.9-.632L8.19,3.408,9.873,2.287,14.586,7l-4.044,4.044L9.97,8.757a1,1,0,0,0-1.94.486l1,4a1,1,0,0,0,.7.721A1.016,1.016,0,0,0,10,14a1,1,0,0,0,.707-.293L16,8.414l5.293,5.293A1,1,0,0,0,22,14a1.019,1.019,0,0,0,.244-.03,1,1,0,0,0,.714-.683l3-10A1,1,0,0,0,25.555,2.168ZM12.414,2h7.172L16,5.586Zm9.109,9.109L17.414,7l4.713-4.713,1.7,1.134Z"/></g></svg>
                        <div class="category-name">專題公告</div>
                    </div>
                </div>
                <div class="category-block 活動公告" @click="showCategoryAnnouncement(5)" value="活動公告">
                    <div>
                        <svg class="category-image" viewBox="0 0 35 35" xmlns="http://www.w3.org/2000/svg"><defs></defs><g data-name="36. Target" id="_36._Target"><path class="flag-1" d="M23,9H16a1,1,0,0,1,0-2h6V3H16a1,1,0,0,1,0-2h7a1,1,0,0,1,1,1V8A1,1,0,0,1,23,9Z"/><path class="flag-1" d="M29,12H21a1,1,0,0,1-1-1V8a1,1,0,0,1,2,0v2h5.613l-.562-1.684a1,1,0,0,1,0-.632L27.613,6H23a1,1,0,0,1,0-2h6a1,1,0,0,1,.949,1.316L29.054,8l.9,2.684A1,1,0,0,1,29,12Z"/><path class="flag-2" d="M31,32H13a1,1,0,0,1,0-2H28.937L16,13.614,3.063,30H9a1,1,0,0,1,0,2H1a1,1,0,0,1-.785-1.62l15-19a1.037,1.037,0,0,1,1.57,0l15,19A1,1,0,0,1,31,32Z"/><path class="flag-2" d="M16,13a1,1,0,0,1-1-1V1a1,1,0,0,1,2,0V12A1,1,0,0,1,16,13Z"/><path class="flag-2" d="M16,20.447a10.366,10.366,0,0,1-5.334-1.479,1,1,0,1,1,1.028-1.715,8.362,8.362,0,0,0,8.612,0,1,1,0,1,1,1.028,1.715A10.366,10.366,0,0,1,16,20.447Z"/></g></svg>
                        <div class="category-name">活動公告</div>
                    </div>
                </div>
                <div class="category-block 其他公告" @click="showCategoryAnnouncement(6)" value="其他公告">
                    <div>
                        <svg viewBox="0 0 35 35" xmlns="http://www.w3.org/2000/svg"><defs></defs><g data-name="29. Documents" id="_29._Documents"><path class="three-book" d="M9,29H3a3,3,0,0,1-3-3V14a1,1,0,0,1,2,0V26a1,1,0,0,0,1,1H9a1,1,0,0,0,1-1V6A1,1,0,0,0,9,5H3A1,1,0,0,0,2,6v4a1,1,0,0,1-2,0V6A3,3,0,0,1,3,3H9a3,3,0,0,1,3,3V26A3,3,0,0,1,9,29Z"/><path class="three-book" d="M19,29H13a3,3,0,0,1-3-3V6a3,3,0,0,1,3-3h6a3,3,0,0,1,3,3V26A3,3,0,0,1,19,29ZM13,5a1,1,0,0,0-1,1V26a1,1,0,0,0,1,1h6a1,1,0,0,0,1-1V6a1,1,0,0,0-1-1Z"/><path class="three-book" d="M29,29H23a3,3,0,0,1-3-3V6a3,3,0,0,1,3-3h6a3,3,0,0,1,3,3v8a1,1,0,0,1-2,0V6a1,1,0,0,0-1-1H23a1,1,0,0,0-1,1V26a1,1,0,0,0,1,1h6a1,1,0,0,0,1-1V18a1,1,0,0,1,2,0v8A3,3,0,0,1,29,29Z"/><path class="three-book" d="M7,9H5A1,1,0,0,1,5,7H7A1,1,0,0,1,7,9Z"/><path class="three-book" d="M7,13H5a1,1,0,0,1,0-2H7a1,1,0,0,1,0,2Z"/><path class="three-book" d="M7,17H5a1,1,0,0,1,0-2H7a1,1,0,0,1,0,2Z"/><path class="three-book-point" d="M6,25a2,2,0,1,1,2-2A2,2,0,0,1,6,25Zm0-2v0Z"/><path class="three-book" d="M17,9H15a1,1,0,0,1,0-2h2a1,1,0,0,1,0,2Z"/><path class="three-book" d="M17,13H15a1,1,0,0,1,0-2h2a1,1,0,0,1,0,2Z"/><path class="three-book" d="M17,17H15a1,1,0,0,1,0-2h2a1,1,0,0,1,0,2Z"/><path class="three-book-point" d="M16,25a2,2,0,1,1,2-2A2,2,0,0,1,16,25Zm0-2v0Z"/><path class="three-book" d="M27,9H25a1,1,0,0,1,0-2h2a1,1,0,0,1,0,2Z"/><path class="three-book" d="M27,13H25a1,1,0,0,1,0-2h2a1,1,0,0,1,0,2Z"/><path class="three-book" d="M27,17H25a1,1,0,0,1,0-2h2a1,1,0,0,1,0,2Z"/><path class="three-book-point" d="M26,25a2,2,0,1,1,2-2A2,2,0,0,1,26,25Zm0-2v0Z"/></g></svg>
                        <div class="category-name">其他公告</div>
                    </div>
                </div>
            </div>
        </transition>
        <transition-group name="detail-frame">
            <div v-cloak v-if="announcement_detail_frame.show_status" key="detail-frame-shadow" class="announcement-detail-frame-shadow"></div>
            <div v-cloak v-if="announcement_detail_frame.show_status" key="detail-frame" class="announcement-detail-frame-background">
                <div class="announcement-detail-frame">
                    <div v-if="announcement_detail_frame.text_show" class="announcement-detail-title">${ announcement_detail_frame.announcement_detail_data.title }</div>
                    <div v-if="announcement_detail_frame.text_show" class="announcement-detail-author">作者:${ announcement_detail_frame.announcement_detail_data.author }</div>
                    <div v-if="announcement_detail_frame.text_show" class="announcement-detail-upload-time">上傳時間:${ announcement_detail_frame.announcement_detail_data.upload_time }</div>
                    <div v-if="announcement_detail_frame.text_show" class="announcement-detail-content">${ announcement_detail_frame.announcement_detail_data.content }</div>
                    <img v-if="announcement_detail_frame_img.show" class="announcement-detail-image" :src="announcement_detail_frame.announcement_detail_data.image">
                </div>
            </div>
        </transition-group>
        <div v-cloak :style="{ left: announcement_background_left_position }" class="top-announcement-background">
            <div v-for="announcement in announcements_data.top_block" class="announcement-container" >
                <div class="announcement-preview" v-bind:style="{ transform: 'rotate(' +  announcement.rotate + 'deg)' }" @click="showAnnouncementDetail(announcement.announcement_id)">
                    <div class="announcement-title">${ announcement.title }</div>
                    <div class="announcement-upload-time">${ announcement.upload_time }</div>
                </div>
            </div>
        </div>

        <div v-cloak :style="{ left: announcement_background_left_position }" class="bottom-announcement-background">
            <div v-for="announcement in announcements_data.bottom_block" class="announcement-container" >
                <div class="announcement-preview" v-bind:style="{ transform: 'rotate(' +  announcement.rotate + 'deg)' }" @click="showAnnouncementDetail(announcement.announcement_id)">
                    <div class="announcement-title">${ announcement.title }</div>
                    <div class="announcement-upload-time">${ announcement.upload_time }</div>
                </div>
            </div>
        </div>
    </div>
    <div class="announcement-calendar">
        <div class="announcement-calendar-year"> ${ current_year }</div>  
        <div class="announcement-calendar-month"> ${ current_month }<span class="calendar-month-word">月</span></div>          
        <div v-cloak class="announcement-calendar-block" v-for="index in calendar_month" @click="getDailyScheduleData(index.date_year, index.date_month, index.date_day)">
            <div class="announcement-calendar-number" :style="{ color: index.date_class } "> ${ index.date_day } </div>
            <div class="announcement-calendar-event" v-if="index.date_event_show">
                <div class="announcement-calendar-teach-event" v-if="index.teach_event_amount > 0">
                    <div class="announcement-calendar-event-amount"> ${ index.teach_event_amount } </div>
                    <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g data-name="31. Book" id="_31._Book"><path class="cls-1" d="M4,29a1,1,0,0,1-1-1V4A4,4,0,0,1,7,0H26a3,3,0,0,1,3,3V21a1,1,0,0,1-2,0V3a1,1,0,0,0-1-1H7A2,2,0,0,0,5,4V28A1,1,0,0,1,4,29Z"/><path class="cls-1" d="M28,32H15a1,1,0,0,1,0-2H27V26H7a2,2,0,0,0,0,4h4a1,1,0,0,1,0,2H7a4,4,0,0,1,0-8H28a1,1,0,0,1,1,1v6A1,1,0,0,1,28,32Z"/><path class="cls-2" d="M24,12H10a1,1,0,0,1-1-1V5a1,1,0,0,1,1-1H24a1,1,0,0,1,1,1v6A1,1,0,0,1,24,12ZM11,10H23V6H11Z"/><path class="cls-1" d="M24,16H10a1,1,0,0,1,0-2H24a1,1,0,0,1,0,2Z"/><path class="cls-1" d="M22,20H12a1,1,0,0,1,0-2H22a1,1,0,0,1,0,2Z"/></g></svg>                                       
                </div>                
                <div class="announcement-calendar-sign-up-event" v-if="index.sign_up_event_amount > 0">
                    <div class="announcement-calendar-event-amount"> ${ index.sign_up_event_amount } </div>
                    <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><defs></defs><g data-name="26. Clipboard" id="_26._Clipboard"><path class="cls-1" d="M25,32H7a3,3,0,0,1-3-3V7A3,3,0,0,1,7,4H8A1,1,0,0,1,8,6H7A1,1,0,0,0,6,7V29a1,1,0,0,0,1,1H25a1,1,0,0,0,1-1V16a1,1,0,0,1,2,0V29A3,3,0,0,1,25,32Z"/><path class="cls-1" d="M27,13a1,1,0,0,1-1-1V7a1,1,0,0,0-1-1H20a1,1,0,0,1,0-2h5a3,3,0,0,1,3,3v5A1,1,0,0,1,27,13Z"/><path class="cls-1" d="M19,8H13a2,2,0,0,1-2-2V4a2,2,0,0,1,2-2h6a2,2,0,0,1,2,2V6A2,2,0,0,1,19,8ZM13,4V6h6V4Z"/><path class="cls-1" d="M16,4a1,1,0,0,1-1-1V1a1,1,0,0,1,2,0V3A1,1,0,0,1,16,4Z"/><path class="cls-1" d="M13,17H9a1,1,0,0,1-1-1V12a1,1,0,0,1,1-1h4a1,1,0,0,1,1,1v4A1,1,0,0,1,13,17Zm-3-2h2V13H10Z"/><path class="cls-1" d="M13,26H9a1,1,0,0,1-1-1V21a1,1,0,0,1,1-1h4a1,1,0,0,1,1,1v4A1,1,0,0,1,13,26Zm-3-2h2V22H10Z"/><path class="cls-2" d="M23,15H17a1,1,0,0,1,0-2h6a1,1,0,0,1,0,2Z"/><path class="cls-2" d="M23,24H17a1,1,0,0,1,0-2h6a1,1,0,0,1,0,2Z"/></g></svg>
                </div>
                <div class="announcement-calendar-speech-event" v-if="index.speech_event_amount > 0">
                    <div class="announcement-calendar-event-amount"> ${ index.speech_event_amount } </div>
                    <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g data-name="38. Projector Screen" id="_38._Projector_Screen"><path class="cls-1" d="M29,6H3A3,3,0,0,1,3,0H8A1,1,0,0,1,8,2H3A1,1,0,0,0,3,4H29a1,1,0,0,0,0-2H12a1,1,0,0,1,0-2H29a3,3,0,0,1,0,6Z"/><path class="cls-1" d="M29,30H3a1,1,0,0,1-1-1V5A1,1,0,0,1,3,4H29a1,1,0,0,1,0,2H4V28H28V9a1,1,0,0,1,2,0V29A1,1,0,0,1,29,30Z"/><path class="cls-1" d="M16,32a1,1,0,0,1-1-1V29a1,1,0,0,1,2,0v2A1,1,0,0,1,16,32Z"/><path class="cls-1" d="M31,30H1a1,1,0,0,1,0-2H31a1,1,0,0,1,0,2Z"/><path class="cls-2" d="M17,18a1,1,0,0,1-.707-.293L12,13.414,7.707,17.707a1,1,0,0,1-1.414-1.414l5-5a1,1,0,0,1,1.414,0L17,15.586l6.293-6.293a1,1,0,0,1,1.414,1.414l-7,7A1,1,0,0,1,17,18Z"/><path class="cls-2" d="M25,13a1,1,0,0,1-1-1V10H22a1,1,0,0,1,0-2h3a1,1,0,0,1,1,1v3A1,1,0,0,1,25,13Z"/><path class="cls-2" d="M10,22H8a1,1,0,0,1,0-2h2a1,1,0,0,1,0,2Z"/><path class="cls-2" d="M17,22H15a1,1,0,0,1,0-2h2a1,1,0,0,1,0,2Z"/><path class="cls-2" d="M17,26H15a1,1,0,0,1,0-2h2a1,1,0,0,1,0,2Z"/><path class="cls-2" d="M24,22H22a1,1,0,0,1,0-2h2a1,1,0,0,1,0,2Z"/><path class="cls-2" d="M24,26H22a1,1,0,0,1,0-2h2a1,1,0,0,1,0,2Z"/><path class="cls-2" d="M10,26H8a1,1,0,0,1,0-2h2a1,1,0,0,1,0,2Z"/></g></svg>
                </div>
                <div class="announcement-calendar-project-event" v-if="index.project_event_amount > 0">
                    <div class="announcement-calendar-event-amount"> ${ index.project_event_amount } </div>
                    <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g data-name="9. Tie" id="_9._Tie"><path class="cls-3" d="M21.7,24.659l-2.6-10.414,1.932-2.362a1,1,0,1,0-1.548-1.266L17.526,13H14.474l-1.95-2.383a1,1,0,1,0-1.548,1.266l1.932,2.362L10.3,24.66a3.018,3.018,0,0,0,.79,2.848l4.2,4.2a1,1,0,0,0,1.414,0l4.2-4.2A3.017,3.017,0,0,0,21.7,24.659Zm-2.2,1.435L16,29.586l-3.492-3.492a1.008,1.008,0,0,1-.264-.95L14.78,15h2.44l2.535,10.143A1.007,1.007,0,0,1,19.492,26.094Z"/><path class="cls-4" d="M25.555,2.168l-3-2A.985.985,0,0,0,22,.012V0H10V.012a.985.985,0,0,0-.555.156l-3,2a1,1,0,0,0-.393,1.148l.667,2a1,1,0,1,0,1.9-.632L8.19,3.408,9.873,2.287,14.586,7l-4.044,4.044L9.97,8.757a1,1,0,0,0-1.94.486l1,4a1,1,0,0,0,.7.721A1.016,1.016,0,0,0,10,14a1,1,0,0,0,.707-.293L16,8.414l5.293,5.293A1,1,0,0,0,22,14a1.019,1.019,0,0,0,.244-.03,1,1,0,0,0,.714-.683l3-10A1,1,0,0,0,25.555,2.168ZM12.414,2h7.172L16,5.586Zm9.109,9.109L17.414,7l4.713-4.713,1.7,1.134Z"/></g></svg>
                </div>
                <div class="announcement-calendar-activity-event" v-if="index.activity_event_amount > 0">
                    <div class="announcement-calendar-event-amount"> ${ index.activity_event_amount } </div>
                    <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g data-name="36. Target" id="_36._Target"><path class="cls-3" d="M23,9H16a1,1,0,0,1,0-2h6V3H16a1,1,0,0,1,0-2h7a1,1,0,0,1,1,1V8A1,1,0,0,1,23,9Z"/><path class="cls-3" d="M29,12H21a1,1,0,0,1-1-1V8a1,1,0,0,1,2,0v2h5.613l-.562-1.684a1,1,0,0,1,0-.632L27.613,6H23a1,1,0,0,1,0-2h6a1,1,0,0,1,.949,1.316L29.054,8l.9,2.684A1,1,0,0,1,29,12Z"/><path class="cls-4" d="M31,32H13a1,1,0,0,1,0-2H28.937L16,13.614,3.063,30H9a1,1,0,0,1,0,2H1a1,1,0,0,1-.785-1.62l15-19a1.037,1.037,0,0,1,1.57,0l15,19A1,1,0,0,1,31,32Z"/><path class="cls-4" d="M16,13a1,1,0,0,1-1-1V1a1,1,0,0,1,2,0V12A1,1,0,0,1,16,13Z"/><path class="cls-4" d="M16,20.447a10.366,10.366,0,0,1-5.334-1.479,1,1,0,1,1,1.028-1.715,8.362,8.362,0,0,0,8.612,0,1,1,0,1,1,1.028,1.715A10.366,10.366,0,0,1,16,20.447Z"/></g></svg>
                </div>
                <div class="announcement-calendar-other-event" v-if="index.other_event_amount > 0">
                    <div class="announcement-calendar-event-amount"> ${ index.other_event_amount } </div>
                    <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g data-name="29. Documents" id="_29._Documents"><path class="cls-1" d="M9,29H3a3,3,0,0,1-3-3V14a1,1,0,0,1,2,0V26a1,1,0,0,0,1,1H9a1,1,0,0,0,1-1V6A1,1,0,0,0,9,5H3A1,1,0,0,0,2,6v4a1,1,0,0,1-2,0V6A3,3,0,0,1,3,3H9a3,3,0,0,1,3,3V26A3,3,0,0,1,9,29Z"/><path class="cls-1" d="M19,29H13a3,3,0,0,1-3-3V6a3,3,0,0,1,3-3h6a3,3,0,0,1,3,3V26A3,3,0,0,1,19,29ZM13,5a1,1,0,0,0-1,1V26a1,1,0,0,0,1,1h6a1,1,0,0,0,1-1V6a1,1,0,0,0-1-1Z"/><path class="cls-1" d="M29,29H23a3,3,0,0,1-3-3V6a3,3,0,0,1,3-3h6a3,3,0,0,1,3,3v8a1,1,0,0,1-2,0V6a1,1,0,0,0-1-1H23a1,1,0,0,0-1,1V26a1,1,0,0,0,1,1h6a1,1,0,0,0,1-1V18a1,1,0,0,1,2,0v8A3,3,0,0,1,29,29Z"/><path class="cls-1" d="M7,9H5A1,1,0,0,1,5,7H7A1,1,0,0,1,7,9Z"/><path class="cls-1" d="M7,13H5a1,1,0,0,1,0-2H7a1,1,0,0,1,0,2Z"/><path class="cls-1" d="M7,17H5a1,1,0,0,1,0-2H7a1,1,0,0,1,0,2Z"/><path class="cls-2" d="M6,25a2,2,0,1,1,2-2A2,2,0,0,1,6,25Zm0-2v0Z"/><path class="cls-1" d="M17,9H15a1,1,0,0,1,0-2h2a1,1,0,0,1,0,2Z"/><path class="cls-1" d="M17,13H15a1,1,0,0,1,0-2h2a1,1,0,0,1,0,2Z"/><path class="cls-1" d="M17,17H15a1,1,0,0,1,0-2h2a1,1,0,0,1,0,2Z"/><path class="cls-2" d="M16,25a2,2,0,1,1,2-2A2,2,0,0,1,16,25Zm0-2v0Z"/><path class="cls-1" d="M27,9H25a1,1,0,0,1,0-2h2a1,1,0,0,1,0,2Z"/><path class="cls-1" d="M27,13H25a1,1,0,0,1,0-2h2a1,1,0,0,1,0,2Z"/><path class="cls-1" d="M27,17H25a1,1,0,0,1,0-2h2a1,1,0,0,1,0,2Z"/><path class="cls-2" d="M26,25a2,2,0,1,1,2-2A2,2,0,0,1,26,25Zm0-2v0Z"/></g></svg>                   
                </div>
            </div>
        </div>
    </div>
    
    <transition name="schedule-shadow">
        <div v-cloak v-show="isload == true" class="schedule-loading-shadow"></div>
    </transition>
    <transition name="schedule-loading">
        <div v-cloak v-show="isload == true" class="schedule-loading">
            <div class="schedule-loader">
                <span></span>
                <div class="loading-word">Loading</div>
            </div>
        </div>
    </transition>
    <div class="announcement-daily-schedule">
        <div class="announcement-daily-schedule-title-container">            
            <img class="announcement-daily-schedule-decoration" src="/images/Catalog/daily-schedule-decoration.png">
            <div class="announcement-daily-schedule-title">日程表</div>
        </div>
        <transition-group name="schedule-content">
            <div v-cloak v-show="isload == false" v-for="schedule in daily_schedule_data" key="time" class="announcement-daily-schedule-time-container">
                <div class="announcement-daily-schedule-content-event-image"></div>
                <div class="announcement-daily-schedule-time">${ schedule.start_time }</div>            
            </div>
            <div v-cloak v-show="isload == false" v-for="schedule in daily_schedule_data" key="title"class="announcement-daily-schedule-title-content-container" @click="showScheduleDetail(schedule.announcement_id)">
                <div class="announcement-daily-schedule-title-content">${ schedule.title }</div>            
            </div>
        </transition-group>
        <div v-cloak v-if="show_ghost" class="ghost-container">
            <svg class="ghost" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            x="0px" y="0px" width="30%" height="40%" viewBox="0 0 127.433 132.743" enable-background="new 0 0 127.433 132.743"
            xml:space="preserve">
                <path fill="#E6962A" d="M116.223,125.064c1.032-1.183,1.323-2.73,1.391-3.747V54.76c0,0-4.625-34.875-36.125-44.375
                    s-66,6.625-72.125,44l-0.781,63.219c0.062,4.197,1.105,6.177,1.808,7.006c1.94,1.811,5.408,3.465,10.099-0.6
                    c7.5-6.5,8.375-10,12.75-6.875s5.875,9.75,13.625,9.25s12.75-9,13.75-9.625s4.375-1.875,7,1.25s5.375,8.25,12.875,7.875
                    s12.625-8.375,12.625-8.375s2.25-3.875,7.25,0.375s7.625,9.75,14.375,8.125C114.739,126.01,115.412,125.902,116.223,125.064z"/>
                <circle fill="#013E51" cx="86.238" cy="57.885" r="6.667"/>
                <circle fill="#013E51" cx="40.072" cy="57.885" r="6.667"/>
                <path fill="#013E51" d="M71.916,62.782c0.05-1.108-0.809-2.046-1.917-2.095c-0.673-0.03-1.28,0.279-1.667,0.771
                    c-0.758,0.766-2.483,2.235-4.696,2.358c-1.696,0.094-3.438-0.625-5.191-2.137c-0.003-0.003-0.007-0.006-0.011-0.009l0.002,0.005
                    c-0.332-0.294-0.757-0.488-1.235-0.509c-1.108-0.049-2.046,0.809-2.095,1.917c-0.032,0.724,0.327,1.37,0.887,1.749
                    c-0.001,0-0.002-0.001-0.003-0.001c2.221,1.871,4.536,2.88,6.912,2.986c0.333,0.014,0.67,0.012,1.007-0.01
                    c3.163-0.191,5.572-1.942,6.888-3.166l0.452-0.453c0.021-0.019,0.04-0.041,0.06-0.061l0.034-0.034
                    c-0.007,0.007-0.015,0.014-0.021,0.02C71.666,63.771,71.892,63.307,71.916,62.782z"/>
                <circle fill="#FCEFED" stroke="#FEEBE6" stroke-miterlimit="10" cx="18.614" cy="99.426" r="3.292"/>
                <circle fill="#FCEFED" stroke="#FEEBE6" stroke-miterlimit="10" cx="95.364" cy="28.676" r="3.291"/>
                <circle fill="#FCEFED" stroke="#FEEBE6" stroke-miterlimit="10" cx="24.739" cy="93.551" r="2.667"/>
                <circle fill="#FCEFED" stroke="#FEEBE6" stroke-miterlimit="10" cx="101.489" cy="33.051" r="2.666"/>
                <circle fill="#FCEFED" stroke="#FEEBE6" stroke-miterlimit="10" cx="18.738" cy="87.717" r="2.833"/>
                <path fill="#FCEFED" stroke="#FEEBE6" stroke-miterlimit="10" d="M116.279,55.814c-0.021-0.286-2.323-28.744-30.221-41.012
                    c-7.806-3.433-15.777-5.173-23.691-5.173c-16.889,0-30.283,7.783-37.187,15.067c-9.229,9.736-13.84,26.712-14.191,30.259
                    l-0.748,62.332c0.149,2.133,1.389,6.167,5.019,6.167c1.891,0,4.074-1.083,6.672-3.311c4.96-4.251,7.424-6.295,9.226-6.295
                    c1.339,0,2.712,1.213,5.102,3.762c4.121,4.396,7.461,6.355,10.833,6.355c2.713,0,5.311-1.296,7.942-3.962
                    c3.104-3.145,5.701-5.239,8.285-5.239c2.116,0,4.441,1.421,7.317,4.473c2.638,2.8,5.674,4.219,9.022,4.219
                    c4.835,0,8.991-2.959,11.27-5.728l0.086-0.104c1.809-2.2,3.237-3.938,5.312-3.938c2.208,0,5.271,1.942,9.359,5.936
                    c0.54,0.743,3.552,4.674,6.86,4.674c1.37,0,2.559-0.65,3.531-1.932l0.203-0.268L116.279,55.814z M114.281,121.405
                    c-0.526,0.599-1.096,0.891-1.734,0.891c-2.053,0-4.51-2.82-5.283-3.907l-0.116-0.136c-4.638-4.541-7.975-6.566-10.82-6.566
                    c-3.021,0-4.884,2.267-6.857,4.667l-0.086,0.104c-1.896,2.307-5.582,4.999-9.725,4.999c-2.775,0-5.322-1.208-7.567-3.59
                    c-3.325-3.528-6.03-5.102-8.772-5.102c-3.278,0-6.251,2.332-9.708,5.835c-2.236,2.265-4.368,3.366-6.518,3.366
                    c-2.772,0-5.664-1.765-9.374-5.723c-2.488-2.654-4.29-4.395-6.561-4.395c-2.515,0-5.045,2.077-10.527,6.777
                    c-2.727,2.337-4.426,2.828-5.37,2.828c-2.662,0-3.017-4.225-3.021-4.225l0.745-62.163c0.332-3.321,4.767-19.625,13.647-28.995
                    c3.893-4.106,10.387-8.632,18.602-11.504c-0.458,0.503-0.744,1.165-0.744,1.898c0,1.565,1.269,2.833,2.833,2.833
                    c1.564,0,2.833-1.269,2.833-2.833c0-1.355-0.954-2.485-2.226-2.764c4.419-1.285,9.269-2.074,14.437-2.074
                    c7.636,0,15.336,1.684,22.887,5.004c26.766,11.771,29.011,39.047,29.027,39.251V121.405z"/>
            </svg>
            <p class="shadowFrame">
                <svg version="1.1" class="ghost-shadow" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="61px" y="20px"
                width="20%" height="10%" viewBox="0 0 122.436 39.744" enable-background="new 0 0 122.436 39.744" xml:space="preserve">
                    <ellipse fill="#F87474" cx="68.128" cy="19.872" rx="49.25" ry="8.916"/>
                </svg>
            </p>                          
        </div>    
        <div v-cloak v-if="show_ghost" class="ghost-no-schedule-word">今天沒有事情喔！</div>  
    </div>    

        <div id="mouse-hand" :style="{ top: mouse_coordinate.y - 10 + 'px', left: mouse_coordinate.x - 10 + 'px' }">
            <img v-if="mouse_status == 'point'" src="/images/Catalog/point_hand.png">
            <img v-if="mouse_status == 'grip'" src="/images/Catalog/grip_hand.png">
        </div>

    <div v-cloak v-if="loading" id="loading-mask">        
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0.5 -1.40426 25 8.904">
            <defs>
                <radialGradient id="Gradient-color">
                    <stop offset="0%" stop-color="#293462"></stop>
                    <stop offset="50%" stop-color="#1CD6CE"></stop>
                    <stop offset="100%" stop-color="#FEDB39"></stop>
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
    <div v-cloak v-if="tools_tab.status" class="tool-choice" :style="{ top: '50%', left: '10%', opacity: tools_tab.bubbles_opacity }" @click="goToFunction('imgWall')">
        <div class="tool-choice-background">
            <img class="tool-img" src="/images/Catalog/photo_wall.png">
            <div class="tool-text">照片牆</div>
        </div>
    </div>
</div>

{!! $footer !!}

<script type="text/javascript">
const app = Vue.createApp({
    delimiters: ['${', '}'],

    data() {
        return {
            announcements_data: {
                top_block: [],
                bottom_block: []
            },
            announcement_background_left_position: '10%',
            schedule_category_detail_data: {
                top_block: [],
                bottom_block: []
            },
            category_announcement_data: {
                top_block: [],
                bottom_block: []
            },
            announcement_detail_frame: {
                show_status: false,
                text_show: false,
                announcement_detail_data: null,
            },
            announcement_detail_frame_img: {
                show: false,
                width: '100%'
            },
            categories_data: [],
            announcement_detail: [],
            daily_schedule_data: [],
            load_start_place: 0,
            schedule_load_position: 0,
            category_type_num: 1,
            category_left_position: '0',
            show_hint: false,
            show_ghost: false,
            show_category: true,
            current_year: '',
            current_month: '',
            gen_next_month: 'no',
            date_month: '',
            date_day: '',
            date_year: '',
            calendar_month: [
                {
                    date_day: '',
                    date_month: '',
                    date_year: '',
                    date_class: '',
                    date_event_show: false,
                    teach_event_amount: 0,
                    sign_up_event_amount: 0,
                    speech_event_amount: 0,
                    project_event_amount: 0,
                    activity_event_amount: 0,
                    other_event_amount: 0,
                }
            ],
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
            current_hour: 0,
            current_minute: 0,
            isload: false,
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
        
        _this.now_date = new Date();
        _this.now_year = _this.now_date.getFullYear();
        _this.now_month = _this.now_date.getMonth() + 1;
        _this.now_day = _this.now_date.getDate();

        _this.getSettingValue();
        _this.showAnnouncements();
        _this.generateCalendar();
        _this.getDailyScheduleData(_this.now_year, _this.now_month, _this.now_day);
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
                case 90:
                    _this.hideAnnouncementDetail();
                    break;

                case 68:
                    _this.showNextCategoryAnnouncement();
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
                    
                case 76:
                    _this.generateCalendar(_this.gen_next_month);
                    break;

                case 82:
                    if (_this.show_ghost == false) {
                        _this.showNextScheduleData();
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
            
            window.parent.postMessage(url, 'http://' + _this.server_ip + '/tvWall');
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

        showAnnouncementDetail(announcement_id) {
            let _this = this;

                $.ajax({
                    type: 'post',
                    url: './announcement/getAnnouncementDetail',
                    data: {
                        announcement_id: announcement_id,
                        _token: '{{ csrf_token() }}'
                    },
                    success(resp) {
                        if (resp.validate) {
                            _this.announcement_detail_frame.announcement_detail_data = resp.announcement_detail;
                            _this.announcement_detail_frame.show_status = true;
                            _this.announcement_detail_frame.text_show = true;
                            _this.announcement_detail_frame_img.show = true;
                        }
                    },
                    error(msg) {
                        location.reload();
                    }
                });
        },

        hideAnnouncementDetail() {
            let _this = this;

            _this.announcement_detail_frame.text_show = false;
            _this.announcement_detail_frame_img.show = false;                
            _this.announcement_detail_frame.show_status = false;                    
        },

        getDailyScheduleData(date_year, date_month, date_day) {
            let _this = this;
            
            _this.now_date = new Date();                
            _this.date_year = date_year;
            _this.date_month = '-' + date_month;
            _this.date_day = date_day;
            _this.isload = true;
            _this.show_ghost = false;

            if (_this.date_day == _this.now_date.getDate()) {
                _this.now_hour = _this.now_date.getHours();
                _this.now_minute = _this.now_date.getMinutes();
            } else {
                _this.now_hour = 0;
                _this.now_minute = 0;
            }

            if (date_day < 10) {
                _this.date_day = '-0' + date_day;
            } else {
                _this.date_day = '-' + date_day;
            }

            _this.now_hour = _this.now_hour < 10 ? ' 0' + _this.now_hour : ' ' + _this.now_hour;
            _this.now_minute = _this.now_minute < 10 ? ':0' + _this.now_minute : ':' + _this.now_minute;

            _this.schedule_load_position = 0;
            _this.daily_schedule_data = '';

            $.ajax({
                type: 'post',
                url: './announcement/getDailyScheduleData',
                data: {
                    date: _this.date_year + '' + _this.date_month + _this.date_day,
                    date_time: _this.now_hour + _this.now_minute,
                    schedule_load_position: _this.schedule_load_position,
                    _token: '{{ csrf_token() }}'
                },
                success(resp) {
                    if (resp.daily_schedule_data == '' && resp.validate) {
                        _this.daily_schedule_data = resp.daily_schedule_data;
                        setTimeout(function() {
                            _this.isload = false;
                            _this.show_ghost = true;
                        }, 1000);                                    
                    } else if (resp.daily_schedule_data != '' && resp.validate) { 
                        setTimeout(function() {
                            _this.isload = false;
                            _this.daily_schedule_data = resp.daily_schedule_data;
                        }, 1000);          
                    } else {
                        location.reload();
                    }
                },
                error(msg) {
                    location.reload();
                }
            });
        },

        showScheduleDetail(announcement_id) {
            let _this = this;
            
            $.ajax({
                type: 'post',
                url: './announcement/getScheduleDetail',
                data: {
                    announcement_id: announcement_id,
                    _token: '{{ csrf_token() }}'
                },
                success(resp) {
                    if (resp.validate) {
                        _this.schedule_category_detail_data.top_block = [];
                        _this.schedule_category_detail_data.bottom_block = [];             

                        resp.schedule_category_detail_data.forEach(function(schedule, index) {
                            if (index < 6) {
                                let rotate = Math.floor(Math.random() * 11) - 5;

                                schedule.rotate = rotate;
                                _this.schedule_category_detail_data.top_block.push(schedule);                                
                            } else {
                                let rotate = Math.floor(Math.random() * 11) - 5;

                                schedule.rotate = rotate;
                                _this.schedule_category_detail_data.bottom_block.push(schedule);
                            }
                                _this.announcements_data.top_block = _this.schedule_category_detail_data.top_block;
                                _this.announcements_data.bottom_block = _this.schedule_category_detail_data.bottom_block;
                        });
                    }
                },
                error(msg) {
                    location.reload();
                }
            });
        },

        showCategoryAnnouncement(category_type_num) {
            let _this = this;

            $.ajax({
                type: 'post',
                url: './announcement/getCategoryAnnouncements',
                data: {
                    category_type_num: category_type_num,
                    load_start_place: 0,
                    _token: '{{ csrf_token() }}'
                },
                success(resp) {
                    if (resp.validate) {      
                        _this.category_announcement_data.top_block = [];
                        _this.category_announcement_data.bottom_block = [];             
                        
                        resp.category_announcement_data.forEach(function(category, index) {
                            if (index < 6) {
                                let rotate = Math.floor(Math.random() * 11) - 5;
                                category.rotate = rotate;
                                _this.category_announcement_data.top_block.push(category);                                
                            } else {
                                let rotate = Math.floor(Math.random() * 11) - 5;
                                category.rotate = rotate;
                                _this.category_announcement_data.bottom_block.push(category);
                            }
                                
                            _this.announcements_data.top_block = _this.category_announcement_data.top_block;
                            _this.announcements_data.bottom_block = _this.category_announcement_data.bottom_block;

                            _this.category_announcement_data = JSON.parse(JSON.stringify(_this.category_announcement_data));
                            _this.announcements_data = JSON.parse(JSON.stringify(_this.announcements_data));
                        });
                        
                        _this.category_type_num = category_type_num;
                        _this.load_start_place = 0;
                    } else {
                        location.reload();
                    }
                },
                error(msg) {
                    location.reload();
                }
            });  
        },

        showNextCategoryAnnouncement() {
            let _this = this;
            
            _this.load_start_place = parseInt(_this.load_start_place) + 12;

            $.ajax({
                type: 'post',
                url: './announcement/getNextCategoryAnnouncements',
                data: {
                    category_type_num: _this.category_type_num,
                    load_start_place: _this.load_start_place,
                    _token: '{{ csrf_token() }}'
                },
                success(resp) {
                    if (resp.validate) {   
                        _this.announcements_data.top_block = [];
                        _this.announcements_data.bottom_block = [];

                        resp.announcements_data.forEach(function(announcement, index) {
                            if (index < 6) {
                                let rotate = Math.floor(Math.random() * 11) - 5;
                                announcement.rotate = rotate;
                                _this.announcements_data.top_block.push(announcement);
                            } else {                                    
                                let rotate = Math.floor(Math.random() * 11) - 5;
                                announcement.rotate = rotate;
                                _this.announcements_data.bottom_block.push(announcement);
                            }                  
                        });   

                        _this.load_start_place = resp.load_start_place;
                    }
                },
                error(msg) {
                    location.reload();
                }
            });  
        },

        showNextScheduleData() {
            let _this = this;
            
            _this.now_date = new Date();

            if (_this.date_day == '-' + _this.now_date.getDate()) {
                _this.current_hour = _this.now_date.getHours();
                _this.current_minute = _this.now_date.getMinutes();
            } else {
                _this.current_hour = 0;
                _this.current_minute = 0;
            }

            _this.current_hour = _this.current_hour < 10 ? ' 0' + _this.current_hour : ' ' + _this.current_hour;
            _this.current_minute = _this.current_minute < 10 ? ':0' + _this.current_minute : ':' + _this.current_minute;

            _this.schedule_load_position = parseInt(_this.schedule_load_position) + 4;
            _this.daily_schedule_data = '';
            _this.isload = true;
            _this.show_ghost = false;
            
            $.ajax({
                type: 'post',
                url: './announcement/getNextScheduleData',
                data: {
                    date: _this.date_year + '' + _this.date_month + _this.date_day,
                    date_time: _this.current_hour + _this.current_minute,             
                    schedule_load_position: _this.schedule_load_position,
                    _token: '{{ csrf_token() }}'                     
                },
                success(resp) {
                    if (resp.daily_schedule_data == '' && resp.validate) {
                        _this.daily_schedule_data = '';
                        setTimeout(function() {
                            _this.isload = false;
                            setTimeout(function() {
                                _this.show_ghost = true;
                            }, 1000);
                        }, 1000);          
                    } else if (resp.daily_schedule_data != '' && resp.validate) {      
                        _this.schedule_load_position = resp.schedule_load_position;
                        setTimeout(function() {
                            _this.isload = false;
                            _this.daily_schedule_data = resp.daily_schedule_data;
                        }, 1000);                                 
                    }
                },
                error(msg) {
                    location.reload();
                }
            });           
        },

        generateCalendar(gen_next_month) {
            let _this = this;
            
            $.ajax({
                type: 'post',
                url: './announcement/generateCalendar',
                data: {
                    gen_next_month: _this.gen_next_month,
                    _token: '{{ csrf_token() }}'            
                },
                success(resp) {
                    if (resp.validate) {      
                        _this.calendar_month = resp.calendar_month;
                        _this.current_year = resp.current_year;
                        _this.current_month = resp.current_month;     

                        setTimeout(function() {
                            _this.loading = false;
                        }, 3000);

                        if (_this.gen_next_month == 'no') {
                            _this.gen_next_month = 'yes';
                        } else {
                            _this.gen_next_month = 'no';
                        }
                    }
                },
                error(msg) {
                    location.reload();
                }
            });              
        },

        showAnnouncements($category_type_num) {
            let _this = this;

            $.ajax({
                type: 'post',
                url: './announcement/getAnnouncements',
                data: {
                    _token: '{{ csrf_token() }}',
                    load_start_place: 0,
                    category_type_num: _this.category_type_num
                },
                success(resp) {
                    if (resp.validate) {      
                        _this.announcements_data.top_block = [];
                        _this.announcements_data.bottom_block = [];

                        resp.announcements_data.forEach(function(announcement, index) {
                            if (index < 6) {
                                let rotate = Math.floor(Math.random() * 11) - 5;
                                
                                announcement.rotate = rotate;
                                _this.announcements_data.top_block.push(announcement);
                            } else {                                    
                                let rotate = Math.floor(Math.random() * 11) - 5;
                                announcement.rotate = rotate;
                                _this.announcements_data.bottom_block.push(announcement);
                            }                  
                        });
                        _this.load_start_place = 0;
                    }
                },
                error(msg) {
                    location.reload();
                }
            });
        }
    }
}).mount('#announcements-page');
</script>