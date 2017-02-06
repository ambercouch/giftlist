<template>
    <div class="panel panel-default">
        <div class="panel-body">
            <input placeholder="Gift List Name"  style="display: block;margin-bottom: 6px" v-if="active" v-model="giftlist.gift_list_name" class="form-control" type="text" :value="giftlist.gift_list_name"/>
            <a @click="addToggle" >{{ active ? saveLabel : addLabel }}</a>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
								return {
								    giftlist: {
    								        gift_list_name: ''
                    },
                    addLabel: 'Add a New Gift List',
                    saveLabel: 'Save the Gift List',
                    active: false,
            }
        },
        methods: {
            addToggle: function () {
                if (this.active){
                    this.saveGiftList();
                    this.active = ! this.active;
                }else {
                    this.active = ! this.active;
                }
            },
            delGift: function () {

            },
            saveGiftList: function () {

                var data = {
                    'gift_list_name': this.giftlist.gift_list_name,
                }
                var self = this;

                axios.post('/api/giftlist',  data)
                    .then(function (response) {
                        self.$cookie.set('flashmessage', 'Gift List Added', 1);
                        location.href = '/giftlists/';
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            }
        },

        mounted() {
            console.log('add a gift list')
//            this.$http.get('/api/gift/'+this.giftid)
//            						.then(response => {
//
//                                this.gift = response.data.data;
//                                console.log(response);
//            						});
        }
    }
</script>
