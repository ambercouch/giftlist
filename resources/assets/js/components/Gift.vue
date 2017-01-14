<template>
    <div class="panel panel-default">
        <div class="panel-heading"><h2>Gift</h2></div>
        <div class="panel-body">
            <h3>{{gift.gift_name}}</h3>
            <div>{{gift.gift_url}}</div>
        </div>
    </div>


</template>

<script>
    export default {
        props:['giftid'],
								data: function () {
								return {
								    gift: [],
                    giftId: this.giftid
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
