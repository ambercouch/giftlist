<template>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>
                <span v-if="!editTitle" @click="toggleEditTitle">{{gift.gift_name}}</span>
                <input @keyup.enter="saveGift" @blur="saveGift" type="text" v-if="editTitle" v-model="gift.gift_name" />
            </h2>
            <small>Back to the <a :href="'/giftlist/'+gift.giftlist.id">{{gift.giftlist.gift_list_name}}</a> gift list.</small>
        </div>
        <div class="panel-body">
            <div class="gift__details" style="">
                <strong  style="display: block;" >Purchase&nbsp;URL:</strong>
                <a style="display: block;padding: 6px 0;margin-bottom: 6px" title='Visit this web page' target="_blank" v-if="!active" :href="gift.gift_url">{{gift.gift_url}}</a>
                <input @keyup.enter="editToggle" style="display: block;margin-bottom: 6px" v-if="active" v-model="gift.gift_url" class="form-control" type="url" :value="gift.gift_url"/>
                <button    @click="editToggle" type="button" class="btn btn-primary btn-sm" >{{ active ? saveLabel : editLabel }}</button>
                <button @click="delGift" class="btn btn-sm"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
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
                    editTitle: false

            }
        },
        methods: {
            editToggle: function () {
                //this.active = ! this.active;
                if (this.active){
                    this.saveGift();
                    this.active = ! this.active;
                }else {
                    this.active = ! this.active;
                }
            },
            delGift: function () {
                console.log('del gift');
                this.$http.delete('/api/gift/'+this.giftid)
                    .then( response => {
                   console.log('deleted and go');
                //var router = new VueRouter() ;
                this.$cookie.set('flashmessage', 'Gift Deleted', 1);
                location.href = '/giftlist/'+this.gift.giftlist.id;
                });
            },
            saveGift: function () {

                this.editTitle = false;

                var data = {
                    '_method' : 'PATCH',
                    'gift_name': this.gift.gift_name,
                    'gift_url': this.gift.gift_url
                }
                axios.post('/api/gift/'+this.giftid, data)
                    .then(function (response) {
                        console.log('save the gift');
                        console.log(response);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            toggleEditTitle: function () {
                this.editTitle = !this.editTitle;
            }

        },

        mounted() {
            axios.get('/api/gift/'+this.giftid)
            						.then((response) => {

                                this.gift = response.data.data;
                                console.log(response);
            						});
        }
    }
</script>
