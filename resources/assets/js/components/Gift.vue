<template>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>{{gift.gift_name}}</h2>
            <small>Back to the <a :href="'/giftlist/'+gift.giftlist.id">{{gift.giftlist.gift_list_name}}</a> gift list.</small>
        </div>
        <div class="panel-body">
            <div class="gift__details" style="">
                <strong  style="display: block;" >Purchase&nbsp;URL:</strong>
                <a style="display: block;padding: 6px 0" v-if="!active" :href="gift.gift_url">{{gift.gift_url}}</a>
                <input @keyup.enter="buttonToggle" style="display: block;" v-if="active" v-model="gift.gift_url" class="form-control" type="url" :value="gift.gift_url"/>
                <button style="display: block;"   @click="buttonToggle" type="button" class="btn btn-primary btn-sm" >{{ active ? saveLabel : editLabel }}</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['giftid'],
        data: function () {
								return {
								    gift: {
								        giftlist : {}
                    },
                    giftId: this.giftid,
                    editLabel: 'Edit',
                    saveLabel: 'Save',
                    active: false,
            }
        },
        methods: {
            buttonToggle: function () {
                //this.active = ! this.active;
                if (this.active){
                    console.log('save')
                    this.saveGift();
                    this.active = ! this.active;
                }else {
                    console.log('edit')
                    this.active = ! this.active;
                }
            },
            saveGift: function () {
                var data = {
                    '_method' : 'PATCH',
                    'gift_name': this.gift.gift_name,
                    'gift_url': this.gift.gift_url
                }
                this.$http.post('/api/gift/'+this.giftid, data)
                    .then(response => {
                        console.log('save the gift');
                console.log(response);
            });
            }
        },

        mounted() {
            this.$http.get('/api/gift/'+this.giftid)
            						.then(response => {

                                this.gift = response.data.data;
                                console.log(response);
            						});
        }
    }
</script>
