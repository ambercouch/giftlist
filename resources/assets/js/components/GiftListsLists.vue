<template>
    <div class="panel panel-default">
        <div class="panel-heading"><h2>Your Gift lists</h2></div>
        <div class="panel-body">
            <p>Click a list to view or edit your gifts or create a new list of gifts to share with your friends and family</p>

            <ul>
                <li v-for="list in giftlists">{{ list.gift_list_name}}</li>
            </ul>
        </div>
    </div>
    test

</template>



<script>
    export default {
								data: function () {
								return {
            giftlists: [],
            pagination: ''
            }
        },
        mounted() {
            this.$http.get('api/giftlists')
            						.then(response => {

                                this.giftlists = response.data.data.data;

            										console.log('test log 2');
            										console.log(response.data.data.data);

            						});
        }
    }
</script>
