<template>
    <div>
        <div class="row mt-4">
            <div class="col-lg-4">
                <h6>Please select date</h6>
                <input type="date" class="form-control" v-model="searchDate" />
            </div>
            <div class="col-lg-4">
                <h6>Select Chart</h6>
                <select class="form-select" v-model="searchChart">
                    <option value="0">--Select Chart--</option>
                    <option v-for="cht in chartData" :key="cht.id" :value="cht.id">{{ cht.chart }}</option>
                </select>
            </div>
            <div class="col-lg-4 text-end">
            <h6 class="text-white">.</h6>
                <button @click.prevent="searchingDate" class="btn btn-primary">Check for price</button>
            </div>
            <div class="col-lg-12" v-if="searchFind == 'positive'">
                <div class="mt-3 input-group">
                    <input v-bind="{ disabled : priceUpdateStatus == 'positive' }" type="text" v-model="srcPrice.price" class="w-75 form-control" />
                    <button class="btn btn-primary" @click.prevent="updatePrices">Update</button>
                </div>
                <div class="mt-3">
                    <p v-if="priceUpdateStatus == 'positive'" class="text-success"><i class="fa fa-check me-3"></i>Price is updated!</p>
                    <p v-if="priceUpdateStatus == 'negative'" class="text-danger"><i class="fa fa-remove me-3"></i> Price is not updated</p>
                </div>
            </div>
            <div class="col-lg-12 mt-3" v-if="searchFind == 'negative'">
                <p class="text-danger">Your price is not found</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {

    data : function(){
        return {
            searchDate : false,
            searchChart : 0,
            chartData : false,
            srcPrice : {
                pid : false,
                price : false
            },
            priceUpdateStatus : 'neutral',
            searchFind : 'neutral'
        }
    },

    props : ['charts'],

    methods :{
        searchingDate : function(){
            axios.get(`/api/price/${this.searchDate}/${this.searchChart}`)
                 .then((response)=>{
                     this.srcPrice.pid = response.data.id;
                     this.srcPrice.price = response.data.price;

                     if(response.data.id){
                         this.searchFind = 'positive';
                     } else {
                         this.searchFind = 'negative';
                     }
                 })
                 .catch((error)=>{
                     this.searchFind = 'negative';
                 })
        },
        updatePrices : function(){    
           axios.put('/api/price', {puts: [{ pid : this.srcPrice.pid, price : this.srcPrice.price}]})
                 .then( (response) => {
                     this.priceUpdateStatus = 'positive';
                 } )
                 .catch( (error) => {
                     this.priceUpdateStatus = 'negative';
                 } );
        }
    },

    mounted : function(){

        this.chartData = JSON.parse(this.charts)

    }

}
</script>

<style>

</style>