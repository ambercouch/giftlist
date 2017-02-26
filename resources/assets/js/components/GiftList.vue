<template>
    <div class="panel panel-default">
        <div class="panel-heading"><h2>Gift List - {{giftlist.gift_list_name}}</h2></div>
        <div class="panel-body">
            <p>Click a Gift to edit or create a new gift to add to the list </p>
            <ul class="gift-list__list">
              <li class="gift-list__item" v-for="gift in giftlist.gifts" @mouseover="showRemove = gift.id" @mouseout="showRemove = fales" >
                <a title="Edit this gift."  :href="'/gift/'+gift.id">{{ gift.gift_name}}</a>
                <button @click="delGift(gift)" style="padding: 0" class="btn btn-link" v-if="showRemove == gift.id">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
              </li>
            </ul>
        </div>
    </div>

</template>



<script>
    export default {
        props:[
            'listid',
            'giftlist'
        ],
								data: function () {
								return {
                    listId: this.listid,
                    showRemove: false
            }
        },
        methods:  {
            updateGiftList: function (giftList) {
                this.$emit('updategiftlist' , giftList);
            },
            delGift: function (gift) {
                var self = this;
                var index = this.giftlist.gifts.indexOf(gift);
                this.giftlist.gifts.splice(index, 1);
                axios.delete('/api/gift/'+gift.id)
                    .then(function (response) {
                        //self.refreshGiftLists();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },

        mounted() {
            console.log('updateGiftList');
            console.log('updateGiftList');
            this.$http.get('/api/giftlists/'+this.listid)
            						.then(response => {

                                this.updateGiftList(response.data.data);

            						});
        }
    }
</script>
