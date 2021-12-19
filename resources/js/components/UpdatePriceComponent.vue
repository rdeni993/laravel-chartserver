<template>
    <table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Price</th>
                <th>Chart</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="item in dataPricesArray" :key="item.pid" :ref="item.pid">
                <td>{{ item.price_date }}</td>
                <td>
                    <input type="text" @change="addToChanges(item.pid, item.price)" class="form-control w-75" v-model="item.price">
                </td>
                <td>{{ item.chart }}</td>
            </tr>
            <tr class="border-0">
                <td colspan="3" class="text-end border-0">
                    <p v-if="pricesUpdateStatus == 'positive'" class="text-success d-inline me-4">Prices are updated!</p>
                    <p v-if="pricesUpdateStatus == 'negative'" class="text-danger d-inline me-4">Prices are not updated!</p>
                    <button @click.prevent="updatePrices()" class="btn btn-primary">Update</button>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    data : function(){
        return {
            dataPrices : null,
            dataPricesArray : false,
            changes : [],
            pricesUpdateStatus : 'neutral'
        }
    },
    props : {
        prices : String
    },
    mounted : function(){
        this.dataPrices = JSON.parse(this.prices);
        this.dataPricesArray = this.dataPrices.data;
    },
    methods : {
        updatePrices : function(){    
            axios.put('/api/price', {puts:this.changes})
                 .then( (response) => {
                     this.pricesUpdateStatus = 'positive';
                 } )
                 .catch( (error) => {
                     this.pricesUpdateStatus = 'negative';
                 } );

        },
        addToChanges : function(PID, PRICE){
            this.changes.push({pid : PID, price : PRICE})
        }
    }
}
</script>

<style>

</style>