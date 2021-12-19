<template>
    <div class="container">
        <h4 class="mb-3">Add price</h4>
        <div class="row">
            <div class="col-lg-4">
                <input type="date" v-bind="{disabled : priceSaved != 'neutral'}" class="form-control" v-model="price.date" />
            </div>
            <div class="col-lg-4">
                <input type="text" v-bind="{disabled : priceSaved != 'neutral'}"  placeholder="Add Price" class="form-control" v-model="price.price" />
            </div>
            <div class="col-lg-4">
                <select class="form-select" v-model="price.chart" v-bind="{disabled : priceSaved != 'neutral'}" >
                    <option value="false" disabled default>--Select Chart--</option>
                    <option v-for="cht in chartData" :key="cht.id" :value="cht.id">{{ cht.chart }}</option>
                </select>
            </div>
            <div class="col-lg-12 mt-2 text-end">
                <button @click.prevent="createPrice()" class="btn btn-primary">Add price</button>
            </div>
        </div>

        <div class="mt-4">
            <p v-if="priceSaved == 'positive'" class="text-success m-0">
                <i class="fa fa-check"></i> Price added!
                <a href="#" @click.prevent="reloadPage" class="btn btn-link text-decoration-none"><i class="fa fa-reload"></i> Dodaj novu cijenu</a>
            </p>
            <p v-if="priceSaved == 'negative'" class="text-danger m-0">
                <i class="fa fa-remove"></i> Price is failed to add to database!
                <a href="#" @click.prevent="reloadPage" class="btn btn-link text-decoration-none"><i class="fa fa-reload"></i> Dodaj novu cijenu</a>
            </p>
        </div>
    </div>
</template>

<style>
    
</style>

<script>
export default {
    data : function(){
        return {
            price : {
                date : null,
                price : null,
                chart : false
            },

            chartData : false,
            priceSaved : 'neutral'
        }
    },

    props : {
        charts : String
    },

    methods : {
        createPrice : function(){
            axios.post('/api/price', {

                price : this.price.price,
                chart : this.price.chart,
                price_date : this.price.date

            })
                 .then((response)=>{
                     this.priceSaved = 'positive';
                 }) 
                 .catch((error) => {
                     this.priceSaved = 'negative';
                 });
        },

        reloadPage : function(){
            return window.location.reload();
        }
    },

    mounted : function(){
        this.chartData = JSON.parse(this.charts);
        let dt = new Date();
        let m = ( (dt.getMonth() + 1) < 10 ) ? ( '0' + (dt.getMonth() + 1) ) : (dt.getMonth() + 1);
        let d = ( dt.getDate() < 10 ) ? ('0' + dt.getDate()) : dt.getDate();
        let y = dt.getFullYear();
        
        let time = `${y}-${m}-${d}`;

        this.price.date = time;
    }
}
</script>

