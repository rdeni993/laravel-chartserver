<template>
    <div class="row mt-5 ms-1">
        <div class="col-lg-12 mb-3" v-for="user in userData" :key="user.id">
            <div class="row w-100 border-bottom pb-2">
                <div class="col-lg-6 p-0 mt-2">{{ user.name }}</div>
                <div class="col-lg-6">
                    <select class="form-select" v-model="approvePlan" @change="approveUser(user.id)">
                        <option value=false>Approve this user</option>
                        <option :disabled="user.email_verified_at" :value="{ user : user.id, option : 'approve' }">Approve</option>
                    </select>
                </div>
                <div class="col-lg-12 mt-2 text-end text-success" v-if="approveStatus == 'positive' && approveStatusUser == user.id">
                    <i class="fa fa-check"></i> User is approved!
                </div>
                <div class="col-lg-12 mt-2 text-end text-danger" v-if="approveStatus == 'negative' && approveStatusUser == user.id">
                    <i class="fa fa-remove"></i> User is not approved!
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data : function(){
        return {
            userData : false,
            approveStatus : 'neutral',
            approveStatusUser : false,
            approvePlan : false
        }
    },
    methods : {
        approveUser : function(userId){
            this.approveStatusUser = userId;
            if(this.approvePlan.option == 'approve'){
                $.get(`/api/users/${this.approvePlan.user}`)
                 .then((response)=>{
                     this.approveStatus = 'positive';
                 })
                 .catch((error) =>{
                     this.approveStatus = 'negative';
                 })
            }
        }
    },
    props : {
        users : String
    },
    mounted : function(){
        this.userData = JSON.parse(this.users);
    }
}
</script>

<style>
    
</style>