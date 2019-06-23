<template>
    <div>
        <toolbar></toolbar>
        <v-content>
            <v-layout>
                <router-view></router-view>
            </v-layout>    
        </v-content>
    </div>
</template>

<script>
    import toolbar from './Toolbar'
    export default {
        components: {toolbar}
    }
</script>
