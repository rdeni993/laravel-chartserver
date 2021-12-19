<template>
<div class="container">
    <h4 class="mb-3">All Graphicons</h4>
    <p v-if="chartDataJs.length == 0">Currently there is no created Graphicons!</p>
    <ul class="list-group m-0 p-0">
        <li class="list-group-item border-0 p-0 mb-2" v-for="cht in chartDataJs" :key="cht.id">
            <small><i class="fa fa-arrow-right me-3"></i></small>
            <a href="" @click.prevent="openGraph(cht.id)" class="text-dark text-decoration-none">{{ cht.chart }}</a>
            <button @click.prevent="removeGraph(cht.id)" class="btn btn-link text-decoration-none">[ Remove ]</button>
        </li>
    </ul>

    <p class="mt-3" v-if="chartDataJs.length > 0">
        <small><i>Total Graph Created: {{ chartDataJs.length }}</i></small>
    </p>
</div>
</template>

<script>
export default {
    data: function () {
        return {
            chartDataJs : false
        }
    },
    props: {
        charts: String
    },
    methods : {
        removeGraph : function(graphId){
            axios.delete('/api/graph', { data : { chart : graphId } })
                 .then((response)=>{
                     window.location.reload();
                 })
                 .catch((error)=>{
                     alert("Error occured! Please try again!");
                 });
        },
        openGraph : function(graphId){
            return window.location.href = '/price/' + graphId;
        }
    },
    mounted: function () {

        this.chartDataJs = JSON.parse(this.charts);

    }
}
</script>

<style>
    ul li{
        font-size: 20px!important;
    }
    ul li i{
        color: #aaa;
    }
    ul li button{
        font-size: 12px;
    }
</style>
