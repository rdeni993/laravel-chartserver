<template>
    <div class="container">
    <h4 class="mb-3">Create New Graphicon</h4>
        <form @submit.prevent="submitForm()">
            <div class="input-group">
                <input type="text" v-bind="{disabled : chartSaved != 'neutral'}" v-model="chartName" class="form-control me-4" placeholder="Type Chart Title" />
                <div class="input-group-append">
                    <button class="btn btn-primary form-control">Create</button>
                </div>
            </div>
        </form>
        <div class="mt-3">
            <p class="text-success m-0 p-0" v-if="chartSaved == 'positive'">
                <i class="fa fa-check"></i> Graphicon is created 
                <a href="#" @click.prevent="reloadPage" class="btn btn-link"><i class="fa fa-refresh ms-4"></i> Create New</a>
            </p>
            <p class="text-danger m-0 p-0" v-if="chartSaved == 'negative'">
                <i class="fa fa-remove"></i> Graphicon is not created
                <a href="#" @click.prevent="reloadPage" class="btn btn-link"><i class="fa fa-refresh ms-4"></i> Create New</a>
            </p>
        </div>
    </div>
</template>

<script>
export default {
    data : function(){
        return {
            chartName : '',
            chartSaved : 'neutral'
        }
    },
    methods : {
        submitForm : function(){
            axios.post('/api/graph', {chart : this.chartName})
                 .then((response)=>{
                     this.chartSaved = 'positive';
                 })
                 .catch((error)=>{
                     this.chartSaved = 'negative';
                 });
        },

        reloadPage : function(){
            return window.location.reload();
        }
    }
}
</script>

<style>

</style>