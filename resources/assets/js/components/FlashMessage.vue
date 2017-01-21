<template>
    <div v-if="flashMessage" class="alert alert-warning" role="alert">
        {{flashMessage}}
    </div>
</template>

<script>
    export default {
        data: function () {
								return {
								    flashMessage: ''
            }
        },
        methods: {
            editToggle: function () {
                //this.active = ! this.active;
                if (this.active){
                    this.saveGift();
                    this.active = ! this.active;
                }else {
                    this.active = ! this.active;
                }
            },
        },

        mounted: function() {
            if(this.$cookie.get('flashmessage')){
                this.flashMessage = this.$cookie.get('flashmessage');
                this.$cookie.delete('flashmessage');
            }


        }
    }
</script>
