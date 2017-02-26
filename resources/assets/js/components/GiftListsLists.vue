<template>
    <div class="panel panel-default">
        <div class="panel-heading"><h2>Your Gift lists</h2></div>
        <div class="panel-body">
            <p>Click a list to view or edit your gifts or create a new list of gifts to share with your friends and family</p>
            <ul class="gift-list-lists">
              <li class="gift-list-lists__item" v-for="list in giftlists" @mouseover="showRemove = list.id" @mouseout="showRemove = fales" ><a class="gift-list-lists__link" title="View the gifts in this list." :href="'/giftlist/'+list.id">{{ list.gift_list_name}}</a>
                  <button @click="delGiftList(list)" style="padding: 0" class="btn btn-link" v-if="showRemove == list.id">
                      <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                  </button>
              </li>
            </ul>
        </div>
    </div>
</template>


<script>
    export default {
        props:['giftlists'],
				data: function () {
								return {
								    'showRemove' : false
            }
        },
        methods:  {
            updateGiftLists: function (giftLists) {
                this.$emit('updategiftlists' , giftLists);
            },
            refreshGiftLists:function () {
                this.$http.get('api/giftlists')
                    .then(response => {
                        this.updateGiftLists(response.data.data.data);
                    });
            },
            delGiftList: function (giftlist) {
                var self = this;
                var index = this.giftlists.indexOf(giftlist);
                this.giftlists.splice(index, 1);
                console.log(this.giftlists);
                axios.delete('/api/giftlist/'+giftlist.id)
                    .then(function (response) {
                        //self.refreshGiftLists();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },
        mounted: function() {
            this.refreshGiftLists();
        }
    }
</script>
