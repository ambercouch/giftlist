<template>
    <div class="panel panel-default">
        <div class="panel-heading"><h2>Your Gift lists</h2></div>
        <div class="panel-body">
            <p>Click a list to view or edit your gifts or create a new list of gifts to share with your friends and family</p>
            <ul>
              <li v-for="list in giftlists"><a :href="'/giftlist/'+list.id">{{ list.gift_list_name}}</a></li>
            </ul>
        </div>
    </div>
</template>


<script>
    export default {
        props:['giftlists'],
				data: function () {
								return {
            }
        },
        methods:  {
            updateGiftLists: function (giftLists) {
                this.$emit('updategiftlists' , giftLists);
            }
        },
        mounted: function() {
            this.$http.get('api/giftlists')
            						.then(response => {
                            this.updateGiftLists(response.data.data.data);
            						});
        }
    }
</script>
