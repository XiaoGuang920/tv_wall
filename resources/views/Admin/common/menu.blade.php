<section v-cloak id="sidebar" :class="{ 'hide': hide_menu }">
    <div class="brand">
        <i class="fa-solid fa-tv"></i>
        <span class="text">WALL手言合</span>
        <i class="fa-solid fa-xmark" @click="changeSidebarStatus()"></i>
    </div>

    <ul class="side-menu top">
        <li v-cloak :class="{ 'active': page == 'dashboard' }">
            <a href="./dashboard">
                <i class="fa-solid fa-gauge-high"></i>
                <span class="text">主控台</span>
            </a>
        </li>
        <li v-cloak :class="{ 'active': page == 'teacher' }">
            <a href="./teacher">
            <i class="fa-solid fa-chalkboard-user"></i>
                <span class="text">教師管理</span>
            </a>
        </li>
        <li v-cloak :class="{ 'active': page == 'announcement' }">
            <a href="./announcement">
                <i class="fa-solid fa-bullhorn"></i>
                <span class="text">公告管理</span>
            </a>
        </li>
        <li v-cloak :class="{ 'active': page == 'album' }">
            <a href="./album">
                <i class="fa-solid fa-film"></i>
                <span class="text">相簿管理</span>
            </a>
        </li>
    </ul>

    <ul class="side-menu">
        <!--<li>
            <a href="./setting">
                <i class="fa-solid fa-gears"></i>
                <span class="text">系統設定</span>
            </a>
        </li>-->
        <li>
            <a class="logout" href="./logout">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span class="text">登出</span>
            </a>
        </li>
    </ul>
</section>