<template>
    <div>
        <div id="example-1">
            <div v-for="user in users" :key="user.id">
                <b-card img-src="https://placekitten.com/300/300" img-alt="Card image" img-left class="mb-3">
                    <b-card-text>
                        <a> {{ user.name }} </a> <br>
                        <a> {{ user.email }} </a>
                    </b-card-text>
                </b-card>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'profile-card',
        props: ['users']

     
    }
</script>