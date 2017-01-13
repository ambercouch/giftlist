<template>
    <div class="panel panel-default">
        <div class="panel-heading"><h2>Your Gift list {{listId}}</h2></div>
        <div class="panel-body">
            <p>123 Click a list to view or edit your gifts or create a new list of gifts to share with your friends and family</p>
            <ul>
              <li v-for="list in giftlists"><a :href="'/giftlist/'+list.id">{{ list.gift_list_name}}</a></li>
            </ul>
        </div>
    </div>

</template>



<script>
    export default {
        props:['listid'],
								data: function () {
								return {
								    giftlist: [],
                    listId: this.listid
            }
        },

        mounted() {
            this.$http.get('/api/giftlists/'+this.listid)
            						.then(response => {

                                this.giftlists = response.data.data.data;

            										console.log('test log test');

            										console.log(response.data.data.data);

            						});
        }
    }
</script>
