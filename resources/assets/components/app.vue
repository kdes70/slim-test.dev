<template>
    <div>
        <div class="sixteen wide column">
            <div class="ui secondary pointing menu">
                <a class="item" v-link="{ name: 'cars', activeClass: 'active' }">Cars</a>
            </div>
        </div>

        <router-view></router-view>

        <div class="sixteen wide right aligned column">
            <div class="ui divider"></div>
            <small class="secondary">this is <a href="https://github.com/pklink/machdas">machdas 0.7.5</a></small>
        </div>
    </div>
</template>
