<template>
    <div id="root">
        <nav class="top_nav_bar">
            <h1 class="top_nav_bar_title">HEROKU Quick Access</h1>
            <a class="top_nav_bar_button">Open heroku</a>
        </nav>
        <search-menu :search_data="search_data"></search-menu>
        <app-list :app_lists="app_lists"></app-list>
        <!--<inApps :in_apps="app_lists.in_apps"></inApps>-->
    </div>
</template>

<script>
    export default {
        data(){
            return {
                search_data: {
                    orgs: [
                        "hoge","hoge2","hoge3"
                    ],
                    stages: [
                        "foo","foo2","foo3"
                    ],
                    tags: [
                        "bar","bar2","bar3","bar4"
                    ]
                },
                app_lists: [
                    {
                        type: "app",
                        name: "アプリケーション１",
                        star: "true",
                        org: "chatbox-inc",
                        app_url: "",
                        heroku_url: "",
                        tags: ["bar","bar3"],
                        in_apps: []
                    },
                    {
                        type: "app",
                        name: "アプリケーション2",
                        star: "false",
                        org: "chatbox-inc",
                        app_url: "",
                        heroku_url: "",
                        tags: ["bar2","bar3"],
                        in_apps: []
                    },
                    {
                        type: "pipe",
                        name: "パイプライン",
                        star: "false",
                        org: "chatbox-inc",
                        app_url: "",
                        heroku_url: "",
                        tags: ["bar2","bar3","bar4"],
                        in_apps: [
                            {
                                type: "app",
                                name: "アプリケーション3",
                                star: "false",
                                org: "chatbox-inc",
                                stage: "staging",
                                app_url: "",
                                heroku_url: "",
                                tags: ["bar2","bar4"]
                            }
                        ]
                    }
                ]
            }
        },
        components: {
//            inApps: require("./InApp.vue")
        }
    }
</script>

<style>
    #root {
        font-size: 62.5%;
        margin-top: 40px;
        font-size: 1.4rem;
        --search-bg : #f7f8fb;
    }
    .top_nav_bar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 40px;
        background: white;
        z-index: 200;
    }
    .top_nav_bar:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background: #9d7cc3; /* Old browsers */
        background: -moz-linear-gradient(left, #9d7cc3 0%, #8fcaed 100%); /* FF3.6-15 */
        background: -webkit-linear-gradient(left, #9d7cc3 0%,#8fcaed 100%); /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(to right, #9d7cc3 0%,#8fcaed 100%)/* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
    }
    .top_nav_bar_title {
        font-size: 1.5rem;
        line-height: 2.7;
        margin: 0;
        padding-left: 15px;
    }
    .top_nav_bar_button {
        position: absolute;
        cursor: pointer;
        display: block;
        top: 0;
        right: 10px;
        width: 130px;
        height: 25px;
        margin: 7px;
        border: 0px;
        color: white;
        text-align: center;
        background: #7d59a2;
        border-radius: 8px;
        font-size: 1.3rem;
        line-height: 2;
    }
    .top_nav_bar_button:hover {
        color: white;
        text-decoration: none;
    }
</style>
