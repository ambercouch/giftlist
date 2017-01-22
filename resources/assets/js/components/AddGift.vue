<template>
    <div class="panel panel-default">
        <div class="panel-body">
            <input @keyup.enter="editToggle" style="display: block;margin-bottom: 6px" v-if="active" v-model="gift.gift_url" class="form-control" type="url" :value="gift.gift_url"/>

            <a @click="addToggle" >{{ active ? saveLabel : addLabel }}</a>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
								return {
								    gift: {
								        giftlist : {}
                    },
                    addLabel: 'Add a New Gift',
                    saveLabel: 'Save the Gift',
                    active: false,
            }
        },
        methods: {
            addToggle: function () {
                //this.active = ! this.active;
                if (this.active){
//                    this.saveGift();
                    this.active = ! this.active;
                }else {
                    this.active = ! this.active;
                }
            },
            delGift: function () {
//                console.log('del gift');
//                this.$http.delete('/api/gift/'+this.giftid)
//                    .then( response => {
//                   console.log('deleted and go');
//                //var router = new VueRouter() ;
//                this.$cookie.set('flashmessage', 'Gift Deleted', 1);
//                location.href = '/giftlist/'+this.gift.giftlist.id;
//                });
            },
            saveGift: function () {
//                var data = {
//                    '_method' : 'PATCH',
//                    'gift_name': this.gift.gift_name,
//                    'gift_url': this.gift.gift_url
//                }
//                this.$http.post('/api/gift/'+this.giftid, data)
//                    .then(response => {
//                        console.log('save the gift');
//                console.log(response);
//            });
            }
        },

        mounted() {
            console.log('add a gift')
            this.$http.get('/api/gift/'+this.giftid)
            						.then(response => {

                                this.gift = response.data.data;
                                console.log(response);
            						});
        }
    }
</script>
