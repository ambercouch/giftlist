<template>
    <div class="panel panel-default">
        <div class="panel-body">
            <input placeholder="Gift Name"  style="display: block;margin-bottom: 6px" v-if="active" v-model="gift.gift_name" class="form-control" type="text" :value="gift.gift_name"/>
            <input placeholder="Gift Url"  style="display: block;margin-bottom: 6px" v-if="active" v-model="gift.gift_url" class="form-control" type="url" :value="gift.gift_url"/>
            <a @click="addToggle" >{{ active ? saveLabel : addLabel }}</a>
        </div>
    </div>
</template>

<script>
    export default {
        props:['listid'],
        data: function () {
								return {
								    gift: {
    								        gift_name: '',
                        gift_url: ''
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
                    this.saveGift();
                    this.active = ! this.active;
                }else {
                    this.active = ! this.active;
                }
            },
            delGift: function () {

            },
            saveGift: function () {

                var data = {
                    'gift_name': this.gift.gift_name,
                    'gift_url': this.gift.gift_url,
                    'gift_list_id': this.listid
                }
                var self = this;

                axios.post('/api/gift',  data)
                    .then(function (response) {
                        self.$cookie.set('flashmessage', 'Gift Added', 1);
                        location.href = '/giftlist/'+self.listid;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            }
        },

        mounted() {
            console.log('add a gift')
//            this.$http.get('/api/gift/'+this.giftid)
//            						.then(response => {
//
//                                this.gift = response.data.data;
//                                console.log(response);
//            						});
        }
    }
</script>
