<template>
    <div>
        <h1> fuck it </h1>
    </div>
</template>

<script>
    export default {
        name: 'profile-card',
        props: ['userId', 'userName'],
        mounted() {
            console.log('Component mounted.')
        },
    }
</script>