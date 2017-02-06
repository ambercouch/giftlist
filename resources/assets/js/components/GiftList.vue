<template>
    <div class="panel panel-default">
        <div class="panel-heading"><h2>Gift List - {{giftlist.gift_list_name}}</h2></div>
        <div class="panel-body">
            <p>Click a Gift to edit or create a new gift to add to the list </p>
            <ul>
              <li v-for="gift in giftlist.gifts"><a :href="'/gift/'+gift.id">{{ gift.gift_name}}</a></li>
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
                    listId: this.listid
            }
        },
        methods:  {
            updateGiftList: function (giftList) {
                this.$emit('updategiftlist' , giftList);
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
