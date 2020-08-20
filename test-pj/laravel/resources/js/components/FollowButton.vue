<template>
    <div>
        <button class="btn btn-primary ml-4" @click="followUser" v-text="buttonText"></button>
    </div>
</template>

<script>
    export default {
        name: 'follow-b',
        props: ['userId', 'follows'],
        mounted() {
            console.log('Component mounted.')
        },

        data: function () {
            return {
                status: this.follows,
            }
        }, 
        methods: {
            followUser() {
                axios.post('/follow/' + this.userId)
                    .then(resp => {
                        
                        this.status = !this.status;
                        console.log(resp.data)
                    })
                    .catch(errors => { 
                        // this is for  error when the user has not succesfully loged in yet
                        // best way to handle the 401 (has not yet logged in) is redirect the user into home page
                        if (errors.response.status == 401){
                            window.location = '/login';
                        }
                    });
            }
        },

        computed: {
            buttonText(){
                return (this.status) ? 'Unfollow' : 'Follow' ; 
            }
        }
    }
</script>
