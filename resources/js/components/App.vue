<template>
    <div class="content">
        <Placeholder :title="title"/>
    </div>
</template>
<script>
import Placeholder from "./Placeholder.vue";
    export default{
    name: "App",
    components: { Placeholder },
    data(){
        return{
            title: "Coming soon...",
        } 
            
    },

};
</script>