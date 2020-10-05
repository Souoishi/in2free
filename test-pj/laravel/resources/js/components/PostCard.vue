<template>   
    <div>

        <div v-if="page === 'sns'">
            <b-card 
                v-bind:img-src="prof_img" 
             
                img-alt="Card image" 
                img-left class="mb-3"
                img-height="100"
                img-width="100"
                style="border-bottom: 5px solid #C4820E;"
            >
                <!--<img src="{{ $user->profile[0]->profileImage() }}" class="rounded-circle" style="width: 10rem; margin:1rem;">-->
                <label for="username">Creator </label>
                <a v-bind:href="'/profile/'+ postInfo.user_id"> <b-form-input :readonly="true" list="input-list" id="username" v-bind:value="username"  class="w-responsive"></b-form-input></a>
                
                <label for="card_topic">Related Topic</label>
                <b-form-input :readonly="true" list="input-list" id="card_topic" v-bind:value="postInfo.card_topic"  class="w-responsive"></b-form-input>
                
                <label for="jp_expression">Japanese</label>
                <b-form-input :readonly="true" list="input-list" id="jp_expression" v-bind:value="postInfo.jp_expression"></b-form-input>
                
                <label for="jp_expression">English</label>
                <b-form-input :readonly="true" list="input-list" id="eg_expression" v-bind:value="postInfo.eg_expression"></b-form-input>
                
                <label for="jp_expression">Example</label>
                <b-form-textarea
                    :readonly="true"
                    id="textarea"
                    
                    rows="3"
                    max-rows="6"
                    v-bind:value="postInfo.exmp"
                ></b-form-textarea>

                <b-button v-bind:href="'/p/'+ postInfo.user_id" variant="primary" style="background: #3b7ea1; border-color:#3b7ea1; color:#fdb515; margin-top:20px">Go details</b-button>
            
            </b-card>
        </div>

        <div v-else>
            <b-card border-variant="info" class="mr-3 d-inline-block">
                
                <label for="card_topic">Related Topic</label>
                <b-form-input :readonly="true" list="input-list" id="card_topic" v-bind:value="postInfo.card_topic"  class="w-responsive"></b-form-input>
                
                <label for="jp_expression">Japanese</label>
                <b-form-input :readonly="true" list="input-list" id="jp_expression" v-bind:value="postInfo.jp_expression"></b-form-input>
                
                <label for="jp_expression">English</label>
                <b-form-input :readonly="true" list="input-list" id="eg_expression" v-bind:value="postInfo.eg_expression"></b-form-input>
                
                <label for="jp_expression">Example</label>
                <b-form-textarea
                    :readonly="true"
                    id="textarea"
                    
                    rows="3"
                    max-rows="6"
                    v-bind:value="postInfo.exmp"
                ></b-form-textarea>

                <b-button v-bind:href="'/p/'+ postInfo.user_id" variant="primary" style="background: #3b7ea1; border-color:#3b7ea1; color:#fdb515; margin-top:20px">Go details</b-button>
            </b-card>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'post-card',
        //props: ['post_id','caption','short_blog'],
        props: ['post_info', 'prof_img', 'page', 'username', 'userid'],
        computed: {
            postInfo: function(){
            return JSON.parse(this.post_info);
            }   
        }

    }
</script>