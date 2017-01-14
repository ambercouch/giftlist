<template>
    <div class="panel panel-default">
        <div class="panel-heading"><h2>Gift - </h2></div>
        <div class="panel-body">
            <p>Edit your gift</p>
            <ul>
              <li></li>
            </ul>
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
            						});
        }
    }
</script>
