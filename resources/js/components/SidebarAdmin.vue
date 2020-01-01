<template>
    <div>
        <v-navigation-drawer v-model="drawer" absolute temporary>
            <v-list-item class="navbar__item bg-yellow-bright pb-2">
                <v-list-item-content>
                    <div  @click.stop="drawer = !drawer" class="change inline flex-none pr-3 mt-4 cursor-pointer">
                        <div class="bar1"></div>
                        <div class="bar2"></div>
                        <div class="bar3"></div>
                    </div>
                    <div class="inline flex-none">
                        <a class="text-grey-900 inline-block text-lg align-middle pt-2 pb-2 inline" href="/admin'">
                    Ecowash admin </a>
                    </div>
                </v-list-item-content>
            </v-list-item>
            <v-divider></v-divider>

            <v-list dense>
                <v-list-item v-for="item in items" :key="item.title" link :href="item.href" >

                    <v-list-item-icon>
                        <v-icon>{{ item.icon }}</v-icon>
                    </v-list-item-icon>

                    <v-list-item-content>
                        <v-list-item-title>{{ item.title }}</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                drawer: null,
                width: 256,
                items: [
                { title: 'Dashboard', icon: 'dashboard', href: '/admin' },
                { title: 'Alerts', icon: 'mdi-alert', href: '/admin/alerts' },
                { title: 'Machines', icon: 'mdi-washing-machine', href: '/admin/machines' },
                { title: 'Content', icon: 'mdi-content-copy', href: '/admin/content' },
                { title: 'Users', icon: 'mdi-account-multiple', href: '/admin/users' },
                ],
            }
        },
    mounted() {
        this.$root.$on('openSidebar', () => {
        this.drawer = !this.drawer;
        });
    }

    }
</script>

<style lang="scss" scoped>

.navbar__item {
    height: 62px;
}

.bar1, .bar2, .bar3 {
  width: 25px;
  height: 4px;
  background-color: #333;
  margin: 4px 0;
  -webkit-transition: 0.4s;
  transition: 0.4s;
}

.change .bar1 {
  -webkit-transform: rotate(-45deg) translate(-4px, 4px);
          transform: rotate(-45deg) translate(-4px, 4px);
}

.change .bar2 {
  opacity: 0;
}

.change .bar3 {
  -webkit-transform: rotate(45deg) translate(-7px, -8px);
          transform: rotate(45deg) translate(-7px, -8px);
}

</style>
