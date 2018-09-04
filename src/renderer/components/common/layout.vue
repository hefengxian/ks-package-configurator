<template>
    <div class="ks">
        <div class="ks-sidebar" :style="siderStyle">
            <div class="ks-logo">
                <img src="../../assets/logo.svg" alt="logo">
                <h1>KS Configurator</h1>
            </div>
            <a-menu mode="inline"
                    class="ks-menu"
                    :inlineCollapsed="collapsed"
                    :defaultOpenKeys="[]"
                    theme="dark"
                    :defaultSelectedKeys="['0']">
                <a-menu-item v-for="(m, key) in menus"
                             :key="`${key}`">
                    <router-link :to="m.link">
                        <a-icon :type="m.icon" />
                        <span>{{m.label}}</span>
                    </router-link>
                </a-menu-item>
            </a-menu>
        </div>
        <div class="ks-main">
            <div class="header">
                <a-icon :type="collapsed ? 'menu-unfold' : 'menu-fold'"
                        @click="collapsed = !collapsed"
                        class="trigger" />
            </div>
            <div class="content">
                <slot></slot>
            </div>
            <div class="footer">
                Copyright &copy; {{year}}-present Knowlesys 出品
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "layout",
        data () {
            return {
                year: (new Date()).getFullYear(),
                collapsed: true,
                menus: [
                    {
                        label: '通用',
                        icon: 'medicine-box',
                        link: '/common',
                        desc: '',
                    },
                    {
                        label: '数据库',
                        icon: 'database',
                        link: '/database',
                        desc: '',
                    },
                    {
                        label: '分析',
                        icon: 'dot-chart',
                        link: '/analysis',
                        desc: '',
                    },
                    {
                        label: '应用',
                        icon: 'appstore',
                        link: '/application',
                        desc: '',
                    },
                    {
                        label: '获取',
                        link: '/fetch',
                        icon: 'api',
                        desc: '',
                    },
                ]
            }
        },
        computed: {
            siderStyle() {
                return this.collapsed ? {
                    width: '80px',
                } : {}
            }
        },
        methods: {
            toggleCollapsed () {
                this.collapsed = !this.collapsed
            },
        },
    }
</script>

<style lang="less">
    .ks {
        display: flex;
        &-sidebar {
            width: 256px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background: #001529;
            box-shadow: 2px 0 6px rgba(0,21,41,.35);
        }
        &-logo {
            height: 64px;
            line-height: 64px;
            transition: all .3s;
            background: #002140;
            overflow: hidden;
            padding-left: 24px;
            display: flex;
            align-items: center;

            & h1 {
                display: inline-block;
                color: #fff;
                font-size: 20px;
                margin: 0 0 0 24px;
                flex: 1;
            }

            & img {
                display: inline;
                vertical-align: middle;
                height: 32px;
            }
        }

        &-menu {
            padding: 16px 0;
            flex: 1;
        }

        &-main {
            flex: 1;
            background: #f0f2f5;
            display: flex;
            flex-direction: column;
            & .header {
                background: #fff;
                height: 64px;
                line-height: 64px;
                box-shadow: 2px 0 6px rgba(0,21,41,.35);

                & .trigger {
                    font-size: 20px;
                    line-height: 64px;
                    cursor: pointer;
                    -webkit-transition: all .3s,padding 0s;
                    transition: all .3s,padding 0s;
                    padding: 0 24px;
                }
            }

            & .content {
                flex: 1;
                padding: 0 24px;

                .page-header {
                    padding: 24px 0;
                }

                .form-submit .ant-btn{
                    margin-right: 8px;
                }
                .container {
                    overflow: hidden;

                    & > .ant-tabs-card > .ant-tabs-content {
                        margin-top: -16px;
                    }
                    &  > .ant-tabs-card > .ant-tabs-content > .ant-tabs-tabpane {
                        background: #fff;
                        padding: 16px;
                    }
                    & > .ant-tabs-card > .ant-tabs-bar {
                        border-color: #fff;
                    }
                    & > .ant-tabs-card > .ant-tabs-bar .ant-tabs-tab {
                        border-color: transparent;
                        background: transparent;
                    }

                    & > .ant-tabs-card > .ant-tabs-bar .ant-tabs-tab-active {
                        border-color: #fff;
                        background: #fff;
                    }
                }
            }

            & .footer {
                padding: 0 16px;
                margin: 48px 0 24px;
                text-align: center;
            }
        }
    }

</style>