<template>
    <div v-if="flashmessage" class="alert alert-warning" role="alert">
        {{flashmessage}}
    </div>
</template>

<script>

    export default {
        props: [
            'flashmessage'
        ],
        data: function () {
								return {
								 //   flashMessage: ''
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
            console.log('this.flashmessage');
            console.log(this.flashmessage);
//            if(this.$cookie.get('flashmessage')){
//                this.flashMessage = this.$cookie.get('flashmessage');
//                this.$cookie.delete('flashmessage');
//            }


        }
    }
</script>
