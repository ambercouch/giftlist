<template>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>{{gift.gift_name}}</h2>
            <small>Back to the <a :href="'/giftlist/'+gift.giftlist.id">{{gift.giftlist.gift_list_name}}</a> gift list.</small>
        </div>
        <div class="panel-body">
            <div class="gift__details">
                <strong>Purchase URL:</strong> <a :href="gift.gift_url">{{gift.gift_url}}</a> <button @click="liked" type="button" class="btn btn-primary btn-sm" >{{ active ? saveLabel : editLabel }}</button>
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
                this.active = ! this.active;
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
