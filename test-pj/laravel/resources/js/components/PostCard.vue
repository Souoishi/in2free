<template>   
    <div>

        <div v-if="page === 'sns'">
            <b-card 
                v-bind:img-src="'@/storage/'+ postInfo.image" 
                
                img-alt="Card image" 
                img-left class="mb-3" 
                img-height="200"
                img-width="200"
                style="border-bottom: 5px solid #C4820E;"
            >
                <!--<img src="{{ $user->profile[0]->profileImage() }}" class="rounded-circle" style="width: 10rem; margin:1rem;">-->
                <h3>{{ postInfo.user.name }}</h3> <hr>
                <b-card-text>
                    <h3>{{ postInfo.caption }}</h3> <br>
                    {{ postInfo.short_blog }}
                </b-card-text>
            </b-card>
        </div>

        <div v-else>
            <b-card
                
                v-bind:img-src="'@/storage/'+ postInfo.image"
                img-alt="Image"
                img-top
                tag="article"
                style="max-width: 20rem; margin: 1rem;"
                class="mb-2"
            >
                
                <h3> 
                    {{ postInfo.caption }} 
                </h3>
                
                <hr> 

                <b-card-text>
                    {{ postInfo.short_blog }}
                </b-card-text>

                <b-button v-bind:href="'/p/'+ postInfo.user_id" variant="primary" style="background: #3b7ea1; border-color:#3b7ea1; color:#fdb515">Go details</b-button>
            </b-card>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'post-card',
        //props: ['post_id','caption','short_blog'],
        props: ['post_info', 'page'],
        computed: {
            postInfo: function(){
            return JSON.parse(this.post_info);
            }   
        }

    }
</script>