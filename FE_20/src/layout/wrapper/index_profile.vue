<template>
    <div class="wrapper">
        <TopClient />
        <MenuClient />
        <div class="page-wrapper compact-wrapper">
            <div class="page-content">
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>

<script>
import TopClient from '../components/TopClient.vue'
import MenuClient from '../components/MenuClient.vue'

export default {
    name: 'ProfileLayout',
    components: {
        TopClient,
        MenuClient
    }
}
</script>
<style scoped>
.compact-wrapper {
    margin-top: 10px; 
    padding-top: 10px; 
}

.page-content {
    padding-top: 10px; 
}
</style>