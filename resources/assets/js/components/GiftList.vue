<template>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h2>Gift List - <span v-if="!editTitle" @click="toggleEditTitle">{{giftlist.gift_list_name}}</span>
          <input @keyup.enter="saveGiftList" @blur="saveGiftList" type="text" v-if="editTitle" v-model="giftlist.gift_list_name" />
        </h2>
      </div>
        <div class="panel-body">
            <p>Click a Gift to edit or create a new gift to add to the list </p>
            <ul class="gift-list__list">
              <li class="gift-list__item" v-for="gift in giftlist.gifts" @mouseover="giftHoverOn(gift)"  @mouseout="giftHoverOff" >
                <a title="Edit this gift." :href="'/gift/'+gift.id">{{ gift.gift_name}}</a>
                <a v-if="showOutBound == gift.id" :title="'Vist this web page - '+gift.url"  target="_blank" style="padding: 0" :href="gift.gift_url" class="btn btn-link">
                  <span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>
                </a>
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
                    showRemove: false,
                    showOutBound: false,
                    editTitle: false,
            }
        },
        methods:  {
            updateGiftList: function (giftList) {
                this.$emit('updategiftlist' , giftList);
            },
            toggleEditTitle: function(){
                this.editTitle = !this.editTitle;
            },
            giftHoverOn: function (gift) {
                this.showRemove = gift.id;
                this.showOutBound = gift.id
            },
            giftHoverOff: function () {
                this.showRemove = false;
                this.showOutBound = false;
            },
            saveGiftList: function () {
                this.toggleEditTitle();
                var data = {
                    '_method' : 'PATCH',
                    'gift_list_name': this.giftlist.gift_list_name,

                }
                axios.post('/api/giftlist/'+this.listId, data)
                    .then(function (response) {
                        console.log('save the gift_list');
                        console.log(response);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
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
